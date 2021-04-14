@extends('frontend.template.master')
@section('category')
<div class="row">
    <div class="col-12">
    @foreach($ch_news->take(1) as $n)
        @isset($n->img_landscape)
        <div class="post-overaly-style post-md d-flex justify-content-center" style="background-image:url({{asset('Images/News/'.$n->img_landscape)}})" style="z-index:1">
        @else
        <div class="post-overaly-style post-md d-flex justify-content-center" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1">
        @endisset
        @foreach($dt_news_category->take(1) as $dt)
            <div class="post-content banner-post">
                <h2 class="post-title title-xxl mb-5">
                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                </h2>
                <h6 class="my-5 banner-post subtitle">{!! Str::limit($n->sub_title,145) !!}</h6>
                <a class="banner-post post-cat tech-color" href="{{url('/category/'.$dt->slug)}}">{{$dt->name}}</a>
            </div>
        @endforeach
        </div>
    @endforeach
    </div>
</div>
<section class="main-content category-layout-2 pt-10">
    <div class="container-fluid" style="max-width:80%">
        <div class="row">
            <div class="col-12">
                @if($ch_news->count() == 0)
                 <div class="row">
                    <div class="col-12">
                        @foreach($dt_news_category->take(1) as $dt)
                        <h2 class="block-title">
                            <span>{{ $dt->slug}} - News is empty !!</span>
                        </h2>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        @foreach($dt_news_category->take(1) as $dt)
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    @foreach($ch_news as $n)
                    @if($loop->iteration != 1 && $loop->iteration < 5)
                    <div class="col-lg-4 col-md-4 col-xl-4 col-12">
                        <div class="post-overaly-style post-lg ml-8 post-kategori" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1">
                            <div class="post-content mb-0">
                                <a class="banner-post post-cat tech-color p-0" href="{{url('/category/'.$dt->slug)}}">{{$dt->name}}</a>
                                <h2 class="post-title title-sm text-white">
                                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                </h2>
                                <h6 class="my-2 subtitle text-white font-weight-normal">{!! Str::limit($n->sub_title,100) !!}</h6>
                                <p class="text-white">BY <b class="text-decoration-none text-uppercase">{{$n->author}}</b> | {{ date('d M Y',strtotime($n->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    @elseif($loop->iteration != 1)
                    <div class="col-lg-3 col-md-3 col-xl-3 col-12 mt-5">
                        <div class="post-block-style clearfix">
                            <div class="post-thumb rounded-0 mb-2">
                                <a href="{{url($dt->slug. '/article/'.$n->id.'/'.$n->slug)}}">
                                    @isset($n->img_landscape)
                                    <img src="{{asset('/Images/News/'.$n->img_landscape)}}" class="img-fluid mb-5" alt="" />
                                    @else
                                    <img src="{{asset('/Images/News/'.$n->img_news)}}" class="img-fluid mb-5" alt="" />
                                    @endisset
                                </a>
                            </div>
                            <a class="cat-row-post mt-3" href="{{url('/category/'.$dt->slug)}}"> {{$dt->slug}} </a>

                            <div class="post-content row-post">
                                <h2 class="post-title title-md">
                                    <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                                </h2>
                                <p>BY <b class="text-decoration-none text-uppercase">{{$n->author}}</b> | {{ date('d M Y',strtotime($n->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection