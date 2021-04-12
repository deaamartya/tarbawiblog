@extends('frontend.template.master')
@section('banner_latest_reviews')
@php $n = $latest_r; @endphp
@isset($n->img_landscape)
<div class="post-overaly-style post-md d-flex justify-content-center" style="background-image:url({{asset('Images/News/'.$n->img_landscape)}})" style="z-index:1">
@else
<div class="post-overaly-style post-md d-flex justify-content-center" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1">
@endisset
{{-- <div class="post-overaly-style post-md d-flex justify-content-center" style="background-image:url({{asset('Images/News/'.$n->img_news)}})" style="z-index:1"> --}}
    @foreach($n->news_menu_category->take(1) as $dt)
    <div class="post-content banner-post">
        <h2 class="post-title title-xxl mb-5">
            <a href="{{url($dt->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
        </h2>
        <h6 class="my-5 banner-post subtitle">{!! Str::limit($n->sub_title,145) !!}</h6>
        <a class="banner-post post-cat tech-color" href="{{url('/category/'.$dt->slug)}}">{{$dt->name}}</a>
    </div>
    @endforeach
</div>
@endsection