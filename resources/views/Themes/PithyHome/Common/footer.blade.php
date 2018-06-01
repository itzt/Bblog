<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/jasny-bootstrap.min.js"></script>
	<script src="/assets/js/prettify.js"></script>
	<script src="/assets/js/lang-css.js"></script>
	<script src="/assets/js/jquery.blueimp-gallery.min.js"></script>
	<script src="/assets/js/imagesloaded.js"></script>
	<script src="/assets/js/isotope.pkgd.min.js"></script>
	<script src="/assets/js/jquery.ellipsis.min.js"></script>
	<script src="/assets/js/jquery.dotdotdot.min.js"></script>
	<script src="/assets/js/jquery.colorbox-min.js"></script>
	<script src="/assets/js/jquery.nicescroll.min.js"></script>
	<script src="/assets/js/masonry.js"></script>
	<script src="/assets/js/viewportchecker.js"></script>
	<script src="/assets/js/calendar.js"></script>
	<script src="/assets/js/jquery.touchSwipe.min.js"></script>
	<script src="/assets/js/script.js"></script>
	<script src="/assets/layer/layer.js"></script>
	
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
			layer.close(index);

		})
	})

</script>
	
