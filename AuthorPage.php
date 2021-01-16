<!DOCTYPE html> 
<html>
<head>
	<title>Author Page</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">  
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="incubator-echarts-4.2.1\dist\echarts.js"></script>
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
</style>
</head>

<body>
	
	<!--导航栏-->
	<ul class="nav nav-tabs">
	<li><a href=HomePage.php>Home</a></li>
	<li class="active"><a href="#">Author</a></li>
	<li><a href="PaperSearch.php?paper_title=&page=1">Paper</a></li>
	<li><a href="ConferenceSearch.php?conference_name=&page=1">Conference</a></li>
	</ul>
	

	<?php
		#作者信息列表ID, Name, Affiliation
		$author_id0 = $_GET["author_id"];
		$link = mysqli_connect("localhost:3306", "root", "", 'final_project');  //连接MySQL
		$result = mysqli_query($link, "SELECT AuthorName from authors where AuthorID = '$author_id0'");
		$author_name = mysqli_fetch_array($result)['AuthorName'];
		//<!--网页标题-->
		echo '<div class="page-header"><center><h1>'.$author_name;
    	echo '<br><small>Author information in detail</small></h1></center></div>';	
	?>

	<!--左侧三个网格-->
	<!--作者图片-->
	<div class='container'>
		<div class='row clearfix'>
			<div class='col-md-3 column'>
				<div class="container">
					<img src=/img/authorpicture.png class="img-responsive" alt="ERROR" width="230" height="230"><br>
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
		#作者信息列表ID, Name, Affiliation
		echo "<b>Author ID: </b>".$author_id0;
		echo "<br><br>";
		echo "<b>Author Name: </b>".$author_name;
		echo "<br><br>";
	?>
			</div>
		</div>
		<!--机构面板-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Affiliation</b>
				</h3>
			</div>
			<div class="panel-body">
	<?php
		# 机构名列表
		echo "<ul>";
		$affiliation_info = mysqli_query($link, "SELECT Affiliations.AffiliationID, Affiliations.AffiliationName from (select AffiliationID, count(*) as cnt from Paper_Author_Affiliation where AuthorID='$author_id0' and AffiliationID is not null group by AffiliationID order by cnt desc) as tmp inner join Affiliations on tmp.AffiliationID = Affiliations.AffiliationID");
		if($affiliation_info){
			while ($row2=mysqli_fetch_array($affiliation_info)){
				$affiliation_name=$row2['AffiliationName'];						
				echo "<li>$affiliation_name</li>";}
				}
		echo "</ul>";
	?>
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
							<th>PaperTitle</th>
							<th>Conference</th>
							<th>Year</th>
							<th>Authors</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$num_rec_per_page = 10;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $num_rec_per_page;//
		$result = mysqli_query($link, "SELECT PaperID from Paper_Author_Affiliation where AuthorID='$author_id0' LIMIT $start_from, $num_rec_per_page");
		$result1 = mysqli_query($link, "SELECT PaperID from Paper_Author_Affiliation where AuthorID='$author_id0'");
		$count0 = mysqli_num_rows($result1);
		if ($result) {
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				$paper_id = $row['PaperID'];
				if (mysqli_num_rows($result)==0) {echo "not found";}
				else{
				$paper_info = mysqli_fetch_array(mysqli_query($link, "SELECT Title, ConferenceID, PaperPublishYear from Papers where PaperID='$paper_id'"));
				$paper_title = $paper_info['Title'];
				$conf_id = $paper_info['ConferenceID'];
				$year = $paper_info['PaperPublishYear'];				
				# PaperTitle列
				echo "<td><p class='text-justify'><a href=\"/PaperPage.php?paper_id=$paper_id\">$paper_title</a></p></td>";
				# Conference 列
				$conf_info = mysqli_fetch_array(mysqli_query($link, "SELECT ConferenceName,ConferenceID from Conferences where ConferenceID='$conf_id'"));
				$conference_name = $conf_info['ConferenceName'];
				$conference_id = $conf_info['ConferenceID'];
				echo "<td><a href=\"/ConferencePage.php?conference_id=$conference_id&page=1\">$conference_name</a></td>";				
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
						}}
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
	echo "<li><a href='AuthorPage.php?author_id=$author_id0&page=".$formerpage."'>"."&laquo;</a></li>";
	for ($i=max(1,$page-3); $i<=$total_pages&&$i<$page; $i++) { 
            echo "<li><a href='AuthorPage.php?author_id=$author_id0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li class='active'><a href='AuthorPage.php?author_id=$author_id0&page=".$i."'>".$i."</a></li>";
	for ($i=$page+1; $i<=$total_pages&&$i<=$page+3; $i++) { 
            echo "<li><a href='AuthorPage.php?author_id=$author_id0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li><a href='AuthorPage.php?author_id=$author_id0&page=".$nextpage."'>"."&raquo;</a></li>";
?>
</ul></center>

</div>
</div><!--面板结束--> 


<!--作者关系图-->
<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Relationship Graph</b>
				</h3>
			</div>
			<div class="panel-body">
			
			<div id="main" style="width: 800px;height: 900px;"></div>


<script type="text/javascript">
		var dom = document.getElementById('main');
		var myChart = echarts.init(dom);
        myChart.showLoading({ text: 'Loading......' });

//这里建立那些最终的nodes和links列表
var hostauthor_node = [];//创建一个空数组
var paperid_nodes = [];//这个也是某一页面中固定的
var otherauthors_nodes = [];///////////////这个数组对于每一个paperid都要在搜索之后更新
var hostauthor_paperid_links = [];
var paperid_otherauthors_links = [];///////////////这个数组对于每一个paperid都要在搜索之后更新//干脆两个一起更新得了
</script>

<?php
	$author_id =$author_id0;//$_GET["author_id"];

	$result = mysqli_query($link, "SELECT AuthorName from authors where AuthorID = '$author_id'");
	$author_name = mysqli_fetch_array($result)['AuthorName'];
	$author_name = json_encode($author_name);//没问题




$result = mysqli_query($link, "SELECT PaperID from paper_author_affiliation where AuthorID = '$author_id'");
    $paper_id_list = array();//建立php空数组
    while($paper_id = mysqli_fetch_array($result)){//mysqli_fetch_array()函数只取一行！！！
        $paper_id_list[] = $paper_id['PaperID'];//往php数组尾部添加新元素的方法，这样会以依次增加的整数作为index
    }//$paper_id_list确实是个php数组！
    //这个过程相当于把所有键值对的index换成递增整数，得到这样一个php数组

$author_id_list=array();
$author_name_list=array();
$length_list=array();
$period_count=0;

        //分别查询
        for($x=0;$x<count($paper_id_list);$x++){


            $this_paperid=$paper_id_list[$x];
        $author_id_result= mysqli_query($link, "SELECT AuthorID from paper_author_affiliation where PaperID='$this_paperid' order by AuthorSequence");
        $author_name_result = mysqli_query($link, "SELECT authors.AuthorName from (select AuthorID,AuthorSequence from paper_author_affiliation where PaperID='$this_paperid' and AuthorID is not null group by AuthorID order by AuthorSequence) as tmp inner join authors on tmp.AuthorID = authors.AuthorID");

        //向数组中依次添加元素
        while($this_author_id = mysqli_fetch_array($author_id_result)){
            $author_id_list[] = $this_author_id['AuthorID'];//这里不要加表的名字！！！！就是直接字段的名字就好！！！！写数字也行，但是不能乱写
            $period_count++;
        }
        while($this_author_name = mysqli_fetch_array($author_name_result)){
            $author_name_list[] = $this_author_name['AuthorName']; 
        }
        //对于此次查询需要添加的node数（也是link数
        $length_list[] = $period_count;//不包括中心作者
        $period_count=0;

        }
?>




<script>
hostauthor_node.push({"name":<?php echo $author_name;?>,
                    "value":4,
                    "category":0});//中心author的node列表完成 

var PaperIDList = <?php echo json_encode($paper_id_list);?>;//直接把php数组变成JS数组。
for(i=0;i<PaperIDList.length;i++){
    paperid_nodes.push({"name":"",
                "value":100,
                "category":0});//这个也完成了
    hostauthor_paperid_links.push({"source":0,
                                    "target":i+1});
}


//把这三个整体数组转换为
var AuthorIDList = <?php echo json_encode($author_id_list);?>;
var AuthorNameList = <?php echo json_encode($author_name_list);?>;
var LengthList = <?php echo json_encode($length_list);?>;

var two_parts = 1+PaperIDList.length;
var overall_count = 1+PaperIDList.length;

var author_id = <?php echo json_encode($author_id)?>;
for(m=0;m<LengthList.length;m++){
    for(n=0;n<LengthList[m];n++){
        
        if(AuthorIDList[overall_count-two_parts]!=author_id){//这里原本不等号右边是一个从php中echo的过程，非常费时，加载不出来。所以要把这个author_id变量直接存在JS内存里
            otherauthors_nodes.push({"name":AuthorNameList[overall_count-two_parts],
                            "value":AuthorIDList[overall_count-two_parts],
                            "category":0});
            paperid_otherauthors_links.push({"source":m+2,
                                        "target":overall_count-m});
        
        }
        overall_count++;
        
    }
}

		var webkitDep={
			"type": "force",
			"categories": [//关系网类别，可以写多组
			{
            "name": "Relationship",//关系网名称
            "keyword": {},
            "base": "Relationship"
        	}],
        	"nodes":(hostauthor_node.concat(paperid_nodes)).concat(otherauthors_nodes),
        	"links":hostauthor_paperid_links.concat(paperid_otherauthors_links)
        };


myChart.hideLoading();

        option = {
        legend: {
            data: ['Relationship']//此处的数据必须和关系网类别中name相对应
        },
        series: [{
            type: 'graph',
            layout: 'force',
            animation: false,//这里改成true好像没什么变化
            label: {
                normal: {
                    show:true,
                    position: 'right'//节点的名称（即label）显示在点的右侧
                }
            },
            draggable: true,//这里原来是true，太烦人了改了
            data: webkitDep.nodes.map(function (node, idx) {
                node.id = idx;
                return node;
            }),
            categories: webkitDep.categories,
            force: {
                edgeLength: 105,//连线的长度
                repulsion: 100  //子节点之间的间距
            },
            edges: webkitDep.links
        }]
    };
    myChart.setOption(option);

    myChart.on('click',function(param){
    var selected = param.value;
        if (selected) {

            location.href = "AuthorPage.php?author_id="+selected+"&page=1";
        }
});

	</script>


			</div>
		</div><!--图面板结束-->
</div>  <!--右侧9网格结束-->
</div>  <!--两列网格结束-->
</div>


</body>

</html>