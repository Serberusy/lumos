<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	  <!-- 引入 ECharts 文件 -->
	<script src="incubator-echarts-4.2.1\dist\echarts.min.js"></script>
	<style type="text/css">
	body {
		background-color: #f5fffa;
		text-align: left;
	}
	h1{
		color: #0a5290;
	}



</style>

	
</head>

<body>

	<?php 
		$link = mysqli_connect("localhost:3306", "root", "", "final_project"); //连接MySQL
		$result = mysqli_query($link, "SELECT ConferenceID,COnferenceName from conferences");
		$count = mysqli_num_rows($result);  //总的paper数
		//echo $count;
		$conference = array();
		while($row = mysqli_fetch_array($result)){
			//echo $row['ConferenceID'];
			//echo "<br>";
			$conference[]=$row['COnferenceName']; // conference是个数组
			$conferenceid=$row['ConferenceID'];  //用于后面根据conferenceid选择paper
			$conference_id[]=$row['ConferenceID'];  //将每个conferenceid转化为数组
			$result1 = mysqli_query($link, "SELECT Title from papers where ConferenceID = '$conferenceid'");
			$count1 = mysqli_num_rows($result1);  //统计总论文量
			$count2[] = $count1; // 将每个会议的论文发表量转化为数组
		}

	 ?>


	 <div id="main" style="width: 1000px;height:600px;margin: auto"></div>
		<script type="text/javascript">
		// 基于准备好的dom，初始化echarts实例	
        var myChart = echarts.init(document.getElementById('main'));
        var conference_name = eval(<?php echo json_encode($conference);?>);
        var num_of_paper = eval(<?php echo json_encode($count2);?>);
        var con_id = eval(<?php echo json_encode($conference_id);?>)
        var data = [];
        var con_name = [];
        for(var i=0;i<conference_name.length;i++)
        {
        	
        	data[i] = {
        		value:num_of_paper[i], 
        		name: conference_name[i],
        		url:'ConferencePage.php?conference_id='+con_id[i]+'&page=1'   //连接符
        	};
        	con_name[i] = conference_name[i];
        }


        var option = {
		    title : {
		    	top: 40,
		        text: 'Proportions of papers published in each conference',
		        subtext: 'click on the next color blocks to close or open the corresponding graphics',
		        x:'center',
		        textStyle: {fontSize:24},
		        subtextStyle: {fontSize:12}
		    },
		    tooltip : {
		        trigger: 'item',
		        formatter: "{a} <br/>{b} : {c} ({d}%)"
		    },
		    legend:{
		    	top: 90,
		        orient: 'vertical',
		        right: 5,
		        data: con_name,
		    },

		    series : [
		        {
		            name: 'ConferenceName',
		            type: 'pie',
		            radius : '55%',
		            center: ['50%', '55%'],
		            data:data.sort(function (a, b) { return a.value - b.value; }), //按占比从小到大排列
		            itemStyle: {
		                emphasis: {
		                    shadowBlur: 10,
		                    shadowOffsetX: 0,
		                    shadowColor: 'rgba(0, 0, 0, 0.5)'
		                }
		            },
		            // 图形出来的效果
		            animationType: 'scale',
		            animationEasing: 'elasticOut',
            		animationDelay: function (idx) {
				    // 越往后的数据延迟越大
				    return idx * 100;
}
		        }
		    ]
		};

         myChart.setOption(option);
         //添加超链接 在data上添加
        myChart.on('click',function(params){ //on 绑定点击事件 所有的鼠标事件都包含param param这是一个包含点击图形的数据信息的对象 包含data
         	var url = params.data.url;
         	window.open(url);//新建页面
         })
				</script>
	<!--图-->

	
</body>

</html>