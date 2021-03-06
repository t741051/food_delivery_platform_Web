<?php
	include('php/connect.php'); 
?>
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
				        <a class="nav-link" href="index.php">??????</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="restaurant_list.php">????????????</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="faq.html">????????????</a>
				      </li>	
				      <li class="nav-item">
				        <a class="nav-link" href="contact.html">????????????</a>
				      </li>			
				    </ul>
					<a class="nav-link"><?php echo '??????????????? : ' . $_SESSION['id'];?></a>					
				  </div>
				</nav>
	        </div>
        </header>
		<section id='intro'>			
			<div class="jumbotron">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">????????????</h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>
        <section id='latest'>            
            <div class="container">	<!--	?????????????????????	-->	
				<form action="" method="POST">			
					<div>
						<table class="table" id="dynamic-table">
							<tr>
								<td>?????? : </td>
								<td>
									<input type="text" name="restaurant_name" placeholder="????????????">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="??????" class="btn">
								</td>
							</tr>
							<tr>							
								<th>????????????</th>
							<!--	<th>????????????</th>	-->
								<th>????????????</th>
								<th>????????????</th>						
							</tr>
							<?php 
								//Query to Get all Admin
								
								if(isset($_POST['submit'])){
									
									$restaurant_name = $_POST['restaurant_name'];	
									
									$sql = "SELECT * FROM restaurant_attribute
											WHERE restaurant_name LIKE \"%$restaurant_name%\"									
											";
									//Execute the Query
									$res = mysqli_query($conn, $sql);
									
									//CHeck whether the Query is Executed of Not
									if($res==TRUE){
										// Count Rows to CHeck whether we have data in database or not
										$count = mysqli_num_rows($res); // Function to get all the rows in database
											
										//Check the num of rows
										if($count > 0){									
											//WE HAve data in database
											while($rows = mysqli_fetch_assoc($res)){
													?>											
														<tr>                                
															<td><?php echo $rows['restaurant_name'];?></td>	
														<!--	<td>
																<a class="nav-link" href="
																	<?php
																		//echo 'restaurant_1';
																	?>	
																	.php">					
																	????????????
																</a>
															</td>	-->
															<td><?php echo $rows['restaurant_location'];?>		  	</td>
															<td><?php echo $rows['restaurant_phone'];?>		  	</td>
														
														</tr>
													<?php										
											}
										}else{
											//We Do not Have Data in Database
										}
									}
								}
							?> 
							
						</table>		
					</div>
				</form>
            </div>
            
        </section>
        
        <footer>	        
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-4 text-left'>
						  <img src='pictures/logo.png' width='220'>						  
					  </div>
					  <div class='col-md-4 text-left'>
						  <h4>??????</h4>
						  <ul>
					      	<li><a href='index.php'>??????</a></li>
					      	<li><a href='restaurant_list.php'>????????????</a></li>
						  </ul>						 					  
					  </div>					  
		        </div>
	        </div>	       
        </footer>

        <script src='js/restaurant.js'></script>
        <script src='js/order.js'></script>
	</body>
	
</html>