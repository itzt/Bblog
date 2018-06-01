		<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo"><img src="assets/img/logo-black.png" alt=""></div>
				<p class="laread-motto">@if(isset($sets['FootNews'])) {{$sets['FootNews']}} @endif &nbsp;&nbsp; @if(isset($sets['RecordNum'])) {{$sets['RecordNum']}} @endif</p>
				
				<div class="laread-social">
					@if(isset($sets['Facebook']))<a href="#" class="fa fa-facebook"></a>@endif
					@if(isset($sets['Twitter']))<a href="#" class="fa fa-twitter"></a>@endif
					@if(isset($sets['SinaWeibo']))<a href="#" class="fa fa-weibo"></a>@endif
				</div>
			</div>
		</footer>