<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php';
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   echo "<script>window.location='inbox.php';</script>";
} else {
    $id = $_GET['msgid'];
}
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Переглянути повідомлення</h2>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  echo "<script>window.location='inbox.php';</script>";
}
?>
                <div class="block">               
                 <form action="" method="post" >

             <?php
            $query = "select * from tbl_contact where id='$id'";
            $msg = $db->select($query);
            if ($msg) {
            while ($result = $msg->fetch_assoc()) {
           ?>
                    <table class="form">
                <tr>
                    <td>
                        <label>Ім'я</label>
                    </td>
                    <td>
                        <input type="text" readonly value="<?php echo $result['name'];?>" class="medium" />
                    </td>
                </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Телефон</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['contact'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Дата</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $fm->formatDate($result['date']);?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Повідомлення</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
                                    <?php echo $result['message'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="message.php">
                                OK
                                </a>
                            </td>
                        </tr>
                    </table>

                    <?php } } ?>

                    </form>
                </div>
            </div>
        </div>

    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
 <?php include 'inc/footer.php'; ?>