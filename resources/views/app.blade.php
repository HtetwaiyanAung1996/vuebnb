<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vuebnb</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/vue-style.css') }}" type="text/css">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
</head>
<!-- start body -->
<body>

    <div id="app">

    </div>
    {{-- receive data from controller --}}
    <script>
        window.vuebnb_server_data = "{!! addslashes(json_encode($data)) !!}"
        // console.log(window.vuebnb_server_data)
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
<!-- end body -->
</html>