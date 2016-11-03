<?php
	if (isset($_GET['action']) && $_GET['action']=="add"){
		$id=intval($_GET['id']);
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		}else{
			$sql2="SELECT * FROM products WHERE id_product={$id}";
			$query2=mysql_query($sql2);
			
			if(mysql_num_rows($query2)!=0){
				$row2=mysql_fetch_array($query2);
				$_SESSION['cart'][$row2['id_product']]=array("quantity"=>1,"price"=>$row2['price']);
			}
			else{
				$message="This product id is invalid";
			}
		}
	}
	
?>
<h2 class="message"><?php if(isset($message)){echo $message;} ?></h2> 
<h1>Product Page </h1>
<table>
	<tr>
    	<th>Image</th>
    	<th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    
    <!-- Test Template Features -->
    <?php
		$sql="SELECT * FROM products ORDER BY name ASC";
		$query=mysql_query($sql) or die(mysql_error());
		
		while($row=mysql_fetch_assoc($query)){
		
		?>
        	<tr>
            	<td><?php echo $row['Image'];?></td>
            	<td><?php echo $row['name'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo "Rs." . $row['price'];?></td>
                <td><a href="index.php?page=products&action=add&id=<?php echo $row['id_product'];?>">Add to cart </a></td>
     <?php } ?>           
                
</table>
