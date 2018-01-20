@include('Admin.Common._meta')

<title>{{trans('sets.set_basic')}}</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> {{trans('common.home')}}
	<span class="c-gray en">&gt;</span>
	{{trans('common.system_manager')}}
	<span class="c-gray en">&gt;</span>
	{{trans('sets.set_basic')}}
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="" method="post">
		{{csrf_field()}}

		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">

				<span>{{trans('sets.set_basic')}}</span>
				<!--<span>{{trans('sets.set_security')}}</span>-->
				<!--<span>{{trans('sets.set_email')}}</span>-->
				<!-- <span>{{trans('sets.set_shield')}}</span>-->
				<span>{{trans('sets.set_other')}}</span>

			</div>

			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						{{trans('sets.set_web')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title" placeholder="{{trans('sets.placeholder_set_web')}}" value="<?= isset($array['WebSiteName'])?$array['WebSiteName']:'';?>" class="input-text" name="WebSiteName">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						{{trans('sets.set_keyword')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-Keywords" placeholder="{{trans('sets.placeholder_set_keyword')}}" value="<?= isset($array['KeyWord'])?$array['KeyWord']:'';?>" class="input-text" name="KeyWord">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						{{trans('sets.set_content')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-description" placeholder="{{trans('sets.placeholder_set_content')}}" value="<?= isset($array['Content'])?$array['Content']:'';?>" class="input-text" name="Content">
					</div>
				</div>
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						{{trans('sets.set_footnews')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-copyright" placeholder="{{trans('sets.set_footnews')}}" value="<?= isset($array['FootNews'])?$array['FootNews']:'';?>" class="input-text" name="FootNews">

					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_recordnum')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-icp" placeholder="{{trans('sets.placeholder_set_recordnum')}}" value="<?= isset($array['RecordNum'])?$array['RecordNum']:'';?>" class="input-text" name="RecordNum">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_group')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea class="textarea" name="Group"><?= isset($array['Group'])?$array['Group']:'';?></textarea>
					</div>
				</div>				

			</div>
			<!--
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_allow_ip')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<textarea class="textarea" name="AllowIp"  placeholder="请以（|）为分割符" id=""><?= isset($array['AllowIp'])?$array['AllowIp']:'';?></textarea>

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_failnum')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" class="input-text" value="<?= isset($array['FailNum'])?$array['FailNum']:'';?>" id="" name="FailNum" >

					</div>
				</div>
			</div>
			-->
			<!--
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_pattern')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text"  class="input-text" value="<?= isset($array['Pattern'])?$array['Pattern']:'';?>" id="" name="Pattern">

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_server')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" id="" value="<?= isset($array['Server'])?$array['Server']:'';?>" class="input-text" name="Server">

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_port')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" class="input-text" value="<?= isset($array['Port'])?$array['Port']:'';?>" id="" name="Port" >

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_email_user')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" class="input-text" value="<?= isset($array['EmailUser'])?$array['EmailUser']:'';?>" id="emailName" name="EmailUser" >

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_email_pwd')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="password" id="email-password" value="<?= isset($array['EmailPwd'])?$array['EmailPwd']:'';?>" class="input-text" name="EmailPwd">

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.set_email_accept')}}</label>
					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" id="email-address" value="<?= isset($array['EmailAccept'])?$array['EmailAccept']:'';?>" name="EmailAccept" class="input-text">

					</div>
				</div>
			</div>
			-->
			<!--
			<div class="tabCon">
				<div>
					<textarea class="textarea" style="width:98%; height:300px; resize:none" name="Shielding"><?= isset($array['Shielding'])?$array['Shielding']:'';?></textarea>
				</div>
			</div>
			-->
			<div class="tabCon">

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>{{trans('sets.cache_time')}}</label>
				
					<div class="formControls skin-minimal col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" size="1" name="CacheTime">
							<option value="60" @if(isset($array['CacheTime'])&& ($array['CacheTime']=='60')) selected @endif> {{trans('common.one_hours')}}</option>
							<option value="120" @if(isset($array['CacheTime'])&& ($array['CacheTime']=='120')) selected @endif> {{trans('common.two_hours')}}</option>
							<option value="180" @if(isset($array['CacheTime'])&& ($array['CacheTime']=='180')) selected @endif> {{trans('common.three_hours')}}</option>
							<option value="240" @if(isset($array['CacheTime'])&& ($array['CacheTime']=='240')) selected @endif> {{trans('common.four_hours')}}</option>
						</select>
						</span>								
					</div>
				</div>
				<!--
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{trans('sets.placeholder_login_comment')}}"><i class="Hui-iconfont">&#xe633;</i> {{trans('sets.login_comment')}}</label>
					<div class="formControls skin-minimal col-xs-8 col-sm-9">
						<div class="radio-box">
							<input type="radio" name="LoginAfterAllow" value="1" @if(isset($array['LoginAfterAllow'])&& ($array['LoginAfterAllow']==1)) checked @endif>
							<label for="radio-yes" >{{trans('common.yes')}}</label>
						</div>
						<div class="radio-box">
							<input type="radio" name="LoginAfterAllow" value="0" @if(isset($array['LoginAfterAllow'])&& ($array['LoginAfterAllow']==0)) checked @endif>
							<label for="radio-no">{{trans('common.no')}}</label>
						</div>
					</div>
				</div>
				-->

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.sina_weibo')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" placeholder="http://" value="<?= isset($array['SinaWeibo'])?$array['SinaWeibo']:'';?>" class="input-text" name="SinaWeibo">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.facebook')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" placeholder="http://" value="<?= isset($array['Facebook'])?$array['Facebook']:'';?>" class="input-text" name="Facebook">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.twitter')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" placeholder="http://" value="<?= isset($array['Twitter'])?$array['Twitter']:'';?>" class="input-text" name="Twitter">
					</div>
				</div>								

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.index_title')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" placeholder="B-blog" value="<?= isset($array['IndexTitle'])?$array['IndexTitle']:'';?>" class="input-text" name="IndexTitle">
					</div>
				</div>	
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">{{trans('sets.index_text')}}</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" placeholder="B-blog. Designed for Read." value="<?= isset($array['IndexText'])?$array['IndexText']:'';?>" class="input-text" name="IndexText">
					</div>
				</div>									
							
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">

				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> {{trans('common.form_preservation')}}</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;{{trans('common.form_cancel')}}&nbsp;&nbsp;</button>

			</div>
		</div>

	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.Common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
    //表单验证
    $("#form-article-add").validate({
        rules:{
            WebSiteName:{required:true},
            FootNews:{required:true},
            RecordNum:{required:true}
        },
        messages:{
            WebSiteName:"{{trans('sets.set_web_null')}}",
            FootNews:"{{trans('sets.set_recordnum_null')}}",
            RecordNum:"{{trans('sets.set_recordnum_null')}}"
            },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type:'post',
                url:'/system/setadd',
				success:function (data) {	
					layer.msg(data.message, {icon:data.status});
					window.location.reload();
                },
				error:function (data) {
                    layer.msg(data.message, {icon:data.status});
                }
			})
        }
    });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
