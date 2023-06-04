<header>
    <style>
        .sub-div {
            position: absolute;
            bottom: 0px;
        }
    </style>
</header>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        @yield('content-header')
    </div>
    <div class="page-content">
        <section class="row">
            @yield('content')

        </section>
    </div>

        <!-- Need: Apexcharts -->
<script src="{{url('bs/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{url('bs/assets/js/pages/dashboard.js')}}"></script>

