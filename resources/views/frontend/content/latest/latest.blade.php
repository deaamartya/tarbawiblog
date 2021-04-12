@extends('frontend.template.master')
@section('latest')
<section class="block-slider">
    <div class="container">
        <div class="row ts-gutter-30">
            <div class="col-12">
                <h2 class="block-title">
                    <span class="title-angle-shap"> Latest News</span>
                </h2>
                <div class="featured-tab">
                    <div class="tab-content">
                        <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <div class="row">
                                @foreach($latest_4 as $n)
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="post-block-style clearfix">

                                        <div class="post-thumb rounded-0 mb-2">
                                            @foreach($n->news_menu_category->take(1) as $data)
                                            <a href="{{url($data->slug. '/article/'.$n->id.'/'.$n->slug)}}">
                                                @isset($n->img_landscape)
                                                <img src="{{asset('/Images/News/'.$n->img_landscape)}}" class="mb-5" alt="" />
                                                @else
                                                <img src="{{asset('/Images/News/'.$n->img_news)}}" class="mb-5" alt="" />
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
@endsection