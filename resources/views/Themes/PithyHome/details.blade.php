@include('Themes.PithyHome.Common.header');


		<div class="container">
			<div class="head-text text-highlight">
				<h1>{{$artFind->title}}</h1>
				<p class="lead-text"><i class="fa fa-at"></i></a>&nbsp;{{$artFind->admin->name}}   •   <i class="fa fa-eye"></i></a>&nbsp;{{$artFind->read_num}}</p>
			</div>
		</div>

		<section class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<!--
						<div class="post-item-banner">
							<img src="/assets/img/img-44.png" alt="" />
						</div>
						-->
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">{{date('d', strtotime($artFind->updated_at))}}</span>
								<span class="small-text">{{date('F', strtotime($artFind->updated_at))}} {{date('Y', strtotime($artFind->updated_at))}}</span>
							</div>
						</div>
						<div class="col-md-10 ">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-expand"></i></a></h2>
									<p class="post-item-two-column">
										{!! Parsedown::instance()->setMarkupEscaped(true)->text($artFind->html) !!}
									</p>
									<br /><br />
								</div>
								<div class="post-item-info no-border clearfix">
									<p class="post-tags">
										@if(!empty($tags)) @foreach($tags as $tag)
										<a href="/list/tag-{{$tag->tag_name}}">{{$tag->tag_name}}</a>
										@endforeach @endif
									</p>
									<!-- 暂时关闭分享
									<div class="post-item-social">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i> 12</a>
										<a href="#"><i class="fa fa-heart"></i> {{$artFind->like_num}}</a>
									</div>
									-->
								</div>
							</div>

							<div class="related-post">
								<h6>RELATED POST</h6>
								<ul>
									@if(!$recommendPosts->isEmpty()) @foreach($recommendPosts as $post)
									<li>
										<a href="/details/{{$post->title}}">
											<span class="title">{{$post->title}}</span>
										</a>
										<a href="/author/index/{{$post->author}}">
											<span class="info">by <span class="name">{{$post->admin->name}}</span>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;{{App\Tools\beautify_date($post->created_at)}}</span>
										</a>
									</li>
									@endforeach @endif

								</ul>
							</div>
				
							<div class="author-box">
								<div class="author">
									<a class="author-photo" href="/author/index/{{$artFind->author}}"><img class="round" style="border-radius: 70px;" src="{{$artFind->admin->avatar}}" width="70px" height="70px" alt=""></a>
									<div class="author-body">
										<h4 class="author-name">{{$artFind->admin->name}}</h4>
										<a href="/author/index/{{$artFind->author}}">view all post</a>
									</div>
									<div class="author-connection">
										@if(!empty($artFind->admin->twitter))
										<a href="{{$artFind->admin->twitter}}"><i class="fa fa-twitter"></i></a>
										@endif
										@if(!empty($artFind->admin->facebook))
										<a href="{{$artFind->admin->facebook}}"><i class="fa fa-facebook"></i></a>
										@endif
										@if(!empty($artFind->admin->sina_weibo))
										<a href="{{$artFind->admin->sina_weibo}}"><i class="fa fa-weibo"></i></a>
										@endif										
										<a href="/contacts" target="_blank"><i class="fa fa-envelope"></i></a>
									</div>
								</div>
							</div>
							<!-- 评论回复 -->
							@if($artFind->is_allow)
							<div class="comment-box">
								<a class="btn btn-golden" href="#">Leave a comment</a>
								<div class="comment-tab">
									<a href="#" class="comment-info">Comments ({{count($data)}})</a>
									<i class="i">|</i>
									<a href="#" class="comment-info"><i class="fa fa-comments"></i> Show all</a>
								</div>

								<div class="comment-block">
									<!-- comment start -->
									@if(!empty($data)) @foreach($data as $v)
									<div class="comment-item">
										<a class="comment-photo" href="#">
											<img class="round" style="border-radius: 70px;" width="70px" height="70px" src="@if(is_object($v->user)&&!empty($v->user->avatar)) {{$v->user->avatar}} @else /assets/img/profil_photo-05.png @endif" title="" alt="" />
										</a>
										<div class="comment-body">
											<h6 class="comment-heading">{{$v['nickname']}}  •   <span class="comment-date">{{App\Tools\beautify_date($v['created_at'])}}</span></h6>
											<p class="comment-text">{{$v['content']}}</p>
											<a href="javascript:void(0)" class="comment-reply active-comment reply" nickname="{{$v['nickname']}} "><i class="reply-icon"></i > Reply</a>
										
											<!-- replay start -->
											@if(isset($v['children'])&&is_array($v['children'])) @foreach($v['children'] as $val)
													<div class="comment-item">
														<a class="comment-photo" href="#">
															<img src="/assets/img/profil_photo-05.png" alt="" />
														</a>
														<div class="comment-body">
															<h6 class="comment-heading">{{$val['nickname']}}  •   <span class="comment-date">{{App\Tools\beautify_date($val['created_at'])}}</span></h6>
															<p class="comment-text">{{$val['content']}}</p>
															<a href="javascript:void(0)" class="comment-reply active-comment reply" nickname="{{$val['nickname']}} "><i class="reply-icon"></i > Reply</a>
														</div>	
													</div>
													<div class="comment-form main-comment-form" style="display:none;">
													<textarea class="comment-textarea"  name="content" id="content" placeholder="Leave a comment..."></textarea>
													<div class="at-focus">
														<button class="comment-submit btn-golden" id='{{$val['com_id']}}'>Post Comment</button>
													</div>
													</div>
											@endforeach @endif
											<!-- replay end -->
										</div>	
									</div>
									<div class="comment-form main-comment-form" style="display:none;">
									<textarea class="comment-textarea"  name="content" id="content" placeholder="Leave a comment..."></textarea>
									<div class="at-focus">
										<button class="comment-submit btn-golden" id='{{$v['com_id']}}'>Post Comment</button>
									</div>
							     	</div>
								   @endforeach @endif
								   <!-- comment end -->
								   
									<div class="comment-form main-comment-form">
											<textarea class="comment-textarea" placeholder="Leave a comment..."></textarea>
											<div class="at-focus">
												<!--
												<input class="comment-input"  name='nickname' placeholder="Name" type="text" />
												<input class="comment-input"  name='email' placeholder="or Email" type="text" />
												-->
												<button class="comment-submit  btn-comment">Post Comment</button>
											</div>
									</div>

								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>

		@include('Themes.PithyHome.Common.copyright');
	</div>

	<div id="quick-read" class="qr-white-theme">
		<div class="quick-read-head">
			<div class="container">
				<a href="#" class="qr-logo"></a>
				<div class="qr-tops">
					<a href="#" class="qr-search-close"><i class="fa fa-times"></i></a>
					<a href="#" class="qr-search"><i class="fa fa-search"></i></a>
					<a href="#" class="qr-change"><i class="fa fa-adjust"></i></a>
					<a href="#" class="qr-close"><i class="fa fa-times"></i></a>
				</div>
				<form class="qr-search-form">
					<input type="text" placeholder="Search LaRead">
				</form>
			</div>
		</div>
		<div class="quick-dialog">
			<div class="quick-body">
				<div class="container">
					<div class="col-md-8 col-md-offset-2">
						<div class="qr-content post-item-paragraph">

							<article>
								{!! Parsedown::instance()->setMarkupEscaped(true)->text($artFind->html) !!}
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="quick-read-bottom">
			<p class="qr-info">By <a href="#">{{$artFind->admin->name}}</a>   •   {{date('d', strtotime($artFind->updated_at))}} {{date('F', strtotime($artFind->updated_at))}}</p>
			<div class="qr-nav">
				<!--<a href="#" class="qr-prev">← PREV POST</a>-->
				<!--<a href="#" class="qr-share" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"><i class="fa fa-share-alt"></i></a>-->
				<a href="#" class="qr-comment"><i class="fa fa-comment"></i></a>
				<a href="#" class="qr-like"><i class="fa fa-eye"></i> {{$artFind->read_num}}</a>
				<!--<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>-->
				<!--<a href="#" class="qr-next">NEXT POST →</a>-->
			</div>
		</div>
		<!--
		<div class="quick-read-bottom qr-bottom-2 hide">
			<div class="qr-nav">
				<a href="#" class="qr-prev">← PREV POST</a>
				<p class="qr-info">By <a href="#">Daniele Zedda</a>   •   18 February</p>
				<a href="#" class="qr-next">NEXT POST →</a>
				<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
				<div class="qr-sharebox">
					<span>Share on</span>
					<a href='#'><i class='fa fa-facebook'></i></a>
					<a href='#'><i class='fa fa-twitter'></i></a>
				</div>
				
			</div>
		</div>
		-->
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
@include('Themes.PithyHome.Common.footer');
</body>
</html>

