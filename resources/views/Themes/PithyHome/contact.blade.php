@include('Themes.PithyHome.Common.header')


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