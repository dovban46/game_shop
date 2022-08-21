<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>


<?php 
if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);

}

 ?>

 <style>
     .tblone tr td{text-align: justify;}

 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Деталі вашого замовлення</h2>
                <table class="tblone">

                            <tr>
                                <th>№</th>
                                <th>Гра</th>
                                <th>Фото</th>
                                <th>Кількість</th>
                                <th>Ціна</th>
                                <th>Дата</th>
                                <th>Статус</th>
                                <th>Можливості</th>
                            </tr>
                            <tr>

                            <?php 
                            $cmrId = Session::get("cmrId");
                            $getOrder = $ct->getOrderedProduct($cmrId);
                            if ($getOrder) {
                                $i = 0;
                                while ($result = $getOrder->fetch_assoc()) {
                                
                                $i++;

                             ?>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
                                <td><?php echo $result['quantity']; ?></td>
                    
                                <td>₴ <?php echo $result['price'];?></td>
                         <td><?php echo $fm->formatDate($result['date']); ?></td>

                         <td><?php

                         if ($result['status'] == '0') {
                             echo "Очікується";
                         }elseif($result['status'] == '1'){
                            echo "Підтвердження";
                       } else{ 
                            echo "Доставлено";
                         }
           ?>
                         </td>
                    </td>
                
                    <?php 
                    if ($result['status'] == '1') { ?>
                     <td> <a href="?customerId=<?php echo $result['id']; ?>">Підтвердити</a><td>
                   <?php } elseif($result['status'] == '2'){?>
                    <td>Н/Д</td>

                  <?php }elseif ($result['status'] == '0') {?>
                      <td>Н/Д</td>
                 <?php  }  ?>
                   
            </tr>

                        <?php } } ?>    
                        </table>

    		</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>