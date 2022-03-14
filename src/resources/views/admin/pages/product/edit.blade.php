@extends('admin.layouts.primary')
@section('page-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Product</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your input.</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Product name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')?old('name'):$product->name}}">
                                </div>
                                <div class="form-group">
                                    <strong>Category</strong>
                                    <select name="category_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Please choose category</option>
                                        @foreach($categories as $category)
                                            <option {{ ($category->id == $product->category_id) ? 'selected="selected"' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Brand</strong>
                                    <select name="brand_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Please choose brand</option>
                                        @foreach($brands as $brand)
                                            <option {{ ($brand->id == $product->brand_id) ? 'selected="selected"' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <strong>Special Price:</strong>
                                    <input type="text" name="special_price" class="form-control" placeholder="Special Price" value="{{old('special_price')?old('special_price'):$product->special_price}}">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{old('description')?old('description'):$product->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Delivery:</label>
                                    <textarea name="delivery" class="form-control" rows="3" placeholder="Enter ...">{{old('delivery')?old('delivery'):$product->delivery}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Guarantees Payment:</label>
                                    <textarea name="guarantees_payment" class="form-control" rows="3" placeholder="Enter ...">{{old('guarantees_payment')?old('guarantees_payment'):$product->guarantees_payment}}</textarea>
                                </div>
                                <div class="form-group" id="image-list">
                                    <label for="exampleInputFile">Images</label>

                                    <table class="table">
                                        <tbody>
                                        @foreach($images as $image)
                                            <tr id="image-{{$image->id}}" >
                                                <td><img src="{{asset('storage/'.$image->image)}}" width="200px"></td>
                                                <td><button class=" btn btn-danger  image-remove" data-id="{{$image->id}}" >Remove</button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="input-group hdtuto control-group lst increment" id="image-group">
                                        <div class="custom-file">
                                            <input type="file"  name="images[]" class="form-control">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text btn" id="add-more">Add</span>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                            <input type="file" name="images[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger remove-image" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('extraJS')
    <script type="text/javascript">

        $('.image-remove').click(function(){
            console.log($(this).attr('data-id'))
            $('#image-list').append('<input type="hidden" name="removeImage[]" value="'+$(this).attr('data-id')+'"> ')
            $('#image-'+$(this).attr('data-id')).remove();
        });


        var field = 1;
        $(document).ready(function() {
            $("#add-more").click(function(){
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
                field++;
            });
            $("body").on("click",".remove-image",function(){
                if(field>1){
                    $(this).parents(".hdtuto").remove();
                    field--;
                }
            });
        });
    </script>
@endsection
