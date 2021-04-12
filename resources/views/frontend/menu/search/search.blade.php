@extends('frontend.template.master')
@section('search')
<section class="block-wrapper">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-lg-8 col-md-12">
                @if($data_search->count() == 0)
                <h2 class="block-title">
                    <span class="title-angle-shap"> Result Search Not Found!!</span>
                </h2>
                @else

                <h2 class="block-title">
                    <span class="title-angle-shap"> Result Search </span>
                </h2>

               

                <div class="row ts-gutter-30">
                    @foreach($data_search as $n)
                    <div class="col-12">
                        <div class="post-block-style">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="post-thumb">
                                        <a href="{{url('/article2/'.$n->id.'/'.$n->slug)}}">
                                            <img class="img-fluid" src="{{asset('/Images/News/'.$n->img_news)}}" alt="" />
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="post-content">
                                        <h2 class="post-title title-md">
                                            <a href="{{url('/article2/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                                        </h2>
                                        <p>{!! ($n->sub_title) !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-widget featured-tab post-tab mb-0">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link animated active fadeIn" href="#post_tab_a" data-toggle="tab">
                                <span class="tab-head">
                                    <span class="tab-text-title">Latest News</span>					
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="gap-50 d-none d-md-block"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane active animated fadeInRight" id="post_tab_a">
                                    <div class="list-post-block">
                                        <ul class="list-post">
                                            @foreach($latestNews as $n)
                                            <li>
                                                @foreach($n->news_menu_category->take(1) as $dt)
                                                <div class="post-block-style media">
                                                    <div class="post-thumb">

                                                        <a href="{{url($n->ctgs.'/article/'.$n->id.'/'.$n->slug)}}">
                                                            <img class="img-fluid" src="{{asset('/Images/News/'.$n->img_news)}}" alt="">
                                                        </a>

                                                        <a href="{{url($n->ctgs.'/article/'.$n->id.'/'.$n->slug)}}">
                                                            <div class="embed-responsive">
                                                                <div class="embed-responsive iframe">

                                                                </div>
                                                            </div>
                                                        </a>

                                                    </div><!-- Post thumb end -->

                                                    <div class="post-content media-body">


                                                        <div class="grid-category">
                                                            <a class="post-cat sports" href="{{ url('category/'.$dt->slug)}}"> &nbsp; &nbsp; {{ $dt->slug}}</a>
                                                        </div>
                                                        @endforeach

                                                        <h3 class="post-title-black" style="font-size:16px; !important; line-height:16px; !important">
                                                            <a style="font-size:15px; line-height:14px; color:black" href="{{url($n->ctgs.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                                        </h3>
                                                    </div><!-- Post content end -->
                                                </div><!-- Post block style end -->
                                            </li><!-- Li 1 end -->
                                            @endforeach
                                        </ul><!-- List post end -->
                                    </div>
                                </div><!-- Tab pane 1 end -->


                            </div><!-- tab content -->
                        </div>
                    </div>
                </div><!-- widget end -->

            </div><!-- Content Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- First block end -->

@stop