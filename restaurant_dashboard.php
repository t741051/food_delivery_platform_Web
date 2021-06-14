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
					<a class="nav-link"  href="restaurant_dashboard.php"><?php echo '使用者名稱(商家端) : ' . $_SESSION['id'];?></a>					
				  </div>
				</nav>
	        </div>
        </header>
		<section id='intro'>			
			<div class="jumbotron">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4"><?php echo $_SESSION['id'] . " 的訂單列表";?></h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>
        <section id='latest'>            
            <div class="container">	<!--	表格產生與顯示	-->				
                <div>
					<table class="table" id="dynamic-table">
						<tr>
							<th>訂單編號</th>							
							<th>餐點名稱及數量</th>							
							<th>運送地址</th>
							<th>連絡電話</th>
							<th>價錢</th>							
						</tr>
						<?php 
							//Query to Get all Admin
							$user_id = $_SESSION['id'];	
							$sql = "SELECT * FROM food_order,order_status
									WHERE restaurant_id = '$user_id' 									
									AND food_order.order_status = order_status.order_status								
									ORDER BY order_id ";
							//Execute the Query
							$res = mysqli_query($conn, $sql);

							$food_id 	 = [];	//	存json解開後的food_id
							$food_amount = [];	//	存json解開後的food_amount
							$food_price  = [];	//	存json解開後的food_price

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
													<td><?php echo $rows['order_id'];?>	   	  	</td>
													
													<td>
													<?php										
						
														$food_attribute = json_decode($rows['food_attribute']);	//解開後的json food_attribute欄位
																									
														for($i = 0;$i < count($food_attribute -> contents) ;$i++)	{//餐點數量不為0才會顯示
															array_push($food_id	   ,$food_attribute->contents[$i] -> food_id);
															array_push($food_amount,$food_attribute->contents[$i] -> food_amount);
															
															$sql_1 = "SELECT food_name FROM food_attribute 
																	WHERE food_id = '$food_id[$i]'								
																	";
															//Execute the Query
															$res_1 = mysqli_query($conn, $sql_1);
															$rows_1 = mysqli_fetch_assoc($res_1);
															
															?>
															<?php echo $rows_1['food_name'];?>        	
															<?php echo $food_amount[$i];?>    	
													<?php
														}
														$food_id 	 = [];	//	存json解開後的food_id
														$food_amount = [];	//	存json解開後的food_amount
														$food_price  = [];	//	存json解開後的food_price
													?>
													</td>
													<td><?php echo $rows['address'];?>		  	</td>
													<td><?php echo $rows['phone'];?>		  	</td>
                                                    <td><?php echo $rows['money'];?>          	</td>
													
													<td>													
														<?php
                                                            $order_status = $rows['order_status'];
                                                            if($order_status == 0){
																?>
																<a href="restaurant_take_order.php?order_id=<?php echo $rows['order_id']; ?>" class="btn">接單</a>
																<?php
                                                            }
                                                        ?>
													</td>	
													
												</tr>
											<?php										
									}
								}else{
									//We Do not Have Data in Database
								}
							}
							
						?> 
						
					</table>		
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
					  </div>					  
		        </div>
	        </div>	       
        </footer>

        <script src='js/restaurant.js'></script>
        <script src='js/order.js'></script>
	</body>
	
</html>


