<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 19:15:33 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 17:33:04
 */

namespace App\Http\Controllers\Home;

use App\Navigate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(Request $request){
        // 记录本次URL
        session()->flash('goback', $request->url());
        
        // 载入皮肤
        $this->theme = env('DEFAULT_THEM','Pithy');
        
    }

    public function navigate()
    {

    }


}
