@include('Themes.PithyHome.Common.header');
		
		<div class="container">
			<div class="head-text">
				<h1>@if(isset($sets['IndexTitle'])) {{$sets['IndexTitle']}} @endif</h1>
				<p class="lead-text">@if(isset($sets['IndexText'])) {{$sets['IndexText']}} @endif</p>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-fluid post-medium-vertical">
						<!-- Start Index Posts-->
						<div class="container-fluid post-single">
							<div class="container-medium">
								<div class="row post-items">
								@if(!empty($artList) && isset($artList))
								@foreach($artList as $key => $val)
									<div class="col-md-12">
										<div class="post-item">
											<div class="post-item-paragraph">
												<div>
													<a href="#" class="quick-read qr-only-phone"><i class="fa fa-eye"></i></a>
													<a href="javascript:void(0);" class="mute-text">{{date('d  F  Y', strtotime($val->updated_at))}}</a>
												</div>
												<h3><a href="/details/{{$val->title}}">{{mb_substr($val->title, 0, 30)}}...</a></h3>
												<p class="five-lines">{{mb_substr($val->html, 0, 120) }}<a href="/details/{{$val->title}}">[...]</a></p>
											</div>
											<div class="post-item-info clearfix">
												<div class="pull-left">
													By　<a href="/author/index/{{$val->admin->id}}">{{$val->admin->name}}</a>   •   {{$val->cat->cat_name}}
												</div>
												<div class="pull-right post-item-social">
													<!--<a href="#{{$val->title}}" class="quick-read qr-not-phone"><i class="fa fa-eye"></i></a>-->
													<!--<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>-->
													<!--<a href="#" class="post-like"><i class="fa fa-heart"></i><span>{{$val->like_num}}</span></a>-->
													<a href="#"><i class="fa fa-eye"></i><span>&nbsp;{{$val->read_num}}</span></a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								@endif
								</div>
							</div>
						</div>
						<!-- End Index Posts-->
						<!--
						<div class="row">
							<div class="col-md-12">
								<a href="medium-image-v1-2.html" class="post-nav post-older">OLDER →</a>
							</div>
						</div>
						-->

					</div>
				</div>

				<aside class="col-md-4">

					<div class="laread-right">
						<form class="laread-form search-form" action="/search" method="get">
							<div class="input"><input type="text" name="title" value="{{$title}}" class="form-control" placeholder="Search..."></div>
							<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
						</form>

						<ul class="laread-list">
							<li class="title">CATEGORY</li>
							@if(!empty($catList))
							@foreach($catList as $val)
								<li><a href="/list/category-{{$val->cat_name}}">{{$val->cat_name}}</a><i class="line"></i></li>
							@endforeach
							@endif
						</ul>

						<ul class="laread-list">
							<li class="title">RECENT POSTS</li>
							@if(!empty($recList))
							@foreach($recList as $val)
								<li><a href="/details/{{$val->title}}">{{mb_substr($val->title, 0, 15)}}...</a><i class="date">{{date('d F', strtotime($val->updated_at))}}</i></li>
							@endforeach
							@endif
						</ul>
						<!-- 标签
						<ul class="laread-list">
							<li class="title">TAGS</li>
							<li class="bar-tags">
								@if(!empty($tagList))
								@foreach($tagList as $val)
									<a href="/list/tag-{{$val->tag_name}}">{{$val->tag_name}}</a>
								@endforeach
								@endif
							</li>
						</ul>
						-->
						<!-- 订阅
						<ul class="laread-list barbg-grey">
							<li class="title">NEWSLETTER</li>
							<li class="newsletter-bar">
								<p>Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit.</p>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="text" class="form-control" placeholder="john@doe.com">
									<span class="input-group-btn">
										<button class="btn" type="button"><i class="fa fa-check"></i></button>
									</span>
								</div>
							</li>
						</ul>
						-->
						<!-- 座右铭
						<div class="laread-list quotes-basic">
							<i class="fa fa-quote-left"></i>
							<p>“The difference between stupidity and genius is that genius has its limits.”</p>
							<span class="whosay">- Albert Einstein </span>
						</div>
						-->
						<ul class="laread-list social-bar">
							<li class="title">FOLLOW US</li>
							<li class="social-icons">
								@if(isset($sets['Facebook']))
								<a href="{{$sets['Facebook']}}"><i class="fa fa-facebook"></i></a>
								@endif
								@if(isset($sets['Twitter']))
								<a href="{{$sets['Twitter']}}"><i class="fa fa-twitter"></i></a>
								@endif
								@if(isset($sets['SinaWeibo']))
								<a href="{{$sets['SinaWeibo']}}"><i class="fa fa-weibo"></i></a>
								@endif
								<!--<a href="#"><i class="fa fa-dribbble"></i></a>-->
							</li>
						</ul>
						

					</div>

				</aside>
			</div>
		</div>

		<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo"><img src="/assets/img/logo-black.png" alt=""></div>
				<p class="laread-motto">{{$sets['FootNews']}}-{{$sets['RecordNum']}}</p>
				<div class="laread-social">
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-pinterest"></a>
				</div>
			</div>
		</footer>
	</div>
<!-- 文章详情 begin -->
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
									<a href="assets/img/banner-85-1.jpg" data-fluidbox-qr><img src="assets/img/banner-85.jpg" alt=""></a>
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

	<!-- Login Modal -->
	<div class="modal leread-modal fade" id="login-form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" id="login-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Sign In</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="linkbox">
							<a href="#">Forgot password ?</a>
							<span>No account ? <a href="#" id="register-btn" data-toggle="modal" data-target="#register-form">Sign Up.</a></span>
							<span class="form-warning"><i class="fa fa-exclamation"></i>Fill the require.</span>
						</div>
						<div class="linkbox">
							<label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
							<button type="button" class="btn btn-golden btn-signin">SIGN IN</button>
						</div>
					</form>				
				</div>
				<div class="modal-footer">
					<div class="provider">
						<span>微信扫码登录</span>
						<!--<a href="#"><i class="fa fa-facebook"></i></a>-->
						<a href="#"><i class="fa fa-wexin"></i></a>
						
					</div>
				</div>
			</div>
			<div class="modal-content" id="register-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-lock"></i>LaRead Sign Up</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input class="form-control" placeholder="Name">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" placeholder="Password">
						</div>
						<div class="linkbox">
							<span>Already got account? <a href="#" id="login-btn" data-target="#login-form">Sign In.</a></span>
						</div>
						<div class="linkbox">
							<label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
							<button type="button" class="btn btn-golden btn-signin">SIGN UP</button>
						</div>
					</form>
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
