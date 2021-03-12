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


    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <script src="{{asset('js/password_show.js')}}"></script>
    <script src="{{asset('js/form_validation_msg.js')}}"></script>

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
<body class="bg-danger">
{{--<div class="overall-container-login">--}}
{{--    <div class="main-container-login">--}}
{{--        <div class="d-flex mx-auto" style="width: 400px">--}}
{{--            <form class="position-relative w-100 h-100 bg-white p-3 mt-3"   method="post">--}}
{{--                @csrf--}}
{{--                <input type="text" name="name" id="phone" class="input-form" placeholder="Phone" style="font-size: 14px!important;">--}}
{{--                <span class="text-danger">{{$errors->first('name')}}</span>--}}
{{--                <input type="password"  name="password" id="password" class="input-form" placeholder="Password" style="font-size: 14px!important;">--}}
{{--                <span class="text-danger">{{$errors->first('password')}}</span>--}}
{{--                <button type="submit" class="btn btn-danger px-3 w-100 text-center">Login</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="py-4 login-container">
<div class="login-inner-container">

    <div class="card-body pt-0 px-0">
        <form method="POST" action="{{route('staff_login')}}">
            @csrf
            <div class="form-group text-center">
                <i class="fas fa-user-circle text-danger" style="font-size: 120px;"></i>
            </div>
            <div class="form-group text-center">
                <label for="phone" class="label-form">Username</label>
                <div>
                    <input type="text" name="name" id="phone" class="input-form" required placeholder="Phone" style="font-size: 14px!important;">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="form-group text-center">
                <label for="password" class="label-form">Password</label>

                <div class="">
                    <input type="password"  name="password" id="password" class="input-form" style="font-size: 14px!important;">
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col pl-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col">
                    <button type="submit" class="btn btn-danger px-3 w-100 text-center" style="border-radius: 32px;">Login</button>
                </div>
            </div>




        </form>
    </div>
</div>
</div>

</body>
</html>
