<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Brand.php';?>
<?php
$brand = new Brand();

if (isset($_GET['delbrand'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
	$delbrand= $brand->delbrandById($id);

}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Список розробників</h2>
                <div class="block">
                	<?php 

                	if (isset($delbrand)) {
                		echo $delbrand;
                	}
                	?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Ім'я</th>
							<th>Можливості</th>
						</tr>
					</thead>
					<tbody>
				<?php
				$getBrand = $brand->getAllBrand();
				if ($getBrand) {
					$i = 0;
					while ($result = $getBrand->fetch_assoc()) {
						$i++;
				?>		
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">Редагувати</a> || <a onclick="return confirm('Ви точно хочете видалити?')" href="?delbrand=<?php echo $result['brandId'];?>">Видалити</a></td>
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

