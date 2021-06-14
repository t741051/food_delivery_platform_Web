<?php
    include('php/connect.php'); 
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
						  <h1 class="display-4">新竹 Hsinchu</h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>  
		<form  method="POST" action="">  
        <section id='latest'>	        
	        <div class="container">
		        <div class='row'>
					<div class='col-md-12 text-center'>
					  	<h3>選擇餐點</h3>
						<tr>
							<td>搜尋食物類型 : </td>
							<td>
								<input type="text" name="food_category" placeholder="食物類型">
							</td>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="搜尋" class="btn">
								</td>
							</tr>
						</tr>  
					  	<div class='row'>
                        <?php          
							$restaurant_id = $_GET['restaurant_id']; //所選餐廳的ID
						             
							//Query to Get all Admin
							$food_count = 1;    //紀錄食物種類數
							$search_flag = 0;
							if(isset($_POST['submit'])){
								$food_category = $_POST['food_category'];
								$search_flag = 1;
								$sql = "SELECT * FROM food_attribute	
								WHERE restaurant_id = '$restaurant_id' 
								AND food_category LIKE \"%$food_category%\"								
								ORDER BY food_name
								";
							}else{
								//$search_flag = 0;
								$sql = "SELECT * FROM food_attribute	
								WHERE restaurant_id = '$restaurant_id'								
								ORDER BY food_name
								";
							}
							//echo $search_flag;
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
                                            <div class='col-md-4 text-left'>
                                                <div class='outer'>								  	
                                                    <div class='upper'>
                                                        <img  src='pictures/food/restaurant_<?php echo substr($restaurant_id, -1); ?>_<?php echo $food_count;?>.jpg'>											
                                                    </div>
                                                    <div class='lower'>
                                                        <h3><?php echo $rows['food_name'];?></h3>		
                                                        <h3><?php echo '售價 ： $' . $rows['food_price'];?></h3>									
                                                    </div>                                                   
                                                    <input type='button' value='-' class='qtyminus' field='quantity' id='quantity_sub_<?php echo $food_count;?>'/>


									                <input type='text' name='count_<?php echo $food_count;?>' value='0' class='qty'  id='count_<?php echo $food_count;?>'/>
													
									                <input type='button' value='+' class='qtyplus' field='quantity' id='quantity_add_<?php echo $food_count;?>'/>
                                                </div>                                
                                            </div> 
                                        <?php
                                        $food_count ++;											
									}
								}else{
									//We Do not Have Data in Database
								}
							}
                        ?>					  					
					  	</div>
                    </div>
				</div>		  
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
			</form>		
        </section>
        <script src='js/restaurant.js'></script>
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
			
			if(isset($_POST['submit_1'])) {
				//order_id 計數器
				$hit = file_get_contents("order_id_not_submit.txt");
				if($_POST['address'] != "" ){
					file_put_contents("order_id_not_submit.txt", ((int)$hit) + 1 );
				}

				//1. Get the Data from form
				/***********************************************************************
                           json 內容產生及打包
 				***********************************************************************/
				echo $search_flag;
				$food_count = 0;    //紀錄食物種類數
				
				$sql = "SELECT * FROM food_attribute	
				WHERE restaurant_id = '$restaurant_id'								
				ORDER BY food_name
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
							$food_count_1 = (string)($food_count + 1);
							$food_count_1 = 'count_' . $food_count_1;
							$array[$food_count]["food_id"] 	  = $rows['food_id'];
							$array[$food_count]["food_amount"] = $_POST[(string)$food_count_1];
							$array[$food_count]["food_price"]  = $rows['food_price'] * $_POST[(string)$food_count_1];
							$array[$food_count]["food_option"] = "";
							$food_count++;
						}
						
					}else{
						//We Do not Have Data in Database
					}
				}							
				$food_attribute = array("contents" => $array);

				
				
				$user_id	  	= $_SESSION['id'];
				$order_id 	   	= ((int)$hit);				
				$food_attribute = json_encode($food_attribute);
				$address 	    = $_POST['address'];
				$phone 		    = $_POST['phone'];
				
				
				//2. SQL Query to Save the data into database
			
				$sql = "INSERT INTO food_order_not_submit SET 
					user_id		   = '$user_id',
					order_id	   = '$order_id',
					restaurant_id  = '$restaurant_id',
					food_attribute = '$food_attribute',
					address		   = '$address',
					phone		   = '$phone'					
				";
			
				//3. Executing Query and Saving Data into Datbase
				$res = mysqli_query($conn, $sql) or die(mysqli_error());
				

				echo '<Script language="JavaScript"> 
					location.href = "order.php";
				</Script>';
				
				
				
			}
        
		?>        
    </body>    
</html>    