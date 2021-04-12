@extends('frontend.template.master')
@section('slug')
<div class="gap-20"></div>
<section class="main-content pt-0">
    <div class="container">
        <div class="row ts-gutter-30-detail">
            <div class="col-lg-12">
                @foreach($dt_foot as $n)
                <div class="single-post">
                    <div class="post-header-area">
                        <h3 class="post-title title-lg"> {{$n->name}} </h3>
                    </div>

                    <div class="text-center">
                        <p>
                            {!! $n->description !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div><!-- col-lg-8 -->
        </div><!-- row end -->
    </div><!-- container end -->
</section>
@stop