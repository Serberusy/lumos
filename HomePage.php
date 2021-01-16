<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home Page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href='http://fonts.googleapis.com/icon?family=Material+Icons' type='text/css'>
  <link rel="stylesheet" href="dist/sidenav.min.css" type="text/css">
  <style type="text/css">
    .toggle {
      display: block;
      height: 72px;
      line-height: 72px;
      text-align: center;
      width: 72px;
    }
    </style>
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">  
<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dist/tagcloud.css">
<script src="dist1/tagcloud.js"></script>
<script src="js/jrj6out.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>

<style>
  body {
  position: relative;
  margin: 0;
  overflow: hidden;
}

.intro-container {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: white;
  text-align: center;
  margin: 0 auto;
  right: 0;
  left: 0;
}

h1 {
  font-family: 'brandon-grotesque', sans-serif;
  font-weight: bold;
  margin-top: 0px;
  margin-bottom: 0;
  font-size: 20px;
  color: white;
}
@media screen and (min-width: 860px) {
  h1 {
    font-size: 80px;
    line-height: 52px;
    position: relative;
    top: -40px;
  }
}

.fancy-text {
  font-family: "adobe-garamond-pro",sans-serif;
  font-style: italic;
  letter-spacing: 1px;
  margin-bottom: 17px;
}

.button {
  position: absolute;
  cursor: pointer;
  display: inline-block;
  font-family: 'brandon-grotesque', sans-serif;
  text-transform: uppercase;
  min-width: 200px;
  margin-top: 30px;
  top: 200px;
  left: 650px;
}
.button:hover .border {
  box-shadow: 0px 0px 10px 0px white;
}
.button:hover .border .left-plane, .button:hover .border .right-plane {
  transform: translateX(0%);
}
.button:hover .text {
  color: #121212;
}
.button .border {
  border: 1px solid white;
  transform: skewX(-20deg);
  height: 32px;
  border-radius: 3px;
  overflow: hidden;
  position: relative;
  transition: .10s ease-out;
}
.button .border .left-plane, .button .border .right-plane {
  position: absolute;
  background: white;
  height: 32px;
  width: 100px;
  transition: .15s ease-out;
}
.button .border .left-plane {
  left: 0;
  transform: translateX(-100%);
}
.button .border .right-plane {
  right: 0;
  transform: translateX(100%);
}
.button .text {
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  transition: .15s ease-out;
}

.x-mark {
  right: 10px;
  top: 10px;
  position: absolute;
  cursor: pointer;
  opacity: 0;
}
.x-mark:hover .right {
  transform: rotate(-45deg) scaleY(1.2);
}
.x-mark:hover .left {
  transform: rotate(45deg) scaleY(1.2);
}
.x-mark .container {
  position: relative;
  width: 20px;
  height: 20px;
}
.x-mark .left, .x-mark .right {
  width: 2px;
  height: 20px;
  background: white;
  position: absolute;
  border-radius: 3px;
  transition: .15s ease-out;
  margin: 0 auto;
  left: 0;
  right: 0;
}
.x-mark .right {
  transform: rotate(-45deg);
}
.x-mark .left {
  transform: rotate(45deg);
}

.sky-container {
  position: absolute;
  color: white;
  margin: 0 auto;
  right: 0;
  left: 0;
  top: 2%;
  text-align: center;
  opacity: 0;
}
@media screen and (min-width: 860px) {
  .sky-container {
    top: 5%;
    right: 0;
    left: 0;
  }
}
.sky-container__right {
  display: inline-block;
  vertical-align: top;
  font-weight: bold;
}

.sky-container__right{
    position: relative;
    left: 0px;
    top: 20px;
}

.sky-container .thirty-one {
  letter-spacing: 4px;
}

.text-right {
  text-align: right;
}

.text-left {
  text-align: left;
}

