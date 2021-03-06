@extends('layouts.dashboard.master')
@section('title','Edit Privacy Policy')
@section('css')
<style>
.form-group.required .control-label:after {
    content:"*";
    color:red;
}
</style>
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Privacy Policy
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.privacyPolicy.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.privacyPolicy.update', ['id' => $data->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="Description">{{$data->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('form').submit(function(){
                $(this).find('button[type=submit]').prop('disabled', true);
            });

            CKEDITOR.replace('description');
        });
    </script>
@endsection
