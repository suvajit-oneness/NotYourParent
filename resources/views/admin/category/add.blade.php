@extends('layouts.dashboard.master')
@section('title','Add Category')

@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add Category
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.category.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image"  required>
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Category name" required>
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.form-group.required .control-label:after {
    content:"*";
    color:red;
 }
</style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('form').submit(function(){
                $(this).find('button[type=submit]').prop('disabled', true);
            });
        });
    </script>
@endsection
