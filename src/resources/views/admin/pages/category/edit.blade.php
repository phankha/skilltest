@extends('admin.layouts.primary')
@section('page-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Brand</h1>
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
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Category name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <strong>Parent (Optional)</strong>
                                    <select name="parent_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Please choose parent category</option>
                                        @foreach($categories as $_category)
                                            @if($_category->id!=$category->id)
                                            <option {{ ($category->parent_id == $_category->id) ? 'selected="selected"' : ''}} value="{{$_category->id}}">{{$_category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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

