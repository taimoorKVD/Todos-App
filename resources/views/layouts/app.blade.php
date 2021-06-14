<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>@yield('title')</title>
    {{-- CUSTOM CSS --}}
    <style>

    </style>
</head>
<body>

{{-- NAV BAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Todos-App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('todo.index') }}">Todos <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
{{--END NAV BAR--}}

<div class="container my-4">
    @yield('content')
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

{{-- CUSTOM JS --}}
<script>
    $(document).ready(function () {
        setTimeout(function(){
                $('.alert-danger').hide(1000);
                $('.alert-success').hide(1000);
                $('.highlight').removeClass('highlight');
            }, 3000);
    });
</script>
</html>
