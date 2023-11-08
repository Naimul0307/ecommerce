<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                           Update Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form class="form-horizontal" anctype="multipart/form-data" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug"/>
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="scategory_id">
                                    <option value="0">Select Category</option>
                                    @foreach ($scategories as $scategory )
                                    <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('scategory_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-4">
                                <textarea placeholder="Short Description" id="short_description" class="form-control input-md" cols="30" rows="10" wire:model="short_description"></textarea>
                                @error('short_description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <textarea placeholder="Description" id="description" class="form-control input-md" cols="30" rows="10" wire:model="description"></textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                                @error('regular_price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price"/>
                                @error('sale_price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                                @error('SKU')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Stock Status</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">In Stock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                                @error('quantity')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Image</label>
                            <div class="col-md-4">
                                <input type="file" placeholder="Image" class="form-control input-file" wire:model="newimage"/>
                                @if($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                @else
                                <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"/>
                                @endif
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Gallery</label>
                            <div class="col-md-4">
                                <input type="file" placeholder="Image" class="form-control input-file" wire:model="newimages" multiple/>
                                @if($newimages)
                                @foreach ($newimages as $newimage )
                                    @if($newimage)
                                     <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                    @endif
                                @endforeach
                                @else
                                 @foreach ($images as $image )
                                     @if ($image)
                                          <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"/>
                                     @endif
                                 @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:'#short_description',
            setup:function(editor){
                editor.on("change", function (e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description',sd_data);
            });
        }
        });
        tinymce.init({
            selector:'#description',
            setup:function(editor){
                editor.on("change", function (e) {
                    tinymce.triggerSave();
                    var sd_data = $('#description').val();
                    @this.set('description',sd_data);
            });
         }
        });
    });
</script>
@endpush
