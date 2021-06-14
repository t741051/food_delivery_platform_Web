<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Open+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/68f8681dba.js" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/style.css">
		<title>B10602211 Final Project	Food Delivery platform</title>		
		
	</head>
	
	<body>
		
        <header>
	        <div class='container'>
				<nav class="navbar navbar-expand-lg navbar-light">
				  <a class="navbar-brand" href="restaurant_index.php"><img src='pictures/logo.png' width='155'></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item">
				        <a class="nav-link" href="restaurant_index.php">主頁</a>
				      </li>				      
				      <li class="nav-item">
				        <a class="nav-link" href="faq.html">常見問題</a>
				      </li>	
				      <li class="nav-item">
				        <a class="nav-link" href="contact.html">聯絡我們</a>
				      </li>			
				    </ul>				

					<a class="nav-link" href="deliveryman_take_order.php">		<!-- 右上角使用者登入 -->			
						<?php 
							if(isset($_SESSION['id'])){
								echo '使用者名稱(貨運端) : ' . $_SESSION['id'];
							}					
						?>
					</a>					
					<a class="nav-link" href="logout.php">
					<?php
						if(isset($_SESSION['id'])){	
							echo "登出";
						}
					?>
					</a>
										
				  </div>
				  
				</nav>
	        </div>
        </header>
		<section id='intro'>
			
			<div class="jumbotron">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">美食外送 貨運端</h1>
						  <p class="lead">歡迎您加入我們！</p>
						  <a class="btn btn-primary btn-lg" href="http://localhost/test_food_order/login.php" role="button" >登入</a>	
						  <a class="btn btn-primary btn-lg" href="http://localhost/test_food_order/sign_up.php" role="button" >註冊</a>	  
					  </div>
				  </div>
			  </div>
			</div>		
        </section> 
        <section id='latest'>
	        
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-12 text-center'>
					  	<h3>管理選項</h3>
					  	<div class='row'>
						  
						  	<div class='col-md-4 text-left'>
							  	<div class='outer'>
								  	<a href='http://localhost/test_food_order/deliveryman_select_order.php'>
										<div class='upper'>
											<img src='pictures/bill.png'>
									  	</div>
									  	<div class='lower'>
										  	<h3>接單</h3>
									  	</div>
								  	</a>
							  	</div>
						  	</div>
						  						
					  	</div>
					  </div>
			    <div>
	        </div>
        
        </section>
        <section id='email'>
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-8 offset-md-2 text-center'>
					  	<h3>加入Tony's Delivery</h3>
					  </div>
		        </div>
		        <div class='row'>
					  <div class='col-md-8 offset-md-2 text-center'>		
						<p>加入Tony's Delivery，把你的美食分享給大家！</p>        		  	
					  	
						<a class="btn btn-primary btn-lg" href="http://localhost/test_food_order/sign_up.php" role="button">註冊</a>
					  </div>
		        </div>
	        </div>
        
        </section>
        <footer>
	        
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-4 text-left'>
						  <img src='pictures/logo.png' width='220'>						  
					  </div>
					  <div class='col-md-4 text-left'>
						  <h4>連結</h4>
						  <ul>
					      	<li><a href='restaurant_index.php'>主頁</a></li>
					      	<li><a href='restaurant_list.php'>商家列表</a></li>
						  </ul>
						  <ul>
					      	<li><a href='faq.html'>常見問題</a></li>
					      	<li><a href='contact.html'>聯絡我們</a></li>
						  </ul>						  
					  </div>
					  <div class='col-md-4 text-left'>
						  <h4>聯絡我們</h4>
						  <p>106335 臺北市大安區基隆路 4 段 43 號
							<br>No.43, Keelung Rd., Sec.4, Da'an Dist., Taipei City 106335, Taiwan (R.O.C.)<br>
							<br>Tel: 886-2-27333141<br>
					      </p>
					  </div>
		        </div>
	        </div>	        
        
        </footer>
		
		
	</body>
	
</html>