@include('Themes.PithyHome.Common.header')
<body>
	<div class="page-loader">
		<div class="loader-in">Loading...</div>
		<div class="loader-out">Loading...</div>
	</div>

	<aside class="navmenu">
		<div class="post-titles">
			<div class="tag-title">
				<div class="container">
					<p class="tags" id="post-titles">
						<a data-filter=".pt-fashion" href="#">fashion</a>
						<a data-filter=".pt-culture" href="#">culture</a>
						<a data-filter=".pt-art" href="#">art</a>
						<a data-filter="*" href="#" class="unfilter hide">all</a>
					</p>
				</div>
			</div>
			<button type="button" class="remove-navbar"><i class="fa fa-times"></i></button>
			<ul class="post-title-list clearfix">
				<li class="pt-fashion pt-culture">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Five simple steps to designing grid systems preface</a>
						</h5>
						<div class="post-subinfo">
							<span>June 28</span>   •   
							<span>2 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-culture pt-art">
					<div>
						<h5>
							<i>26</i>
							<a href="#">Hemingway: A Text Editor That Cares About What You Write</a>
						</h5>
						<div class="post-subinfo">
							<span>June 26</span>   •   
							<span>2 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-art">
					<div>
						<h5>
							<i class="fa fa-link"></i>
							<a href="#">Mobile Design Inspiration and Creativity</a>
						</h5>
						<div class="post-subinfo">
							<span>June 25</span>   •   
							<span>4 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-culture">
					<div>
						<h5>
							<i class="fa fa-comment"></i>
							<a href="#">Envato Stories: Coming August 2014</a>
						</h5>
						<div class="post-subinfo">
							<span>June 24</span>   •   
							<span>3 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-culture pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Meet #59 Interface Designer Kerem Suer</a>
						</h5>
						<div class="post-subinfo">
							<span>June 24</span>   •   
							<span>6 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Founders, Travel and Epic Beards: What Happens After Envato</a>
						</h5>
						<div class="post-subinfo">
							<span>June 22</span>   •   
							<span>12 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-culture">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Why Designers Make Good Founders (and Cofounders)</a>
						</h5>
						<div class="post-subinfo">
							<span>June 21</span>   •   
							<span>9 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-culture pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Getting Your Team Through the Storm A Good Product Designer...</a>
						</h5>
						<div class="post-subinfo">
							<span>June 20</span>   •   
							<span>16 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Introducing LaRead Chat Post</a>
						</h5>
						<div class="post-subinfo">
							<span>June 18</span>   •   
							<span>24 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-culture">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">The Future of WordPress</a>
						</h5>
						<div class="post-subinfo">
							<span>June 16</span>   •   
							<span>13 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-culture pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Workshop: Brand Asset Management</a>
						</h5>
						<div class="post-subinfo">
							<span>June 16</span>   •   
							<span>8 Comments</span>
						</div>
					</div>
				</li>
				<li class="pt-fashion pt-art">
					<div>
						<h5>
							<i class="fa fa-file-text-o"></i>
							<a href="#">Long Live The Kings - Short Film</a>
						</h5>
						<div class="post-subinfo">
							<span>June 12</span>   •   
							<span>26 Comments</span>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>

	<div class="canvas">
		<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-contact">
					<div class="contact-box">
						<span class="icon-contact"><i class="fa fa-paper-plane"></i></span>
					</div>
					<div class="contact-info">
						<h2>Contact</h2>
						<p class="text-contact"><i class="fa fa-map-marker"></i> 216 King Street, Toronto, Canada</p>
						<p class="text-contact"><i class="fa fa-phone"></i> 1800-186-686  <a href="#"><i class="fa fa-envelope"></i> hello@laread.com</a></p>
						<div class="contact-form-vertical">
							<form id='signupForm'  action="/Homecontacts/index" class="form" method="post">
							   {{csrf_field()}} 
								<input class="contact-input" id='name' name='name'  placeholder="Name" type="text" />
								<input class="contact-input" id='subject' name='subject' placeholder="Subject" type="text" />
								<input class="contact-input" id='email' name='email' placeholder="Email" type="text" />
								<label>Message</label>
								<textarea class="contact-textarea"id='message' name='message'></textarea>
								<button  type="submit" class="btn btn-golden btn-block"><span>SEND MESSAGE</span></button>
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>


	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	@include('Themes.PithyHome.Common.footer');
</body>
</html>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script src="/assets/js/jquery.form.js"></script>
<script>
$().ready(function() {
	$('.btn-golden').click(function(){
		$("#signupForm").submit();
	})
// 在键盘按下并释放及提交后验证提交表单
 	$("#signupForm").validate({
		rules: {
		name:"required",
		subject: "required",
		email:"required",
		message:"required",
	
		},
		messages: {
			name: "	<span style='color:red;'>请输入您的名字</span>",
			subject: "<span style='color:red;'>请输入您的标题</span>",
			email:"<span style='color:red;'>请输入您的邮箱</span>",
			message:"<span style='color:red;'>请输入您评论的内容</span>", 
		},
	    onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type:'post',
                url:'/Homecontacts/index',
				success:function ($data) {
					layer.msg('添加成功',{icon:1,time:1000});
					window.location.reload();
                },
				error:function ($data) {
                    layer.msg('添加失败',{icon:0,time:1000});
                }
			});
        }
    })
});
</script>