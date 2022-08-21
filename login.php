<?php include 'inc/header.php';
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}
?> 

 <div class="main">
    <div class="content">
    	 <div class="login_panel">

    	 	<?php
    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	<h3>Існуючі клієнти</h3>
        	<p>Увійдіть за допомогою форми нижче</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Пароль" type="password"/>
                    <div class="buttons"><div><button class="grey" name="login">Увійти</button></div></div>
                      </div>
                 </form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);
}
?>          
    	<div class="register_account">
    		<?php
    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
    		<h3>Зареєструвати новий обліковий запис</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Ім'я"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Місто"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Індекс"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Адреса"/>
						</div>
		    		
						<div>
							<input type="text" name="country" placeholder="Країна"/>
						</div>
		           <div>
		          <input type="text" name="phone" placeholder="Телефон"/>
		          </div>
				  <div>
					<input type="text" name="pass" placeholder="Пароль"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Створити акаунт</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>