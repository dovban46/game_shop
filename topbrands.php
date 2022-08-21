<?php include 'inc/header.php';?>

 <div class="main">
    <div class="content">

    <div class="content_top">
    		<div class="heading">
    		<h3>Бібліотека ігор<r/h3>
    		</div>
    		<div class="clear"></div>
    	</div>

			<div class="section group">
            <?php
	      	$getTop = $pd->getTopbrand();
	      	if ($getTop) {
	      		while ($result = $getTop->fetch_assoc()) {
	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'],60); ?></p>
					 <p><span class="price">₴<?php echo $result['price']; ?></span></p>
				      <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Більше</a></span></div>
				</div>

				<?php } } ?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php';?>