@extends('frontend.template.master')
@section('detail')
{{-- <div class="gap-80"></div> --}}
<section class="main-content">
    <div class="container px-5 text-left">
        <div class="row ts-gutter-30">
            <div class="col-12">
                @foreach($news as $data)
                <div class="single-post">
                    {{-- <li class="grid-category">
                        
                        <a class="post-cat sports" 
                           href="{{url('category/'.$ct->slug)}}"
                           style="padding: 1px; font-size: 15px"> 
                            &nbsp; {{$ct->name}} &nbsp;
                        </a>
                        
                    </li> --}}
                    @foreach($dt_news_category as $ct)

                    <div class="post-header-area">
                        <h2 class="post-title title-lg"> {{$data->title}} </h2>
                        <br>
                        <p>{{$data->sub_title}}</p>
                        <div class="row">
                            <div class="col-sm">
                                <ul class="post-meta">
                                    <li><i class="post-author"></i>BY : <b>{{$data->author}}</b> IN <b>{{$ct->name}}</b> | {{date('d M Y',strtotime($data->created_at))}}</li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @isset($data->img_landscape)
                                <img src="{{ asset('/Images/News/'.$data->img_landscape)}}" class="img-fluid w-100" alt="">
                                @else
                                <img src="{{ asset('/Images/News/'.$data->img_news)}}" class="img-fluid w-100" alt="">
                                @endisset
                            </div>
                        </div>
                        
                    </div>

                    @endforeach

                    @foreach($data->news_menu_category as $dt)

                    @endforeach

                    <div class="post-content-area text-black">
                        <p>{!! $data->detail !!}</p>
                    </div>

                    <hr>
                    <br>

                    <div class="post-footer">
                        <h6>TAGS</h6>
                        <?php
                        $tag = $data->tag;
                        $data = explode(',', $tag);
                        ?>
                        @foreach($data as $tag)
                            @if($tag)
                            <a>
                                {{$tag}}@if($loop->iteration != count($data))
                                , 
                                @endif
                            </a>
                            @endif
                        @endforeach
                        
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div class="post-footer">
                        <h6>SHARE THIS</h6>
                        <a class="btn px-3 py-2 rounded-circle fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="btn px-3 py-2 rounded-circle">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <br>
                </div>
                @endforeach
                <!-- single-post end -->
            </div>
        </div>
    </div>
    <hr>
    
    <div class="container-fluid px-5">
        <br>
        <div class="row ts-gutter-30">
            <div class="col-12 justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-{{12/count($post_4)*4}} col-md-{{12/count($post_4)*4}} col-sm-12">
                        <h4>MORE LIKE THIS</h4>
                    </div>
                </div>
                <br>
                <div class="featured-tab">
                    <div class="tab-content">
                        <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <div class="row justify-content-center">
                                @foreach($post_4 as $n)
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="post-block-style clearfix">

                                        <div class="post-thumb rounded-0 mb-2">
                                            @foreach($dt_news_category as $data)
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
<hr>
@endsection