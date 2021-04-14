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
                        @foreach($dt_news_category as $ct)
                        <a class="post-cat sports" 
                           href="{{url('category/'.$ct->slug)}}"
                           style="padding: 1px; font-size: 15px"> 
                            &nbsp; {{$ct->name}} &nbsp;
                        </a>
                        @endforeach
                    </li>

                    <div class="post-header-area">
                        <h2 class="post-title title-lg"> {{$data->title}} </h2>
                        <br>
                        <p>{{$data->sub_title}}</p>
                        <div class="row">
                            <div class="col-sm">
                                <ul class="post-meta">
                                    <li><a><i class="fa fa-clock-o"></i>{{$data->updated_at->toFormattedDateString()}}</a></li>
                                    <li><a><i class="post-author"></i>Oleh : <b>{{$data->author}}  </b></strong></a></li>
                                </ul>
                            </div>
                            <div class="col-sm" style="padding-top:12px;">
                                <div class="fb-share-button" data-href="{{$data->title}}" 
                                     data-layout="button" data-size="small"
                                     style="display: inline; top:-8px">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                                </div>
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" 
                                   data-show-count="true"
                                   style="top: 5px; display: block;">
                                    Tweet
                                </a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>


                    @foreach($data->news_menu_category as $dt)

                    @endforeach

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
                    <span>Latest News </span>
                </h2>
                <div class="list-post-block">
                    <ul class="list-post">
                        @foreach($latestNews as $data)
                        <li>
                            <div class="post-block-style media">
                                <div class="post-thumb thumb-md">

                                    @if($data->link == null)

                                    <a href="{{url($dt->slug.'/article/'.$data->id.'/'.$data->slug)}}">
                                        <img class="img-fluid" src="{{asset('/Images/News/'.$data->img_news)}}" alt="">
                                    </a>

                                    @else

                                    <a href="{{url($dt->slug.'/article/'.$data->id.'/'.$data->slug)}}">
                                        <div class="embed-responsive">
                                            <div class="embed-responsive iframe">
                                                {!!$data->link!!}
                                            </div>
                                        </div>
                                    </a>

                                    @endif
                                </div>

                                <div class="post-content media-body">
                                    <div class="grid-category">
                                        @foreach($data->news_menu_category->take(1) as $dt)
                                        <a class="post-cat sports" href="{{url('category/'.$dt->slug)}}">
                                            &nbsp; &nbsp;  {{$dt->name}}
                                        </a>
                                        @endforeach

                                    </div>

                                    <h3 class="post-title" style="font-size:16px; !important; line-height:16px; !important">
                                        <a style="font-size:15px; line-height:14px" href="{{url($dt->slug.'/article/'.$data->id.'/'.$data->slug)}}">{{$data->title}}</a>
                                    </h3>

                                </div>
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