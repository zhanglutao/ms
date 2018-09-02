/**
 * 异步获取列表中阅读、收藏、喜欢等数量
 * @todo 鼠标hoverDelay时，异步get数据，显示在列表中
 参数：type:recipe(菜谱)、collect(菜单)、blog(日志)。。。
       id
 * @example
 *     $(".get_num li").get_num('recipe');
 */


(function($){$.fn.get_num=function(type){

$(this).hoverDelay(function(){
if($(this).find(".get_nums").html()==''){ //判断为空获取，否则不请求数据
	var id=$(this).attr("data-id");//所需获取id

var that =$(this);	
	var url =  msc.tools.getAjaxUrl({
            ac:"commondata",
            op:"get_common_data_num"
        });
        $.ajax({
            type: "GET",
            url: url,
            data: {id:id,type:type},
            dataType: "json",
            success: function(data){
               
                if(data.error===0){
				if(type == "pai")
				that.find(".get_nums").html(data.data.likenum+"个喜欢，"+data.data.replynum+"条评论").fadeIn();
				else
				that.find(".get_nums").html(data.data.collnum+"人收藏，"+data.data.readnum+"次阅读").fadeIn();
                }

            }
        });



}else{
$(this).find(".get_nums").fadeIn();

}

},function(){
$(this).find(".get_nums").fadeOut();

},150,100);

};})(jQuery);