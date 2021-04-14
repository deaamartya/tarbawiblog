@extends('frontend.template.master')
@section('search')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($data_search->count() == 0)
                <h2 class="block-title">
                    <span> Result Search Not Found!!</span>
                </h2>
                @else

                <h2 class="block-title">
                    <span> Result Search </span>
                </h2>

                <div class="row">
                    @foreach($data_search as $n)
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
                                <h6 class="my-2 subtitle font-weight-normal">{!! Str::limit($n->sub_title,50) !!}</h6>
                                <p>BY <b class="text-decoration-none text-uppercase">{{$n->author}}</b> | {{ date('d M Y',strtotime($n->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- First block end -->

@stop