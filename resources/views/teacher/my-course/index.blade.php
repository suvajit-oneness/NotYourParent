@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    My Course
@endsection

@section('content')
<section class="job_listing header_padding">
<div class="container dashboard-content">
    <div class="row m-0 justify-content-center">
        <div class="col-12 col-lg-12 col-md-12 nyt_table">
                    <h5 class="mb-0">Case study
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('teacher.my-course.add')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

              
                     <div class="table-responsive">
                         <table id="example4" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Preview video</th>
                                    <th>Original video</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $key => $course)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset($course->image)}}" width="60" /></td>
                                    <td>{{$course->categoryDetail->name}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
                                        @if (!empty($course->preview_video_url))
                                        <video controls muted height="100">
                                            <source src="{{asset($course->preview_video_url)}}" type="video/mp4">
                                        </video>
                                        @endif
                                    </td>
                                    <td>
                                        <video controls muted height="100">
                                            <source src="{{asset($course->original_video_url)}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>{{$course->duration}} {{($course->duration == 1 ? 'minute' : 'minutes')}}</td>
                                    <td>$ {{$course->price}}</td>
                                    <td><a href="{{route('teacher.my-course.edit',['id' => $course->id])}}">Edit</a> | <a href="#" data-id="{{$course->id}}" class="text-danger delete-confirm">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example4').DataTable();
    });

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = "my-course/delete/";
        const id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: 'This record will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                swal("Deleted!", "Successful!", "success");
                window.location.href = url + id;
                }
            });
        });
</script>
  
@stop
@endsection
