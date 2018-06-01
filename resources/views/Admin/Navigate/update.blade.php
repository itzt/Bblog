@include('Admin.Common._meta')

<title>{{trans('common.navigate_set')}}</title>
</head>
<body>
<div class="page-container">
	<form action="/navigate/update/{{$navigate->nav_id}}" method="post" class="form form-horizontal" id="form-navigate-editor">
		<div id="tab-navigate" class="HuiTab">
            {{ csrf_field() }}
			<div class="tabCon">
                <!--
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">导航名称：</label>
					<div class="formControls col-xs-8 col-sm-9">11230</div>
				</div>
                -->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						{{trans('navigate.parent_nav')}}：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="parent_id" onchange="SetSubID(this);">
							<option value="0">{{trans('navigate.top_nav')}}</option>
							@if(is_array($navTree)) @foreach($navTree as $nav)
							<option value="{{$nav['nav_id']}}" @if($nav['nav_id']==$navigate->parent_id) selected="true" @endif>{{str_repeat('|--',$nav['level']).$nav['nav_name']}}</option>
							@endforeach @endif;
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>{{trans('navigate.nav_name')}}：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box" style="width: 20%;">
						<select id="type" class="select">
							<option value="">请选择...</option>
							<option value="tag">标签</option>
							<option value="category">栏目</option>
							<option value="page">页面</option>
							<option value="link">链接</option>
						</select>
						</span>
						
						<span class="select-box" style="width: 80%;float:right;">
						<select id="select-data" class="select">
						</select>
						</span>	
						<input type="text" class="input-text" value="{{$navigate->nav_name}}" placeholder="" id="" name="nav_name">					
					</div>
					<div class="col-3">
					</div>
				</div>

            
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>
					{{trans('navigate.jump_url')}}：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$navigate->jump_url}}" placeholder="" id="" name="jump_url">
					</div>
					<div class="col-3">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">{{trans('navigate.sort')}}：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$navigate->sort}}" placeholder="" id="" name="">
					</div>
					<div class="col-3">
					</div>
				</div>				
                <!--
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">导航类型：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select name="" class="select">
							<option value="1">文章</option>
							<option value="2">图片</option>
							<option value="3">商品</option>
							<option value="4">视频</option>
							<option value="5">专题</option>
							<option value="6">链接</option>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
                -->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">{{trans('navigate.is_new_open')}}：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="check-box">

							<input type="checkbox" @if($navigate->is_open) checked @endif id="checkbox-pinglun" name="is_open">
							<label for="checkbox-pinglun">&nbsp;</label>
						</div>
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>

		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;{{trans('common.form_submit')}}&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.Common._footer')
 <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<!-- <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> -->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	/** 获取数据 */
	$('#type').change(function(){
		var type = $(this).val();
		$('input[name="nav_name"]').val('');
		$('input[name="jump_url"]').val('').attr('disabled',false);

		$.get('/navigate/type',{'type':type,'rand':Math.random()},function(result){
			var html = '<option value="">请选择...</option>';
			if(result.status)
			{
				$(result.data).each(function(i,row){
					html += '<option value="'+row.href+'" name="'+row.name+'">'+row.name+'</option>';
				})
				$('#select-data').html(html);
			}
		})
	})

	/** 生成链接 */
	$('#select-data').change(function(){
		var link = $(this).val();
		var name = $(this).find("option:selected").attr('name');
		$('input[name="nav_name"]').val(name);
		$('input[name="jump_url"]').val(link);
		//$('input[name="jump_url"]').val(link).attr('disabled',true);
	})

	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#tab-navigate").Huitab({
		index:0
	});
	$("#form-navigate-editor").validate({
		rules:{
			nav_name:{
				required:true,
			},
			jump_url:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                'type':'post',
                // 'url' :'/navigate/update',
                'success':function(data)
                {
                    // 200 请求，获取服务器消息与状态
                    layer.msg(data.message,{icon:data.status});
                    // 自动关闭弹窗
                    //var index = parent.layer.getFrameIndex(window.name);
			        //parent.$('.btn-refresh').click();
                    //parent.layer.close(index);
                    parent.window.location.reload();
                },
                'error':function(data)
                {                
                    var result = JSON.parse(data.responseText);
                    // 非200请求，获取错误消息
                    layer.msg(result.message,{icon:result.status});
                }
            });

		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>