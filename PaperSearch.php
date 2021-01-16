<!DOCTYPE html> 
<html>
<head>
	<title>Paper Search</title>
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
	<li><a href="AuthorSearch.php?author_name=&page=1">Author</a></li>
	<li class="active"><a href="#">Paper</a></li>
	<li><a href="ConferenceSearch.php?conference_name=&page=1">Conference</a></li>
	</ul>
	
	<!--网页标题-->
	<center>
	<div class="page-header">
    <center><h1>Paper Search Page
        <small>Search for the Paper Title You Input</small>
    </h1>
	</center>
	</div>
	</center>

	<div class='container'>
		<div class='row clearfix'>
			<div class='col-md-12 column'>

	<?php
		# 显示搜索内容和返回结果
		$paper_title0 = $_GET["paper_title"];
		$num_rec_per_page = 10; //
		$link = mysqli_connect("localhost:3306", "root", "", 'final_project');  //连接MySQL
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //
		$start_from = ($page-1) * $num_rec_per_page;//

		$result = mysqli_query($link, "SELECT PaperID,Title,ConferenceID,PaperPublishYear from papers where Title LIKE '%$paper_title0%'LIMIT $start_from, $num_rec_per_page");
		$result1 = mysqli_query($link, "SELECT PaperID,Title,ConferenceID,PaperPublishYear from papers where Title LIKE '%$paper_title0%'");
		$count = mysqli_num_rows($result1);

		echo "<center>";
		echo "<p class='text-primary'>Search for Paper:";
		echo "$paper_title0</p>";
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
				<b>Paper Table</b>
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
		{
		while ($row1 = mysqli_fetch_array($result)){
			$paper_title = $row1['Title'];
			$paper_id = $row1['PaperID'];
			$year = $row1['PaperPublishYear'];
			$conf_id = $row1['ConferenceID'];

			# PaperTitle列
			echo "<td><p class='text-justify'><a href=\"/PaperPage.php?paper_id=$paper_id\">$paper_title</a></p></td>";

			# Conference 列
			$conf_info = mysqli_fetch_array(mysqli_query($link, "SELECT ConferenceName from Conferences where ConferenceID='$conf_id'"));
			$conference_name = $conf_info['ConferenceName'];
			echo "<td><a href=\"/ConferencePage.php?conference_id=$conf_id&page=1\">$conference_name</a></td>";
				
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
	echo "<li><a href='PaperSearch.php?paper_title=$paper_title0&page=".$formerpage."'>"."&laquo;</a></li>";
	for ($i=max(1,$page-3); $i<=$total_pages&&$i<$page; $i++) { 
            echo "<li><a href='PaperSearch.php?paper_title=$paper_title0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li class='active'><a href='PaperSearch.php?paper_title=$paper_title0&page=".$i."'>".$i."</a></li>"; 
	for ($i=$page+1; $i<=$total_pages&&$i<=$page+3; $i++) { 
            echo "<li><a href='PaperSearch.php?paper_title=$paper_title0&page=".$i."'>".$i."</a></li>"; 
	};
	echo "<li><a href='PaperSearch.php?paper_title=$paper_title0&page=".$nextpage."'>"."&raquo;</a></li>";
?>
</ul></center>
</div>
</div>
</body>
</html>