@extends('frontend.template.master')
@section('breaking-news')
<section class="block-slider-white">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-lg-8 col-md-12">
                <h2 class="block-title">
                    <span class="title-angle-shap">What's News </span>
                </h2>

                <div class="row ts-gutter-20">
                    @foreach($news as $data) 
                    <div class="col-md-6">
                        <div class="post-block-style">
                            <div class="post-thumb">
                                @foreach($data->news_menu_category->take(1) as $dt)
                                <a href="{{url($dt->slug. '/article/'.$data->id.'/'.$data->slug)}}">
                                    <img class="img-fluid" src="{{ (asset('/Images/News/'.$data->img_news)) }}" alt="">
                                </a>

                                <div class="grid-cat">
                                    <a class="post-cat sports" href="{{url('/category/'.$dt->slug)}}"> {{$dt->slug}} </a>
                                </div>
                                @endforeach
                            </div>

                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="{{url($dt->slug. '/article/'.$data->id.'/'.$data->slug)}}">{{$data->title}}</a>
                                </h2>
                                <p> <p>{!! Str::limit($data->sub_title,100) !!}</p> </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end row -->
                <div class="gap-30"></div>
                <!--                <div class="row">
                                    <div class="col-12">
                                        <div class="load-more-btn text-center">
                                            <button class="btn"> Load More </button>
                                        </div>
                                    </div>
                                </div>-->
            </div>

            <div class="col-lg-4 col-md-12">
                <h2 class="block-title block-title-dark">
                    <span class="title-angle-shap"> Video </span>
                </h2>
                @foreach($video as $n)
                <div class="list-post-block">
                    <ul class="list-post">
                        <li>
                            <div class="post-block-style media">

                                <div class="post-thumb-vid thumb-md">
                                    <div class="embed-responsive">
                                        <div class="embed-responsive iframe">
                                            {!!$n->embed!!}
                                        </div>
                                    </div>
                                    <div class="post-content media-body">
                                        <h2 class="post-title.title-md" 
                                            style="font-size: 18px;
                                            line-height: 18px;
                                            margin-top: 15px;
                                            margin-bottom: 15px;
                                            font-weight: 700;">
                                            <a>{{$n->title}}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="gap-30"></div>
    @yield('ads3')
</section>
@stop