.twitter:hover a {
  transform: rotate(-45deg) scale(1.05);
}
.twitter:hover i {
  color: #21c2ff;
}
.twitter a {
  bottom: -40px;
  right: -75px;
  transform: rotate(-45deg);
}
.twitter i {
  bottom: 7px;
  right: 7px;
  color: #00ACED;
}

.social-icon a {
  position: absolute;
  background: white;
  color: white;
  box-shadow: -1px -1px 20px 0px rgba(0, 0, 0, 0.3);
  display: inline-block;
  width: 150px;
  height: 80px;
  transform-origin: 50% 50%;
  transition: .15s ease-out;
}
.social-icon i {
  position: absolute;
  pointer-events: none;
  z-index: 1000;
  transition: .15s ease-out;
}

.youtube:hover a {
  transform: rotate(45deg) scale(1.05);
}
.youtube:hover i {
  color: #ec4c44;
}
.youtube a {
  bottom: -40px;
  left: -75px;
  transform: rotate(45deg);
}
.youtube i {
  bottom: 7px;
  left: 7px;
  color: #E62117;
}
</style>


<style type="text/css">

.table tbody tr td{
    vertical-align: middle;
}    
    * {
    margin: 0;
    padding: 0;
}

.container {
    height: 70px;
    width: 800px;
    margin: 30px auto 0 auto;
}

.parent {
    position: relative;
}

.search {
    width: 750px;
    height: 50px;
    left: 10px;
    border-radius: 30px;
    outline: none;
    border: 1px solid #ccc;
    padding-left: 20px;
    position: absolute;
    top: -10px;
}

.btn {
    height: 40px;
    width: 90px;
    border-radius: 15px;
    position: absolute;
    background-color: #6a96c9;
    font-size:20px;
    color: white;
    top: -5px;
    left: 655px;
    border: none;
    outline: none;
    cursor: pointer;
}

.radio{
    display: inline-block;
    position: relative;
    line-height: 18px;
    margin-right: 10px;
    cursor: pointer;
    color: white;
    font-size: 18px;
    font-weight: 500;
    top: -45px;
}
.radio input{
    display: none;
}
.radio .radio-bg{
    display: inline-block;
    height: 18px;
    width: 18px;
    margin-right: 5px;
    padding: 0;
    background-color: #87CEFA;
    border-radius: 100%;
    vertical-align: top;
    box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1) inset, 0 1px 4px rgba(0, 0, 0, 0.1) inset, 1px -1px 2px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.2s ease;
}
.radio .radio-on{
    display: none;
}
.radio input:checked + span.radio-on{
    width: 10px;
    height: 10px;
    position: absolute;
    border-radius: 100%;
    background: #FFFFFF;
    top: 4px;
    left: 4px;
    box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.3), 0 0 1px rgba(255, 255, 255, 0.4) inset;
    background-image: linear-gradient(#ffffff 0, #e7e7e7 100%);
    transform: scale(0, 0);
    transition: all 0.2s ease;
    transform: scale(1, 1);
    display: inline-block;
}
.tagcloud>a{
        color: #d9edf7;
        position: absolute;
        top:20px;
    }
</style>

