@extends('frontend.template.master')
@section('slide')
<div class="owl-carousel dot-style2 transing-slide-style2">
    @foreach($slide->take(5) as $n)
    {{-- <div class="post-overaly-style post-md ml-8" style="background-image:url({{asset('/Images/News/'.$n->img_news)}})" style="z-index:1"> --}}
    <div class="post-overaly-style post-md ml-8" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1">
        @foreach($n->news_menu_category->take(1) as $dt)
        <div class="post-content">
            <a class="post-cat sports" href="{{url('/category/'.$dt->slug)}}">{{$dt->name}}</a>
            <h2 class="post-title title-md">
                <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
            </h2>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection