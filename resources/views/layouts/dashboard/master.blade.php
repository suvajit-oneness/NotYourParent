<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Not Your Parent - @yield('title')</title>
    <link rel="icon" href="{{asset('forntEnd/images/logo.png')}}" type="image/gif" sizes="any">
    <link rel="stylesheet" type="text/css" href="{{asset('design/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('design/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('design/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('design/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <!-- loader -->
    <div class="loading-data" style="display:block; color: #fff;">Loading&#8230;</div>
    <div class="dashboard-main-wrapper">
        <!-- Header Content -->
        @include('layouts.dashboard.header')
        <!-- Sidebar Content -->
        @include('layouts.dashboard.sidebar')
        <div class="dashboard-wrapper" @if(!Auth::user()) style="margin-left : 0px !important;"@endif>
            <!-- Main Content -->
            @yield('content')
        </div>
    </div>
    <form>@csrf</form>

    <script type="text/javascript" src="{{asset('design/js/jquery-3.5.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('design/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('design/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('design/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.loading-data').hide();
        });
        @if(Session::has('Success'))
            swal('Success','{{Session::get('Success')}}', 'success');
        @elseif(Session::has('Errors'))
            swal('Error','{{Session::get('Errors')}}', 'error');
        @endif

        function isNumberKey(evt){
            if(evt.charCode >= 48 && evt.charCode <= 57 || evt.charCode <= 43){
                return true;
            }
            return false;
        }

        //local timezone
        console.log(moment.tz.guess());

        function readNotification(id, route) {
            $.ajax({
                url : '{{route("user.notification.read")}}',
                method : 'POST',
                data : {'_token' : '{{csrf_token()}}', id : id},
                success : function(result) {
                    // console.log('{{url()->current()}}',route);
                    // if (route != '' && '{{url()->current()}}' != route) {
                        window.location = route;
                    // }
                }
            });
        }
    </script>

    @yield('script')
</body>
</html>
