@include('Themes.PithyHome.Common.header');
		<div class="container">

			<div class="head-author">
				<h1 class="author-h1">LaRead Authors</h1>
				<p class="lead about-lead">Welcome to my blog, take your time give it a read and browse around.</p>
			</div>

		</div>


		<div class="post-fluid">
			<div class="container-fluid">
@if(!empty($authorInfo))
@foreach($authorInfo as $val)
    <article class="row laread-authors">
        <div class="author-item">
            <div class="author-picture">
                <img src="{{$val->avatar}}" alt="" />
            </div>
            <div class="author-subdetail">
                <h2><a href="/author/index/{{$val->id}}">{{$val->name}}</a></h2>
                <p class="info-small">{{$val->profession}}   <span><i class="fa fa-map-marker"></i> {{$val->address}}</span></p>
                <div class="author-connection">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
                <p class="author-bio">{{mb_substr($val->introduce, 0, 110)}}...</p>
                <button type="button" class="btn btn-grey btn-outline btn-rounded">Follow</button>
            </div>
        </div>
    </article>
@endforeach
@endif
				<div class="row become-author">
					<h5>Become an author</h5>
					<p>Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Mauris fermentum fringilla lorem, in rutrum massa.</p>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
		</div>

		<footer class="container-fluid footer no-mt">
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
