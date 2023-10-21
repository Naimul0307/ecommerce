<div>
    <div class="container">
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <div class="row">
                            <div class="col-md-6">All Coupon</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupons')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                           </div>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <table class="table table-success table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">Id</th>
                                      <th scope="col">Coupon Code</th>
                                      <th scope="col">Coupon Type</th>
                                      <th scope="col">Coupon Value</th>
                                      <th scope="col">Cart Value</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->type}}</td>
                                        @if ($coupon->type == 'fixed')
                                        <td>${{$coupon->value}}</td>
                                        @else
                                        <td>{{$coupon->value}} %</td>
                                        @endif
                                        <td>{{$coupon->cart_value}}</td>
                                        <td>
                                            <a href="{{route('admin.editcoupons',['coupon_id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left: 15px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
