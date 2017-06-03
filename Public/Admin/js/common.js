/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/

function _add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-编辑*/
function _edit(title,url,w,h){
	layer_show(title,url,w,h);
}

/**
 * 删除操作JS
 */
function _delete(obj,id,url){
	layer.open({
            content : '你确定要删除吗？',
            icon:3,
            btn : ['是','否'],
            yes : function(){
                 todelete(obj,id,url);
            },
        });
} 
function todelete(obj,id,url){
	var jump_url = SCOPE.jump_url;

		$.ajax({
			type:'post',
			url:url,
			dataType:'json',
			data:{"id":id},
			success:function(result){
				if(result.status == 1) {
		            //成功
		            return dialog.msg(result.message);
		            $(obj).parents('tr').remove();
		        }else if(result.status == 0) {
		            // 失败
		            return dialog.error(result.message);
		        }
			}
		});
}




function sform(){
	var title=$("#roleName").val();
	var description=$("#description").val();
	var status = $("input[type='radio']:checked").val();
    var ck = $("input[type='checkbox']:checked");    //获取选中的复选框数组
	var ckVal = "";
	for(var i = 0; i<ck.length; i++){
		ckVal += $(ck[i]).val() + ",";
	}
    var url =SCOPE.submit_url;
    var t="{'title':'"+ title +"','status':'"+ status +"','description':'"+ description +"','rules':'"+ ckVal +"'}";
    var postData=eval('('+t+')');
    $.ajax({
    url: url,
    type: "post",
    data:postData,
    
    dataType:'json',
    success: function (result) {
        if(result.status == 1) {
            //成功
            
            return dialog.msg(result.message);
            
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
        
    },
});
}

function ckform(){
	var title=$("#roleName").val();
	var description=$("#description").val();
	var status = $("input[type='radio']:checked").val();
	var id = $("input[type='hidden']").val();

    var ck = $("input[type='checkbox']:checked");    //获取选中的复选框数组
	var ckVal = "";
	for(var i = 0; i<ck.length; i++){
		ckVal += $(ck[i]).val() + ",";
	}
    var url =SCOPE.submit_url;
    var t="{'title':'"+ title +"','id':'"+ id +"','status':'"+ status +"','description':'"+ description +"','rules':'"+ ckVal +"'}";
    var postData=eval('('+t+')');
    $.ajax({
    url: url,
    type: "post",
    data:postData,
    
    dataType:'json',
    success: function (result) {
        if(result.status == 1) {
            //成功
            
            return dialog.msg(result.message);
            
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
        
    },
});
}

function _form(){
	
	var data=$('.form').serializeArray();
	postData={};
	$(data).each(function(i){
		postData[this.name]=this.value;
	});
	
	//postData =$.base64.encode(postData);
	url = SCOPE.submit_url;
	
	$.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            dialog.msg(result.message);
            
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
    },"JSON");
    
}

function _order(){		
		
	    // 获取 listorder内容
		    var data = $("#singcms-listorder").serializeArray();
		    postData = {};
		    $(data).each(function(i){
		       postData[this.name] = this.value;
		    });
		    console.log(data);
		    var url = SCOPE.listorder_url;
		    $.post(url,postData,function(result){
		        if(result.status == 1) {
		            //成功
		            return dialog.success(result.message,result['data']['jump_url']);
		        }else if(result.status == 0) {
		            // 失败
		            return dialog.error(result.message,result['data']['jump_url']);
		        }
		    },"JSON");
		
    }
    
    