<?php session_start();
require_once("classes/dbo.class.php");

if(!isset($_GET["cid"])|| !ctype_digit($_GET["cid"]))
{
	header("location:index.php");
	exit;
}
$q="select * from category where cat_id='".$_GET["cid"]."'";
$cres=$db->get($q);

if(mysqli_num_rows($cres)==0)
{
	header("location:index.php");
	exit;
}
$crow=mysqli_fetch_assoc($cres);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Electronix Store</title>
<?php require_once("inc/head.php")?>


</head>
<body>
<div id="main_container">
  <div class="top_bar">
      <div id="header">
    <?php  require_once("inc/logo.php")?>
    </div>
    <!-- end of oferte_content-->
  <div id="main_content">
	<h1>Admin</h1>
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
	  <?php require_once("inc/menu.php")?>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
          <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar"><h1><span class="cat_logo">Categories</span></h1></div>
      <div class="prod_box">
	<h3>EditCategory</h3>
		<form action="process_edit.php" method="POST">
		<input type="hidden" name="cid" value="<?php echo $crow["cat_id"]?>"/>
		Categories:<br/>
		<input type="text" name="nm" value="<?php  echo $crow["cat_nm"];?>"/>
		<input type="submit" value="submit"/>
		
		</form>
			
		
        </div>
            
    </div>
    <!-- end of center content -->
  </div>
  
  <!-- end of main content -->
  
  <div class="footer">
  <hr/>
    <?php  require_once("inc/footer.php"); ?>
</div>
<!-- end of main_container -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>