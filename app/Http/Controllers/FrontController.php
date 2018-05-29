<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class FrontController extends Controller
{
   
    // index
    public function index()
    {
       
        $data['slides'] = DB::table('slides')
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->get();
        // select only news
        // 1 is category news
        $data['news'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.active', 1)
            ->where('categories.parent_id', 1)
            ->orderBy('posts.id', 'desc')
            ->select('posts.*')
            ->limit(7)->get();
        $data['feature_works'] = DB::table('featured_works')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $data['video'] = DB::table('video_trainings')
            ->where('active',1)
            ->orderBy('id','desc')
            ->first();
        $data['videos'] = DB::table('video_trainings')
            ->where('active',1)
            ->orderBy('id','desc')
            ->limit(8)->get();
        $data['portfolio_categories'] = DB::table('portfolio_categories')
            ->where('active',1)
            ->orderBy('order_number', 'asc')
            ->get();
        
        // project location
        $data['locations'] = DB::table('project_locations')->where('active', 1)->get();
        $data['our_service'] = DB::table('our_services')->first();
        return view('fronts.index', $data);
    }
   // read posts by category
   public function category($id)
   {
       // check if its has sub category
       $subs = DB::table('categories')->where('parent_id', $id)->where('active', 1)->get();
       if(count($subs)>0)
       {
           // get posts in those sub categories
           $data['posts'] = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->where('posts.active', 1)
                ->where('categories.parent_id', $id)
                ->orderBy('posts.id', 'desc')
                ->select('posts.*', 'categories.name')
                ->paginate(15);
            $data['subs'] = $subs;
            $data['main'] = DB::table('categories')->where('id', $id)->first();
            return view('fronts.pages.sub-category', $data);
       }
       else{
           // category don't have sub categories
           $data['posts'] = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->where('posts.active', 1)
                ->where('posts.category_id', $id)
                ->orderBy('posts.id', 'desc')
                ->select('posts.*', 'categories.name')
                ->paginate(15);
            $data['main'] = DB::table('categories')->where('id', $id)->first();
            $data['subs'] = $subs;
            return view('fronts.pages.sub-category', $data);
       }
   }
   // view post detail
   public function post($id)
   {
       $pid = $_GET['pid'];
       $data['main'] = DB::table('categories')->where('id', $id)->first();
       $data['subs'] = DB::table('categories')->where('parent_id', $id)->where('active', 1)->get();
       $data['post'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.id', $pid)
            ->select('posts.*', 'categories.name')
            ->first();
        return view('fronts.pages.post', $data);
       
   }
   // read post in sub category
   public function subcategory($id)
   {
       $sid = $_GET['sub'];
       $data['main'] = DB::table('categories')->where('id', $id)->first();
       $data['subs'] = DB::table('categories')->where('parent_id', $id)->where('active', 1)->get();
       $data['posts'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.active', 1)
            ->where('posts.category_id', $sid)
            ->orderBy('posts.id', 'desc')
            ->select('posts.*', 'categories.name')
            ->paginate(15);
        return view('fronts.pages.sub-category', $data);
   }
}
