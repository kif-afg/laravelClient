<html>
<head>
    <title>QQ Movie DB @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @yield('content')
    {{-- This will show the rendered view data --}}
</div>
</body>
</html>