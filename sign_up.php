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
				  
				  </div>
				</nav>
	        </div>
        </header>

        <section id='intro'>			
			<div class="jumbotron">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">註冊帳號</h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>  
        
        <section id='latest'>	
			

			<form action="" method="POST">

				<table class="table">
					<tr>
						<td>使用者帳號: </td>
						<td>
							<input type="text" name="user_id" placeholder="帳號">
						</td>
					</tr>					
					<tr>
						<td>密碼: </td>
						<td>
							<input type="password" name="password" placeholder="密碼">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="註冊" class="btn">
						</td>
					</tr>								
				</table>
				<?php 
					//Process the Value from Form and Save it in Database
					//Check whether the submit button is clicked or not

					if(isset($_POST['submit'])){
						// Button Clicked
						//echo "Button Clicked";

						//1. Get the Data from form
						$user_id  = $_POST['user_id'];				
						$password = $_POST['password']; 

						$sql = "SELECT id FROM manage_admin where id = '$user_id' ";
						$res = mysqli_query($conn, $sql) or die(mysqli_error());
						
						$account_exist = mysqli_num_rows($res);
						if ( $account_exist < 1 ) {
							// 找不到資料的結果，就是給予錯誤訊息
							//2. SQL Query to Save the data into database
							$sql = "INSERT INTO manage_admin SET 
							id		 = '$user_id',
							password = '$password'
							";
							echo '註冊成功';

						}else{
							echo '此帳號已存在';
						}
								
						//3. Executing Query and Saving Data into Datbase
						$res = mysqli_query($conn, $sql) or die(mysqli_error());
					}			
				?>
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





		
        <script src='js/restaurant.js'></script>
    </body>    
</html>

