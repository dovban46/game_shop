<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
   echo "<script>window.location='productlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->productUpdate($_POST,$_FILES,$id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Редагувати гру</h2>
        <div class="block"> 

        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }

        $getPro = $pd->getProById($id);
        if ($getPro) {
           while ($value = $getPro->fetch_assoc()) {
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Назва</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium" />
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
                            <option 

                            <?php
                            if ($value['catId'] == $result['catId']) { ?>
                               selected = "selected"
                          <?php } ?>
                            value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?>
                            </option>
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
                             
                             <option 

                            <?php 

                            if ($value['brandId'] == $result['brandId']) { ?>
                               
                               selected = "selected"
                          <?php } ?>
                            value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?>
                                
                            </option>
                        <?php } } ?>
                        </select>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Опис</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Ціна</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Завантажте зображення</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'] ;?>" height="80px" width="200px" > <br/>
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
                            <?php 
                            if ($value['type'] == 0) { ?>
                            <option selected = "selected" value="0">Рекомендовані</option>
                            <option value="1">Загальний</option>
                         <?php } else { ?>

                            <option selected = "selected" value="1">Загальний</option>
                            <option value="0">Рекомендовані</option>
                      <?php  } ?>
                            
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Редагувати" />
                    </td>
                </tr>
            </table>
            </form>

        <?php } } ?>
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


