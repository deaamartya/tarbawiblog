@extends('frontend.template.master')
@section('category')
@foreach($categories as $c)
    @if(!$c->news_atas->isEmpty())
        <section class="block-slider">
            <div class="container">
                <div class="row ts-gutter-30">
                    <div class="col-12">
                        <h2 class="block-title">
                            <span>{{ $c->name }}</span>
                        </h2>
                        <div class="featured-tab">
                            <div class="tab-content">
                                <div class="tab-pane active animated fadeInRight" id="tab_a">
                                    <div class="row mb-5">
                                        @foreach($c->news_atas as $n)
                                        <div class="col-lg-6 col-md-6 col-xl-6 col-12">
                                            <div class="post-overaly-style post-md ml-8 post-kategori" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1">
                                                @foreach($n->news_menu_category->take(1) as $dt)
                                                <div class="post-content mb-0">
                                                    <a class="banner-post post-cat tech-color p-0" href="{{url('/category/'.$dt->slug)}}">{{$dt->name}}</a>
                                                    <h2 class="post-title title-sm text-white">
                                                        <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                                    </h2>
                                                    <h6 class="my-2 subtitle text-white font-weight-normal">{!! Str::limit($n->sub_title,100) !!}</h6>
                                                    <p class="text-white">BY <b class="text-decoration-none text-uppercase">{{$n->author}}</b> | {{ date('d M Y',strtotime($n->created_at))}}</p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <br>
                                    <div class="row">
                                        @foreach($c->news_bawah as $n)
                                        <div class="col-lg-4 col-md-4 col-xl-4 col-12">
                                            <div class="post-block-style clearfix">
                                                <div class="post-thumb rounded-0 mb-2">
                                                    @foreach($n->news_menu_category->take(1) as $data)
                                                    <a href="{{url($data->slug. '/article/'.$n->id.'/'.$n->slug)}}">
                                                        @isset($n->img_landscape)
                                                        <img src="{{asset('/Images/News/'.$n->img_landscape)}}" class="img-fluid mb-5" alt="" />
                                                        @else
                                                        <img src="{{asset('/Images/News/'.$n->img_news)}}" class="img-fluid mb-5" alt="" />
                                                        @endisset
                                                    </a>
                                                    @endforeach
                                                </div>
                                                <a class="cat-row-post mt-3" href="{{url('/category/'.$data->slug)}}"> {{$data->slug}} </a>

                                                <div class="post-content row-post">
                                                    <h2 class="post-title title-md">
                                                        <a href="{{url($data->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                                                    </h2>
                                                    <p>BY <b class="text-decoration-none text-uppercase">{{$n->author}}</b> | {{ date('d M Y',strtotime($n->created_at))}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach
@endsection