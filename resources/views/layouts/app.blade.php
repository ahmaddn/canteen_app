<!DOCTYPE html>
<html lang="en" class="h-100">

@include('layouts.head')

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>

        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <div class="content-body">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>
