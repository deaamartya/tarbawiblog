@extends('frontend.template.master')
@section('popular')
<section class="block-slider-black">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-lg-8 col-md-12">
                <div class="featured-tab">
                    <h2 class="block-title-black">
                        <span> Tranding - Popular </span>
                    </h2>

                    <div class="tab-content">
                        <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <div class="row">
                                @foreach($pop as $index=>$n)
                                <div class="col-lg-6 col-md-6">
                                    <div class="post-block-style clearfix">

                                        <div class="post-thumb">
                                            @foreach($n->news_menu_category->take(1) as $data)
                                            <a href="{{url($data->slug. '/article/'.$n->id.'/'.$n->slug)}}">
                                                <img src="{{asset('/Images/News/'.$n->img_news)}}" height="50px" class="img-fluid" alt="" />
                                            </a>

                                            <div class="grid-cat">
                                                <a class="post-cat sports" href="{{url('/category/'.$data->slug)}}"> {{$data->slug}} </a>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="post-content">
                                            <h2 class="post-title-black title-md">
                                                <a href="{{url($data->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                                            </h2>
                                            @if($n->sub_title == null)
                                            <div style="color: white">
                                                <p>{{$n->sub_title}}</p>
                                            </div>
                                            @else
                                            <div style="color: white">
                                                <p>{!! Str::limit($n->sub_title,205) !!}</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12">

                <h2 class="block-title block-title-dark-black">
                    <span>Latest News </span>
                </h2>
                
                <div class="list-post-block">
                    <ul class="list-post">

                        @foreach($news2 as $n)
                        <li>
                            @foreach($n->news_menu_category->take(1) as $dt)
                            <div class="post-block-style media">
                                <div class="post-thumb thumb-md">
                                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                        <img class="img-fluid" src="{{asset('/Images/News/'.$n->img_news)}}" alt="">
                                    </a>
                                </div>

                                <div class="post-content media-body">
                                    <div class="grid-category">
                                        <a class="post-cat tech-color" href="{{url('/category/'.$dt->slug)}}"> {{ $dt->slug}}</a>
                                    </div>

                                    <h3 class="post-title-black" style="font-size:16px; !important; line-height:16px; !important">
                                        <a style="font-size:15px; line-height:14px" href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@stop