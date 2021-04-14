<div class="newsletter-area logoHowMin">
    <div class="container">
        <div class="row ts-gutter-30 justify-content-center align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="footer-loto">
                    <a href="/">
                        <center>
                            <img style="width:60%" src="{{asset('/Images/Logo/'.$Gsetting->logo)}}" alt="">
                        </center>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-nav clearfix is-ts-sticky navigasiUtama shadow bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center pt-3">
            <nav class="navbar navbar-expand-lg col-lg-10">
                <a href="/"><img src="{{asset('/Images/Logo/'.$Gsetting->logo)}}" alt=""class="ml-5 pl-5 navbar-brand align-middle logoHowDef" height="80"></a>
                <div class="site-nav-inner pb-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav mb-2">
                            @foreach($menu as $item)
                            <li>
                                <a href="{{url('/ch/'.$item->slug)}}" class="text-dark">{{$item->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="col-lg-2 text-left mt-1">
                <div class="nav-search" style="z-index=10000" style="z-index=10000">
                    <a href="#search-popup" class="xs-modal-popup">
                        <i class="icon icon-search1"></i>
                    </a>
                </div>

                <div class="zoom-anim-dialog mfp-hide modal-searchPanel ts-search-form" id="search-popup" style="z-index=10000">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="xs-search-panel">
                                <form action="{{url('/search')}}" method="get" class="ts-search-group">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="searchinput" placeholder="Search" value="">
                                        <button class="input-group-btn search-button">
                                            <i class="icon icon-search1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>