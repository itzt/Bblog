@include('Themes.PithyHome.Common.header');


		<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-author-detail">
					<div class="author-picture">
						<img src="{{$authorList[0]->admin->avatar}}" alt="" />
					</div>
					<div class="author-subdetail">
						<h2>{{$authorList[0]->admin->name}}</h2>
						<p class="info-small">{{$authorList[0]->admin->profession}}</p>
						<p class="author-bio">{{$authorList[0]->admin->introduce}}</p>
						<p class="info-small">
							<span><i class="fa fa-map-marker"></i> {{$authorList[0]->admin->address}}</span>
							<span><i class="fa fa-paper-plane"></i> {{$authorList->count()}} Posts</span>
							<a href="#"><i class="fa fa-envelope"></i> {{$authorList[0]->admin->email}}</a>
						</p>
						<button type="button" class="btn btn-golden btn-golden-hover btn-rounded">Following</button>
					</div>
				</div>

				<div class="row author-article-list">
					<div class="article-list-box">
						<!-- <div class="article-type clearfix" role="tablist">
							<ul>
								<li role="presentation" class="active">
									<a href="#lastest" id="lastest-tab" role="tab" data-toggle="tab" aria-controls="lastest" aria-expanded="true">LATEST</a>
								</li>
								<li role="presentation">
									<a href="#popular" role="tab" id="popular-tab" data-toggle="tab" aria-controls="popular">POPULAR</a>
								</li>
							</ul>
						</div> -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="lastest" aria-labelledBy="lastest-tab">
								<ul class="article-list">
@if(!empty($authorList))
@foreach($authorList as $val)
	<li>
		<div class="media clearfix">
			<div class="media-right"><a href="#" class="article-number hidden-xs">{{$val->read_num}}</a></div>
			<div class="media-body">
				<h4 class="media-heading"><a href="/index/details/{{$val->title}}">{{mb_substr($val->title, 0, 30)}}</a></h4>
				<p>{{mb_substr($val->html, 0, 120)}}...</p>
				<div class="article-info"><span class="visible-xs-inline">21 June  •  </span><a href="#">{{$val->cat->cat_name}}</a>  •  <a href="#">{{count($val->comments)}} comments</a></div>
			</div>
		</div>
	</li>
@endforeach
@endif
								</ul>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="popular" aria-labelledBy="popular-tab">
								<ul class="article-list">
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">28</a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Long Live The Kings - Short Film Documentary</a></h4>
												<p>Sed risus quam, dignissim a commodo sed, semper ac dolor. Nulla facilisi. Suspendisse nunc leo, hendrerit vestibulum pharetra in, consectetur quis sapien.</p>
												<div class="article-info"><span class="visible-xs-inline">12 June  •  </span><a href="#">Fashion</a>  •  <a href="#">6 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">27</a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">The Joy of Snowsex</a></h4>
												<p>Nunc facilisis pulvinar tempor. Vivamus at nunc vel neque semper ullamcorper. Nullam facilisis vestibulum hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												<div class="article-info"><span class="visible-xs-inline">21 June  •  </span><a href="#">Fashion</a>  •  <a href="#">18 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">21</a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Turkish Coffee Culture History</a></h4>
												<p>Morbi pharetra fringilla purus, sit amet pellentesque urna lobortis ut. Aenean imperdiet urna a lectus imperdiet consequat. Fusce eu nibh metus.</p>
												<div class="article-info"><span class="visible-xs-inline">18 June  •  </span><a href="#">Brand</a>  •  <a href="#">12 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">16</a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Sam Feldt - Show Me Love (Out Now)</a></h4>
												<p>Sed vel magna leo, in pretium nunc. Ut ornare turpis vel ipsum vulputate lacinia. Pellentesque blandit sagittis tempor. Curabitur adipiscing est vitae quam bibendum at euismod ligula dignissim.</p>
												<div class="article-info"><span class="visible-xs-inline">16 June  •  </span><a href="#">Fashion</a>  •  <a href="#">16 comments</a></div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a href="#" class="more-down"><i class="fa fa-long-arrow-down"></i></a>
				</div>
			</div>

		</div><!-- /.container -->

		<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo"><img src="assets/img/logo-black.png" alt=""></div>
				<p class="laread-motto">Designed for Read.</p>
				<div class="laread-social">
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-pinterest"></a>
				</div>
			</div>
		</footer>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	@include('Themes.PithyHome.Common.footer');
</body>
</html>
