@include('Admin.Common._meta')

<title>{{trans('contacts.con_details')}}</title>
</head>
<body>
<div class="page-container">
	<form action="/Contacts/update/{{$Contacts->id}}" method="post" class="form form-horizontal" id="form-navigate-editor">
		<div id="tab-navigate" class="HuiTab">
            {{ csrf_field() }}
			<div class="tabCon">
            <h4 align="center">{{$Contacts->subject}}</h4>
					<div style="text-indent:2em">
					@if(isset($Contacts->message)){{trim($Contacts->message) }}@endif
					</div>
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
	$("#tab-navigate").Huitab({
		index:0
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>