@extends('front.layouts.master')
@section('title','Add Knowledge Bank')
@section('content')
<section class="job_listing header_padding">
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add Knowledge Bank
                        <a class="headerbuttonforAdd" href="{{route('teacher.knowledgebank.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.knowledgebank.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <input type="hidden" name="category" value="2">
                        <div class="form-group required">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="subtitle" class="control-label">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle">
                            @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" style="min-height: 100px;max-height: 300px" placeholder="Description"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
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
