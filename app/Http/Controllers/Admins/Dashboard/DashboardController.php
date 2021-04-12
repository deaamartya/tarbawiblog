<?php

namespace App\Http\Controllers\Admins\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News\News;
use Carbon\Carbon;
use App\Models\Menu\MenuCategory;
use App\Models\Videos\Video;
use App\Models\Social\Social_Media;
use App\Models\Advertisements\Advertisement;
use App\Models\Subscribers\Subscriber;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    public function index() {
        $news = News::all();
        $view['news'] = $news;

        $todayNews = News::whereDate('created_at', '=', Carbon::today())->get();
        $view['todayNews'] = $todayNews;

        $dt_category_news = MenuCategory::all();
        $view['dt_category_news'] = $dt_category_news;

        $dt_video = Video::all();
        $view['dt_video'] = $dt_video;

        $dt_social = Social_Media::all();
        $view['dt_social'] = $dt_social;

        $dt_ads = Advertisement::all();
        $view['dt_ads'] = $dt_ads;

        $dt_subscriber = Subscriber::all();
        $view['dt_subscriber'] = $dt_subscriber;

        return view('backend.menu.dashboard.dashboard', $view);
    }

}
