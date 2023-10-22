<?php

namespace App\Livewire\Admin;
use App\Models\Coupon;
use Livewire\Component;

class EditCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->expiry_date = $coupon->expiry_date;
        $this->coupon_id = $coupon->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required',
            'type'=>'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required',
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required',
            'type'=>'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required',
        ]);

        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon has been update successfully!');
    }

    public function render()
    {
        return view('livewire.admin.edit-coupons-component')->layout('layouts.app');
    }
}
