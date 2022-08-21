<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Вхідні</h2>

<?php 
if (isset($_GET['seenid'])) {
	$seenid = $_GET['seenid'];

	$query = "UPDATE tbl_contact 
        SET
        status = '1'
        WHERE id = '$seenid'";
        $updated_row = $db->update($query);

if ($updated_row) {
    
    echo "<span class='success'>Повідомлення надіслано в скриньку</span>";
} else {

      echo "<span class='error'>Щось не так!</span>";
}
}
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>№</th>
							<th>Ім'я</th>
							<th>Email</th>
							<th>Телефон</th>
							<th>Повідомлення</th>
							<th>Дата</th>
							<th>Можливості</th>
						</tr>
					</thead>
					<tbody>
			<?php

			$query = "select * from tbl_contact where status='0' order by id desc";
			$msg = $db->select($query);
			if ($msg) {
			    $i=0;
			while ($result = $msg->fetch_assoc()) {
			   $i++;
           ?>	

		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['name'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $result['contact'];?></td>
			<td><?php echo $fm->textShorten($result['message'],30);?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			<td>
				<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">Переглянути</a> ||
				<a onclick="return confirm('Ви впевнені, що хочете перемістити повідомлення?');" href="?seenid=<?php echo $result['id'];?>">Прочитано</a>
			</td>
		</tr>
						
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
             <div class="box round first grid">
                <h2>Переглянути скриньку</h2>


 <?php  
if (isset($_GET['delid'])) {
   $delid = $_GET['delid'];
   $delquery = "delete from tbl_contact where id = '$delid'";
   $deldata = $db->delete($delquery);
   if ($deldata) {
      echo "<span class='success'>Повідомлення успішно видалено</span>";
   } else {

     echo "<span class='error'>Повідомлення не видалено</span>";
   }

}
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>№</th>
							<th>Ім'я</th>
							<th>Email</th>
							<th>Телефон</th>
                            <th>Повідомлення</th>
                            <th>Дата</th>
                            <th>Можливості</th>
						</tr>
					</thead>
					<tbody>
			<?php

			$query = "select * from tbl_contact where status='1' order by id desc";
			$msg = $db->select($query);
			if ($msg) {
			    $i=0;
			while ($result = $msg->fetch_assoc()) {
			   $i++;
           ?>	

		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['name'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $result['contact'];?></td>
			<td><?php echo $fm->textShorten($result['message'],30);?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			<td>
				<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">Переглянути</a> ||
				<a onclick="return confirm('Ви впевнені, що хочете видалити?');" href="?delid=<?php echo $result['id'];?>">Видалити</a>
			</td>
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

 <?php include 'inc/footer.php'; ?>
