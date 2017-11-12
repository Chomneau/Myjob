<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Job </title>
    @include('admin.style.cs-admin')


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('admin.inc.sidebar')
        @include('admin.inc.top-sidebar')

        @yield('content')

        
    </div>
</div>
@include('admin.inc.footer')
<!-- jQuery -->
@include('admin.style.js-admin')

</body>
</html>