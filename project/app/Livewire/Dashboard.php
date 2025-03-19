<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $email;
    public $name;

    public function mount()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        $this->email = auth()->user()->email;
        $this->name = auth()->user()->name;
    }

    // Placeholder methods for button clicks
    public function navigateToFeatureOne()
    {
        // Add redirect logic later
        dd('Redirect to Feature 1');
    }

    public function navigateToFeatureTwo()
    {
        // Add redirect logic later
        dd('Redirect to Feature 2');
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
