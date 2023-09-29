<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <div class="row">
                        <div class="col-md-6">All Category</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New</a>
                        </div>
                       </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-success table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col">Slug</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
