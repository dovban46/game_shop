<?php include 'inc/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $fm->validation($_POST['name']);
	$email = $fm->validation($_POST['email']);
	$contact = $fm->validation($_POST['contact']);
	$message = $fm->validation($_POST['message']);

	$name = mysqli_real_escape_string($db->link, $name);
	$email = mysqli_real_escape_string($db->link, $email);
	$contact = mysqli_real_escape_string($db->link, $contact);
	$message = mysqli_real_escape_string($db->link, $message);

	$error = "";

	if (empty($name)) {
		$error = "Ім'я не повинно бути пустим";
	} elseif (empty($email)) {
		$error = "Email не повинен бути порожнім";
	} elseif (empty($contact)) {
		$error = "Поле контакту не повинно бути порожнім";

	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Невірна адреса електронної пошти";
	} elseif (empty($message)) {
		$error = "Тема не повинна бути пустою";

	} else {
 $query = "INSERT INTO tbl_contact(name,email,contact,message) VALUES('$name','$email','$contact','$message')";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
     $msg = "Повідомлення надіслано";

    }else {
    $error = "Повідомлення не відправлено";
    }
	}
	}
	?>

 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Технічна підтримка</h3>
  				<p><span>24 години | 7 днів в тиждень | 365 днів в рік &nbsp;&nbsp; Технічна підтримка</span></p>
  			</div>
  				<img src="images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Зв'яжіться з нами</h2>

				  <?php 
				if (isset($error)) {
					echo "<span style = 'color:red'>$error</span>";
				}
				if (isset($msg)) {
					echo "<span style = 'color:green'>$msg</span>";
				}
				?>
					    <form action="" method="post">
					    	<div>
						    	<span><label>Ім'я</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>EMAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>Телефон</label></span>
						    	<span><input type="text" name="contact" value=""></span>
						    </div>
						    <div>
						    	<span><label>Тема</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="Написати"></span>
						  </div>
					    </form>
				  </div>
  				</div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php';?>