<!DOCTYPE html> 
<html>
<head>
	<title>Conference Page</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">  
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="incubator-echarts-4.2.1\dist\echarts.min.js"></script>
	<link rel="stylesheet" href="dist/tagcloud.min.css">
	<script src="dist/tagcloud.min.js"></script>

	<style type="text/css">
	body {
		background-color: #f5fffa;
		text-align: left;
	}
	h1{
		color: #0a5290;
	}
	.table tbody tr td{
        vertical-align: middle;
    }
    .tagcloud>a{
		color: #0a5290;
	}
</style>
</head>

<body>
	
	<!--导航栏-->
	<ul class="nav nav-tabs">
	<li><a href=HomePage.php>Home</a></li>
	<li><a href="AuthorSearch.php?author_name=&page=1">Author</a></li>
	<li><a href="PaperSearch.php?paper_title=&page=1">Paper</a></li>
	<li class="active"><a href="#">Conference</a></li>
	</ul>



	<!--网页标题-->
	<?php
		#会议信息列表ID, Name, Affiliation
		$conference_id = $_GET["conference_id"];
		$link = mysqli_connect("localhost:3306", "root", "", 'final_project'); //连接MySQL
		$result = mysqli_query($link, "SELECT ConferenceName from conferences where ConferenceID='$conference_id'");
		$conference_name = mysqli_fetch_array($result)['ConferenceName'];
		echo '<center><h1>'.$conference_name;
		echo '<br><small>Conference information in detail</small></h1><br></center>';		
	?>
	
	<!--左侧三个网格-->
	<!--会议图片-->
	<div class='container'>
		<div class='row clearfix'>
			<div class='col-md-3 column'>
				<div class="container">
					<img src=/img/conf_pic.png class="img-responsive" alt="ERROR" width="230" height="230"><br>
				</div>		
	<!--基本介绍面板-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Brief Introduction</b>
				</h3>
			</div>
			<div class="panel-body">
	<?php
		#会议信息列表ID, Name, Affiliation
		echo "<b>Conferenc ID: </b>".$conference_id;
		echo "<br><br>";
		echo "<b>Conferenc Name: </b>".$conference_name;
		echo "<br><br>";
	?>
			</div>
		</div>
		<!--机构面板(暂存留着写其他信息！！！！)-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Conference</b>
				</h3>
			</div>
			<div class="panel-body">
	<div class="tagcloud">
	<?php
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43001016\">ECCV </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43319DD4\">NIPS </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=436976F3\">SIGKDD </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43ABF249\">WWW </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43FD776C\">SIGIR </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45083D2F\">CVPR </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45701BF3\">ICCV </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45F914AD\">NAACL</a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=465F7C62\">ICML </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=46A05BB0\">AAAI </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=46DAB993\">ACL </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=47167ADC\">EMNLP </a>";
		echo"<a class='aa' href=\"/ConferencePage.php?conference_id=47C39427\">IGCAI </a>";
	?>
