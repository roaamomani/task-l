<!-- first include start -->
@include("include/first")
<!-- first include end -->
<div class="container-scroller">

    <!-- start mobile navbar -->
    @include("include/mobile_navbar")
    <!-- end mobile navbar -->
    <div class="container-fluid page-body-wrapper">
        <!-- include nav bar start -->
        @include("include/navbar")
        <!-- include nav bar end -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                  
                 
                    </nav>
                </div>
                @yield("content")
            </div>
            <!-- content-wrapper ends -->

            <!-- include end start -->
            @include("include/end")
            <!-- include end END -->