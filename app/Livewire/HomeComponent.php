<?php

namespace App\Livewire;
use App\Models\HomeSlider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        return view('livewire.home-component',['sliders'=>$sliders])->layout('layouts.based');
    }
}
