<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Cart.php');
$ct = new Cart();
$fm = new Format();

if (isset($_GET['shiftid'])) {
	$id = $_GET['shiftid'];
	$shift = $ct->productShifted($id);

}

if (isset($_GET['delproid'])) {
	$id = $_GET['delproid'];
	$delOrder = $ct->delProductShifted($id);

}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Замовлення</h2>
                <?php 
                if (isset($shift)) {
                	echo $shift;
                }
                if (isset($delOrder)) {
                	echo $delOrder;
                }
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Час</th>
							<th>Гра</th>
							<th>Кількість</th>
							<th>Ціна</th>
							<th>Код</th>
							<th>Адреса</th>
							<th>Можливості</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$getOrder = $ct->getAllOrderProduct();
						if ($getOrder) {
							while ($result = $getOrder->fetch_assoc()) {
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td>₴ <?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">Докладніше</a></td>

							<?php 

							if ($result['status'] == '0') { ?>
							<td><a href="?shiftid=<?php echo $result['id']; ?>">Доставити</a></td>
							<?php }elseif($result['status'] == '1'){?>
								<td>В очікуванні</td>
							<?php } else{ ?>
								<td><a href="?delproid=<?php echo $result['id']; ?>">Видалити</a></td>
						<?php } ?>
						</tr>
					<?php }} ?>
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
