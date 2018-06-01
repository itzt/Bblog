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

		@include('Themes.PithyHome.Common.copyright');
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	@include('Themes.PithyHome.Common.footer');

</body>
</html>
