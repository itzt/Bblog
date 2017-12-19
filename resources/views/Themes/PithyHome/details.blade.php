@include('Themes.PithyHome.Common.header');


		<div class="container">
			<div class="head-text text-highlight">
				<h1>TYPOGRAPHY</h1>
				<p class="lead-text">H1   •   HIGHTLIGH   •   DROPCAP</p>
			</div>
		</div>

		<section class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="post-item-banner">
							<img src="/assets/img/img-44.png" alt="" />
						</div>
						<div class="col-md-2">
							<div class="post-item-short">
								<!-- <span class="big-text">{{$artFind->updated_at}}</span> -->
								<span class="small-text">{{$artFind->updated_at}}</span>
							</div>
						</div>
						<div class="col-md-10 ">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a>{{$artFind->title}}</h2>
									<p class="post-item-two-column">
										{!! Parsedown::instance()->setMarkupEscaped(true)->text($artFind->html) !!}
									</p>
									<br /><br />
								</div>
								<div class="post-item-info no-border clearfix">
									<p class="post-tags">
										<a href="#">fashion</a>
										<a href="#">culture</a>
										<a href="#">art</a>
									</p>
									<div class="post-item-social">
										<!-- <a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a> -->
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i> 12</a>
										<a href="#"><i class="fa fa-heart"></i> {{$artFind->like_num}}</a>
									</div>
								</div>
							</div>

							<div class="next-prev-post clearfix">
								<div class="post-direction">
									@if(!empty($prevNext[0]) && isset($prevNext[0]))									
									<a href="/index/details/{{$prevNext[0]->title}}" class="post-prev">
										<span class="post-way"><i class="fa fa-angle-left"></i> prev post</span>
										<span class="title">{{mb_substr($prevNext[0]->title, 0, 30)}}...</span>
									</a>
									@else
									<a href="/index/details/{{$prevNext[0]->title}}" class="post-prev">
										<span class="post-way"><i class="fa fa-angle-left"></i> prev post</span>
										<span class="title">No more.</span>
									</a>
									@endif
									@if(!empty($prevNext[0]) && isset($prevNext[0]))
									<a href="javascript:void(0)">
										<span class="author">by 
											<span>{{$prevNext[0]->author}}</span>
										</span>
									</a>
									@endif
								</div>
								<div class="post-direction">
									@if(!empty($prevNext[1]) && isset($prevNext[1]))
									<a href="/index/details/{{$prevNext[1]->title}}" class="post-next">
										<span class="post-way">next post<i class="fa fa-angle-right"></i></span>
										<span class="title">{{mb_substr($prevNext[1]->title, 0, 30)}}...</span>
									</a>
									@else
									<a href="javascript:void(0)" class="post-next">
										<span class="post-way">next post<i class="fa fa-angle-right"></i></span>
										<span class="title">No more.</span>
									</a>
									@endif
									@if(!empty($prevNext[1]) && isset($prevNext[1]))
									<a href="javascript:void(0)">
										<span class="author">by 
											<span>{{$prevNext[1]->author}}</span>
										</span>
									</a>
									@endif
								</div>
							</div>

							<div class="author-box">
								<div class="author">
									<a class="author-photo" href="#"><img src="/assets/img/profil_photo-04.png" alt=""></a>
									<div class="author-body">
										<h4 class="author-name">Daniele Zedda</h4>
										<a href="#">view all post</a>
									</div>
									<div class="author-connection">
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-envelope"></i></a>
									</div>
								</div>
							</div>
							<!-- 评论回复 -->
							<div class="comment-box">
								<a class="btn btn-golden" href="#">Leave a comment</a>
								<div class="comment-tab">
									<a href="#" class="comment-info">Comments ({{count($data)}})</a>
									<i class="i">|</i>
									<a href="#" class="comment-info"><i class="fa fa-comments"></i> Show all</a>
								</div>

								<div class="comment-block">
									@if(!empty($data))
									@foreach($data as $v)
									<div class="comment-item">
										<a class="comment-photo" href="#">
											<img src="/assets/img/profil_photo-05.png" alt="" />
										</a>
										<div class="comment-body">
											<h6 class="comment-heading">{{$v['nickname']}}  •   <span class="comment-date">{{$v['created_at']}}</span></h6>
											<p class="comment-text">{{$v['content']}}</p>
											<a href="javascript:void(0)" class="comment-reply active-comment reply" name="{{$v['nickname']}}" id="{{$v['com_id']}}"><i class="reply-icon"></i > Reply</a>
										</div>	
									</div>
									<div class="comment-form main-comment-form"  style='display:none;'>
										<form id='signupForm'>
										{{csrf_field()}} 
										<textarea class="comment-textarea"  name="content" id='huifu'  placeholder="Leave a comment..."></textarea>
										<div class="at-focus">
											<input type="hidden" name='post_id' value='{{$pid}}'>
											<input type="hidden" name='parent_id' value="{{$v['com_id']}}">
											<input class="comment-input"id='nickname' name='nickname' placeholder="Name" type="text" />
											<input class="comment-input" id='email' name='email' placeholder="or Email" type="text" />
										</div>
										<button class="comment-submit btn-golden">Post Comment</button>

										</form>
									</div>
										@if(!empty($data))
										@foreach($v['children'] as $val)
											<div class="comment-item">
												<a class="comment-photo" href="#">
													<img src="/assets/img/profil_photo-05.png" alt="" />
												</a>
												<div class="comment-body">
													<h6 class="comment-heading">{{$val['nickname']}}  •   <span class="comment-date">{{$val['created_at']}}</span></h6>
													<p class="comment-text">{{$val['content']}}</p>
													<a href="javascript:void(0)" class="comment-reply active-comment reply" name="{{$val['nickname']}}" id="{{$val['com_id']}}"><i class="reply-icon"></i > Reply</a>
												</div>	
											</div>
											<div class="comment-form main-comment-form"  style='display:none;'>
											<form id='signupForm'>
											{{csrf_field()}} 
											<textarea class="comment-textarea"  name="content" id='huifu'  placeholder="Leave a comment..."></textarea>
											<div class="at-focus">
												<input type="hidden" name='post_id' value='{{$pid}}'>
												<input type="hidden" name='parent_id' value="{{$val['com_id']}}">
												<input class="comment-input"id='nickname' name='nickname' placeholder="Name" type="text" />
												<input class="comment-input" id='email' name='email' placeholder="or Email" type="text" />
											</div>
											<button class="comment-submit btn-golden">Post Comment</button>
	
											</form>
										</div>
										@endforeach
										@endif
								   @endforeach
								   @endif
									<div class="comment-form main-comment-form">
									<!-- 进行评论 -->
										<form id='signupForm'>
										{{csrf_field()}} 
											<textarea class="comment-textarea"  name="content" id="content" placeholder="Leave a comment..."></textarea>
											<div class="at-focus">
												<input type="hidden" name='post_id' value='{{$pid}}'>
												<input class="comment-input"id='nickname' name='nickname' placeholder="Name" type="text" />
												<input class="comment-input" id='email' name='email' placeholder="or Email" type="text" />
												<button class="comment-submit btn-golden">Post Comment</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo"><img src="/assets/img/logo-black.png" alt=""></div>
				<p class="laread-motto">Designed for Read.</p>
				<div class="laread-social">
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-pinterest"></a>
				</div>
			</div>
		</footer>
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
								<h2>A Nice Street Cafe in London</h2>

								<p>Consectetur adipiscing elit. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. Cras odio tortor, feugiat nec sagittis sed, laoreet ut mauris. In hac habitasse platea dictumst.</p>

								<p>What if instead your website used machine learning to build itself, and then rebuilt as necessary, based on data it was gathering about how it was being used? That's what The Grid is aiming to do. After you add content such as pictures, text, the stuff everyone enjoys interacting with your obligation to design...</p>

								<h4>The Truth about Teens and Privacy</h4>

								<p>Social media has introduced a new dimension to the well-worn fights over private space and personal expression. Teens do not want their parents to view their online profiles or look over their shoulder when they’re chatting with friends. Parents are no longer simply worried about what their children wear out of the house but what they photograph themselves wearing in their bedroom to post online. Interactions that were previously invisible to adults suddenly have traces, prompting parents to fret over.</p>

								<h4>Here are some of the ways you may be already being hacked:</h4>

								<ul class="in-list">
									<li>Everyone makes mistakes</li>
									<li>You can control only your behavior</li>
									<li>Good habits create discipline</li>
									<li>Remember the <u>big picture</u></li>
									<li>Everyone learns differently</li>
									<li>Focus on the Benefits, Not the Difficulties</li>
									<li>Traditions are bonding opportunities</li>
								</ul>

								<p>This is not a comprehensive list. Rather, it is a snapshot in time of real-life events that are happening right now. In the future, we will likely read this list and laugh at all the things I failed to envision.</p>
								<p class="with-img">
									<a href="assets/img/banner-85-1.jpg" data-fluidbox-qr><img src="/assets/img/banner-85.jpg" alt=""></a>
									<span class="img-caption">Walk through the Forest</span>
								</p>
								<p>Elit try-hard consectetur, dolore voluptate minim distillery. Bespoke Cosby sweater pug street art et keytar. Nihil fish whatever trust fund, dreamcatcher in fingerstache squid seitan accusamus. Organic Wes Anderson High Life setruhe authentic iPhone, aute art party hashtag fixie church-key art veniam Tumblr polaroid. DIY polaroid vinyl, sustainable hella scenester accusamus fanny pack. Ut Neutra enim pariatur cornhole actually Banksy, tote bag fugiat ad accusamus. Incididunt fixie normcore fingerstache. Freegan proident literally brunch before they sold out.
								</p>

								<p>Readymade fugiat narwhal, typewriter VHS aute stumptown hoodie irure put a bird on it. Fashion axe raw denim brunch put a bird on it voluptate Truffaut. Bitters PBR&amp;B nulla Odd Future swag leggings. Banh mi Wes Anderson butcher letterpress skateboard quis. Chambray hella retro viral Cosby sweater photo booth. Schlitz elit Cosby sweater, Blue Bottle non chambray chia. Single-origin coffee pickled.</p>

								<h5>Blockquote</h5>

								<p>Do officia aliqua, pop-up ut et occupy sriracha. YOLO meggings PBR sartorial mollit, Schlitz assumenda vero kitsch plaid post-ironic PBR&amp;B keffiyeh. Cosby sweater wolf YOLO Austin bespoke, American Apparel crucifix paleo flexitarian. Aliquip bitters food truck, incididunt tofu accusamus magna nesciunt typewriter drinking vinegar Shoreditch try-hard you probably haven’t heard of them labore. </p>

								<blockquote>
									<p><i>“The Muppets Take Manhattan”</i><br />
									This movie was a disappointment. The Muppets do not take Manhattan at all. They merely visit it.<br />
									<span>— No stars.</span></p>
								</blockquote>

								<p>Do officia aliqua, pop-up ut et occupy sriracha. YOLO meggings PBR sartorial mollit, Schlitz assumenda vero kitsch plaid post-ironic PBR&amp;B keffiyeh. Cosby sweater wolf YOLO Austin bespoke, American Apparel crucifix paleo flexitarian. Aliquip bitters food truck, incididunt tofu accusamus.</p>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="quick-read-bottom">
			<p class="qr-info">By <a href="#">Daniele Zedda</a>   •   18 February</p>
			<div class="qr-nav">
				<a href="#" class="qr-prev">← PREV POST</a>
				<a href="#" class="qr-share" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"><i class="fa fa-share-alt"></i></a>
				<a href="#" class="qr-comment"><i class="fa fa-comment"></i></a>
				<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
				<a href="#" class="qr-next">NEXT POST →</a>
			</div>
		</div>
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
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
@include('Themes.PithyHome.Common.footer');
</body>
</html>


<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script src="/assets/js/jquery.form.js"></script>
<script>
$().ready(function() {
	$('.reply').click(function(){
	$(this).parents('.comment-item').next().toggle();
	})

	$('.btn-golden').click(function(){
		$("#signupForm").submit();
	})
// 在键盘按下并释放及提交后验证提交表单
 	$("#signupForm").validate({
		rules: {
        nickname:"required",
		email:"required",
		content:"required",
	
		},
		messages: {
			nickname: "	<span style='color:red;'>请输入您的昵称</span>",
			email:"<span style='color:red;'>请输入您的邮箱</span>",
			content:"<span style='color:red;'>请输入内容</span>", 
		},
	    onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type:'post',
                url:'/comment/index',
				success:function ($data) {
					layer.msg('添加成功',{icon:1,time:1000});
					window.location.reload();
                },
				error:function ($data) {
                    layer.msg('添加失败',{icon:0,time:1000});
                }
			});
        }
    })
});
</script>
