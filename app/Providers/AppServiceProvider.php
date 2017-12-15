<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $a=1;
        if($a==1)
        {
            view()->composer('Admin.Common._header', function ($view) { 
                $data['num']=DB::table('contacts')->where(['status'=>0])->count();
                $view->with('data',$data);
            });

        }else{
            view()->composer('Admin.Common._header', function ($view) { 
                $data['num']=10000;
                $view->with('data',$data);
            });
        }
    

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
