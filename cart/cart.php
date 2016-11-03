<?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
  
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to the products page.</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
        	<th>Image</th> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products WHERE id_product IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
					if(!empty($query)){
                    while($row=mysql_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                            <td><?php echo "Rs." . $row['price'] ?></td> 
                            <td><?php echo "Rs." . $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?></td> 
                        </tr> 
                    <?php 
					}
					}
					else{
						echo"<br/>You need to add an item before you can view it.";}
					
                    
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo "Rs." . $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
    <button type="submit" name="submit1">Continue shopping</button> 
</form> 

	
<br /> 
<p>To remove an item set its quantity to 0. </p>