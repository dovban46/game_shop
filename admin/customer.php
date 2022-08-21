<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Customer.php');

if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
   
   echo "<script>window.location='inbox.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['custId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location='inbox.php';</script>";
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Деталі замовника</h2>
               <div class="block copyblock"> 

     <?php
     $cus = new Customer();
     $getCust = $cus->getCustomerData($id);
     if ($getCust) {
        while ($result = $getCust->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>Ім'я</td>
                            <td>
                                <input type="text"readonly="readonly" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Адреса</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Місто</td>
                            <td>
                                <input type="text" readonly="readonly"value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Індекс</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zip'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Телефон</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>