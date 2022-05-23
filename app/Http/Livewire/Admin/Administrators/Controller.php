<?php

namespace App\Http\Livewire\Admin\Administrators;

use App\Http\Livewire\Authenticate;
use App\Models\User;
use App\Traits\Data;
use App\Traits\Query;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;


class Controller extends Authenticate
{
    public function render()
    {
        return view('livewire.admin.administrators.controller');
    }
}
