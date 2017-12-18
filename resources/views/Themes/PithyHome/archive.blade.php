@include('Themes.PithyHome.Common.header');


		<section class="post-fluid">
			<div class="container-fluid">
				<div class="row archive-banner">
					<h1 class="archive-h1">Archive</h1>
					<p class="lead about-lead">Go back into time and read all the goodies we ever had to show you here on our blog </p>
					<form>
						<div class="form-group archive-search">
							<input type="search" class="form-control" placeholder="In case you’re lost, just search...">
							<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>

				<div class="row author-article-list">
					<div class="article-list-box">
						<div class="article-type clearfix">
							<ul class="with-line">
								<li role="presentation" class="active">
									<a href="#lastest" id="lastest-tab" role="tab" data-toggle="tab" aria-controls="lastest" aria-expanded="true">LATEST</a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#category-sub" aria-expanded="false" aria-controls="category-sub" id="category-tab">CATEGORY</a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#author-sub" aria-expanded="false" aria-controls="author-sub" id="author-tab">AUTHOR</a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#month-year-sub" aria-expanded="false" aria-controls="month-year-sub" id="month-year-tab">MONTH/YEAR</a>
								</li>
							</ul>
						</div>

						<div id="category-sub" class="tab-sub-content collapse">
							<div class="row">
								<ul class="category-sub">
									<li><a href="#">Branding<span>16</span></a></li>
									<li><a href="#">Design<span>14</span></a></li>
									<li><a href="#">Photography<span>42</span></a></li>
									<li><a href="#">Inspiration<span>37</span></a></li>
									<li><a href="#">Life<span>60</span></a></li>
									<li><a href="#">City<span>28</span></a></li>
								</ul>
							</div>
						</div>

						<div id="author-sub" class="tab-sub-content collapse">
							<div class="row">
								<ul class="author-sub">
									<li><a href="#">Justin Freen</a></li>
									<li><a href="#">Jared Erondu</a></li>
									<li><a href="#">Gannon Burget</a></li>
									<li><a href="#">Daniele Zedda</a></li>
									<li><a href="#">Morris Math</a></li>
								</ul>
							</div>
						</div>

						<div id="month-year-sub" class="tab-sub-content collapse">
							<div class="row">
								<div role="tabpanel">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane" id="tab-2015">
											<ul class="month-year-sub clearfix">
												<li><a href="#">January</a></li>
												<li><a href="#">February</a></li>
												<li><a href="#">March</a></li>
												<li><a href="#">April</a></li>
												<li><a href="#">May</a></li>
												<li><a href="#">June</a></li>
											</ul>
										</div>
										<div role="tabpanel" class="tab-pane in active" id="tab-2014">
											<ul class="month-year-sub clearfix">
												<li><a href="#">January</a></li>
												<li><a href="#">February</a></li>
												<li><a href="#">March</a></li>
												<li><a href="#">April</a></li>
												<li><a href="#">May</a></li>
												<li><a href="#">June</a></li>
												<li><a href="#">July</a></li>
												<li><a href="#">August</a></li>
												<li><a href="#">September</a></li>
												<li><a href="#">October</a></li>
												<li><a href="#">November</a></li>
												<li><a href="#">December</a></li>
											</ul>
										</div>
									</div>
									<ul role="tablist" class="tablist">
										<li><a href="#tab-2015" aria-controls="tab-2015" role="tab" data-toggle="tab">/2015</a></li>
										<li class="active"><a href="#tab-2014" aria-controls="tab-2014" role="tab" data-toggle="tab">/2014</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="lastest" aria-labelledBy="lastest-tab">
								<ul class="article-list">
									<li>
										<div class="media clearfix">
											<div class="media-right"><span class="article-number hidden-xs">27</span></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Meet #59 Interface Designer Kerem Suer</a></h4>
												<p>Duis nec volutpat leo. Nam mollis massa ut nibh blandit ac faucibus metus tincidunt. Cras sagittis facilisis dui, id posuere tortor aliquam in. Aenean rhoncus purus a tortor posuere at interdum mi venenatis.</p>
												<div class="article-info"><span class="visible-xs-inline">21 June  •  </span><a href="#">Fashion</a>  •  <a href="#">21 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><span class="article-number hidden-xs">25</span></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Workshop: Brand Asset Management</a></h4>
												<p>Nam arcu ante, sodales non cursus at, mattis vel libero. Fusce ullamcorper tincidunt nisi, eu consequat felis varius in. Proin venenatis rutrum metus ac ultricies.</p>
												<div class="article-info"><span class="visible-xs-inline">18 June  •  </span><a href="#">Brand</a>  •  <a href="#">18 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><span class="article-number hidden-xs">24</span></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Getting Your Team Through the Storm A Good Product Designer</a></h4>
												<p>Proin eget porta leo. Cras interdum ornare condimentum. Nam eu enim at magna tincidunt sodales vel non nunc. Cras imperdiet mollis purus, non tempus dui tincidunt at. Donec fringilla euismod purus.</p>
												<div class="article-info"><span class="visible-xs-inline">16 June  •  </span><a href="#">Fashion</a>  •  <a href="#">16 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><span class="article-number hidden-xs">21</span></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Long Live The Kings - Short Film</a></h4>
												<p>Aliquam lectus lacus, aliquam facilisis fermentum congue, rhoncus et quam. Cras molestie nunc vitae mauris vehicula rutrum. Integer accumsan risus mauris, sed placerat tellus.</p>
												<div class="article-info"><span class="visible-xs-inline">12 June  •  </span><a href="#">Fashion</a>  •  <a href="#">12 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">17</a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="#">Turkish Coffee Culture History</a></h4>
												<p>Morbi pharetra fringilla purus, sit amet pellentesque urna lobortis ut. Aenean imperdiet urna a lectus imperdiet consequat. Fusce eu nibh metus.</p>
												<div class="article-info"><span class="visible-xs-inline">18 June  •  </span><a href="#">Brand</a>  •  <a href="#">12 comments</a></div>
											</div>
										</div>
									</li>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="#" class="article-number hidden-xs">14</a></div>
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

	<!-- Bootstrap core JavaScript
	================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('Themes.PithyHome.Common.footer');
</body>
</html>
