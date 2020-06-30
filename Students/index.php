<?php
session_start();
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
$params = "";
if(count($url_components)>3){
    parse_str($url_components['query'], $params);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial;}
<style>
* {
  box-sizing: border-box;
}

body {
  
  background-image:url('campus.jpg');
    background-repeat:repeat-x;
    background-size: cover;
}

/* 头部样式 */
.header {
  background-color: #f1f1f1;
  padding: 5px;
  
}
.topnav {

  overflow: visible;
    background-color: #f1f1f1;
  border: 0px solid #ccc;
    padding: 0px;
    
}
/* 创建三个相等的列 */
.column {
  float: left;
  padding: 10px;
}

/* 中间区域宽度 */
.column.middle {
  width: 50%;
}

/* 列后面清除浮动 */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* 响应式布局 - 宽度小于600px时设置上下布局 */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}

/* 底部样式 */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
  width: 100%;
  bottom: 0;
  position:absolute;
}

#center {
    margin: auto;
  width: 60%;
    border: 0px solid #73AD21;
    padding: 20px
}
.alignleft { 
    display: inline; 
    float: left; 
    } 
.alignright { 
    display: inline; 
    float: right; 
    } 
 #floatleft{
  float: left;
 }
#border {border-style:groove; width: 300px;;
        Background-color: rgba(0,0,0,0.7);
      border-style: solid;
      border-radius: 15px;}
.thick {font-weight:bold;}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
}
.thick {font-weight:bold;
		color:#0000ff;
		}
</style>
</head>
<body>
  <div align="center" class="header">

  <img src="icon.png"  style="vertical-align:middle" width="180" height="120">
    <h1 class="thick">TA Availability System</h1>
</div>
<div class="topnav">
<div class="tabbed">
<hr/>
      <form>
        <center>
        <label for="course_id"   class="thick form-check-label">Course Id:</label>
        <input type="number" id="course_id" name="course_id" max="999" placeholder="Enter course code" size="30" required>

      <input type="submit" class="btn btn-primary btn-sm" value="GO">
      </center>
      </form>
</div>
</div>

<div id="center" class="row">
    <?php
           echo "<iframe src='https://www-student.cse.buffalo.edu/CSE442-542/2020-Summer/cse-442h/test/Students/course_page.php?course_id=".$params['course_id']."' width='100%' height='400' scrolling='vertical'></iframe>";
     ?>

</div>

<div class="footer" >
  <p class="thick">Office phone number: 7165800633 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: shiyulu@buffalo.edu</p>

</div>
</body>
</html>
<?php
if($params){
if($params['course_id']) {
    echo '<script type="text/javascript">document.getElementById("course_id").value = "'.$params['course_id'].'";</script>';
}
}
?>