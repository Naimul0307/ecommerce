<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product -> qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->dispatch('refreshComponent')->to('cart-count-component');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product-> qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->dispatch('refreshComponent')->to('cart-count-component');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refreshComponent')->to('cart-count-component');
        session()->flash('success_message','Item has been removed');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->dispatch('refreshComponent')->to('cart-count-component');
        session()->flash('success_message','All Item has been removed');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.app');;
    }
}
