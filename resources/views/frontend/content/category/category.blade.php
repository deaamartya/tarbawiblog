@extends('frontend.template.master')
@section('category')
<section class="main-content category-layout-2 pt-10">
    <div class="container">
        <div class="row ts-gutter-30">

            <div class="col-lg-8">
                @if($ch_news->count() == 0)
                 <div class="row">
                    <div class="col-12">
                        @foreach($dt_news_category->take(1) as $dt)
                        <h2 class="block-title">
                            <span class="title-angle-shap">{{ $dt->slug}} - News is empty !!</span>
                        </h2>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        @foreach($dt_news_category->take(1) as $dt)
                        <h2 class="block-title">
                            <span class="title-angle-shap">{{ $dt->slug}}</span>
                        </h2>
                        @endforeach
                    </div>
                </div>



                <div class="row ts-gutter-10">
                    @foreach($ch_news as $data)
                    <div class="col-md-6">
                        <div class="post-block-style">
                            <div class="post-thumb">
                                <a href="{{url($dt->slug. '/article/'.$data->id2.'/'.$data->slug)}}">
                                    <img class="img-fluid" src="{{ (asset('/Images/News/'.$data->img_news)) }}" alt="">
                                </a>
                                <div class="grid-cat">
                                    <a class="post-cat sports" href="{{url('/category/'.$dt->slug)}}">{{ $dt->slug}}</a>
                                </div>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="{{url($dt->slug. '/article/'.$data->id2.'/'.$data->slug)}}">{{ $data->title}}</a>
                                </h2>
                                <p>{{ $data->title}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <!--                <div class="gap-30 d-none d-md-block"></div>
                
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="ts-pagination">
                                            <li><a href="#"> Load More</a></li>
                                        </ul>
                                    </div>
                                </div>-->

            </div><!-- col-lg-8 -->
            <!--            <div class="col-lg-4">
                            <div class="sidebar">
                                <div class="sidebar-widget ads-widget mt-20">
                                    <div class="ads-image">
                                        <a href="#">
                                            <img class="img-fluid" src="images/banner-image/image2.png" alt="">
                                        </a>
                                    </div>
                                </div> widget end 
            
                                <div class="sidebar-widget featured-tab post-tab mb-20">
            
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
                                                            @foreach($latestNews as $data)
                                                            <li>
                                                                @foreach($data->news_menu_category->take(1) as $dt)
                                                                <div class="post-block-style media">
                                                                    <div class="post-thumb">
                                                                        <a href="{{url($dt->slug.'/article/'.$data->id.'/'.$data->slug)}}">
                                                                            <img class="img-fluid" src="{{ asset('/Images/News/'.$data->img_news)}}" alt="">
                                                                        </a>
                                                                    </div> Post thumb end 
            
                                                                    <div class="post-content media-body">
            
                                                                        <div class="grid-category">
                                                                            <a class="post-cat sports" href="{{ url('category/'.$dt->slug)}}"> &nbsp; &nbsp; {{ $dt->slug}}</a>
                                                                        </div>
                                                                        @endforeach
            
                                                                        <h2 class="post-title">
                                                                            <a href="{{url($dt->slug.'/article/'.$data->id.'/'.$data->slug)}}">{{ $data->title}}</a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </li><br>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

            <div class="col-lg-4 col-md-12">
                <h2 class="block-title block-title-dark">
                    <span class="title-angle-shap">Latest News </span>
                </h2>
                <div class="list-post-block">
                    <ul class="list-post">
                        @foreach($latestNews as $n)
                        <li>
                            <div class="post-block-style media">
                                @foreach($n->news_menu_category->take(1) as $dt)

                                <div class="post-thumb thumb-md">
                                    @if($n->link == null)

                                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                        <img class="img-fluid" src="{{asset('/Images/News/'.$n->img_news)}}" alt="">
                                    </a>

                                    @else

                                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                        <div class="embed-responsive">
                                            <div class="embed-responsive iframe">
                                                {!!$n->link!!}
                                            </div>
                                        </div>
                                    </a>

                                    @endif
                                </div>

                                <div class="post-content media-body">
                                    <div class="grid-category">
                                        <a class="post-cat sports" href="{{ url('category/'.$dt->slug)}}">
                                            &nbsp; {{ $dt->slug}}
                                        </a>
                                    </div>

                                    <h2 class="post-title" style="font-size:14px;">
                                        <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                    </h2>
                                </div>
                                @endforeach
                            </div>
                        </li>
                        @endforeach

                    </ul><!-- List post end -->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection