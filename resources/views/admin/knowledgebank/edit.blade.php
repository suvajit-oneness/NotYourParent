@extends('layouts.dashboard.master')
@section('title','Edit Knowledge Bank')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Knowledge Bank
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.knowledgebank.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.knowledgebank.update', ['id' => $knowledgebank->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <img src="{{asset($knowledgebank->image)}}" alt="img" class="img-thumbnail" style="height: 100px">
                            <br>
                            <label for="image" class="control-label">Change Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="category" class="control-label">Category</label>
                            <select name="category" id="category" class="form-control">
                                @foreach ($knowledgebankcategory as $item)
                                    <option {{ $knowledgebank->category == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $knowledgebank->title }}">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="subtitle" class="control-label">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ $knowledgebank->subtitle }}">
                            @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" style="min-height: 100px;max-height: 300px" placeholder="Description">{{ $knowledgebank->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    {{-- <form method="POST" action="{{ route('admin.category.update', ['id' => $category->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$category->name}}" id="name"  placeholder="Category name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
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

            CKEDITOR.replace('description');
        });
    </script>
@endsection
