<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News\News;
use App\Models\Menu\MenuCategory;
use Illuminate\Support\Facades\DB;
use Input;
use App\Models\Videos\Video;
use App\Models\Settings\Footer;
use App\Http\Resources\previewNews;
use App\Http\Resources\previewCategory;
use App\Http\Resources\previewVideo;
use Carbon\Carbon;
class homePages extends Controller
{
    public function handless(Request $request)
    {
        echo $request;
    }
    public function index()
    {
        $slide = News::orderBy('updated_at', 'desc')
            ->where(['status' => 1, 'slide' => 1])
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->limit(6)
            ->get();

        $news = News::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->limit(10)
            ->get();
        $news2 = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->limit(10)
            ->get();
        $video = Video::limit(5)->get();
        $pop = News::orderBy('hit', 'desc')
            ->where('status', '=', true)
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->limit(4)
            ->get();
        $dt_menu_categories = MenuCategory::where('status', 1)
            ->whereNull('category_id')
            ->orderBy('clicked', 'desc')
            ->get();
        return response()->json([
            'slide' => previewNews::collection($slide),
            'news' => previewNews::collection($news),
            'news_list' => previewNews::collection($news2),
            'video' => previewVideo::collection($video),
            'popular' => previewNews::collection($pop),
            'persons' => $this->persons(),
            'categories' => previewCategory::collection($dt_menu_categories),
            'message' => 'Welcome',
        ]);
    }
    function getNewVP(Request $request)
    {
        $v = [];
        $p = [];
        if ($request->get('person')) {
            $v = Video::whereDate('created_at', Carbon::now())
                ->whereHas('category', function ($query) use ($request) {
                    return $query->where(
                        'category_news.id',
                        $request->get('person')
                    );
                })
                ->get();
            $p = News::whereDate('created_at', Carbon::now())
                ->whereHas('news_menu_category', function ($query) use (
                    $request
                ) {
                    return $query->where(
                        'category_news.id',
                        $request->get('person')
                    );
                })
                ->select([
                    'id',
                    'title',
                    'sub_title',
                    'embed',
                    'img_landscape',
                    'slug',
                    'img_news',
                    'tag',
                    'hit',
                    'created_at',
                ])
                ->get();
        } else {
            $v = Video::whereDate('created_at', Carbon::now())->get();
            $p = News::whereDate('created_at', Carbon::now())
                ->select([
                    'id',
                    'title',
                    'sub_title',
                    'embed',
                    'img_landscape',
                    'slug',
                    'img_news',
                    'tag',
                    'hit',
                    'created_at',
                ])
                ->get();
        }
        $cv = count($v) > 0 ? previewVideo::collection($v) : [];
        $cp = count($p) > 0 ? previewNews::collection($p) : [];
        return response()->json([
            'video' => $cv,
            'posts' => $cp,
            'message' => 'menampilkan berita terbaru',
        ]);
    }
    function posts(Request $request)
    {
        $news = [];
        $person = $request->get('person');
        $category = MenuCategory::orderBy('id', 'desc')
            ->where('status', true)
            ->whereNull('category_id')
            ->get();
        if ($request->get('person')) {
            $news = News::orderBy('hit', 'desc')
                ->where('status', 1)
                ->whereHas('news_menu_category', function ($query) use (
                    $person
                ) {
                    return $query->where('category_news.id', $person);
                })
                ->with('news_menu_category')
                ->select([
                    'id',
                    'title',
                    'sub_title',
                    'embed',
                    'img_landscape',
                    'slug',
                    'img_news',
                    'tag',
                    'hit',
                    'created_at',
                ])
                ->get();
        } else {
            $news = News::orderBy('hit', 'desc')
                ->where('status', 1)
                ->with('news_menu_category')
                ->select([
                    'id',
                    'title',
                    'sub_title',
                    'embed',
                    'img_landscape',
                    'slug',
                    'img_news',
                    'tag',
                    'hit',
                    'created_at',
                ])
                ->get();
        }
        return response()->json([
            'data' => previewNews::collection($news),
            'persons' => $person ? [] : $this->persons(),
            'categories' => previewCategory::collection($category),
            'message' => 'OK',
        ]);
    }
    function videos(Request $request)
    {
        $news = [];
        $person = $request->get('person');
        $id = $request->get('id');
        $related = [];
        if ($person) {
            $news = Video::orderBy('updated_at', 'desc')
                ->where('penceramah_id', $person)
                ->get();
        } elseif ($id) {
            $news = Video::orderBy('updated_at', 'desc')
                ->where('id', $id)
                ->first();
            Video::where('id', $news->id)->increment('hit', 1);
            $related = Video::orderBy('updated_at', 'desc')
                ->where('penceramah_id', $news->penceramah_id)
                ->limit(8)
                ->get();
            return response()->json([
                'data' => new previewVideo($news),
                'related' => previewVideo::collection($related),
                'message' => 'OK',
            ]);
        } else {
            $news = Video::orderBy('updated_at', 'desc')->get();
        }
        return response()->json([
            'data' => previewVideo::collection($news),
            'persons' => $person ? [] : $this->persons(),
            'message' => 'OK',
        ]);
    }
    function persons()
    {
        $news = MenuCategory::orderBy('name', 'asc')
            ->where('category_id', 20)
            ->get();
        return previewCategory::collection($news);
    }
    function personal($id)
    {
        $news = MenuCategory::orderBy('name', 'asc')
            ->where(['category_id' => 20, 'id' => $id])
            ->first();
        return new previewCategory($news);
    }