</div>
	<script>
		tagcloud();
	</script>
			</div>
		</div>
	</div> <!--左侧三列结束-->


	<!--可视化图表(缺缺缺！！！)-->


	<!--右侧九个网格-->
	<div class="col-md-9 column">

		
		<!--带表格面板-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Peper Table</b>
				</h3>
			</div>
			<div class="panel-body">
				
				<!--悬停表格-->
				<table class='table table-hover'>
					<thead>
						<tr style='color:sienna'>
							<th>Paper</th>
							<th>Year</th>
							<th>Authors</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$num_rec_per_page = 10; //
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //
		$start_from = ($page-1) * $num_rec_per_page;//
		$result = mysqli_query($link, "SELECT PaperID,Title,PaperPublishYear from papers where ConferenceID='$conference_id' LIMIT $start_from, $num_rec_per_page");
		$result1 = mysqli_query($link, "SELECT PaperID,Title,PaperPublishYear from papers where ConferenceID='$conference_id'");
		$count0 = mysqli_num_rows($result1);


		$years = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		while($row1 = mysqli_fetch_array($result1)) //所有数据形成数组
		{
			if($row1['PaperPublishYear']>1968)
			{
				$years[$row1['PaperPublishYear']-1969]+=1;
			}
			else continue;
		}
		
		$yearsss = json_encode($years);





		if ($result) {
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				$paper_id = $row['PaperID'];
				# 请增加对mysqli_query查询结果是否为空的判断
				if (mysqli_num_rows($result)==0) {echo "not found";}
				else{
				$paper_title = $row['Title'];
				$year = $row['PaperPublishYear'];
				
				# PaperTitle列
				echo "<td><p class='text-justify'><a href=\"/PaperPage.php?paper_id=$paper_id\">$paper_title</a></p></td>";
				
				# Year 列
				echo "<td>$year</td>";

				# Author 列
				echo "<td>";
				echo "<ol>";
				$author_info = mysqli_query($link, "SELECT Authors.AuthorName, Authors.AuthorID from (select AuthorID,AuthorSequence from Paper_Author_Affiliation where PaperID='$paper_id' and AuthorID is not null group by AuthorID order by AuthorSequence) as tmp inner join Authors on tmp.AuthorID = Authors.AuthorID");
				if($author_info){
					while ($rowrow=mysqli_fetch_array($author_info)){
						$author_name=$rowrow['AuthorName'];
						$author_id=$rowrow['AuthorID'];
						echo "<li><a href=\"/AuthorPage.php?author_id=$author_id&page=1\">$author_name</a></li><br>";
						}

					}
				echo "</ol>";
				echo "</td>";
				echo "</tr>";
				}
			}
		}
	?>		
			</tbody>
		</table>

<center>
<ul class="pagination pagination-lg">
<?php
	$total_records = $count0;
	$total_pages = ceil($total_records / $num_rec_per_page);
	$formerpage = max(1,$page-1);
	$nextpage = min($total_pages,$page+1);
	echo "<li><a href='ConferencePage.php?conference_id=$conference_id&page=".$formerpage."'>"."&laquo;</a></li>";
	for ($i=max(1,$page-3); $i<=$total_pages&&$i<$page; $i++) { 
            echo "<li><a href='ConferencePage.php?conference_id=$conference_id&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li class='active'><a href='ConferencePage.php?conference_id=$conference_id&page=".$i."'>".$i."</a></li>"; 
	for ($i=$page+1; $i<=$total_pages&&$i<=$page+3; $i++) { 
            echo "<li><a href='ConferencePage.php?conference_id=$conference_id&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li><a href='ConferencePage.php?conference_id=$conference_id&page=".$nextpage."'>"."&raquo;</a></li>";
?>

</ul></center>
</div>
</div>
 <!--面板结束-->


<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Peper Table</b>
				</h3>
			</div>
			<div class="panel-body">



<!--图-->
		<center><div id="main" style="width: 700px;height:400px;margin: auto"></div>
		<script type="text/javascript">
		// 基于准备好的dom，初始化echarts实例	
        var myChart = echarts.init(document.getElementById('main'));
        var num = <?php echo $yearsss;?>;


        data = ["1969","1970","1971","1972","1973","1974","1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1996","1997","1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016"];

		var dateList = data.map(function (item) {  // js 返回新数组
		    return item;
		});
		var valueList = num.map(function (item) {
		    return item;
		});

		var option = {

		    // Make gradient line here
		    visualMap: {
		        show: false,
		        type: 'continuous',
		        seriesIndex: 0,
		        dimension: 0,
		        min: 0,
		        max: dateList.length+2
		    },


		    title:{
		        left: 'center',
		        text: 'Publication of papers per year after 1969'
		    },
		    tooltip: {
		        trigger: 'axis'
		    },
		    xAxis: {
		        data: dateList
		    }, 
		    yAxis: {
		        splitLine: {show: false}
		    },
		    grid: [{
		        bottom: '15%'
		    }, {
		        top: '15%'
		    }],
		    series: {
		        type: 'line',
		        showSymbol: false,
		        data: valueList,
		    }
		};
		 myChart.setOption(option);

				</script></center>


			</div>
		</div>




</div>


</div>  <!--右侧9网格结束-->
</div>  <!--两列网格结束-->


</body>

</html>