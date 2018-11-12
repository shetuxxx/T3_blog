<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Error</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('templets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('templets/css/custom.css')}}">
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{route('index')}}">Blog</a></li>
                    {{--<li><a href="#">About</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>403 Error</h1>
            <hr>
            <p>Unfortunately you are not allowed to do the action.</p>
        </div>
    </div>
</div>


<script src="{{asset('templets/js/bootstrap.min.js')}}"></script>
</body>
</html>