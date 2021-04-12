<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        @include('frontend.template.header')
        <style type="text/css">
            @media only screen and (max-width: 991px){
                .logoHowDef { display: none; }
                .logoHowMin { display: inline-block; }
            }
            @media only screen and (min-width: 992px){
                .logoHowDef { display: block;}
                .logoHowMin { display: none; }
            }
        </style>
    </head>

    <body>

        @include('frontend.menu.menu')
        @yield('banner_latest')
        @yield('latest')
        @yield('banner_popular')
        @yield('popular_news')
        @yield('category')
        {{-- @yield('popular')
        @yield('detail')
        @yield('breaking-news')
        @yield('search') --}}
        <div class="gap-50"></div>
        @yield('slug')
        @include('frontend.template.footer')
        @include('frontend.template.script')
    </body>
</html>