<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">{{trans('common.title')}}</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">B-blog</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">{{trans('common.version')}}</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<!--
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			-->
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">{{Session::get('name')}}<i class="Hui-iconfont"></i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/AdminUsers/information">个人信息</a></li>
							<li><a href="/Login/toggle">切换账户</a></li>
							<li><a href="/Login/reset">重置密码</a></li>
							<li><a href="/Login/logout">退出</a></li>
							<!--<li><a href="/admin/information">{{trans('common.information')}}</a></li>
							<li><a href="{{url('Login/sign')}}">{{trans('common.logout')}}</a></li>-->
						</ul>
					</li>
					<li class="dropDown dropDown_hover">
						<a href="javascript:;" class="dropDown_A">{{trans('common.change_language')}} <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:changeLang('zh-CN');">{{trans('common.zh-CN')}}</a></li>
							<li><a href="javascript:changeLang('en');">{{trans('common.en')}}</a></li>
						</ul>
					</li>					
					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">
								@if(isset($data['num'])) 
									{{$data['num']}}
									 @endif
							</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <??><a href="javascript:;" class="dropDown_A" title=""><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="{{trans('common.default_black')}}">{{trans('common.default_black')}}</a></li>
							<li><a href="javascript:;" data-val="blue" title="{{trans('common.skin_blue')}}">{{trans('common.skin_blue')}}</a></li>
							<li><a href="javascript:;" data-val="green" title="{{trans('common.skin_green')}}">{{trans('common.skin_green')}}</a></li>
							<li><a href="javascript:;" data-val="red" title="{{trans('common.skin_red')}}">{{trans('common.skin_red')}}</a></li>
							<li><a href="javascript:;" data-val="yellow" title="{{trans('common.skin_yellow')}}">{{trans('common.skin_yellow')}}</a></li>
							<li><a href="javascript:;" data-val="orange" title="{{trans('common.skin_orange')}}">{{trans('common.skin_orange')}}</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>