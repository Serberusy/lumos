<!DOCTYPE html> 
<html>
<head>
	<title>Paper Page</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">  
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
	<li class="active"><a href="#">Paper</a></li>
	<li><a href="ConferenceSearch.php?conference_name=&page=1">Conference</a></li>
	</ul>

	<!--网页标题-->	
	<?php
		#论文信息：ID，Title, Year, Affiliation
		$link = mysqli_connect("localhost:3306", "root", "", 'final_project');  //连接MySQL
		$paper_id = $_GET["paper_id"];
		$paper_info = mysqli_fetch_array(mysqli_query($link, "SELECT Title,ConferenceID,PaperPublishYear from papers where PaperID = '$paper_id'"));
		$title = $paper_info['Title'];
		echo '<div class="page-header"><center><h1>'.$title;
		echo '<br><small>Paper information in detail</small></h1></center></div>';	
	?>

	<!--左侧三个网格-->
	<!--作者图片-->
	<div class='container'>
		<div class='row clearfix'>
			<div class='col-md-3 column'>
				<div class="container">
					<img src=/img/paperpic.png class="img-responsive" alt="ERROR" width="230" height="230"><br>
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
		#论文信息：ID，Title, Year, Affiliation
		$year= $paper_info["PaperPublishYear"];
		$conf_id= $paper_info["ConferenceID"];
		$conf_info = mysqli_fetch_array(mysqli_query($link, "SELECT ConferenceName from Conferences where ConferenceID='$conf_id'"));
		$conference_name=$conf_info['ConferenceName'];
		echo "<b>Paper ID: </b>".$paper_id;
		echo "<br><br>";
		echo "<b>Paper Title: </b>".$title;
		echo "<br><br>";
		echo "<b>Year: </b>".$year;
		echo "<br><br>";		

		# GET Affiliation_info
		$affiliation_info = mysqli_fetch_array(mysqli_query($link, "SELECT Affiliations.AffiliationName from (select AffiliationID from Paper_Author_Affiliation where PaperID='$paper_id') as tmp inner join Affiliations on tmp.AffiliationID = Affiliations.AffiliationID"));
		$affiliation = $affiliation_info['AffiliationName'];
		echo "<b>Affiliation: </b>".$affiliation;
		echo "<br><br>";
	?>
			</div>
		</div>



<?php		
			$reference_info =mysqli_query($link, "SELECT Papers.Title, Papers.PaperID from (select ReferenceID from paper_reference where PaperID='$paper_id') as tmp inner join papers on tmp.ReferenceID = papers.PaperID");
			$a=array();
			$invalid=array("to","for","of","a","an","and","or","in","on","at","under","with","as","based","according","the","measure","mean","means","methods","measures","method","from","avove","about","but","is","am","are","all","but","will","have","has","should","may","might","be","using");
			if($reference_info){
				echo "<ul>";
				while ($rowrow=mysqli_fetch_array($reference_info)){
					$reference_title=$rowrow['Title'];
					$reference_id=$rowrow['PaperID'];
					$word=explode(" ",$reference_title);

					foreach($word as $value){
						if(! in_array($value, $invalid))
						{array_push($a,$value);}
						}
					//echo "<li><a href=\"/PaperPage.php?paper_id=$reference_id\">$reference_title</a></li><br>";
					}
				$fin=array();
				$length=count($a);
				for($i=0;$i<$length;$i++)
				{
					for($j=$i+1;$j<$length;$j++)
						{if($a[$j]==$a[$i]) 
							if(! in_array($a[$i], $fin))
							{array_push($fin,$a[$i]);}}
				}
				$word2=explode(" ",$title);
				foreach($word2 as $value)
				{
					if(! in_array($value ,$invalid) AND ! in_array($value,$fin))
						{array_push($fin,$value);}
				}
				echo "</ul>";


			}		
	?>


		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Tag Cloud</b>
				</h3>
			</div>
	<!--<div style="height: 10px; width: 100px;">
  		<div class="tagcloud">
  		</div>
	</div>-->
			<div class="panel-body">
				<div class="tagcloud">
		<?php
		foreach ($fin as $value)
		{
		echo"<a class='aa' href=\"/PaperSearch.php?paper_title=$value&page=1\">$value </a>";
		}
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
		
		<!--Author面板-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Author</b>
				</h3>
			</div>
			<div class="panel-body">
	<?php
			echo "<ol>";

			$author_info = mysqli_query($link, "SELECT authors.AuthorName, Authors.AuthorID from (select AuthorID,AuthorSequence from Paper_Author_Affiliation where PaperID='$paper_id' and AuthorID is not null group by AuthorID order by AuthorSequence) as tmp inner join Authors on tmp.AuthorID = Authors.AuthorID");
			if($author_info){
				while ($rowrow=mysqli_fetch_array($author_info)){
					$author_name=$rowrow['AuthorName'];
					$author_id=$rowrow['AuthorID'];
					echo "<li><a href=\"/AuthorPage.php?author_id=$author_id&page=1\">$author_name</a></li><br>";
					}
				}
				echo "</ol>";
	?>
			</div>
		</div>

		<!--Reference面板-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Reference</b>
				</h3>
			</div>
			<div class="panel-body">
	<?php		
			$reference_info =mysqli_query($link, "SELECT Papers.Title, Papers.PaperID from (select ReferenceID from paper_reference where PaperID='$paper_id') as tmp inner join papers on tmp.ReferenceID = papers.PaperID");
			if($reference_info){
				echo "<ul>";
				while ($rowrow=mysqli_fetch_array($reference_info)){
					$reference_title=$rowrow['Title'];
					$reference_id=$rowrow['PaperID'];
					echo "<li><a href=\"/PaperPage.php?paper_id=$reference_id\">$reference_title</a></li><br>";
					}
				echo "</ul>";
			}		
	?>
			</div>
		</div>
	</div> <!--面板结束-->
</div>  <!--右侧9网格结束-->
</div>  <!--两列网格结束-->
</body>
</html>