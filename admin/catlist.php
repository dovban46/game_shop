<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Category.php';?>
<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
	$delcat = $cat->delcatById($id);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Список категорій</h2>
                <div class="block">   

                	<?php
                	if (isset($delcat)) {
                		echo $delcat;
                	}
                	?>

                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Назва</th>
							<th>Можливості</th>
						</tr>
					</thead>
					<tbody>

				<?php
				$getCat = $cat->getAllCat();
				if ($getCat) {
					$i = 0;
					while ($result = $getCat->fetch_assoc()) {
						$i++;
				

				?>		
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Редагувати</a> || <a onclick="return confirm('Ви точно хочете видалити?')" href="?delcat=<?php echo $result['catId'];?>">Видалити</a></td>
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

