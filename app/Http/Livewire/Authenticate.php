<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Authenticate extends Component
{

    public
        $darkMode = true,
        $email = '',
        $password = '',
        $returnValue,
        $authError = null,
        $ipAddress,

        $toastAlert = ['show' => 'false', 'alert' => '', 'message' => ''];

    public bool $openAuthModal = false;

    protected $listeners = ['authorizeLogin'];
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    protected $messages = [

        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'Enter a valid email ID.',
        'password.required' => 'The Password cannot be empty.',
    ];

    public function hydrate()
    {

    }

    public function authorizeLogin($value)
    {

        $this->resetErrorBag();
        $this->authError = null;
        $this->reset();
        $this->openAuthModal = $value[0];
        $this->returnValue = $value[1];
    }

    public function refreshComponent()
    {
        $this->openAuthModal = true;
    }


    public function mount(Request $request)
    {
        $this->ipAddress = $request->ip();
    }

    public function login()
    {

        $validate = $this->validate();
        $this->ensureIsNotRateLimited();

        if (Auth::guard('admin')->attempt($validate)) {
            Session::put('authorizeOperation', ['time' => Carbon::now()->addMinutes(10)->timestamp]);
            $this->emit('authSuccess', $this->returnValue);
            $this->openAuthModal = false;
        } else {
            $this->authError = true;
//            Session::forget('authorizeOperation');
        }
    }

    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey()
    {
        return Str::lower($this->email) . '|' . $this->ipAddress;
    }

}
