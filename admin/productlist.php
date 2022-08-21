<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include_once '../helpers/Formate.php';
$pd = new Product();
$fm = new Format();

if (isset($_GET['delpro'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delpro = $pd->delProById($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Список ігор</h2>
        <div class="block"> 

              <?php
                	if (isset($delpro)) {
                		echo $delpro;
                	}
                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>№</th>
					<th>Назва</th>
					<th>Категорія</th>
					<th>Розробник</th>
					<th>Опис</th>
					<th>Ціна</th>
					<th>Фото</th>
					<th>Тип</th>
					<th>Можливості</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getPd = $pd->getAllProduct();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'] ;?></td>
					<td><?php echo $result['catName'] ;?></td>
					<td><?php echo $result['brandName'] ;?></td>
					<td><?php echo $fm->textShorten($result['body'],50) ;?></td>
					<td>₴<?php echo $result['price'] ;?></td>
					<td><img src="<?php echo $result['image'] ;?>" height="40px" width="60px" ></td>
					<td>
						<?php 
						if ($result['type'] == 0) {
							echo "Рекомендовані";
						}else
						echo "Загальний";
						?>
							

						</td>
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Редагувати</a> || <a onclick="return confirm('Ви точно бажаєте видалити?')" href="?delpro=<?php echo $result['productId'];?>">Видалити</a></td>
				</tr>

			<?php } } ?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
