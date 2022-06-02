<?php  
session_start();
if(!isset($_SESSION["adid"]))
{
	header("location:login.php");
	exit;
}
require_once("classes/dbo.class.php");
$q="select * from orders,users where od_u_id = u_id and od_id='".$_GET["oid"]."'";
$res=$db->get($q);
$row = mysqli_fetch_assoc($res);

$q1 = "select * from order_details where odt_od_id=".$_GET["oid"];
$res1 = $db->get($q1);
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
	
		<a href="print.php?oid=<?php echo $_GET["oid"] ?>">Print</a>
			<div class="order">
			<table  width="600">
				<tr>
					<td><b>Shipping Address</b></td>
					<td><b>Billing Address</b></td>
					<td><b>Order Date</b></td>
					<td><b>User</b></td>
				</tr>
				<tr>
					<td><?php echo $row["od_shipping_addr"] ?></td>
					<td><?php echo $row["od_delivery_addr"] ?></td>
					<td><?php echo $row["od_date"] ?></td>
					<td><?php echo $row["u_nm"] ?></td>
				</tr>
			</table>
			</div><br/><BR/>
			<table width="600" border="0">
				<tr>
			
					<td><b>Category</b></td>
					<td><b>Product</b></td>
					<td><b>Qty</b></td>
					<td><b>Rate</b></td>
					<td><b>Value</b></td>
				</tr>
				<?php
				while($row1=mysqli_fetch_assoc($res1))
				{
				
				echo'
				<tr>
				
					<td><b>'.$row1["odt_p_cat_nm"].'</b></td>
					<td><b>'.$row1["odt_p_nm"].'</b></td>
					<td><b>'.$row1["odt_qty"].'</b></td>
					<td><b>'.$row1["odt_rate"].'</b></td>
					<td><b>'.$row1["odt_value"].'</b></td>
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
