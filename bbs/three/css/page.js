$(document).ready(function(){
	var arr=window.location.href.split("#")
	console.log(arr[1])
	var myDate = new Date();
	var s=myDate.getTime();
	// console.log(s)
	Date.prototype.Format = function (fmt) { //author: meizz 
	    var o = {
	        "M+": this.getMonth() + 1, //月份 
	        "d+": this.getDate(), //日 
	        "H+": this.getHours(), //小时 
	        "m+": this.getMinutes(), //分 
	        "s+": this.getSeconds(), //秒 
	        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
	        "S": this.getMilliseconds() //毫秒 
	    };
	    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	    for (var k in o)
	    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	    return fmt;
	}
	  
	var time1 = new Date().Format("yyyy-MM-dd");
	var time2 = new Date().Format("yyyy-MM-dd HH:mm:ss");
	 
	var nowTime=new Date();
	nowTime.setMonth(nowTime.getMonth());
	var answerindex={index:arr[1]} 
	console.log(answerindex,29)
	$.ajax({
		url:"./server/gettitle.php",
		type:'post',
		dataType:"json",
		data:answerindex,
		success:function(data){
			// console.log(data,36)
			$(".answer_left_head span strong").text(data[0].title)
			
			$(".answer_left").append(`<li>
					<input type="button" value="主帖" name="" disabled="">
			<div class="answer_article">
				<pre>${data[0].article}</pre>
			</div>
			<div class="answer_foot">
				<span class="answer_user">${data[0].creater}</span>
				<span class="answer_dater">${data[0].nowdate}</span>
			</div>
				</li>`)
		},
		err:function(data){
			// console.log("连接失败",data)
		},
		complete:function(){
			// console.log("获取回复列表")
			$.ajax({
				url:"./server/getanswer.php",
				type:'post',
				dataType:"json",
				data:answerindex,
				success:function(data){
					console.log("回复列表连接数据库成功")
					// console.log(data)
					var num=data.length/10
					for(i=parseInt(num)+1;i<=$(".bbs_page ul").find("li").length;i++){
							 $(".bbs_page ul").find("li").eq(i).css("display","none")
					}
					for(var i=0;i<10;i++){
						$(".answer_left").append(`<li>
								<input type="button" value="${i+1}楼" name="" disabled="">
						<div class="answer_article">
							<pre>${data[i].article}</pre>
						</div>
						<div class="answer_foot">
							<span class="answer_user">${data[i].creater}</span>
							<span class="answer_dater">${data[i].nowdate}</span>
						</div>
					
							</li>`)
					}
				},
				err:function(data){
					// console.log("连接失败",data)
				},
			})
		}
	})
	var mydate = new Date();
	if(window.localStorage.getItem("number")){
	}else{
	    window.localStorage.setItem("number",mydate.getTime())
	}
	var ipname;
	$.ajax({
	    url: 'http://api.map.baidu.com/location/ip?ak=ia6HfFL660Bvh43exmH9LrI6',
	    type: 'POST',
	    dataType: 'jsonp',
	    success:function(data) {
	    	if(data.content.address_detail.city=="临沂"||data.content.address_detail.city=="临沂市"){
	    		alert("欢迎攻击者光临，您可以尝试采用DDOS攻击服务器或者使用自动发帖工具每分钟发一条可以多页面发送或者可以购买攻击级肉鸡使用不同ip大量灌水注册或者发帖");
	    		ipname=data.content.address_detail.city;
	        }else{
	        	//console.log("正常")
	        	ipname=data.content.address_detail.city;
	        	//console.log(data.content.address_detail.city)
	        }
	    }
	});
	$(".bbs_input button").click(function(){
		// console.log("新发布内容测试")
		var name;
		if(window.localStorage.getItem("user")){
			name=window.localStorage.getItem("user")
		}else{
			name="游客"
		} 
		var json={
			article:$(".bbs_input textarea").val(),
			creater:name,
			dater:nowTime.Format("yyyy-MM-dd"),
			nowdate:nowTime.Format("yyyy-MM-dd HH:mm:ss"),
			sortid:arr[1],
			state:1,
			ipname:ipname,
		}
		var ndate=new Date()
	    var h=ndate.getTime()
	    if(h-window.localStorage.getItem("number")>10000){
	    	// console.log("过了1分钟")
	        $.ajax({
				url:"./server/answer.php",
				type:'post',
				dataType:"json",
				data:json,
				success:function(data0){
					console.log(data0)
					if(data0.code==3){
						alert("你已被封禁")
					}
				},
				err:function(data){
					// console.log("连接失败",data)
				},
				complete:function(){
					window.location.reload()
				},
			})
	        window.localStorage.removeItem("number")
	    }else{
	        alert("未注册用户发帖时间间隔不得小于1分钟")
	    }
			
	})


















	$(".bbs_page ul li").click(function(){
		$(".answer_left").empty();
		console.log($(".bbs_page ul").find("li").index(this))
		var pagenum=$(".bbs_page ul").find("li").index(this)

		$.ajax({
			url:"./server/getlist.php",
			type:'post',
			dataType:"json",
			data:answerindex,
			success:function(data){
				var num=data.length/10
				for(i=pagenum*10;i<pagenum*10+10;i++){
					$(".answer_left").append(`<li>
								<input type="button" value="${i+1}楼" name="" disabled="">
						<div class="answer_article">
							<pre>${data[i].article}</pre>
						</div>
						<div class="answer_foot">
							<span class="answer_user">${data[i].creater}</span>
							<span class="answer_dater">${data[i].nowdate}</span>
						</div>
					
							</li>`)
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