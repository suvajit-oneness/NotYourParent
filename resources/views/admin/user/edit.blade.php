@extends('layouts.dashboard.master')
@section('title','Edit User')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit User
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.user.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" value="{{ $user->image }}" id="image">
                          </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" placeholder="example. John Doe" required>
                        </div>
                        <div class="form-group required">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="example. example@gmail.com" required>
                        </div>
                        <div class="form-group required">
                            <label for="mobile" class="control-label">Mobile</label>
                            <input type="number" class="form-control" name="mobile" id="mobile" value="{{ $user->mobile }}" placeholder="example. 9854365851" required>
                        </div>
                        <div class="form-group required">
                            <label for="referral_code" class="control-label">Referral Code</label>
                            <input type="text" class="form-control" name="referral_code"value="{{ $user->referral_code }}" id="referral_code"  placeholder="example. AAAAAAA" required>
                          </div>
                          <div class="form-group required">
                            <label for="short_description" class="control-label">Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3" required>{{ $user->short_description }}</textarea>
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
