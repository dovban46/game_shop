<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';

$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->productInsert($_POST,$_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Довити гру</h2>
        <div class="block"> 

        <?php
        if (isset($insertProduct)) {
            echo $insertProduct;
        }
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Назва</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Введіть гру..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Категорія</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Виберіть категорію</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                   ?>
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                        <?php } } ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Розробник</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Виберіть розробника</option>
                             <?php 
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                                   ?>
                             
                            <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                        <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Опис</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Ціна</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Введіть ціну..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Завантажте зображення</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Тип гри</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Тип гри</option>
                            <option value="0">Рекомендовані</option>
                            <option value="1">Загальний</option>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Зберегти" />
                    </td>
                </tr>
            </table>
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

<?php include 'inc/footer.php';?>


