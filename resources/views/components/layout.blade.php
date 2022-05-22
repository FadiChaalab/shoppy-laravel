<!doctype html>
<html lang="x">

<head>
    <meta charset="utf-8" />
    <title>Shoppy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Route::currentRouteName() == 'home')
    <link href="{{asset('libs/chartist/chartist.min.css')}}" rel="stylesheet">
    @endif
    @if(Route::currentRouteName() == 'calendar')
    <link href="{{asset('libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    @endif
    @if(Route::currentRouteName() == 'add_product')
    <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <!-- Bootstrap Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <main>
        @if ($message = Session::get('success'))
        <div class="alert alert-success flash">
            {{ $message }}
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger flash">
            {{ $message }}
        </div>
        @endif
        @if ($message = Session::get('message'))
        <div class="alert alert-danger flash">
            {{ $message }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger flash">
            {{$errors->first()}}
        </div>
        @endif
        {{$slot}}
    </main>

    <!-- JAVASCRIPT -->
    <div class="rightbar-overlay"></div>

    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

    @if(Route::currentRouteName() == 'home')
    <script src="{{asset('libs/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('libs/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.init.js')}}"></script>
    @endif
    <script src="{{asset('libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('libs/jquery-ui/jquery-ui.min.js')}}"></script>
    @if(Route::currentRouteName() == 'calendar')
    <script src="{{asset('libs/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/pages/calendar.init.js')}}"></script>
    @endif
    @if(Route::currentRouteName() == 'add_product')
    <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $('#myDropzone').dropzone({
            url: '{{url('/add_product_post')}}',
            autoProcessQueue: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            accept: function(file) {
                let fileReader = new FileReader();

                fileReader.readAsDataURL(file);
                fileReader.onloadend = function() {

                    let content = fileReader.result;
                    $('#file').val(content);
                    file.previewElement.classList.add("dz-success");
                    console.log(content);
                }
                file.previewElement.classList.add("dz-complete");
            }
        });
    </script>
    @endif


    <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>