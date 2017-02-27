// 添加按钮操作
$("#button-add").click(function(){
	var url = SCOPE.add_url;
	window.location.href = url;
});
/**
*提交form表单操作
*/
$("#singcms-button-submit").click(function(){
	var data = $("#singcms-form").serializeArray();//获得form表单数据（对象），下面解析对象：
	postData = {};
	$(data).each(function(i){
		postData[this.name] = this.value;
				//key	    =>	value
	});
	console.log(postData);
	//将获取的数据post给服务器
	url = SCOPE.save_url;
	jump_url = SCOPE.jump_url;
	$.post(url,postData,function(result){//post为小写function为回调，result就是我们post给这个url后的一个回调返回的值
		if (result.status == 1) {
			//ok
			return dialog.success(result.message,jump_url);
		}else if (result.status == 0) {
			//no
			return dialog.error(result.message);
		}
	},"JSON");
});
/*
*编辑模式 
*/
$('.singcms-table #singcms-edit').on('click',function(){
	var id = $(this).attr('attr-id');
	var url = SCOPE.edit_url + '&id='+id;
	window.location.href=url;
});
//删除操作js
$('.singcms-table #singcms-delete').on('click',function(){
	var id = $(this).attr('attr-id');
	var a = $(this).attr('attr-a');
	var message = $(this).attr('attr-message');
	var url = SCOPE.set_status_url;

	data = {};
	data['id'] = id;
	data['display'] = -1;

	layer.open({
		type : 0,
		title : '是否提交？',
		btn: ['yes','no'],
		closeBtn : 2,
		content: "是否确定"+message,
		scrollbar: true,
		yes: function(){
			//执行相关跳转
			todelete(url, data);
		},
	});
});
function todelete(url, data){
	$.post(
		url,
		data,
		function(s){
			if(s.display == 1) {
				return dialog.success(s.message,'');
				//跳转到相关页面
			}else {
				return dialog.error(s.message);
			}
		}
	,"JSON");
}