<!--侧拉栏-->
<script src="js/prefixfree.min.js"></script>
</head>
<body>
<div id="nav_container" style="width: 50px;height: 50px;">
  <nav class="sidenav" data-sidenav data-sidenav-toggle="#sidenav-toggle">
      <div class="sidenav-brand">
        :)  Navigator
      </div>

      <div class="sidenav-header">
        Overview
      </div>

      <ul class="sidenav-menu">
        <li>
          <a href="Homepage.php">
            <span class="sidenav-link-icon">
              <i class="material-icons">payment</i>
            </span>
            <span class="sidenav-link-title">Home</span>
          </a>
        </li>
        <li>
          <a href="javascript:;" data-sidenav-dropdown-toggle class="active">
            <span class="sidenav-link-icon">
              <i class="material-icons">store</i>
            </span>
            <span class="sidenav-link-title">Overall Pictures</span>
            <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_down</i>
            </span>
            <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_up</i>
            </span>
          </a>

          <ul class="sidenav-dropdown" data-sidenav-dropdown>
            <li><a href="/rose.php"target = "_blank"><img src="/rose.png" width=150 height=70 /></a></li>
            <li><a href="/pie.php"target = "_blank"><img src="/pie.png" width=120 height=70 /></a></li>
            <li><a href="/allpaper.php"target = "_blank"><img src="/allpaper.png" width=120 height=70 /></a></li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" data-sidenav-dropdown-toggle>
            <span class="sidenav-link-icon">
              <i class="material-icons">assignment_ind</i>
            </span>
            <span class="sidenav-link-title">Productive Authors</span>
            <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_down</i>
            </span>
            <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_up</i>
            </span>
          </a>

          <ul class="sidenav-dropdown" data-sidenav-dropdown>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=811EE217">NO.1 xiaoou tang </a></li><!-- 这里添加明星作者list -->
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7F8038BA">NO.2 michael i jordan</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7E7A3A69">NO.3 jiawei han</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7F960928">NO.4 takeo kanade</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7FD78E52">NO.5 shuicheng yan</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=8020C741">NO.6 thomas s huang</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7B16FD3C">NO.7 alan yuille</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=80197C8B">NO.8 christopher d manning</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=7DB54482">NO.9 qiang yang</a></li>
            <li><a class='aa' target = "_blank"href="/AuthorPage.php?author_id=13E99422">NO.10 pascal fua</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" data-sidenav-dropdown-toggle>
            <span class="sidenav-link-icon">
              <i class="material-icons">shopping_cart</i>
            </span>
            <span class="sidenav-link-title">13 Conference</span>
            <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_down</i>
            </span>
            <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
              <i class="material-icons">arrow_drop_up</i>
            </span>
          </a>

          <ul class="sidenav-dropdown" data-sidenav-dropdown>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=43001016">ECCV </a></li><!-- 这里添加conference导航 -->
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=43319DD4">NIPS </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=436976F3">SIGKDD </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=43ABF249">WWW </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=43FD776C">SIGIR </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=45083D2F">CVPR </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=45701BF3">ICCV </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=45F914AD">NAACL</a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=465F7C62">ICML </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=46A05BB0">AAAI </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=46DAB993">ACL </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=47167ADC">EMNLP </a></li>
            <li><a class='aa' target = "_blank" href="/ConferencePage.php?conference_id=47C39427">IGCAI </a></li>
        </ul>
      </li>
    </ul>
      <div class="sidenav-header">
        About
      </div>
      
      <ul class="sidenav-menu">
        <li>
          <a href="javascript:;">
            <span class="sidenav-link-icon">
              <i class="material-icons">settings</i>
            </span>
            <span class="sidenav-link-title">Developers Information</span>
          </a>
        </li>
      </ul>
    </nav>

    <a href="javascript:;" class="toggle" id="sidenav-toggle">
      <i class="material-icons">menu</i>
    </a>
  
  <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
  <script src="dist/sidenav.min.js"></script>
    <script>$('[data-sidenav]').sidenav();</script>
</div>




<div class="x-mark">
	<div class="container">
		<div class="left"></div>
		<div class="right"></div>
	</div>
