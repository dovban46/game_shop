</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
			<div class="copy_right">
				<p> &copy; Copyright Всі права захищені. Розробка Колтуцький Ярослав </p>
		   </div>
             <div class="copy_right">
                 <a href="admin/login.php"><p>Адмін панель</p></a>
             </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
