<!DOCTYPE html> 
<html>

<body>
	<?php
	$search_info = $_GET["search_info"];
	$judge = $_GET["aa"];
	if($judge=="author") {header("location:AuthorSearch.php?author_name=$search_info&page=1");}
	if($judge=="paper") {header("location:PaperSearch.php?paper_title=$search_info");}
	if($judge=="conference") {header("location:ConferenceSearch.php?conference_name=$search_info&page=1");}
	?>
</body>

</html>