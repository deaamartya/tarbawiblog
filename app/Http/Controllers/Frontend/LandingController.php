<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News\News;
use App\Models\Menu\MenuCategory;
use Illuminate\Support\Facades\DB;
use Input;
use App\Models\Videos\Video;
use App\Models\Settings\Footer;

class LandingController extends Controller
{
    function __construct(){
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            header('Location: https://m.abubakar.id');
        }
    }
    public function index()
    {
        $latest = News::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->first();
        $data['latest'] = view('frontend.content.latest.banner', compact('latest'));

        $latest_4 = News::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->where('id','!=',$latest->id)
            ->limit(4)->get();
        $data['latest_4'] = view('frontend.content.latest.latest', compact('latest_4'));

        $popular = News::orderBy('hit', 'desc')
            ->where('status', 1)
            ->first();
        $data['popular'] = view('frontend.content.popular_new.banner', compact('popular'));

        $popular_4 = News::orderBy('hit', 'desc')
            ->where('status', 1)
            ->where('id','!=',$latest->id)
            ->whereNotIn('id', [$latest_4[0]->id,$latest_4[1]->id,$latest_4[2]->id,$latest_4[3]->id])
            ->limit(4)->get();
        $data['popular_4'] = view('frontend.content.popular_new.latest', compact('popular_4'));

        $categories = MenuCategory::whereNull('category_id')->get();
        foreach($categories as $c){
            $news_atas = News::select('news.*')
            ->orderBy('hit', 'desc')
            ->join('news_category_news AS n','n.news_id','news.id')
            ->where('category_news_id','=',$c->id)
            ->where('news.status', 1)
            ->limit(2)->get();
            if(count($news_atas) == 2){
                $news_bawah = News::select('news.*')
                ->orderBy('hit', 'desc')
                ->join('news_category_news AS n','n.news_id','news.id')
                ->where('category_news_id','=',$c->id)
                ->where('news.status', 1)
                ->whereNotIn('news.id', [$news_atas[0]->id,$news_atas[1]->id])
                ->limit(3)->get();
                $c->news_bawah = $news_bawah;
            }
            else if(count($news_atas) == 1){
                $news_bawah = News::select('news.*')
                ->orderBy('hit', 'desc')
                ->join('news_category_news AS n','n.news_id','news.id')
                ->where('category_news_id','=',$c->id)
                ->where('news.status', 1)
                ->where('news.id', '!=' ,$news_atas[0]->id)
                ->limit(3)->get();
                $c->news_bawah = $news_bawah;
            }
            $c->news_atas = $news_atas;
        }
        $data['categories'] = view('frontend.content.categories.post', compact('categories'));

        // $slide = News::orderBy('updated_at', 'desc')
        //     ->where('status', 1)
        //     ->where('slide', 1)
        //     ->get();
        // $data['slide'] = view('frontend.content.slide.slide', compact('slide'));

        // $news = News::orderBy('created_at', 'desc')
        //     ->where('status', 1)
        //     ->get();
        // $video = Video::all();
        // $data['content'] = view(
        //     'frontend.content.whats_new.breaking-news',
        //     compact('news', 'video')
        // );

        //        $news2 = DB::table('news')
        //                ->select('news.id', 'menu_categories.slug', 'news.slug', 'menu_categories.slug as ctgs', 'sub_title', 'img_news', 'news.title')
        //                ->join('menu_categories', 'news.id', 'menu_categories.id')
        //                ->orderBy('news.created_at', 'DESC')
        //                ->where('news.status', '=', 1)
        //                ->where('news.featured', '=', 1)
        //                ->limit(5)
        //                ->get();

        // $news2 = News::orderBy('created_at', 'desc')
        //     ->where('status', true)
        //     ->where('featured', true)
        //     ->limit(5)
        //     ->get();

        // $pop = News::orderBy('hit', 'desc')
        //     ->where('status', '=', true)
        //     ->limit(4)
        //     ->get();
        // $dt_menu_categories = MenuCategory::where('status', 1)->get();

        // $data['popular'] = view(
        //     'frontend.content.popular.popular',
        //     compact('pop', 'news2', 'dt_menu_categories')
        // );

        //        $video = Video::all();
        //        $data['video'] = view('frontend.content.video.video', compact('video'));

        return view('frontend.template.master', $data);
    }

    function load_data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id != 0) {
                $breaking_news = News::all();
            } else {
                $breaking_news = News::all();
            }
            $output = '';
            $last_id = '';
            $cat = Category::get();
            if (!$breaking_news->isEmpty()) {
                foreach ($breaking_news as $dt) {
                    $ct = explode(',', $dt->category_id);
                    if (substr($dt->image, 0, 7) != '<iframe') {
                        $output .=
                            '
                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-style clearfix">
                                    <div class="post-thumb">
                                        <a href="' .
                            $dt->ctgs .
                            '/article/' .
                            $dt->id .
                            '/' .
                            $dt->slug .
                            '">
                                            ' .
                            '<img class="img-fluid" src="public/images/News/' .
                            $dt->image .
                            '"></img>
                                        </a>
                                        <div class="grid-cat">';
                        for ($i = 0; $i < count($ct); $i++) {
                            foreach ($cat as $c) {
                                if ($c->id == $ct[$i]) {
                                    $output .=
                                        '
                                                    <a class="post-cat sports" href="' .
                                        'category/' .
                                        $c->slug .
                                        '">
                                                        ' .
                                        $c->name .
                                        '
                                                    </a>';
                                }
                            }
                        }
                        $output .=
                            '</div>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-md">
                                            <a href="' .
                            $dt->ctgs .
                            '/article/' .
                            $dt->id .
                            '/' .
                            $dt->slug .
                            '">' .
                            $dt->title .
                            '</a>   
                                        </h2>
                                        <p>' .
                            $dt->sub_title .
                            '</p>
                                    </div>
                                </div>
                                <div class="gap-50"></div>
                            </div>';
                    } else {
                        $output .=
                            '
                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-style clearfix">
                                    <div class="post-thumb">
                                    <div class="embed-responsive">
                                        <div class="embed-responsive iframe">
                                            ' .
                            $dt->image .
                            '
                                        </div>
                                    </div>
                                       <div class="grid-cat">';
                        for ($i = 0; $i < count($ct); $i++) {
                            foreach ($cat as $c) {
                                if ($c->id == $ct[$i]) {
                                    $output .=
                                        '
                                                    <a class="post-cat sports" href="' .
                                        'category/' .
                                        $c->slug .
                                        '">
                                                        ' .
                                        $c->name .
                                        '
                                                    </a>';
                                }
                            }
                        }
                        $output .=
                            '</div>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-md">
                                            <a href="' .
                            $dt->ctgs .
                            '/article/' .
                            $dt->id .
                            '/' .
                            $dt->slug .
                            '">' .
                            $dt->title .
                            '</a>   
                                        </h2>
                                        <p>' .
                            $dt->sub_title .
                            '</p>
                                    </div>
                                </div>
                                <div class="gap-50"></div>
                            </div>';
                    }
                    $last_id = $dt->id;
                }
                $output .=
                    '
               <div class="gap-30"></div>
               
                    <div class="col-12">
                        <div class="load-more-btn text-center" id="load_more">
                            <button class="btn" name="load_more_button" class="btn btn-success form-control" data-id="' .
                    $last_id .
                    '" id="load_more_button"> Load More </button>
                        </div>
                    </div>
              
       ';
            } else {
                $output .= '
                      <div class="gap-30"></div>
                      
                    <div class="col-12">
                        <div class="load-more-btn text-center" id="load_more">
                            <button class="btn" name="load_more_button" class="btn btn-info form-control"> No Data Found </button>
                         </div>
                    </div>
       ';
            }
            echo $output;
        }
    }

    public function ch($slug)
    {
        $dt_news_category = MenuCategory::where('slug', $slug)->get();

        $ch_news = DB::table('news')
            ->where('news.status', '=', true)
            ->join(
                'news_category_news',
                'news.id',
                '=',
                'news_category_news.news_id'
            )
            ->join(
                'category_news',
                'category_news.id',
                '=',
                'news_category_news.category_news_id'
            )
            ->where('category_news.slug', '=', $slug)
            ->select(
                'news.*',
                'news_category_news.category_news_id',
                'category_news.id'
            )
            ->get();

        $ch_news_cate = MenuCategory::with('posts')
            ->latest()
            ->where('slug', $slug)
            ->where('status', 1)
            ->paginate(4);
        $latestNews = DB::table('news')
            ->join('category_news', 'news.id', 'category_news.id')
            ->select(
                'news.id',
                'category_news.slug',
                'news.slug',
                'category_news.slug as ctgs',
                'sub_title',
                'img_news',
                'news.title'
            )
            ->orderBy('news.id', 'DESC')
            ->where('news.status', '=', 1)
            ->where('news.featured', '=', 1)
            ->limit(10)
            ->get();
        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();
        $data['category'] = view(
            'frontend.content.category.category',
            compact('ch_news', 'latestNews', 'ch_news_cate', 'dt_news_category')
        );

        return view('frontend.template.master', $data);
    }

    public function category($slug)
    {
        $dt_news_category = MenuCategory::where('slug', $slug)->get();

        $ch_news = DB::table('news')
            ->where('news.status', '=', true)
            ->join(
                'news_category_news',
                'news.id',
                '=',
                'news_category_news.news_id'
            )
            ->join(
                'category_news',
                'category_news.id',
                '=',
                'news_category_news.category_news_id'
            )
            ->where('category_news.slug', '=', $slug)
            ->select(
                'news.*',
                'news_category_news.category_news_id',
                'category_news.id'
            )
            ->get();

        //        $latestNews = DB::table('news')->join('category_news', 'news.id', 'category_news.id')
        //                ->select('news.id', 'category_news.slug', 'news.slug', 'category_news.slug as ctgs', 'sub_title', 'img_news', 'news.title')
        //                ->orderBy('news.id', 'DESC')
        //                ->where('news.status', '=', 1)
        //                ->where('news.featured', '=', 1)
        //                ->limit(10)
        //                ->get();

        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();
        $data['category'] = view(
            'frontend.content.category.category',
            compact('ch_news', 'latestNews', 'dt_news_category')
        );

        return view('frontend.template.master', $data);
    }

    public function search()
    {
        $searchterm = Input::get('keyword');
        $data_search = News::where('status', true)
            ->orWhere('title', 'LIKE', '%' . $searchterm . '%')
            ->orWhere('detail', 'LIKE', '%' . $searchterm . '%')
            ->paginate(10);
        $view['data_search'] = $data_search;

        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();
        $view['latestNews'] = $latestNews;

        $dt_news_category = MenuCategory::where('slug')->get();
        $view['dt_news_category'] = $dt_news_category;

        return view('frontend.menu.search.search', $view);
    }

    public function article($slug, $newsid, $title)
    {
        $hitNews = News::findOrFail($newsid);
        $data = [];
        $data['hit'] = $hitNews->hit + 1;
        News::where('id', $newsid)->update($data);
        $news = News::where('id', $newsid)->get();

        $dt_news_category = MenuCategory::where('slug', $slug)->get();

        $previuspost = DB::table('news')
            ->leftjoin('category_news', 'news.id', 'category_news.id')
            ->select(
                'news.id',
                'category_news.slug',
                'news.slug',
                'category_news.slug as ctgs',
                'sub_title',
                'img_news',
                'news.title'
            )
            ->orderBy('news.id', 'DESC')
            ->where('news.id', '<', $newsid)
            ->where('news.status', '=', 1)
            ->limit(1)
            ->get();

        $nextpost = DB::table('news')
            ->leftjoin('category_news', 'news.id', 'category_news.id')
            ->select(
                'news.id',
                'category_news.slug',
                'news.slug',
                'category_news.slug as ctgs',
                'sub_title',
                'img_news',
                'news.title'
            )
            ->orderBy('news.id', 'DESC')
            ->where('news.id', '>', $newsid)
            ->where('news.status', '=', 1)
            ->limit(1)
            ->get();

        //        $latestNews = DB::table('news')->join('menu_categories', 'news.id', 'menu_categories.id')
        //                ->select('news.id', 'menu_categories.slug', 'news.slug', 'menu_categories.slug as ctgs', 'sub_title', 'img_news', 'news.title')
        //                ->orderBy('news.created_at', 'DESC')
        //                ->where('news.status', '=', 1)
        //                ->where('news.featured', '=', 1)
        //                ->limit(10)
        //                ->get();
        //        $latestNews = DB::table('news')
        //                ->where('news.status', '=', true)
        //                ->join('news_menu_category', 'news.id', '=', 'news_menu_category.news_id')
        //                ->join('category_news', 'category_news.id', '=', 'news_menu_category.menu_categories_id')
        //                ->where('category_news.slug', '=', $slug)
        //                ->select('news.*', 'news_menu_category.menu_categories_id', 'menu_categories.id')
        //                ->get();

        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();

        $data['detail'] = view(
            'frontend.content.detail.detail',
            compact(
                'news',
                'previuspost',
                'nextpost',
                'latestNews',
                'dt_news_category'
            )
        );
        //        return view('frontend.content.detail.detail', $view);
        return view('frontend.template.master', $data);
    }

    public function article2($newsid, $title)
    {
        $hitNews = News::findOrFail($newsid);
        $data = [];
        $data['hit'] = $hitNews->hit + 1;
        News::where('id', $newsid)->update($data);
        $news = News::where('id', $newsid)->get();

        $previuspost = DB::table('news')
            ->leftjoin('category_news', 'news.id', 'category_news.id')
            ->select(
                'news.id',
                'category_news.slug',
                'news.slug',
                'category_news.slug as ctgs',
                'sub_title',
                'img_news',
                'news.title'
            )
            ->orderBy('news.id', 'DESC')
            ->where('news.id', '<', $newsid)
            ->where('news.status', '=', 1)
            ->limit(1)
            ->get();

        $nextpost = DB::table('news')
            ->leftjoin('category_news', 'news.id', 'category_news.id')
            ->select(
                'news.id',
                'category_news.slug',
                'news.slug',
                'category_news.slug as ctgs',
                'sub_title',
                'img_news',
                'news.title'
            )
            ->orderBy('news.id', 'DESC')
            ->where('news.id', '>', $newsid)
            ->where('news.status', '=', 1)
            ->limit(1)
            ->get();

        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();

        $data['detail'] = view(
            'frontend.content.detail.detail2',
            compact('news', 'previuspost', 'nextpost', 'latestNews')
        );
        return view('frontend.template.master', $data);
    }

    public function footer($slug)
    {
        $dt_foot = Footer::where('status', 1)
            ->where('slug', $slug)
            ->get();
        $data['dt_foot'] = $dt_foot;
        return view('frontend.content.footer.slug', $data);
    }
}
