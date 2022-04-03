<!DOCTYPE html>
<html lang="en">
<head>
    @include('_layouts.head')
</head>
<body>
    
    @include('_layouts.navbar')
    <main>
        @yield('content')
    </main>
    @include('_layouts.footer')

</body>
</html>