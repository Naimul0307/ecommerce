<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(5)->get();
        $relatd_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(6)->get();
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_product'=>$relatd_product])->layout('layouts.based');
    }
}
