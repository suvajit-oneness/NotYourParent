@extends('front.layouts.master')
@section('title','Knowledge Bank')
@section('content')

<section class="job_listing header_padding">
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Knowledge Bank
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('teacher.knowledgebank.add')}}">
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($knowledgebank as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        @if (!empty($item->image))
                                        <img src="{{asset($item->image)}}" alt="image" style="height:100px">
                                        @endif
                                    </td>
                                    <td>
                                        <div><span class="badge badge-primary rounded-0">{{ $item->name }}</span></div>
                                        <h5>{{$item->title}}</h5>
                                        <hr>
                                        <p class="small">{{$item->subtitle}}</p>
                                    </td>
                                    <td>
                                        {!!$item->description!!}
                                    </td>
                                    <td>
                                        <a href="{{route('teacher.knowledgebank.edit', ['id' => $item->id])}}">Edit</a>
                                        <a href="javascript: void(0)" data-id="{{$item->id}}" class="text-danger delete-confirm">Delete</a>
                                    </td>
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
        const url = "knowledgebank/delete/";
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
