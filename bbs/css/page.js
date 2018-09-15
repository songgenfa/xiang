$(document).ready(function(){
	console.log("连接js文件正常")
	$.ajax({
		url:"./server/getlist.php",
		type:'get',
		dataType:"json",
		success:function(data0){
			console.log("连接数据库成功")
			var num=data0.length/10
			var data=data0.sort(
				    function(a,b){
				    	return (parseInt(b.id)-parseInt(a.id))
					}
			)
			if(data.length<=10&0<data.length){
				$(".bbs_page").css("display","none")
				for(i=0;i<data.length;i++){
					$("#two_party").append(`<li>
							<input type="button" value="${i}" name="" disabled="">
							<div class="bbs_title"><a href="./three/index.html#${data[i].id}">【${data[i].kind}】${data[i].title}</a></div>
							<div class="bbs_article">${data[i].article}</div>
							<div class="bbs_user">${data[i].creater}</div>
							<div class="bbs_dater">${data[i].nowdate}</div>
						</li>`
					)
				}
			}else if(data.length===0){
				$(".bbs_page").css("display","none")
			}else{
				for(i=0;i<10;i++){
					$("#two_party").append(`<li>
							<input type="button" value="${i}" name="" disabled="">
							<div class="bbs_title"><a href="./three/index.html#${data[i].id}">【${data[i].kind}】${data[i].title}</a></div>
								<div class="bbs_article">${data[i].article}</div>
							<div class="bbs_user">${data[i].creater}</div>
							<div class="bbs_dater">${data[i].nowdate}</div>
						</li>`
					)
				}
				if(num!==parseInt(num)){
					if(parseInt(num)<10){
						for(i=parseInt(num)+1;i<=$(".bbs_page ul").find("li").length;i++){
								 $(".bbs_page ul").find("li").eq(i).css("display","none")
						}
					}else{
						for(i=parseInt(num)+1;i<10;i++){
								 $(".bbs_page ul").find("li").eq(i).css("display","none")
						}
					}
						
				}else{
					if(parseInt(num)<10){
						for(i=parseInt(num);i<=$(".bbs_page ul").find("li").length;i++){
								 $(".bbs_page ul").find("li").eq(i).css("display","none")
						}
					}else{
						for(i=parseInt(num);i<10;i++){
								 $(".bbs_page ul").find("li").eq(i).css("display","none")
						}
					}
				}
			}
			
		},
		err:function(data){
			console.log("连接失败",data)
		},
	})
	$(".bbs_page ul li").click(function(){
		$("#two_party").empty();
		var pagenum=$(".bbs_page ul").find("li").index(this)
		$.ajax({
			url:"./server/getlist.php",
			type:'get',
			dataType:"json",
			success:function(data0){
				var num=data0.length/10
				var data=data0.sort(
					    function(a,b){
					    	return (parseInt(b.id)-parseInt(a.id))
					    }
				)
				if(data.length-pagenum*10>10){
					for(i=pagenum*10;i<pagenum*10+10;i++){
						$("#two_party").append(`<li>
								<input type="button" value="10" name="" disabled="">
								<div class="bbs_title"><a href="./three/index.html#${data[i].id}">【${data[i].kind}】${data[i].title}</a></div>
								<div class="bbs_article">${data[i].article}</div>
								<div class="bbs_user">${data[i].creater}</div>
								<div class="bbs_dater">${data[i].dater}</div>
							</li>`
						)
					}
				}else{
					for(i=pagenum*10;i<data.length;i++){
						$("#two_party").append(`<li>
								<input type="button" value="10" name="" disabled="">
								<div class="bbs_title"><a href="./three/index.html#${data[i].id}">【${data[i].kind}】${data[i].title}</a></div>
								<div class="bbs_article">${data[i].article}</div>
								<div class="bbs_user">${data[i].creater}</div>
								<div class="bbs_dater">${data[i].dater}</div>
							</li>`
						)
					}
				}
			},
			err:function(data){
				console.log("连接失败",data)
			},
			complete:function(){
				$('html , body').scrollTop("0");
			}
		})
	})
})