<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 前台首页
Route::get('/','Home\IndexController@index');
// 前台首页搜索
Route::get('/search/{title?}','Home\IndexController@search');
// 前台文章详情
Route::get('/details/{title}', 'Home\IndexController@details');
// 所有文章页
Route::get('/archive', 'Home\IndexController@archive');
// 右上角选项根据标签搜索
Route::get('/searchtag', 'Home\HomeController@searchtags');

// 作者列表
Route::get('/author/info','Home\AuthorsController@info');
// 点击文章作者进入作者文章页
Route::get('/author/index/{aid}', 'Home\AuthorsController@index');

// 关于我们
Route::get('/about','Home\AboutController@index');

// 新闻
Route::get('/news','Home\NewsController@index');

// 404
Route::get('/error','Home\IndexController@error');
// 【标签、分类】列表
Route::get('/list/{param?}','Home\ListController@index');

// 微信登录
Route::get('/auth/weixin', 'Auth\AuthController@oauth');
Route::get('/auth/weixin/callback', 'Auth\AuthController@callback');




// 后台首页
Route::get('/admin/index','Admin\IndexController@index');
// 后台欢迎页面
Route::get('/admin/welcome','Admin\IndexController@welcome');
// 后台语言切换
Route::get('/admin/setlang','Admin\IndexController@setlanguage');

// 后台article
Route::group(['prefix' => 'article'], function () {
	// 文章列表
    Route::get('/show','Admin\ArticleController@show');
    // 草稿列表
    Route::get('/draft','Admin\ArticleController@draft');
    // 添加文章
    Route::match(['get', 'post'], '/add','Admin\ArticleController@add');
    // 删除文章
    Route::post('/delete','Admin\ArticleController@delete');
    // 修改文章
    Route::match(['get', 'post'], '/update/{id}','Admin\ArticleController@update');

    
});
// 后台category
Route::group(['prefix' => 'category'], function () {
	// 栏目列表
    Route::get('/show','Admin\CategoryController@show');
    // 添加栏目页
    Route::match(['get', 'post'], '/add','Admin\CategoryController@add');
    // 删除分类
    Route::post('/delete', 'Admin\CategoryController@delete');
    // 修改分类
    Route::match(['get', 'post'], '/update/{id}', 'Admin\CategoryController@update');
});
// 后台system
Route::group(['prefix' => 'system'], function () {

    // 系统设置
    Route::get('/setting','Admin\SystemController@setting');
    
    Route::post('/setadd','Admin\SystemController@setadd');
    // 屏蔽词
    Route::get('/shielding','Admin\SystemController@shielding');
});
// 后台gallery
Route::group(['prefix' => 'galleries'], function(){
    // 图库列表
    Route::get('/show', 'Admin\GalleriesController@show');
    // 图库添加
    Route::get('/add', 'Admin\GalleriesController@add');
    
});

// });

// 后台Navigate
Route::group(['prefix' => 'navigate'],function(){
    // 导航列表
    Route::get('/show','Admin\NavigateController@show');
    // 导航删除
    Route::post('/delete','Admin\NavigateController@delete');
    // 导航批量删除
    Route::post('/batch','Admin\NavigateController@batchDelete');
    // 导航显示状态切换
    Route::get('/switch','Admin\NavigateController@switchIsNewOpen');  
    // 添加导航
    Route::match(['get', 'post'],'/create','Admin\NavigateController@create');
    // 修改导航
    Route::match(['get', 'post'],'/update/{id}','Admin\NavigateController@update');
});
// 后台Contacts
Route::group(['prefix' => 'Contacts'], function () {

    // 留言
    Route::get('/message ','Admin\ContactsController@show');
    //查看留言详情
    Route::post('/delete ','Admin\ContactsController@delete');
    //查看留言详情
    Route::match(['get', 'post'],'/update/{id}','Admin\ContactsController@update');
    // 状态显示状态切换
    Route::get('/switch','Admin\ContactsController@switchIsNewOpen');
});
// 后台admin（个人中心）
Route::group(['prefix' => 'AdminUsers'],function(){
    // 个人中心
    Route::any('/information','Admin\AdminUsersController@user_information');
    Route::post('/reset','Admin\AdminUsersController@reset');
    Route::post('/images','Admin\AdminUsersController@images');

});

// 登陆
Route::group(['prefix' => 'Login'], function () {
        // 登陆
        Route::get('/login','Admin\AdminsController@login');
        //注册
        Route::get('/register','Admin\AdminsController@register');
        //退出
        Route::get('/logout','Admin\AdminsController@logout');
        //切换账户
        Route::get('/toggle','Admin\AdminsController@logout');
        //重置密码
        Route::get('/reset','Admin\AdminsController@reset');
        
});

// 后台comment
Route::group(['prefix' => 'comment'], function(){
    // 评论列表
    Route::match(['get', 'post'],'/show', 'Admin\CommentController@show');
    //评论删除
    Route::post('/del', 'Admin\CommentController@del');
    //评论回复
    Route::match(['get', 'post'],'/replay/{id?}', 'Admin\CommentController@replay');    
});

// 前台Contacts
Route::group(['prefix' => 'Homecontacts'], function(){
      // 留言
      Route::match(['get', 'post'],'/index', 'Home\ContactsController@index');
    
});
// 前台comment
Route::group(['prefix' => 'comment'], function(){
    // 评论列表
    Route::match(['get', 'post'],'/index', 'Home\CommentsController@index');  

    Route::match(['get', 'post'],'/add', 'Home\CommentsController@add');  
});

Auth::routes();

