<?php

namespace App\Http\Livewire\Layouts\Page;

use Livewire\Component;

class Header extends Component
{
    public $darkMode = false;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.layouts.page.header');
    }
}
