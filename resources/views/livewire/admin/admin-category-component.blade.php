<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .slist{
            list-style:none;
        }
        .slist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size: 16px;
            margin-left: 12px;
        }
    </style>
<div class="container">
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <div class="row">
                        <div class="col-md-6">All Category</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New Category</a>
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
                                  <th scope="col">Category Name</th>
                                  <th scope="col">Slug</th>
                                  <th scop="col">Sub Category</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <ul class="slist">
                                            @foreach ($category->subCategories as $scategory)
                                                <li>
                                                    <i class="fa fa-caret-right"></i>{{$scategory->name}} 
                                                    <a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="slink"><i class="fa fa-edit"></i></a>
                                                    <a href="#" onclick="confirm('Are you want to delete this subcategory?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$scategory->id}})" class="slink"><i class="fa fa-times text-danger"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" onclick="confirm('Are you want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 15px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
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
</div>
