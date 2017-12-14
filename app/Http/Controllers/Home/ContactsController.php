<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if($request->isMethod('post')){
      
            $all = $request->all();
            $all = $request->except('_token');
            
            // 数据入库
            $result = \App\Contacts::create($all);
           
            if($result)
            {   
                return \App\Tools\ajax_success();
            }
            else
            {
                return \App\Tools\ajax_error();
            }
        }
            $them=env('DEFAULT_THEM','Pithy');
            return view('Themes/'.$them.'Home/contact');
        
    	
    }
}
