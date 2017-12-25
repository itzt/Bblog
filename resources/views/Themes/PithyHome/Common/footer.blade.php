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
// 右侧选项根据最新插入的标签或者全部标签进行查找文章
$(function(){
	$(document).on('click', '.search-tags', function(){
		var tid = $(this).data('id'); // 获取当前标签id
		var url = '/searchtag';
		$.get(url, {'tid': tid}, function(data){
			var content = '';
			for(var i = 0; i < data.length; i++)
			{
				content += '<li class="pt-fashion pt-culture">\
							<div>\
								<h5>\
									<i class="fa fa-file-text-o"></i>\
									<a href="#">'+data[i].title+'</a>\
								</h5>\
								<div class="post-subinfo">\
									<span>'+data[i].time+'</span>   •   \
									<span>'+data[i].author+'</span>\
								</div>\
							</div>\
							</li>';
				
			}
			$('#tag-content').html(content);
		}, 'json');
	})
});
</script>
	