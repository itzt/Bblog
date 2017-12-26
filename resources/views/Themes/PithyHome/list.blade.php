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
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="lastest" aria-labelledBy="lastest-tab">
								<ul class="article-list">
								@if(!empty($artList) && isset($artList))
								@foreach($artList as $val)
									<li>
										<div class="media clearfix">																				
											<div class="media-right">
												<span class="article-number hidden-xs">{{date('m',strtotime($val->created_at))}}</span>
											</div>
											<div class="media-body">
												<h4 class="media-heading"><a href="/details/{{$val->title}}">{{mb_substr($val->title, 0, 30)}}...</a></h4>
												<p>{{mb_substr($val->html, 0, 120) }}</p>
												<div class="article-info"> <a href="/list/category-{{$val->cat->cat_name}}">{{$val->cat->cat_name}}</a>  •  <a href="/author/index/{{$val->author}}">{{$val->admin->name}}</a> • <a href="javascript:void(0);">{{count($val->comments)}} 评论</a></div>
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
					<a href="javascript:void(0);" class="more-down"><i class="fa fa-long-arrow-down"></i></a>
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
<script>
	/** 加载更多 */
	$(function(){
		$('.more-down').click(function(){
			layer.msg('待开发');

		});
	})
</script>
