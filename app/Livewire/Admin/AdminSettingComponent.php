<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $pinterest;
    public $instagram;
    public $youtube;
    public $vimeo;
    public $linkedin;

    public function mount()
    {
        $setting = Setting::find(1);

        if($setting)
        {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twitter = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->pinterest = $setting->pinterest;
            $this->instagram = $setting->instagram;
            $this->youtube = $setting->youtube;
            $this->linkedin = $setting->linkedin;
            $this->vimeo = $setting->vimeo;
        }
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required',
            'phone'=> 'required',
            'phone2'=> 'required',
            'address'=> 'required',
            'map'=> 'required',
            'twitter'=> 'required',
            'facebook'=> 'required',
            'pinterest'=> 'required',
            'instagram'=> 'required',
            'youtube'=> 'required',
            'linkedin' => 'required',
            'vimeo' => 'required',
        ]);
    }

    public function saveSetting()
    {
        $this->validate([
            'email' => 'required',
            'phone'=> 'required',
            'phone2'=> 'required',
            'address'=> 'required',
            'map'=> 'required',
            'twitter'=> 'required',
            'facebook'=> 'required',
            'pinterest'=> 'required',
            'instagram'=> 'required',
            'youtube'=> 'required',
            'linkedin' => 'required',
            'vimeo'=> 'required',
        ]);

        $setting = Setting::find(1);
        if(!$setting)
        {
            $setting = new Setting();
        }

        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->facebook = $this->facebook;
        $setting->twitter = $this->twitter;
        $setting->pinterest = $this->pinterest;
        $setting->linkedin = $this->linkedin;
        $setting->instagram = $this->instagram;
        $setting->youtube = $this->youtube;
        $setting->vimeo = $this->vimeo;
        $setting->save();
        session()->flash('message','Setting has been saved successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
