<?php include('php/connect.php'); ?>
<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Open+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/68f8681dba.js" crossorigin="anonymous"></script>
		<script src="js/jquery-3.6.0.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/style.css">		
		<title>B10602211 Final Project	Food Delivery platform</title>
		
	</head>
	
	<body>
        <header>
	        <div class='container'>
				<nav class="navbar navbar-expand-lg navbar-light">
				  <a class="navbar-brand" href="index.php"><img src='pictures/logo.png' width='155'></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item">
				        <a class="nav-link" href="index.php">主頁</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="restaurant_list.php">商家選單</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="faq.html">常見問題</a>
				      </li>	
				      <li class="nav-item">
				        <a class="nav-link" href="contact.html">聯絡我們</a>
				      </li>			
				    </ul>
					<a class="nav-link" href="customer_dashboard.php">		<!-- 右上角使用者登入 -->			
						<?php 
							if(isset($_SESSION['id'])){
								echo '使用者名稱 : ' . $_SESSION['id'];
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
			
			<div class="jumbotron_Taipei">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">1號店</h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>  
        
        <section id='latest'>	        
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-12 text-center'>
					  	<h3>選擇餐點</h3>
					  	<div class='row'>
						  	<div class='col-md-4 text-left'>
							  	<div class='outer'>
								  	<a href=''>
									  	<div class='upper'>
											<img src='pictures/restaurant_1_1.jpg'>											
									  	</div>
									  	<div class='lower'>
										  	<h3>1號餐	$100</h3>											
									  	</div>
								  	</a>
							  	</div>
						  	</div>
						  	<div class='col-md-4 text-left'>
							  	<div class='outer'>
								  	<a href=''>
										<div class='upper'>
											<img src='pictures/restaurant_1_2.jpg'>											
									  	</div>
									  	<div class='lower'>
										  	<h3>2號餐	$95</h3>											
									  	</div>
								  	</a>
							  	</div>
						  	</div>
						  	<div class='col-md-4 text-left'>
							  	<div class='outer'>
								  	<a href=''>
										<div class='upper'>
											<img src='pictures/restaurant_1_3.jpg'>
									  	</div>
									  	<div class='lower'>  
										  	<h3>3號餐	$80</h3>
									  	</div>
								  	</a>
							  	</div>
						  	</div>						
					  	</div>
				</div>		  
			</div>	
			<form  method="POST" action="">
				<div class="container">
					<div class='row'>	  	
							<div class='col-md-4 text-center'>
									<label for=""> </label>
									<input type='button' value='-' class='qtyminus' field='quantity' id='quantity_sub_1'/>
									<input type='text' name='count_1' value='0' class='qty'  id='count_1'/>
									<input type='button' value='+' class='qtyplus' field='quantity' id='quantity_add_1'/>				
							</div>

							<div class='col-md-4 text-center'>						
									<label for=""> </label>
									<input type='button' value='-' class='qtyminus' field='quantity' id='quantity_sub_2'/>
									<input type='text' name='count_2' value='0' class='qty'  id='count_2'/>
									<input type='button' value='+' class='qtyplus' field='quantity' id='quantity_add_2'/>						
							</div>

							<div class='col-md-4 text-center'>						
									<label for=""> </label>
									<input type='button' value='-' class='qtyminus' field='quantity' id='quantity_sub_3'/>
									<input type='text' name='count_3' value='0' class='qty'  id='count_3'/>
									<input type='button' value='+' class='qtyplus' field='quantity' id='quantity_add_3'/>						
							</div> 
					<div>
				</div>
				
				<div class="container">
					<div class='row'>	
						<div class='col-md-12 text-center'> 
							<a class="btn btn-primary btn-lg" href="#" role="button"  data-toggle="modal" data-target="#Modal">確定</a>
						</div>
					</div>	
				</div>
				<!--動態懸浮視窗 -->
				<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">填入地址與電話</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">					
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default" >地址：</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="address" name="address">
								</div>	
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default" >手機：</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="phone" name='phone'>
								</div>
							</div>
							<div class="modal-footer">					  								
								<input type="submit" name="submit_1" value="送出" class="btn btn-primar">
							</div>
						</div>
					</div>
				</div>
				<!--			-->
			</form>		
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
					      	<li><a href='index.php'>主頁</a></li>
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
		
		<?php
			if(isset($_POST['submit_1']))
			{
				//order_id 計數器
				$hit = file_get_contents("order_id_not_submit.txt");
				if($_POST['address'] != "" ){
					file_put_contents("order_id_not_submit.txt", ((int)$hit) + 1 );
				}
					
				// Button Clicked
				//echo "Button Clicked";

				//1. Get the Data from form
				$user_id	   = $_SESSION['id'];
				$order_id 	   = ((int)$hit);
				$restaurant_id = 1;
				$food_id 	   = '1,2,3';
				$food_amount   = $_POST['count_1'] . ',' . $_POST['count_2'] . ',' . $_POST['count_3'];
				$address 	   = $_POST['address'];
				$phone 		   = $_POST['phone'];
				$money 		   = $_POST['count_1'] * 100 . ',' . $_POST['count_2'] * 95 . ',' . $_POST['count_3'] * 80;
				
				//2. SQL Query to Save the data into database
			
				$sql = "INSERT INTO food_order_not_submit SET 
					user_id		 ='$user_id',
					order_id	 ='$order_id',
					restaurant_id='$restaurant_id',
					food_id		 ='$food_id',
					food_amount	 ='$food_amount',
					address		 ='$address',
					phone		 ='$phone',
					money		 ='$money'
				";
			
				//3. Executing Query and Saving Data into Datbase
				$res = mysqli_query($conn, $sql) or die(mysqli_error());

				echo '<Script language="JavaScript"> 
					location.href = "order.php";
				</Script>';
				
				
				
			}
		?>    
        <script src='js/restaurant.js'></script>
    </body>    
</html>