</div>
<div class="intro-container">
  
  <!--网页标题-->
  <center>  
    <center><h1>LUMOS</h1></center>  
  </center>
  <!--搜索框-->
  <div class='container'>
    <div class='row clearfix'>
      <form action="JudgeSearch.php" class="parent" method="get">
        <div class='col-md-12 column'>
          <div class="container">         
            <input type="text" style="color:black" class="search" name="search_info" placeholder="What do you want to search ?">
            <input type="submit" class="btn" value="search">          
          </div>  
        </div>
        <div class='col-md-12 column'>
          <center>
            <label for="1" class="radio">
              <span class="radio-bg"></span>
              <input type="radio" name="aa" id="1" value="author" /> Author
              <span class="radio-on"></span>
            </label>
            <label for="2" class="radio">
                <span class="radio-bg"></span>
                <input type="radio" name="aa" id="2" value="paper" /> Paper
                <span class="radio-on"></span>
            </label>
            <label for="3" class="radio">
                <span class="radio-bg"></span>
                <input type="radio" name="aa" id="3" value="conference"  checked="checked"/> Conference
                <span class="radio-on"></span>
            </label>
          </center>
        </div>
      </form>
    </div>
  </div>
    <!--词云按钮-->
	<div class="button shift-camera-button">
		<div class="border">
			<div class="left-plane"></div>
			<div class="right-plane"></div>
		</div>	
		<div class="text">TAG CLOUDS</div>
	</div>
</div>
<!--三个词云-->
<div class="sky-container">
    <div class="sky-container__right">
    <div class="tagcloud" style="width: 400px; min-height: 30px">
    <?php
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=811EE217\" target='_blank'>NO.1 xiaoou tang </a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7F8038BA\" target='_blank'>NO.2 michael i jordan</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7E7A3A69\" target='_blank'>NO.3 jiawei han</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7F960928\" target='_blank'>NO.4 takeo kanade</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7FD78E52\" target='_blank'>NO.5 shuicheng yan</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=8020C741\" target='_blank'>NO.6 thomas s huang</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7B16FD3C\" target='_blank'>NO.7 alan yuille</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=80197C8B\" target='_blank'>NO.8 christopher d manning</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=7DB54482\" target='_blank'>NO.9 qiang yang</a>";
        echo"<a class='aa' href=\"/AuthorPage.php?author_id=13E99422\" target='_blank'>NO.10 pascal fua</a>";
    ?>
</div>
    <script>
        tagcloud();
    </script>
    </div>
<div class="sky-container__right">
    <div class="tagcloud" style="width: 400px; min-height: 30px">
    <?php
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=learning\" target='_blank'>NO.1 learning </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=data\" target='_blank'>NO.2 data </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=model\" target='_blank'>NO.3 model </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=image\" target='_blank'>NO.4 image </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=information\" target='_blank'>NO.5 information </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=web\" target='_blank'>NO.6 web </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=system\" target='_blank'>NO.7 system </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=analysis\" target='_blank'>NO.8 analysis </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=recognition\" target='_blank'>NO.9 recognition </a>";
        echo"<a class='aa' href=\"/PaperSearch.php?paper_title=multi\" target='_blank'>NO.10 multi </a>";
      ?>
</div>
    <script>
        tagcloud();
    </script>
   </div>
<div class="sky-container__right" style="width: 350px; min-height: 30px">
<div class="tagcloud">
    <?php
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43001016\" target='_blank'>NO.11 ECCV </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43319DD4\" target='_blank'>NO.5 NIPS </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=436976F3\" target='_blank'>NO.9 SIGKDD </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43ABF249\" target='_blank'>NO.6 WWW </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=43FD776C\" target='_blank'>NO.10 SIGIR </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45083D2F\" target='_blank'>NO.2 CVPR </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45701BF3\" target='_blank'>NO.7 ICCV </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=45F914AD\" target='_blank'>NO.12 NAACL</a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=465F7C62\" target='_blank'>NO.8 ICML </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=46A05BB0\" target='_blank'>NO.1 AAAI </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=46DAB993\" target='_blank'>NO.3 ACL </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=47167ADC\" target='_blank'>NO.13 EMNLP </a>";
        echo"<a class='aa' href=\"/ConferencePage.php?conference_id=47C39427\" target='_blank'>NO.4 IJCAI </a>";
    ?>
</div>
    <script>
        tagcloud();
    </script>
    </div>
</div>
<script src='js/jquery.min.js'></script>
<script src='js/TweenMax.min.js'></script>
<script src='js/three.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
