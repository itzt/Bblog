@include('Themes.PithyHome.Common.header')
<form id='signupForm'>
{{csrf_field()}} 
昵称<input type="text" id='nickname' name='nickname'><br>
邮箱<input type="text" id='email' name='email'><br>
<input type="hidden" name='post_id' value='1'><br>
<textarea name="content" id="content" cols="30" rows="10"></textarea>
<button type='submit'>提交</button>
</form>
@if(!empty($mentList))
	@foreach($mentList as $k =>$v)
			{{$v['content']}} <span class='reply' style='color:red;' id="{{$k}}">回复</span> <br> 
		<div style="display:none;">
		    <textarea name="" id="" cols="40" rows="3"></textarea>
			<button>评论</button>
		</div>
	@endforeach
@endif

<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script src="/assets/js/jquery.form.js"></script>
<script>
$().ready(function() {
	$('.reply').click(function(){
		$(this).next().next().toggle();
		var id=$(this).attr('id');
		var url='/comments/index'

	})

	$('.btn-golden').click(function(){
		$("#signupForm").submit();
	})
// 在键盘按下并释放及提交后验证提交表单
 	$("#signupForm").validate({
		rules: {
        nickname:"required",
		email:"required",
		content:"required",
	
		},
		messages: {
			nickname: "	<span style='color:red;'>请输入您的昵称</span>",
			email:"<span style='color:red;'>请输入您的邮箱</span>",
			content:"<span style='color:red;'>请输入内容</span>", 
		},
	    onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type:'post',
                url:'/comment/index',
				success:function ($data) {
					layer.msg('添加成功',{icon:1,time:1000});
					//window.location.reload();
                },
				error:function ($data) {
                    layer.msg('添加失败',{icon:0,time:1000});
                }
			});
        }
    })
});
</script>