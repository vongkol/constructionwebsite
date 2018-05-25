<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class PortfolioController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    // index
    public function index()
    {
        // if(!Right::check('Slideshow', 'l')){
        //     return view('permissions.no');
        // }
        $data['portfolios'] = DB::table('portfolios')
            ->join('portfolio_categories','portfolio_categories.id', 'portfolios.portfolio_category_id')
            ->select('portfolios.*', 'portfolio_categories.name as portfolio_category_id')
            ->where('portfolios.active',1)
            ->orderBy('portfolios.id', 'desc')
            ->paginate(18);
        return view('portfolios.index', $data);
    }
    public function create()
    {
        // if(!Right::check('Slideshow', 'i')){
        //     return view('permissions.no');
        // }
        $data['portfolio_categories'] = DB::table('portfolio_categories')
            ->where('active',1)
            ->get();
        return view('portfolios.create', $data);
    }
    public function save(Request $r)
    {
    	
        $data = array(
            'name' => $r->name,
            'portfolio_category_id' => $r->category,
            'order' => $r->order,
        );
        $i = DB::table('portfolios')->insertGetId($data);
        if($r->hasFile('photo')) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'portfolios' .$i . $ss;
            $destinationPath = 'uploads/portfolios/'; // usually in public folder
         
            // upload 250
            $n_destinationPath = 'uploads/portfolios/small/';
            $new_img = Image::make($file->getRealPath())->resize(350, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img->save($n_destinationPath . $file_name, 80);

            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
            $i = DB::table('portfolios')->where('id', $i)->update($data);
        }
        if ($i) {
            $r->session()->flash("sms", "New portfolio has been created successfully!");
            return redirect("/portfolio/create");
        } else {
            $r->session()->flash("sms1", "Fail to create new portfolio!");
            return redirect("/portfolio/create")->withInput();
        }   
    }
    // delete
    public function delete($id)
    {
        DB::table('portfolios')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/portfolio?page='.$page);
        }
        return redirect('/portfolio');
    }
    public function edit($id)
    {
        $data['portfolio'] = DB::table('portfolios')
            ->where('id',$id)->first();
        return view('portfolios.edit', $data);
    }
    
    public function update(Request $r)
    {
        // if(!Right::check('Slideshow', 'u')){
        //     return view('permissions.no');
        // }
        $data = array(
            'name' => $r->name,
            'order' => $r->order,
            'url' => $r->url,
        );
        if ($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'front/slides';
            $file->move($destinationPath, $file_name);
            $data = array(
	            'photo' => $file_name,
            );
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('slides')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/slide/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/slide/edit/'.$r->id);
        }
    }
}

