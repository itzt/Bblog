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
									@if(!empty($catList))
									@foreach($catList as $val)
										<li><a href="/list/category-{{$val->cat_name}}">{{$val->cat_name}}</a></li>
									@endforeach
									@endif
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
@if(!empty($artList) && isset($artList))
@foreach($artList as $val)
	<li>
		<div class="media clearfix">
			<div class="media-right"><span class="article-number hidden-xs">{{$val->read_num}}</span></div>
			<div class="media-body">
				<h4 class="media-heading"><a href="/index/details/{{$val->title}}">{{mb_substr($val->title, 0, 30)}}...</a></h4>
				<p>{{mb_substr($val->html, 0, 120) }}</p>
				<div class="article-info"><span class="visible-xs-inline">21 June  •  </span><a href="#">{{$val->cat->cat_name}}</a>  •  <a href="#">{{count($val->comments)}} comments</a></div>
			</div>
		</div>
	</li>
@endforeach
@endif
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
