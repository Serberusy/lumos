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
		$result = mysqli_query($link, "SELECT PaperPublishYear from papers");
	
		$year = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		while($row = mysqli_fetch_array($result)) //所有数据形成数组
		{
			if($row['PaperPublishYear']>1968)
			{
				$year[$row['PaperPublishYear']-1969]+=1;
			}
			else continue;
		}
		
		$years = json_encode($year);
		
	 ?>

	 <div id="main" style="width: 1200px;height:600px;margin: auto"></div>
		<script type="text/javascript">
		// 基于准备好的dom，初始化echarts实例	
        var myChart = echarts.init(document.getElementById('main'));
        var data = <?php echo $years;?>;


        var dataxAxis = ["1969","1970","1971","1972","1973","1974","1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1996","1997","1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016"];
        var yMax = 7000;
        var dataShadow = [];

		
		for (var i = 0; i < data.length; i++) {
		    dataShadow.push(yMax);
		}

		 var option = {
		    title: {
		    	left: '6%',
		        text: 'Paper Publication Per Year after 1969',
		        subtext: 'Slide the Mouse Wheel to Enlarge the Legend',
		        textStyle: {fontSize:20},
		        subtextStyle: {fontSize:14}
		    },
		    tooltip: {
		        trigger: 'axis',
		    },
		    toolbox: {
		    	show: true,
		    	orient: 'horizontal',
		    	itemSize: 15,
		    	showTitle: true,
		    	feature: {
		    		restore: {
		    			show: true,
		    			title: 'restore'
		    		},
		    		magicType: {
		    			show: true,
		    			type: ['line','bar'],
		    			title: {
		    				line: 'switch to line chart',
		    				bar: 'switch to bar chart'
		    			},
		    			option: {line: {}}
		    		},
		    	},
		    	right: 110
		    },
		    xAxis: {
		        data: dataxAxis,
		        axisLabel: {
		            inside: true,
		            rotate: 87,
		            margin: 6,
		            textStyle: {
		                color: '#fff'
		            }
		        },
		        axisTick: {
		            show: false
		        },
		        axisLine: {
		            show: false
		        },
		        z: 10
		    },
		    yAxis: {
		        axisLine: {
		            show: false
		        },
		        axisTick: {
		            show: false
		        },
		        axisLabel: {
		            textStyle: {
		                color: '#999'
		            }
		        }
		    },
		    dataZoom: [
		        {
		            type: 'inside'
		        }
		    ],
		    series: [
		        { // For shadow
		            type: 'bar',
		            itemStyle: {
		                normal: {color: 'rgba(0,0,0,0.05)'}
		            },
		            barGap:'-100%',
		            barCategoryGap:'40%',
		            data: dataShadow,
		            animation: false
		        },
		        {
		        	name: 'Publication of papers',
		            type: 'bar',
		            itemStyle: {
		                normal: {
		                    color: new echarts.graphic.LinearGradient(
		                        0, 0, 0, 1,
		                        [
		                            {offset: 0, color: '#83bff6'},
		                            {offset: 0.5, color: '#188df0'},
		                            {offset: 1, color: '#188df0'}
		                        ]
		                    )
		                },
		                emphasis: {
		                    color: new echarts.graphic.LinearGradient(
		                        0, 0, 0, 1,
		                        [
		                            {offset: 0, color: '#2378f7'},
		                            {offset: 0.7, color: '#2378f7'},
		                            {offset: 1, color: '#83bff6'}  //鼠标移动时的渐变
		                        ]
		                    )
		                }
		            },
		            data: data
		        }
		    ]
		};

		// Enable data zoom when user click bar.
		var zoomSize = 6;
		myChart.on('click', function (params) {
		    console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
		    myChart.dispatchAction({
		        type: 'dataZoom',
		        startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
		        endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
		    });
		});
		 myChart.setOption(option);

				</script>
	<!--图-->
</body>

</html>