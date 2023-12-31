<div class="container">
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <div class="row">
                        <div class="col-md-6">All Slider</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New Slider</a>
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
                                  <th scope="col">Image</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Subtitle</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Link</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" alt="{{$slider->title}}" width="120"></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->subtitle}}</td>
                                    <td>{{$slider->price}}</td>
                                    <td>{{$slider->link}}</td>
                                    <td>{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td>{{$slider->date}}</td>
                                    <td>
                                        <a href="{{route('admin.edithomeslider',['slider_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})"style="margin-left: 15px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                        </table>
                        {{$sliders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
