<!DOCTYPE html> 
<html>
<head>
	<title>Author Search</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">  
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
	body {
		background-color: #f5fff6;
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
	
	<!--网页标题-->
	<center>
	<div class="page-header">
    <center><h1>Author Search Page
        <small>Search for the Author Name You Input</small>
    </h1>
	</center>
	</div>
	</center>

	<div class='container'>
		<div class='row clearfix'>
			<div class='col-md-12 column'>

	<?php
		# 显示搜索内容和返回结果
		$author_name0 = $_GET["author_name"];
		$num_rec_per_page = 10; //
		$link = mysqli_connect("localhost:3306", "root", "", 'final_project');  ////连接MySQL
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //
		$start_from = ($page-1) * $num_rec_per_page;//
		$result = mysqli_query($link, "SELECT AuthorName,AuthorID from authors where AuthorName like '%$author_name0%'LIMIT $start_from, $num_rec_per_page");
		$result1 = mysqli_query($link, "SELECT AuthorName,AuthorID from authors where AuthorName like '%$author_name0%'");
		$count = mysqli_num_rows($result1);

		echo "<center>";
		echo "<p class='text-primary'>Search for Author:";
		echo "$author_name0</p>";
		echo "<br>";
		echo "<p class='text-primary'>total result number:";
		echo "$count</p>";
		echo "<br>";
		echo "</center>";
	?>
	
	<!--带表格面板-->
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<b>Author Table</b>
			</h3>
		</div>

		<div class="panel-body">				
			<!--悬停表格-->
			<table class='table table-hover'>
				<thead>
					<tr style='color:sienna'>
						<th>Author</th>
						<th>number of paper</th>
						<th>Affiliation</th>
					</tr>
				</thead>
				<tbody>
	<?php
		{
		while ($row1 = mysqli_fetch_array($result)){
			echo "<tr>";
			$author_name = $row1['AuthorName'];
			$author_id =  $row1['AuthorID'];
			# 作者列
			echo "<td>";
			echo "<a href=\"/AuthorPage.php?author_id=$author_id&page=1\">$author_name</a>";
			echo "</td>";
			# 论文数列
			$author_id = $row1['AuthorID'];
			$count1 = mysqli_query($link, "SELECT COUNT(*) AS nums from Paper_Author_Affiliation where AuthorID='$author_id'");
			echo "<td>".mysqli_fetch_array($count1)['nums'];
			echo "</td>";
			# 机构列
			echo "<td>";
			echo "<ul>";
			$affiliation_info = mysqli_query($link, "SELECT Affiliations.AffiliationID, Affiliations.AffiliationName from (select AffiliationID, count(*) as cnt from Paper_Author_Affiliation where AuthorID='$author_id' and AffiliationID is not null group by AffiliationID order by cnt desc) as tmp inner join Affiliations on tmp.AffiliationID = Affiliations.AffiliationID");
			if($affiliation_info){
					while ($row2=mysqli_fetch_array($affiliation_info)){
						$affiliation_name=$row2['AffiliationName'];						
						echo "<li>$affiliation_name</li><br>";
						}
					}
					echo "</ul>";
					echo "</td>";
			echo "</tr>";
			}
		}
	?>
</tbody>
</table>

<center>
<ul class="pagination pagination-lg">
<?php
	$total_records = $count;
	$total_pages = ceil($total_records / $num_rec_per_page);
	$formerpage = max(1,$page-1);
	$nextpage = min($total_pages,$page+1);
	echo "<li><a href='AuthorSearch.php?author_name=$author_name0&page=".$formerpage."'>"."&laquo;</a></li>";
	for ($i=max(1,$page-3); $i<=$total_pages&&$i<$page; $i++) { 
            echo "<li><a href='AuthorSearch.php?author_name=$author_name0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li class='active'><a href='AuthorSearch.php?author_name=$author_name0&page=".$i."'>".$i."</a></li>"; 
	for ($i=$page+1; $i<=$total_pages&&$i<=$page+3; $i++) { 
            echo "<li><a href='AuthorSearch.php?author_name=$author_name0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li><a href='AuthorSearch.php?author_name=$author_name0&page=".$nextpage."'>"."&raquo;</a></li>";
?>
</ul>
</center>
</div>
</div>
</body>
</html>