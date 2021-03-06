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
			
			<div class="jumbotron_Taipei">
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
                <div>
					<table class="table" id="dynamic-table">
						<tr>
							<th> </th>
							<th>???????????? </th>
							<th>?????? </th>
							<th>?????? </th>
						</tr>
						<?php 
							//Query to Get all Admin
							$user_id = $_SESSION['id'];							
							//$sql = "SELECT * FROM food_order_not_submit  ORDER BY order_id  DESC";
							$sql = "SELECT * FROM food_order_not_submit 
									WHERE user_id = '$user_id' 									
									ORDER BY order_id  DESC";
							//Execute the Query
							$res = mysqli_query($conn, $sql);

							//CHeck whether the Query is Executed of Not
							if($res==TRUE){
								// Count Rows to CHeck whether we have data in database or not
								$count = mysqli_num_rows($res); // Function to get all the rows in database
								
								//$category_amount = 0;
								$total_money = 0;

								$rows = mysqli_fetch_assoc($res);

								$address		   = $rows['address'];
								$phone			   = $rows['phone'];
								$restaurant_id	   = $rows['restaurant_id'];								
								
								$food_id 	 = [];	//	???json????????????food_id
								$food_amount = [];	//	???json????????????food_amount
								$food_price  = [];	//	???json????????????food_price

								$food_attribute = json_decode($rows['food_attribute']);	//????????????json food_attribute??????
								
								//Check the num of rows
								if($count > 0){	//?????????????????????										
									$j = 0;	//??????????????????
									for($i = 0;$i < count($food_attribute -> contents) ;$i++)	{//??????????????????0????????????								
										if($food_attribute->contents[$i] -> food_amount != 0){
											
											array_push($food_id	   ,$food_attribute->contents[$i] -> food_id);
											array_push($food_amount,$food_attribute->contents[$i] -> food_amount);
											array_push($food_price ,$food_attribute->contents[$i] -> food_price);											
											
											$sql = "SELECT food_name FROM food_attribute 
													WHERE food_id = '$food_id[$j]'								
													";
											//Execute the Query
											$res = mysqli_query($conn, $sql);
											$rows = mysqli_fetch_assoc($res);
											?>											
												<tr>
													<td><?php echo $j+1 . ".";?>   	     </td>
													<td><?php echo $rows['food_name'];?> </td>
													<td><?php echo $food_amount[$j];?>   </td>
													<td><?php echo $food_price[$j];?>    </td>
												</tr>
											<?php
											$total_money += $food_price[$j];	//??????	
											$j++;	//??????????????????											
										}
										
									}
								}else{
									//We Do not Have Data in Database
								}
							}
							
						?> 
						<tr>						
							<td> </td>
							<td><?php echo '?????? : ' . $phone ; ?>	</td>
							<td><?php echo '?????? : ' . $address ; ?></td>
							<td><?php echo 'Total money : ' . $total_money . "???" ; ?></td>
						</tr>
						
					</table>		
                </div>
            </div>
            
        </section>
        <section >
	        <div class="container">		        
		        <div class='row'>
					  <div class='col-md-12  text-right'>		
						<p>????????????????????????????????????</p>      
						<form  method="POST" action="">
							<input type="submit" name="submit_2" value="??????" class="btn btn-primar btn-lg">
						</form>						
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
						  <h4>??????</h4>
						  <ul>
					      	<li><a href='index.php'>??????</a></li>
					      	<li><a href='restaurant_list.php'>????????????</a></li>
						  </ul>
						  <ul>
					      	<li><a href='faq.html'>????????????</a></li>
					      	<li><a href='contact.html'>????????????</a></li>
						  </ul>						  
					  </div>
					  <div class='col-md-4 text-left'>
						  <h4>????????????</h4>
						  <p>106335 ??????????????????????????? 4 ??? 43 ???
							<br>No.43, Keelung Rd., Sec.4, Da'an Dist., Taipei City 106335, Taiwan (R.O.C.)<br>
							<br>Tel: 886-2-27333141<br>
					      </p>
					  </div>
		        </div>
	        </div>	        
        
        </footer>
		<?php
		
			if(isset($_POST['submit_2'])){
				//order_id ?????????
				$hit = file_get_contents("order_id.txt");
				file_put_contents("order_id.txt", ((int)$hit) + 1 );

				//json ???????????? ??????
				for($i = 0;$i < count($food_id);$i++){
					
					$array[$i]["food_id"] 	  = $food_id[$i];
					$array[$i]["food_amount"] = $food_amount[$i];
					$array[$i]["food_price"]  = $food_price[$i];
					$array[$i]["food_option"] = "";					
				}				
				$food_attribute = array("contents" => $array);

				//1. Get the Data from form
				$user_id	    = $_SESSION['id'];
				$order_id 	    = ((int)$hit);				
				$food_attribute = json_encode($food_attribute);				
				$money 		    = $total_money;
				
				
				//2. SQL Query to Save the data into database
			
				$sql = "INSERT INTO food_order SET 
					user_id		   = '$user_id',
					order_id	   = '$order_id',
					restaurant_id  = '$restaurant_id',
					food_attribute = '$food_attribute',
					address		   = '$address',
					phone		   = '$phone',
					money		   = '$money',
					order_status   = 0
				";
			
				//3. Executing Query and Saving Data into Datbase
				$res = mysqli_query($conn, $sql) or die(mysqli_error());		
				
				echo '<Script language="JavaScript"> 
					location.href = "customer_order_submit.php";
				</Script>';
				
			}
			
		?>
        <script src='js/restaurant.js'></script>
        <script src='js/order.js'></script>
	</body>
	
</html>