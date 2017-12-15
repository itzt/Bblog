@include('Themes.PithyHome.Common.header');


		<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-404">
					<div class="icon-box">
						<span class="icon-404"><i class="fa fa-unlink"></i></span>
					</div>
					<div class="info-404">
						<h2>Ooopps.!</h2>
						<p class="text-404">That page can’t be found. It looks like nothing was found at this location. Try the search below to find matching pages:</p>
						<form>
							<div class="form-group archive-search">
								<input type="search" class="form-control" placeholder="LaRead search...">
								<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
							</div>
						</form>
						<button type="button" class="btn btn-golden">HOME PAGE</button>
						<button type="button" class="btn btn-grey btn-outline">PREVIOUS PAGE</button>
					</div>
				</div>
			</div>
		</section>

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
