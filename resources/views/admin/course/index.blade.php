@extends('layouts.dashboard.master')
@section('title','Case study')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Case study
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.course.add')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>Preview video</th>
                                    <th>Original video</th>
                                    <th>Others</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $key => $course)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset($course->image)}}" width="60" />
                                    <br>
                                    <br>
                                    <p class="small">category : {{$course->categoryDetail->name}}</p>
                                    </td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->teacherDetail->name}}</td>
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
                                    <td>duration - {{$course->duration}} min
                                        <br>
                                        <br>
                                    price - $ {{$course->price}}</td>
                                    <td><a href="{{route('admin.course.edit',['id' => $course->id])}}">Edit</a> | <a href="#" data-id="{{$course->id}}" class="text-danger delete-confirm">Delete</a></td>
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


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example4').DataTable();
    });
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = "course/delete/";
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
