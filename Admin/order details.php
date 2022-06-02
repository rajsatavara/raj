<?php  
session_start();
if(!isset($_SESSION["adid"]))
{
	header("location:login.php");
	exit;
}
require_once("classes/dbo.class.php");
$order_q="select * from oreders,users,oredr_details where od_u_id=u_id and odt_o_id=od_id odt_o_id='".$_GET["uid"]."'";
$res=$db->get($order_q);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Electronix Store</title>
<?php require_once("inc/head.php");?>


</head>
<body>
<div id="main_container">
      <!-- end of oferte_content-->
  <div id="main_content">
	<h1>Admin</h1>
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
	  <?php require_once("inc/menu.php");?>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
          <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar"><h1><span class="reg_logo">OrderDetails</span></h1></div>
      <div class="prod_box">
		<a href="print.php">Print</a>
			<table width="600" border="1">
				<tr>
				
					<td><b>username:</b></td>
					<td><b>Shipping Address</b></td>
					<td><b>Billing Address</b></td>
					<td><b>Qunatyt</b></td>
					<td><b>Amount</b></td>
					<td><b>Item</b></td>
					<td><b>Company Name</b></td>
				</tr>
				<?php
				while($order_details_row=mysqli_fetch_assoc($res))
				{
				
				echo'
				<tr>
				
					<td><b>'.$order_details_row["u_nm"].'</b></td>
					<td><b>'.$order_details_row[""].'</b></td>
					<td><b>'.$order_details_row[""].'</b></td>
					<td><b>'.$order_details_row[""].'</b></td>
					<td><b>'.$order_details_row[""].'</b></td>
					<td><b>'.$order_details_row[""].'</b></td>
					<td><b>Company Name</b></td>
				</tr>
				';
				}
			?>
			
			</table>
			
		
        
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
