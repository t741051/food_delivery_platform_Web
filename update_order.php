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
					<a class="nav-link"><?php echo '使用者名稱 : ' . $_SESSION['id'];?></a>
				  </div>
				</nav>
	        </div>
        </header>
		<section id='intro'>
			
			<div class="jumbotron_Taipei">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">確認訂單</h1>						  
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
							<th> </th>
							<th>餐點名稱 </th>
							<th>數量 </th>
							<th>價錢 </th>
						</tr>
						<?php 
                            $order_id = $_GET['order_id'];
							//Query to Get all Admin
							$user_id = $_SESSION['id'];							
							//$sql = "SELECT * FROM food_order_not_submit  ORDER BY order_id  DESC";
							$sql = "SELECT * FROM food_order 
									WHERE order_id = '$order_id' 									
									";
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
								
								$food_id 	 = [];	//	存json解開後的food_id
								$food_amount = [];	//	存json解開後的food_amount
								$food_price  = [];	//	存json解開後的food_price

								$food_attribute = json_decode($rows['food_attribute']);	//解開後的json food_attribute欄位
								
								//Check the num of rows
								if($count > 0){	//資料庫內有資料										
									$j = 0;	//表格前方編號
									for($i = 0;$i < count($food_attribute -> contents) ;$i++)	{//餐點數量不為0才會顯示								
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
											$total_money += $food_price[$j];	//總價	
											$j++;	//表格前方編號											
										}
										
									}
								}else{
									//We Do not Have Data in Database
								}
							}
							
						?> 
                        <form  method="POST" action="">
						<tr>						
							<td></td>                            
							<td><input type="text" name="phone" placeholder="<?php  echo '電話 : '  ; ?>"></td>
							<td> <input type="text" name="address" placeholder="<?php echo '地址 : '; ?>"></td>
							<td><?php echo 'Total money : ' . $total_money . "元" ; ?></td>
						</tr>
						
					</table>		
                </div>
            </div>
            
        </section>
        <section >
	        <div class="container">		        
		        <div class='row'>
					  <div class='col-md-12  text-right'>		
						<p>確認餐點無誤後，點擊送出</p>      
						
							<input type="submit" name="submit_2" value="送出" class="btn btn-primar btn-lg">
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
		$phone = $_POST['phone'];
        $address = $_POST['address'];
			if(isset($_POST['submit_2'])){
				//order_id 計數器
                /*
				$hit = file_get_contents("order_id.txt");
				file_put_contents("order_id.txt", ((int)$hit) + 1 );

				//json 內容產生 打包
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
				*/
				
				
                // 將更新內容寫回資料庫
                
                $sql = "UPDATE food_order 
                        SET phone = '$phone'                                              
                        WHERE order_id = '$order_id'                        
                    ";


                //Execute the Query
                $res = mysqli_query($conn, $sql);

                $sql = "UPDATE food_order 
                    SET address = '$address'                                              
                    WHERE order_id = '$order_id'                        
                ";


                //Execute the Query
                $res = mysqli_query($conn, $sql);
                // Check whether the query executed successfully or not
                if($res==true){
                
                    


                
                    echo '<Script language="JavaScript"> 
                        location.href = "customer_dashboard.php";
                    </Script>';
                
                }
                else{
                    
                }

				
			}
			
		?>
        <script src='js/restaurant.js'></script>
        <script src='js/order.js'></script>
	</body>
	
</html>