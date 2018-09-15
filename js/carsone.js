$(document).ready(function(){
	$.ajax({
		url:"./server-cars/getlist.php",
		type:'get',
		dataType:"json",
		success:function(data){
			data=data.sort(
				    function(a,b){
				    	return (b.id-a.id)
				    }
			)
			console.log(data)
			//console.log(data0)
			if(data.length>9){
				for(i=0;i<9;i++){
					$(".con-lunbo .gider2 ul ").append(`<li title="${data[i].dater}-${data[i].timer}"><div style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a href="./three/cars.html#${data[i].id}">
									<span>【${data[i].kind}】</span>
									<span>${data[i].fromplace}-${data[i].toplace}</span><span>|</span>
									<span>${data[i].dater}-${data[i].timer}</span><span>|</span><span style="color:gray;font-size:12px;">详情</span>
						</a></div></li>`)
				}
			}else{
				for(i=0;i<data.length;i++){

					$(".con-lunbo .gider2 ul ").append(`<li title="${data[i].dater}-${data[i].timer}"><div style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a href="./three/cars.html#${data[i].id}">
									<span>【${data[i].kind}】</span>
									<span>${data[i].fromplace}-${data[i].toplace}</span><span>|</span>
									<span>${data[i].dater}-${data[i].timer}</span><span>|</span><span style="color:gray;font-size:12px;">详情</span>
						</a></div></li>`)
				}
			}
				
		},
		err:function(data){
			console.log("连接失败",data)
		},
	})
})