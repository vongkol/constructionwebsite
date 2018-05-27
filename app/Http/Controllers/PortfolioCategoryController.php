<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PortfolioCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
       
        $data['portfolio_categories'] = DB::table('portfolio_categories')
            ->where('active',1)
            ->paginate(18);
        return view('portfolio-categories.index', $data);
    }
    // load create form
    public function create()
    {
        return view('portfolio-categories.create');
    }
    // save new category
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'order' => $r->order,
        );
        $sms = "The new portfolio category has been created successfully.";
        $sms1 = "Fail to create the new portfolio category, please check again!";
        $i = DB::table('portfolio_categories')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/portfolio-category/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/portfolio-category/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('portfolio_categories')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/portfolio-category?page='.$page);
        }
        return redirect('/portfolio-category');
    }

    public function edit($id)
    {
        $data['portfolio_category'] = DB::table('portfolio_categories')
            ->where('active', 1)
            ->where('id', $id)
            ->first();            
        return view('portfolio-categories.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name, 
            'order' => $r->order,
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('portfolio_categories')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/portfolio-category/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/portfolio-category/edit/'.$r->id);
        }
    }
}
