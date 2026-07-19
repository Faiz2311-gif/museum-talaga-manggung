<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Navigation extends Component
{
    public bool $open = true;

    public function toggle(): void
    {
        $this->open = !$this->open;
    }

    public function render()
    {
        return view('livewire.layout.navigation');
    }
}
