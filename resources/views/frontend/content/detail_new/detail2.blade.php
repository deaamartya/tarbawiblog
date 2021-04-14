@extends('frontend.template.master')
@section('detail')
<div class="gap-80"></div>
<section class="main-content pt-0">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-lg-8">
                @foreach($news as $data)
                <div class="single-post">
                    <li class="grid-category">
                         @foreach($data->news_menu_category as $dt)
                        <a class="post-cat sports" 
                           href="{{url('category/'.$dt->slug)}}"
                           style="padding: 1px; font-size: 15px"> 
                            &nbsp; {{$dt->name}} &nbsp;
                        </a>
                        @endforeach
                    </li>

                    <div class="post-header-area">
                        <h2 class="post-title title-lg">{{ $data->title}}</h2>
                        <br>
                        <p>{{$data->sub_title}}</p>
                        <ul class="post-meta">
                            @foreach($data->news_menu_category as $dt)
                            <li>
                                <a href="{{url('/category/'.$dt->slug)}}" class="post-cat sports">{{ $dt->name}}</a>
                            </li>
                            @endforeach
                            <li><a href="#"><i class="fa fa-clock-o"></i> </a></li>

<!--                            <li class="post-author">
                                <a href="#"><strong>John Wick</strong></a>
                            </li>-->
                        </ul>
                    </div>

                    <div class="post-content-area">
                        <div class="post-media mb-20">
                            <a href="{{ asset('/Images/News/'.$data->img_news)}}" class="gallery-popup cboxElement">
                                <img src="{{ asset('/Images/News/'.$data->img_news)}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <p>{!! $data->detail !!}</p>
                    </div>

                    <div class="post-footer">
                        <div class="tag-lists">
                            <?php
                            $tag = $data->tag;
                            $data = explode(',', $tag);
                            ?>
                            <span>Tags: </span>
                            @foreach($data as $tag)
                            @if($tag)<a> # {{$tag}} </a>@endif
                            @endforeach
                        </div>


                        <div class="post-navigation clearfix">

                            @foreach($previuspost as $n)
                            <div class="post-previous float-left">
                                <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                    <img src="{{ asset('/Images/News/'.$n->img_news)}}" alt="">
                                    <span>Read Previous</span>
                                    <p>
                                        {{ Str::limit($n->title,40) }}
                                    </p>
                                </a>
                            </div>
                            @endforeach

                            @foreach($nextpost as $n)
                            <div class="post-next float-right">
                                <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                    <img src="{{ asset('/Images/News/'.$n->img_news)}}" alt="">
                                    <span>Read Next</span>
                                    <p>
                                        {{ Str::limit($n->title,40) }}
                                    </p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- single-post end -->
            </div>

            <div class="col-lg-4 col-md-12">
                <h2 class="block-title block-title-dark">
                    <span>Latest News</span>
                </h2>
                <div class="list-post-block">
                    <ul class="list-post">
                        @foreach($latestNews as $n)
                        <li>
                            <div class="post-block-style media">
                                @foreach($n->news_menu_category->take(1) as $data)
                                <div class="post-thumb">
                                    <a href="{{url($data->slug.'/article/'.$n->id.'/'.$n->slug)}}">
                                        <img class="img-fluid" src="{{asset('/Images/News/'.$n->img_news)}}" alt="">
                                    </a>
                                </div>

                                <div class="post-content media-body">

                                    <div class="grid-category">
                                        <a class="post-cat sports" href="{{url('/category/'.$data->slug)}}"> &nbsp; {{ $data->slug}}</a>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="{{url($data->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{ $n->title }}</a>
                                    </h2>
                                </div>
                                @endforeach
                            </div>
                        </li>
                        <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection