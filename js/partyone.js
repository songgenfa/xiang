$(document).ready(function(){
	console.log("走php文件")
	$.ajax({
		url:"./server-party/getlist.php",
		type:'get',
		dataType:"json",
		success:function(data){
			if(data.length>9){
				for(i=0;i<9;i++){
					$(".con-lunbo .gider1 ul").append(`<li><a href="./three/party.html#${data[i].id}" title="${data[i].area} ${data[i].jianjie}">【${data[i].name}】${data[i].name}</a>
					</li>`)
				}
			}else{
				for(i=0;i<data.length;i++){
					$(".con-lunbo .gider1 ul").append(`<li><a href="./three/party.html#${data[i].id}" title="${data[i].area}+${data[i].jianjie}">【${data[i].name}】${data[i].name}</a>
					</li>`)
				}
			}
				
		},
		error:function(data2){
			console.log("走json文件")
			$.ajax({
				url:"./sqljson/party.json",
				type:'get',
				dataType:"json",
				success:function(data){
					console.log("连接json成功")
					if(data.length>9){
						for(i=0;i<9;i++){
							$(".con-lunbo .gider1 ul").append(`<li><a href="./three/party.html#${data[i].id}" title="${data[i].area} ${data[i].jianjie}">【${data[i].name}】${data[i].name}</a>
							</li>`)
						}
					}else{
						for(i=0;i<data.length;i++){
							$(".con-lunbo .gider1 ul").append(`<li><a href="./three/party.html#${data[i].id}" title="${data[i].area}+${data[i].jianjie}">【${data[i].name}】${data[i].name}</a>
							</li>`)
						}
					}
						
				},
				error:function(data){
					console.log("连接失败",data)
				},
			});
		},
	});
})