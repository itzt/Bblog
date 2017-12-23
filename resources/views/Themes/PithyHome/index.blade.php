@include('Themes.PithyHome.Common.header');

		<div class="container">
			<div class="head-text">
				<h1>LaRead</h1>
				<p class="lead-text">Blog. Designed for Read.</p>
			</div>
		</div>

		<div class="post-fluid large-image-v1">
			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<!-- <div class="post-item-banner">
							<img src="/assets/img/img-01.png" alt="" />
                        </div> -->
						<div class="form-group archive-search">
							<input type="search" class="form-control" placeholder="In case you’re lost, just search...">
							<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
						</div>
                    @if(!empty($artList) && isset($artList))
                    @foreach($artList as $key => $val)
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">{{date('d', strtotime($val->updated_at))}}</span>
								<span class="small-text">{{date('F', strtotime($val->updated_at))}} {{date('Y', strtotime($val->updated_at))}}</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="post-item-paragraph">
                                    <h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
                                        <a href="/index/details/{{$val->title}}">{{$val->title}}</a>
                                    </h2>
									<p class="ellipsis-fade-six">{{mb_substr($val->html, 0, 120)}}<a href="#" class="more">[...]</a></p>
								</div>
								<div class="post-item-info clearfix">
									<div class="pull-left">
										By <a href="#">{{$val->author}}</a>   •   <a href="#">{{$val->read}}</a>
									</div>
									<div class="post-item-social">
										<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
                        </div>
                    @endforeach
                    @endif
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">26</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a><a href="#">Workshop: Brand Asset Management</a></h2>
									<p>Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. Cras odio tortor, feugiat nec sagittis sed, laoreet ut mauris. In hac habitasse platea dictumst. Mauris non libero ligula, sed volutpat mauris. Duis facilisis elementum nisl, non aliquam enim tincidunt vitae. Donec laoreet est vitae erat auctor porttitor. Curabitur orci enim, congue at egestas a, feugiat luctus massa. Sed risus quam, dignissim a commodo sed, semper ac dolor. <a href="#" class="more">[...]</a></p>
								</div>
								<div class="post-item-info clearfix">
									<div class="pull-left">
										By <a href="#">Morris Math</a>   •   <a href="#">19 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="post-item-banner lg-banner">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img src="/assets/img/img-01.png" alt="" />
									</div>
									<div class="item">
										<img src="/assets/img/img-01.png" alt="" />
									</div>
									<div class="item">
										<img src="/assets/img/img-01.png" alt="" />
									</div>
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
							</div>
						</div>
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">25</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a><a href="#">Harbiye Open Air Concerts</a></h2>
									<p class="six-lines">Ornare turpis vel ipsum vulputate lacinia. Pellentesque blandit sagittis tempor. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, lorem eget fringilla libero sagittis animous ledra sitemah eget. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. Cras odio tortor, feugiat nec sagittis sed, laoreet ut mauris. In hac habitasse platea dictumst. Mauris non libero ligula, sed volutpat mauris. Duis facilisis elementum nisl, non aliquam enim tincidunt vitae. Donec laoreet est vitae erat auctor porttitor. Curabitur orci enim, congue at egestas a, feugiat luctus massa. Sed risus quam, dignissim a commodo sed, semper ac dolor. Nulla facilisi. Suspendisse nunc leo, hendrerit vestibulum pharetra in, consectetur quis sapien. </p>

								</div>
								<div class="post-item-info clearfix">
									<div class="pull-left">
										By <a href="#">Gannon Burget</a>   •   <a href="#">31 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="post-item-banner embed-responsive embed-responsive-16by9">
							<iframe src="https://player.vimeo.com/video/49445992" class="embed-responsive-item" allowfullscreen></iframe>
						</div>
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">23</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a><a href="#">Long Live The Kings - Short Film</a></h2>
									<p class="ellipsis-fade-six">Sed vel magna leo, in pretium nunc. Ut ornare turpis vel ipsum vulputate lacinia. Pellentesque blandit sagittis tempor. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. Cras odio tortor, feugiat nec sagittis sed, laoreet <a href="#" class="more"></a></p>
								</div>
								<div class="post-item-info clearfix">
									<div class="pull-left">
										By <a href="#">Justin Freen</a>   •   <a href="#">23 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="post-item-banner embed-responsive embed-responsive-16by9">
							<iframe  class="embed-responsive-item" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/186983384&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
						</div>
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">23</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a><a href="#">Show Me Love (Out Now)</a></h2>
									<p>Sed vel magna leo, in pretium nunc. Ut ornare turpis vel ipsum vulputate lacinia. Pellentesque blandit sagittis tempor. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. <a href="#" class="more">[...]</a></p>
								</div>
								<div class="post-item-info clearfix">
									<div class="pull-left">
										By <a href="#">Gannon Burget</a>   •   <a href="#">62 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">22</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="in-quote">
									<img src="/assets/img/img-02.png" alt="" />
									<div class="block-overlay">
										<div class="overlay-quote">
											<span class="quote-icon">“</span>
											<a href="#" class="spot">The difference between a successful person and others is not a lack of strength, not a lack of knowledge, but rather a lack of will.</a>
											<span class="name">- Vince Lombardi</span>
										</div>
									</div>
								</div>
								<div class="post-item-info no-border clearfix">
									<div class="pull-left">
										By <a href="#">Daniele Zedda</a>   •   <a href="#">46 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="col-md-2">
							<div class="post-item-short">
								<span class="big-text">21</span>
								<span class="small-text">June 2015</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="post-item">
								<div class="in-link">
									<img src="/assets/img/img-03.png" alt="" />
									<div class="block-overlay">
										<div class="overlay-link">
											<i class="fa fa-link fa-rotate-90"></i>
											<a href="#">http://themeforest.net/category/wordpress</a>
											<span class="link-text">Inside - Personal or Corparete<br />Flexible and Multipurpose WP Theme</span>
										</div>
									</div>
								</div>
								<div class="post-item-info no-border clearfix">
									<div class="pull-left">
										By <a href="#">Jared Erondu</a>   •   <a href="#">18 Comments</a>
									</div>
									<div class="post-item-social">
										<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
										<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="row default-post-nav">
			<div class="container">
				<div class="col-md-10 col-md-offset-2">
					<a href="large-image-v1-2.html" class="post-nav post-older">OLDER →</a>
				</div>
			</div>
		</div>

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
<script>
$(function(){
	$('.weixin-sign').click(function(){
		var index = layer.load(1, {
  			shade: [0.1,'#fff'] //0.1透明度的白色背景
		});

		layer.open({
			type: 2,
			title: '',
			shadeClose: true,
			shade: 0.8,
			area: ['380px', '60%'],
			content: '/auth/weixin' //iframe的url
		}); 

	})
})
</script>
</html>
