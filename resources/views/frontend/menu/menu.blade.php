<div class="newsletter-area logoHowDef">
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

<div class="main-nav clearfix is-ts-sticky navigasiUtama">
    <div class="container">
        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg col-lg-11">
                <div class="site-nav-inner float-left">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav" style="margin-left:auto; margin-right:auto;">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>


                            @foreach($menu as $item)
                            <li>
                                <a href="{{url('/ch/'.$item->slug)}}">{{$item->name}}</a>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </nav>

            <div class="logoHowMin text-center">
                <a href="/">
                    <center>
                        <img src="{{asset('/Images/Logo/'.$Gsetting->logo)}}" href="/" alt="" style="width:40%;">
                    </center>
                </a>
            </div>

            <div class="col-lg-1 text-right nav-social-wrap" >
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