    public function ch($slug)
    {
        if (preg_match('/[0-9]/i', $slug)) {
            return $this->category($slug);
        }
        MenuCategory::where('slug', $slug)->increment('clicked', 1);
        $news = News::whereHas('news_menu_category', function ($query) use (
            $slug
        ) {
            return $query->where('category_news.slug', $slug);
        })
            ->where('status', true)
            ->with('news_menu_category')
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->get();
        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->whereHas('news_menu_category', function ($query) use ($slug) {
                return $query->where('category_news.slug', $slug);
            })
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->get();

        return response()->json([
            'news' => previewNews::collection($news),
            'New_' => previewNews::collection($latestNews),
            'current_category' => $slug,
            'message' => "Menampilkan artikel untuk kategori $slug",
        ]);
    }
    public function chv($slug)
    {
        MenuCategory::where('slug', $slug)->increment('clicked', 1);
        $news = Video::whereHas('category', function ($query) use ($slug) {
            return $query->where('category_news.slug', $slug);
        })
            ->where('status', true)
            ->get();
        $latestNews = Video::orderBy('hit', 'desc')
            ->where('status', true)
            ->whereHas('category', function ($query) use ($slug) {
                return $query->where('category_news.slug', $slug);
            })
            ->get();

        return response()->json([
            'news' => previewVideo::collection($news),
            'New_' => previewVideo::collection($latestNews),
            'current_category' => $slug,
            'message' => "Menampilkan Video untuk kategori $slug",
        ]);
    }
    public function category($id)
    {
        $cat = MenuCategory::where('id', $id)->first();
        if ($cat != null) {
            return new previewCategory($cat);
        } else {
            return null;
        }
        /*
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

        $latestNews = News::orderBy('created_at', 'desc')
            ->where('status', true)
            ->where('featured', true)
            ->limit(6)
            ->get();
        $data['category'] = view(
            'frontend.content.category.category',
            compact('ch_news', 'latestNews', 'dt_news_category')
        );

        return view('frontend.template.master', $data);*/
    }
    public function categories()
    {
        $category = MenuCategory::orderBy('id', 'desc')
            ->where('status', true)
            ->whereNull('category_id')
            ->get();
        return response()->json([
            'data' => previewCategory::collection($category),
            'message' => 'Menampilkan List Kategori',
        ]);
    }
    public function search(Request $request)
    {
        $searchterm = $request->get('searchinput'); //Input::get('keyword');
        $data_search = News::where('status', true)
            ->Where('title', 'LIKE', '%' . $searchterm . '%')
            ->limit(5)
            ->get();
        $video = Video::where('status', true)
            ->where('title', 'LIKE', '%' . $searchterm . '%')
            ->orderBy('hit', 'desc')
            ->limit(4)
            ->get();
        return response()->json([
            'data' => previewNews::collection($data_search),
            'video' => previewVideo::collection($video),
            'message' => "Menampilkan Posts untuk pencarian $searchterm",
        ]);
    }

    public function article($newsid, $title)
    {
        $hitNews = News::findOrFail($newsid);
        $hitNews->increment('hit', 1);

        $news = News::where('id', $newsid)
            ->with('news_menu_category')
            ->first();
        $cat = $hitNews->news_menu_category()->pluck('category_news.id');
        $related = News::whereHas('news_menu_category', function ($query) use (
            $cat
        ) {
            $query->whereIn('category_news.id', $cat);
        })
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->limit(5)
            ->get();
        $previuspost = News::orderBy('id', 'desc')
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->with('news_menu_category')
            ->where('news.id', '<', $newsid)
            ->where(['status' => true, 'featured' => true])
            ->first();
        $nextpost = News::orderBy('id', 'asc')
            ->select([
                'id',
                'title',
                'sub_title',
                'embed',
                'img_landscape',
                'slug',
                'img_news',
                'tag',
                'hit',
                'created_at',
            ])
            ->with('news_menu_category')
            ->where('news.id', '>', $newsid)
            ->where(['status' => true, 'featured' => true])
            ->first();
        return response()->json([
            'news' => $news,
            'prev' => $previuspost,
            'next' => $nextpost,
            'related' => previewNews::collection($related),
            'current' => $title,
        ]);
    }
}
