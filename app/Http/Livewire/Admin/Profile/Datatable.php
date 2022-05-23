<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Http\Livewire\Authenticate;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Datatable extends Authenticate
{
    use Data;

    protected
        $session = null,
        $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/';
    public
        $auth = ['current_password' => '', 'password' => '', 'password_confirmation' => ''],
        $user=['name'=>'','email'=>''],
        $header = null,
        $email,
        $password,
        $form,
        $modalType = null,
        $modalSize = 'medium',
        $openModal = false,
        $openLogin = true,
        $tabs = [1, 2],
        $tabContentGuard = [2],
        $tabContent = 1,
        $tabPrevious = 0;


    protected $listeners = ['authSuccess'];

    protected function resetPasswordForm(){
        $this->auth['current_password']=null;
        $this->auth['password']=null;
        $this->auth['password_confirmation']=null;
    }

    public function mount(Request $request)
    {
        $this->resetPasswordForm();
        if (in_array($this->tabContent, $this->tabContentGuard)) {
            $this->tabContent = 0;
        } else {
            $this->tabPrevious = $this->tabContent;
        }
        $this->user['name']=Auth::user()->name;
        $this->user['email']=Auth::user()->email;
        $this->modalSize = "small";
    }


    public function authSuccess($value)
    {
        $this->tabPrevious = $value;
        $this->tabContent = $value;
    }

    protected $messages = [
        'user.name.required'=>'Please give your full name',
        'user.name.min'=>'Your name must be at-least 4 characters long',

        'auth.current_password.required' => 'The Password cannot be empty.',
        'auth.password.required' => 'New Password cannot be empty.',
        'auth.password.regex' => 'Password must contain: 1 uppercase letter, 1 lowercase letter, 1 number and a special character',
        'auth.password_confirmation.required' => 'Password confirmation is required.',
        'auth.password.min' => 'Password must contain minimum 8 characters long.',
        'auth.password.confirmed' => 'The two Password do not match.',
        'auth.password_confirmation' => 'Confirm Password cannot be empty.',

    ];

    protected function passwordRules()
    {
        return [
            'auth.current_password' => 'required|current_password',
            'auth.password' => 'required|min:8|regex:' . $this->password_regex . '|confirmed',
            'auth.password_confirmation' => 'required',
        ];
    }

    protected function profileRules()
    {
        return [
            'user.name' => 'required|min:4',
        ];
    }

    public function openTab($id)
    {
        switch ($id) {
            case '1':
            case '2':
                if (in_array($id, $this->tabContentGuard)) {
                    if ($this->authorizeUser($id)) {
                        $this->tabPrevious = $id;
                        $this->tabContent = $id;
                    } else {
                        if (!in_array($this->tabPrevious, $this->tabContentGuard)) {
                            $this->tabContent = $this->tabPrevious;
                        } else {
                            $diff = array_diff($this->tabs, $this->tabContentGuard);
                            (empty($diff)) ? $this->tabContent = 0 : $this->tabContent = $diff[array_key_first($diff)];
                        }
                    }
                } else {
                    $this->tabContent = $id;
                }
                break;
        }
    }

    public function submit()
    {
        switch($this->tabContent){
            case 1:
                $this->validate($this->profileRules());
                $admin=Admin::find(Auth::user()->id);
                $admin->name=Data::capitalize_each_word($this->user['name']);
                $admin->save();
                $this->emit('refreshComponent');
                $this->toastAlert = ['show'=>'true','alert' => 'success', 'message' => ' Your profile was updated successfully!'];
                break;

            case 2:
                $this->validate($this->passwordRules());
                if (Auth::guard('admin')->check()) {
                    $user = Admin::find(Auth::user()->id);
                    $user->password = Hash::make($this->auth['password']);
                    $user->save();
                    $this->resetPasswordForm();
//                    $this->resetErrorBag();
//                    $this->reset();
                    $this->toastAlert = ['show'=>'true','alert' => 'success', 'message' => ' Password was updated successfully!'];
                }
                break;
        }

    }


    public function render()
    {
        return view('livewire.admin.profile.datatable');
    }
}
