@include('layouts.inc.header')
@include('layouts.inc.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>@yield('title')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @yield('content')
</main><!-- End #main -->
@include('layouts.inc.footer')
