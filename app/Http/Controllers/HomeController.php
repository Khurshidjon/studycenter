<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallery;
use App\Benefit;
use App\Schedule;
use App\Teacher;
use App\TestCenter;
use App\Country;
use App\Album;
use App\StudyCenter;
use App\Address;
use App\Banner;
use App\Blog;
use App\Consulting;
use App\Course;
use App\Post;
use App\SiteMenu;
use App\Subject;
use App\University;
use App\BackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Blog::take(4)->get();
        $courses = Course::all();
        $universities = Country::all();
        $banner = DB::table('banners')->select('home_banner')->first();
        return view('frontend.index', [
            'posts' => $posts,
            'courses' => $courses,
            'banner' => $banner,
            'universities' => $universities
        ]);
    }
    public function contacts()
    {
        $contacts = Address::first();
        $banner = DB::table('banners')->select('contacts_banner')->first();
        return view('frontend.contacts', [
            'contacts' => $contacts,
            'banner' => $banner
        ]);
    }
    public function subject(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $msg = $request->message;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'subject' => 'required|string|max:500',
            'captcha' => 'required|captcha',
            'message' => 'required',
        ]);
        $message = new Subject();
        $message->name = $name;
        $message->email = $email;
        $message->subject = $subject;
        $message->message = $msg;
        $message->save();

        return redirect()->back()->with(['alert' => 'Murojaatingiz uchun rahmat, biz siz bilan albatta bog\'lanamiz']);
    }
    public function aboutUs()
    {
        $abouts = About::first();
        $bene = Benefit::where('status', 0)->get();
        $banner = DB::table('banners')->select('about_us_banner')->first();
        return view('frontend.about-us', [
            'abouts' => $abouts,
            'banner' => $banner,
            'benefits' => $bene
        ]);
    }
    public function captchaRefresh()
    {
        $captcha = captcha_img('flat');
        return $captcha;
    }
    public function singleBlog(Blog $post)
    {
        if(!isset($_COOKIE[$post->id])){
            $post->view_count++;
            setcookie($post->id, $post->id, time()+60*60*24*30);
        }
        $post->save();
        $similar_posts = Blog::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get();
        return view('frontend.blog-single', [
            'post' => $post,
            'similar_posts' => $similar_posts
        ]);
    }
    public function blog()
    {
        $posts = Blog::latest()->paginate(10);
        return view('frontend.blog', compact('posts'));
    }
    public function createSite()
    {
        $menus = SiteMenu::all();
        return view('vendor.menus.create', [
            'menus' => $menus
        ]);
    }





    public function updateSiteMenu(SiteMenu $site_menu)
    {
        $menus = SiteMenu::all();
        return view('vendor.menus.edit', [
            'menu' => $site_menu,
            'menus' => $menus,
        ]);
    }



    public function consulting()
    {
        $banner = DB::table('banners')->select('consulting_banner')->first();
        $consulting = Consulting::first();
        $universities = University::all();
        return view('frontend.consulting', [
            'banner' => $banner,
            'consulting' => $consulting,
            'universities' => $universities
        ]);
    }
    
    
    
    public function languages(Request $request)
    {
        $menu = SiteMenu::where('site_url', $request->getSchemeAndHttpHost().'/'.$request->path())->first();
        $menus = StudyCenter::all();
        $back = BackgroundImage::find(1);
        return view('frontend.languages', [
            'menu' => $menu,
            'back' => $back,
            'menus' => $menus
        ]);
    }


    public function classes()
    {
        $courses = Course::all();
        $back = BackgroundImage::find(1);
        return view('frontend.classes', [
            'courses' => $courses,
            'back' => $back
        ]);
    }

    public function schedules()
    {
        $schedules = Schedule::orderBy('created_at', 'DESC')->first();
        $back = BackgroundImage::find(1);
        return view('frontend.schedules', [
            'schedules' => $schedules,
            'back' => $back
        ]);
    }
    public function teachers()
    {
        $teachers = Teacher::where('status', 'published')->get();
        $back = BackgroundImage::find(1);
        return view('frontend.teachers', [
            'teachers' => $teachers,
            'back' => $back
        ]);
    }

    public function benefits(Request $request)
    {
        $bene = Benefit::where('status', 0)->get();
        $abouts = About::first();
        $menu = SiteMenu::where('site_url', $request->getSchemeAndHttpHost().'/'.$request->path())->first();
        return view('frontend.benefits', [
            'menu' => $menu,
            'benefits' => $bene,
            'abouts' => $abouts
        ]);
    }
    public function gallery()
    {
        $albums = Album::all();
        return view('frontend.albums', [
            'albums' => $albums
        ]);
    }
    public function galleryItems(Album $album)
    {
        $galleries = Gallery::where('album_id', $album->id)->first();
        return view('frontend.gallery', [
            'galleries' => $galleries,
            'album' => $album
        ]);
    }
    public function complexTest(Request $request)
    {
        $menu = SiteMenu::where('site_url', $request->getSchemeAndHttpHost().'/'.$request->path())->first();
        $complexTests = TestCenter::orderBy('created_at', 'DESC')->first();
        return view('frontend.complex-test', [
            'menu' => $menu,
            'complexTests' => $complexTests
        ]);
    }

    public function workAndStudy()
    {
        $countries = Country::all();
        $back = BackgroundImage::find(1);
        return view('frontend.work-and-study',[
            'countries' => $countries,
            'back' => $back
        ]);
    }
}
