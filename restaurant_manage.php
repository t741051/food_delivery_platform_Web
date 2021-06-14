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
					<a class="nav-link"><?php echo '使用者名稱(商家) : ' . $_SESSION['id'];?></a>					
				  </div>
				</nav>
	        </div>
        </header>
		<section id='intro'>			
			<div class="jumbotron">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4"><?php echo "商家" . $_SESSION['id'] . " 的菜單";?></h1>						  
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
							<th>餐點名稱</th>							
							<th>餐點圖片</th>							
							<th>價格</th>	
                            <th>種類</th>
                            <th>餐點備註</th>			
                            <th><a href="restaurant_add.php" class="btn">新增</a></th>			
						</tr>
						<?php 
                            
							//Query to Get all Admin
							$restaurant_id = $_SESSION['id'];	
                            
							$sql = "SELECT * FROM food_attribute
									WHERE restaurant_id = '$restaurant_id'                                        
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
													
													<td><?php echo $rows['food_name'];?> 	    </td>
                                                    <td><?php echo "圖片";?>                    </td>											
                                                    <td><?php echo $rows['food_price'];?>       </td>
                                                    <td><?php echo $rows['food_category'];?>    </td>
													<td><?php echo "備註";?>                    </td>
                                                    <td>												
                                                        <a href="restaurant_update.php?food_id=<?php echo $rows['food_id']; ?>" class="btn">變更</a>	
														<a href="restaurant_delete.php?food_id=<?php echo $rows['food_id']; ?>" class="btn">刪除</a>                                                       
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