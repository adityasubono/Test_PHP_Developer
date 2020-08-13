@include('includes.header')
<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    @include('includes.navbar')


    <main role="main" class="inner cover">

        @yield('container-fluid')

    </main>

    @include('includes.footer')

</div>
</body>
</html>







