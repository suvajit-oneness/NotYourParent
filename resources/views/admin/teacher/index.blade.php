@extends('layouts.dashboard.master')
@section('title','Teachers')
@section('css')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Teachers
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.teacher.add')}}">
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
                                    <th>Email</th>
                                    {{-- <th>Mobile</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $key => $teacher)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset($teacher->image)}}" width="60" /></td>
                                    <td>{{$teacher->name}}</td>
                                     <td>{{$teacher->email}}</td>
                                    {{-- <td>{{$teacher->mobile}}</td> --}}
                                    <td>
                                        <input id="toggle-block" type="checkbox"  data-toggle="toggle" data-size="sm" name="status" class="checkbox btn-radius" data-teacher_id="{{ $teacher->id }}" {{ $teacher->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td><a href="{{route('admin.teacher.edit',['id' => $teacher->id])}}">Edit</a> | <a href="#" data-id="{{$teacher->id}}" class="text-danger delete-confirm">Delete</a></td>
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

    //change status
    $('input[id="toggle-block"]').change(function() {
            var teacher_id = $(this).data('teacher_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var status = 0;
          if($(this).is(":checked")){
              status = 1;
          }else{
            status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.teacher.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:teacher_id, status:status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                }
              });
        });
        //confirm delete
        $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = "teacher/delete/";
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
