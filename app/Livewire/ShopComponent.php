<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use App\Models\Sale;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize= 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('shop');
    }

    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('wishlist-count-component ');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('refreshComponent')->to('wishlist-count-component ');
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == "date")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting =="price")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting =="price-desc")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();
        $sale = Sale::find(1);
        return view('livewire.shop-component',['products'=> $products,'categories'=>$categories ,'sale'=>$sale])->layout('layouts.base');
    }
}
