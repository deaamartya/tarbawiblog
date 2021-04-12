
<div class="newsletter-area">
    <div class="container">
        <div class="row ts-gutter-30 justify-content-center align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="footer-loto">
                    <ul class="ts-social">
                        @foreach($Social as $s)
                        <li><a href="{{$s->link}}">{!!$s->code!!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-5 col-md-6">
                <div class="footer-newsletter">
                    <form action="{{route('subscribe')}}" method="post">
                        {{csrf_field()}}
                        <div class="email-form-group">
                            <i class="news-icon fa fa-paper-plane" aria-hidden="true"></i>
                            <input type="email" name="email" class="newsletter-email" placeholder="Your email" required>
                            <input type="submit" class="newsletter-submit" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ts-footer-black">
    <div class="container">
        <div class="row ts-gutter-30 justify-content-lg-between justify-content-center">
            <div class="col-lg-12 col-md-6" style="color:#fff">
                <center>
                    <div class="footer-widtet">
                        <img style="width:20%" src="{{asset('/Images/Logo/'.$Gsetting->logo)}}" alt="">
                    </div>
                    <br>
                    <div class="col-lg-12 col-md-6">
                        <div class="footer-loto">
                            <ul class="ts-social-foot">
                                @foreach($foot as $dt)
                                <li><a href="{{url('footer/'.$dt->slug)}}"> {{$dt->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Footer End-->

<!-- ts-copyright start -->
<div class="ts-copyright">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 text-center">
                <div class="copyright-content text-light">
                    <p>{!! $Gsetting->footer !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>



