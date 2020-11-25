<!DOCTYPE html>
<html lang="en">
<head>
    <title>

        9 snookers
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/ui.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/selectboot.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fontawesome-pro-5.13.0-web/css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/datepicker.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/yearpicker.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/timepicki.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/MonthPicker.min.css')}}" type="text/css">
    <script src="{{asset('js/bootstrap.popper.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bs.js')}}"></script>

    <script src="{{asset('js/MonthPicker.min.js') }}"> </script>
    <script src="{{asset('js/datepicker.min.js')}}"></script>
    <script src="{{ asset('js/yearpicker.js') }}"> </script>
    <script src="{{ asset('js/vue.js') }}"> </script>
    <script src="{{ asset('js/sorting.js') }}"> </script>
    <script src="{{asset('js/jquery.autosize.js')}}"></script>
    <script src="{{ asset('js/axios.js') }}"> </script>

    @yield('css')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body style="background-color: #eff1f5">
<div class="overall-container" id="app">


    <div class="top-and-side-bar">
        <div class="topbar">
            9 snookers & billiard shop
        </div>
        <!-- sidebar -->
        @include('layouts.sidebar')
        <!-- sidebar -->
    </div>
    <!-- main body-->
    <div class="main-container">
        <header class="header pl-2">
            <div class="d-flex justify-content-between">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">@yield('content_title') </a>
                </nav>
                <div>

                    @yield('select_box')
                    <form action=@yield('route') id="search" method="post">
                        @csrf
                        <label class="search-box-container">
                            <input type="text" class="search-box py-1 " id="myInput" placeholder=" Search..." autocomplete="off">
                            <i class="fal fa-search search-icon"></i>
                        </label>
                    </form>
                    <div class="d-inline-block ml-3">
                        <button type="button" class="btn btn-info py-1 px-5 rounded-0"  data-toggle="modal" data-target=@yield('add')>Add</button>
                    </div>
                </div>
            </div>
        </header>
       @yield('content')
    </div>
</div>





<script>
    $('#search_input').keydown(function(event){
        let keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode == 13) {
            if(!($('#search_input').val() === '')) $('form#search').submit();
        }
    });

    $(document).ready(function (){
        $('.normal').autosize();
        $('.animated-txtarea').autosize();

        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    // new Vue({
    //     el:'#app',
    //     data:{
    //
    //     }
    // })


</script>

</body>
</html>
