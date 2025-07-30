<!DOCTYPE html>
<html lang="en" class="h-100">

@include('layouts.head')

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>
    @include('layouts.script')
</body>

</html>
