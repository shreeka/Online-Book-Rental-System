<?php 
    session_start(); 
    require("file:///F|/xampp/htdocs/just for tryouts/shopping cart/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
  
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="file:///F|/xampp/htdocs/just for tryouts/shopping cart/reset.css" rel="stylesheet" type="text/css" />
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

      
    <title>Shopping cart</title> 
  
<link href="file:///F|/xampp/htdocs/just for tryouts/shopping cart/style.css" rel="stylesheet" type="text/css" />
</head> 
  
<body> 
      
    <div id="container"> 
  
        <div id="main"> 
        <?php require($_page.".php"); ?>
        

              
        </div><!--end main-->
          
        <div id="sidebar"> 
        <h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM products WHERE id_product IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysql_query($sql); 
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="file:///F|/xampp/htdocs/just for tryouts/shopping cart/index.php?page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>
              
        </div><!--end sidebar-->
  
    </div><!--end container-->
  
</body> 
</html>