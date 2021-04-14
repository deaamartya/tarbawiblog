@extends('frontend.template.master')
@section('content')
<section class="block-wrapper pb-lg-0">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-lg-8 col-md-12">
                <div class="featured-tab">
                    <h2 class="block-title">
                        <span> What’s new</span>
                    </h2>
                    <div class="tab-content">
                        <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <div class="row ts-gutter-30">
                                @foreach($news as $dt)
                                <div class="col-lg-6 col-md-6">
                                    <div class="post-overaly-style post-md post-extra-md" style="background-image:url({{asset('/Images/News/'.$dt->img_news)}})">
                                        @foreach($dt->news_menu_category as $data)
                                        <a href="{{url($data->slug.'/article/'.$dt->id.'/'.$dt->slug)}}" class="image-link">&nbsp;</a>
                                        <div class="overlay-post-content">
                                            <div class="post-content">
                                                @foreach($dt->news_menu_category as $data)
                                                <div class="grid-category">
                                                    <a class="post-cat tech" href="{{url('/category/'.$data->slug)}}">{{ $data->name}}</a>
                                                </div>
                                                @endforeach
                                                <h2 class="post-title title-md">
                                                    <a href="{{url($data->slug.'/article/'.$dt->id.'/'.$dt->slug)}}">{{ $dt->title}}</a>
                                                </h2>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="load-more-btn text-center">
                    <button class="btn"> Load More </button>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget social-widget">
                        <h2 class="block-title">
                            <span> Social</span>
                        </h2>
                        <div class="sidebar-social">
                            <ul class="ts-social-list">
                                <li class="ts-facebook">
                                    <a href="#">
                                        <i class="tsicon fa fa-facebook"></i>
                                        <div class="count">
                                            <b>12.5 k </b>
                                            <span>Likes</span>
                                        </div>
                                    </a>
                                </li>
                            </ul><!-- social list -->
                        </div>
                    </div><!-- widget end -->
                </div>
            </div><!-- Sidebar Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>
@endsection