<?php

namespace App\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributesComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
    }

    public function storeAttribute()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $attribute = new ProductAttribute();
        $attribute->name = $this->name;
        $attribute->save();
        session()->flash('message', 'Attribute has been added successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-attributes-component')->layout('layouts.base');
    }
}
