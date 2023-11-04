<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy("created_at","desc")->paginate(10);
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenus = Order::where('status','delivered')->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenus = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        
        return view('livewire.admin.admin-dashboard-component',[
            'orders' => $orders,
            'totalSales' => $totalSales,
            'totalRevenus' => $totalRevenus,
            'todaySales' => $todaySales,
            'todayRevenus' => $totalRevenus,
        ])->layout('layouts.base');
    }
}
