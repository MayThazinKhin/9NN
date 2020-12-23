<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Min Thar Gyi
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
    <style>
        ::-webkit-input-placeholder {
            text-align: center;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        :-ms-input-placeholder {
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #fff">
<div class="overall-container-login">
    <div class="main-container-login">
        <div class="d-flex mx-auto" style="width: 400px">
            <form class="position-relative w-100 h-100 bg-white p-3 mt-3" action="{{route('staff_login')}}"  method="post">
                @csrf
                <input type="text" name="name" id="phone" class="input-form" placeholder="Phone" style="font-size: 14px!important;">
                <span class="text-danger">{{$errors->first('name')}}</span>
                <input type="password"  name="password" id="password" class="input-form" placeholder="Password" style="font-size: 14px!important;">
                <span class="text-danger">{{$errors->first('password')}}</span>
                <button type="submit" class="btn btn-danger px-3 w-100 text-center">Login</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>
