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
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Product name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>Category</strong>
                                    <select name="category_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Please choose category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Brand</strong>
                                    <select name="brand_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Please choose brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <strong>Special Price:</strong>
                                    <input type="text" name="special_price" class="form-control" placeholder="Special Price">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Delivery:</label>
                                    <textarea name="delivery" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Guarantees Payment:</label>
                                    <textarea name="guarantees_payment" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Images</label>
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
                                <button type="submit" class="btn btn-primary">Add</button>
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
