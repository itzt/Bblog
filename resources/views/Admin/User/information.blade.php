@include('Admin.Common._meta')

<title>H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
@include('Admin.Common._header')
@include('Admin.Common._menu')
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="个人信息" data-href="welcome.html">个人信息</span>
					<em></em></li>
		</ul>
	</div>
		
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
             <form action="" method="post" class="form form-horizontal" id="demo2">
							   <legend>个人信息</legend>
                               <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                               <input type="hidden" name="id" id="a_id" value="{{$data->id}}">
							<div class="row cl">
                                <label class="form-label col-xs-4 col-sm-3">用户名：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="text" class="input-text"  placeholder="4~16个字符，字母/中文/数字/下划线" name="name" id="username" value="{{$data->name}}">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">邮箱：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="email" email:true class="input-text" placeholder="@" name="email" id="email" value="{{$data->email}}">
								</div>
							</div>

							<!--<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">密码：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="password" class="input-text" autocomplete="off" placeholder="密码" name="pass" id="password" value="{{$data->password}}">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">密码验证：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="password" class="input-text" autocomplete="off" placeholder="密码" name="password" id="password2" value="{{$data->password}}">
								</div>
							</div>-->
							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">职业：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="text" class="input-text" autocomplete="off" placeholder="职业" name="profession" id="job" value="{{$data->profession}}">
								</div>
							</div>
                            <div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">居住地：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="text" class="input-text" autocomplete="off" placeholder="居住地" name="address" id="address" value="{{$data->address}}">
								</div>
							</div>

							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">上传头像：</label>
								
								<div class="formControls col-xs-8 col-sm-9">
								<div style="width:80px;height:80px;float:left;">
									<img src="{{$data->avatar}}" alt="" class="ing" style="width:80px;height:80px;">
								</div> 
								<!--<input type="hidden" id="img" value="{{$data->avatar}}">-->
								<!--<form action="javascript:void(0)" enctype="multipart/form-data" id="formes">-->
										<input type="file" id="fil" >
                            	<!--</form>-->
							
								</div>
								
							</div>
							
							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">网址：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<input type="text" class="input-text" placeholder="http://" name="website" id="url" value="{{$data->website}}">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-4 col-sm-3">个人简介：</label>
								<div class="formControls col-xs-8 col-sm-9">
									<textarea class="textarea"  placeholder="说点什么...最少输入10个字符" name="introduce" onKeyUp="member_jian(this,500)">{{$data->introduce}}</textarea>
									<p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
								</div>
							</div>
							<div class="row cl">
								<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
									<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
								</div>
							</div>
				</form>
            
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.Common._footer')
 <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script type="text/javascript">
$(function(){
	var lang = $('textarea').text().length;
    var num = 500 - lang;
    $('.textarea-length').html(num);

	// 图片回显
	var img_url = $('.ing').attr('src');
	//  alert(img_url)
	if(img_url ==false)
	{
		$(".ing").attr({'src':'/avatar.jpg','width':80+'px','heigth':80+'px'});
	}
	var fil=$("#fil");  
     $("<img>").insertBefore("#fil");  
     fil.bind('change',function(){ 
         var fordate=new FormData();  //得到一个FormData对象：
         var fils=$("#fil").get(0).files[0];  //得到file对象
        //  console.log(fils);
		var id = $("#a_id").val();
         fordate.append('image',fils);  //用append方法添加键值对
         fordate.append('id',id);  //用append方法添加键值对
		 
        var srcc=window.URL.createObjectURL(fils);
		$(".ing").attr({'src':srcc,'width':80+'px','heigth':80+'px'});  
         $.ajax({  //发送ajax请求
              url: "/AdminUsers/images",  
              type: "post",  
              data: fordate, 
              processData : false,  
              contentType : false,   
              success: function(data){  
				// console.log(data)
                layer.msg(data.message,{icon:data.status});
				// parent.window.location.reload();
              },
			  'error':function(data)
			  {
				var result = JSON.parse(data.responseText);
                // 非200请求，获取错误消息
                layer.msg(data.message,{icon:data.status});
			  }
            });  

     });
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
$("#demo2").validate({
		rules:{
            email:{
				required:true,
				email:true,
			},
			username:{
				required:true,
				minlength:4,
				maxlength:16
			},
			// password:{
			// 	required:true,
			// },
			// password2:{
			// 	required:true,
			// 	equalTo: "#password"
			// },
			url:{
				url:true
			},
			
		},
	// 	onkeyup:false,
	// 	focusCleanup:true,
	// 	success:"valid",
	// 	submitHandler:function(form){
	// 		$(form).ajaxSubmit({
	// 			'type'   : 'post',
	// 			'url'    : "/AdminUsers/user_information",
	// 			'data'   : {'status': status},
	// 			'success': function (data) {
	// 				layer.msg(data.message, {icon:data.status});
	// 				parent.window.location.reload();
	// 			},
	// 			error: function (data) {
	// 				var result = JSON.parse(data.responseText);
	// 				layer.msg(result.message,{icon:result.status});
	// 			}
	// 		});
	// 	}
	});
		

	
function member_jian(key,val)
{
    var nums = $('.textarea').val().length;
    // alert(nums)
    var num = val - nums;
    $('.textarea-length').html(num);
}
// $('#img').change(function(){
// 		// var formdata =$("form").serialize();
// 		// var forms = document.getElementById("demo2");
// 		var forms = $("#formes");
// 		// var formda = form.getFormData()
// 		var formdata = new FormData(forms);
// 		// formdata.append('type',"license");
// 		var names = formdata.get("image");
// 		console.log(names);
// 		// var formdata = JSON.stringify(formdata);
// 	// 	var token = $("#token").val();
// 	// 	var img = $('#img').val();
// 	// 	url="/AdminUsers/images";
// 	// 	data ={'_token':token,'image':img};
// 	// 	$.post(url,data,function(msg){
// 	// 		alert(msg)
// 	// })
// });

// function go(){}
</script> 

<!--此乃百度统计代码，请自行删除-->

<!--/此乃百度统计代码，请自行删除-->
</body>
</html>