<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Products Page</title>
</head>
<body>

<?php 
$query = "SELECT * FROM products ORDER BY id ASC";
$result = $conn->query($query);
if(mysql_num_rows($result)>0)
{
	while ($row=mysqli_fetch_array($result)) 
	{
		?>
		<div class="col-md-4">
			<form action="shop.php?action=add&id=<?php echo $row['id'];?>" method="post">
				<div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding: 10px; align:center">
					<img src="<?php echo $row["image"]; ?>" class="img-responsive">
					<h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
					<h5 class="text-danger"><?php echo $row["price"]; ?></h5>
					<input type="text" name="quantity" class="form-control" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["p_ame"];?>">
					<input type="hidden" name="hidden_name" value="<?php echo $row["price"];?>">
					<input type="submit" name="add" style="margin-top: 5px" class="btn btn-default" value="Add to Cart" >
				</div>
			</form>
		</div>
		<?php
	}

}
?>
<div style="clear: both;">
	<h2>My shopping bag</h2>
	<div class="table-responsive">
		<table class="table tablebordered">
			<tr>
				<th width="40%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price Details</th>
				<th width="15%">Order Total</th>
				<th width="5%">Action</th>
			</tr>
			<?php
			if(!empty($_SESSION['cart'])){
				$total = 0;
				foreach ($_SESSION["cart"] as $key => $value) {
					?>
					<tr>
					<td><?php echo $value["item_name"]; ?></td>
					<td><?php echo $value["item_quantity"]; ?></td>
					<td>$ <?php echo $value["product_price"]; ?></td>
					<td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"],2); ?></td>
					<td><a href="shop.php?action=delete&id=<?php echo $value["product_id"];?>"><span class="text-danger">X</span></a></td>
					</tr>
					<?php
					$total = $total + ($value["item_quantity"] * $value["product_price"]);
				}
				?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right"><?php $echo number_format($total,2);?></td>
					<td></td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</div>

</body>
</html>
