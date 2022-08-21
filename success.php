<?php include 'inc/header.php';?>

<?php
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style>
.psuccess{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto;padding: 20px;}	
.psuccess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding-bottom: 10px;}
.psuccess p{line-height: 25px;text-align: left;font-size: 18px;}

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="psuccess">
    		<h2>Успіх</h2>

            <p>Дякуємо за покупку. Отримайте своє замовлення успішно. <a href="orderdetails.php">Завітайте сюди...</a></p>
    	</div>
    	
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>