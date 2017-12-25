<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="{{$sets['KeyWord']}}">
<meta name="description" content="{{$sets['Content']}}">
<meta name="author" content="">
<link rel="icon" href="/assets/img/favicon.ico">
<title>{{$sets['WebSiteName']}}</title>
<!-- Bootstrap core CSS -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link href="/assets/css/font-awesome.min.css" rel="stylesheet">
<!-- Jasny CSS -->
<link href="/assets/css/jasny-bootstrap.min.css" rel="stylesheet">
<!-- Animate CSS -->
<link href="/assets/css/animate.css" rel="stylesheet">
<!-- Code CSS -->
<link href="/assets/css/tomorrow-night.css" rel="stylesheet" />
<!-- Gallery CSS -->
<link href="/assets/css/bootstrap-gallery.css" rel="stylesheet">
<!-- ColorBox CSS -->
<link href="/assets/css/colorbox.css" rel="stylesheet">
<!-- Custom font -->
<link href='/css/fonts.googleapis.com-css-raleway.css' rel='stylesheet' type='text/css'>
<link href='/css/fonts.googleapis.com-css-roboto-slab.css' rel='stylesheet' type='text/css'>
<!-- Custom styles for this template -->
<link href="/assets/css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

</head>
<body>
	<div class="page-loader">
		<div class="loader-in">Loading...</div>
		<div class="loader-out">Loading...</div>
	</div>

	<aside class="navmenu">
		<div class="post-titles">
			<div class="tag-title">
				<div class="container">
					<p class="tags" id="post-titles">
					@if(!empty($hotTags))
					@foreach($hotTags as $val)
						<a data-filter=".pt-fashion" class="search-tags" data-id="{{$val->tag_id}}" href="javascript:void(0)">{{$val->tag_name}}</a>
					@endforeach
					@endif
					<a data-filter=".pt-fashion" href="javascript:void(0)" data-id="0" class="search-tags">all</a>
						<!-- <a data-filter=".pt-fashion" href="#">fashion</a>
						<a data-filter=".pt-culture" href="#">culture</a>
						<a data-filter=".pt-art" href="#">art</a>
						 -->
					</p>
				</div>
			</div>
			<button type="button" class="remove-navbar"><i class="fa fa-times"></i></button>
			<ul class="post-title-list clearfix">
				<div id="tag-content">
				<li class="pt-fashion pt-culture">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Five simple steps to designing grid systems preface</a>
						</h5>
						<div class="post-subinfo">
							<span>June 28</span>   •   
							<span>2 Comments</span>
						</div>
					</div>
				</li>
				</div>
			</ul>
		</div>
	</aside>

	<div class="canvas">
		<div class="canvas-overlay"></div>
		<header>
			<nav class="navbar navbar-fixed-top nav-down navbar-laread">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="/"><img height="64" src="/assets/img/logo-light.png" alt=""></a>
					</div>
					<div class="get-post-titles">
						<button type="button" class="navbar-toggle push-navbar" data-navbar-type="default">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					@if(!empty(session('users.nickname')))
						<a href="javascript:void(0);" title="{{session('users.nickname')}}" class="modal-form">
							<img src="@if(!empty(session('users.avatar'))) {{session('users.avatar')}} @else /avatar.jpg @endif" class="round" style="width: 35px;height: 35px; border-radius: 70px;" title="{{session('users.nickname')}}" alt="{{session('users.nickname')}}">					
						</a>	
					@else
					<a href="javascript:void(0);" class="modal-form weixin-sign">
						<i class="fa fa-user"></i>
					</a>
					@endif

					<button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-plus"></i>
					</button>
					<div class="collapse navbar-collapse" id="main-nav">
						<ul class="nav navbar-nav">
							@if($navList) @foreach($navList as $nav)
							<li>
								@if(!empty($nav['son']))
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$nav['nav_name']}}</a>
								@else
								<a href="{{$nav['jump_url']}}" >{{$nav['nav_name']}}</a>
								@endif
								@if(!empty($nav['son']))
								<ul class="dropdown-menu" role="menu">
									@foreach($nav['son'] as $val)
									<li><a href="{{$val['jump_url']}}">{{$val['nav_name']}}</a></li>
						            @endforeach 
								</ul>
								@endif
							</li>
							@endforeach @endif

						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</header>