<script>
$().ready(function() {
	//评论
	$('.btn-comment').click(function(){
		var _this = $(this);
		var email=$(this).prev().val();
		var nickname=$(this).prev().prev().val();
		var content=$(this).parent().prev().val();
		
		$.ajax({
                'type':'post',
				'url' :'/details/comment',
				'data':{'content': content,'_token':"{{csrf_token()}}",'email':email,'nickname':nickname,'post_id':"{{$artFind->post_id}}"},
                'success':function(data)
                {
					var html = '<div class="comment-item">';
						html += '<a class="comment-photo" href="/author/index/'+data.data.user_id+'"><img class="round" style="border-radius: 70px;" width="70px" height="70px" src="'+data.data.avatar+'" alt="" /></a>';
						html += '<div class="comment-body">';
						html += '<h6 class="comment-heading">'+data.data.nickname+'   •   <span class="comment-date">1 seconds ago</span></h6>';
						html += '<p class="comment-text">'+content+'</p>';
						html += '<a href="#" class="comment-reply"><i class="reply-icon"></i> Reply</a>';
						html += '</div></div>';
					_this.parents('.comment-form').before(html);

                    // 200 请求，获取服务器消息与状态
                    layer.msg(data.message);

                },
                'error':function(data)
                {                

					var result = JSON.parse(data.responseText);
					
					if(data.status == 401)
					{
						//layer.msg(result.message);
						layer.open({
							type: 2,
							title: '',
							shadeClose: true,
							shade: 0.8,
							area: ['380px', '50%'],
							content: '/auth/weixin' //iframe的url
						}); 
					}
					else
					{
                    	// 非200/非301请求，获取错误消息
                    	layer.msg(result.message,{icon:result.status});
					}

                }			
		})

	})


	//回复
	$('.reply').click(function(){
	var nickname='@'+$(this).attr('nickname');
	$(this).parents('.comment-item').next().toggle();
	$(this).parents('.comment-item').next().children('#content').html(nickname);
	
	});
	$('.btn-golden').click(function(){
		var content=$(this).parent('.at-focus').prev().val();
		var id=$(this).prop('id');
		$.ajax({
			'type':'post',
			'url' :'/details/replay',
			'data':{'parent_id':id,'content': content,'_token':"{{csrf_token()}}",'post_id':"{{$artFind->post_id}}"},
			'success':function(result)
			{
				layer.msg(result.message);
			},
			'error':function(result)
			{
				var data = JSON.parse(result.responseText);
				if(result.status == 401)
				{
					//layer.msg(data.message);
					layer.open({
						type: 2,
						title: '',
						shadeClose: true,
						shade: 0.8,
						area: ['380px', '50%'],
						content: '/auth/weixin' //iframe的url
					}); 
				}
				else
				{
					// 非200/非301请求，获取错误消息
					layer.msg(data.message,{icon:data.status});
				}
			}
		})
	})

	


})

</script>
