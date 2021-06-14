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
			
			<div class="jumbotron_Hsinchu">
			  <div class='container'>
				  <div class='row'>
					  <div class='col-md-12'>						  
						  <h1 class="display-4">新竹 Hsinchu</h1>						  
					  </div>
				  </div>
			  </div>
			</div>
        </section>  
        
        <section id='latest'>
	        
	        <div class="container">
		        <div class='row'>
					  <div class='col-md-12 text-center'>
					  	<h3>選擇餐廳</h3>
					  	<div class='row'>
                            <?php 
								$restaurant_id = [];
                                $sql = "SELECT * FROM restaurant_attribute	
                                        WHERE restaurant_location = '新竹'								
                                        ORDER BY restaurant_id
                                        ";
                                //Execute the Query
                                $res = mysqli_query($conn, $sql);
                                $picture_num = 1;
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
														<form  method="POST" action="">  
															<a href="restaurant_menu_hsinchu.php?restaurant_id=<?php echo $rows['restaurant_id']; ?>" >
																<div class='upper'>
																	<img src='pictures/restaurant_hsinchu_<?php echo $picture_num?>.jpg'>																												
																</div>
																<div class='lower'>
																	<h3><?php echo $rows['restaurant_name']; ?></h3>											
																</div>
															</a>
														</form>	
                                                    </div>
                                                </div>                                                   
                                            <?php	
                                            $picture_num++ ;									
                                        }
                                    }else{
                                        //We Do not Have Data in Database
                                    }
                                }
                            ?>
						  							
					  	</div>
					  </div>
			    <div>
	        </div>
        
        </section>
		<?php     
		
		?>		
    </body>    
</html>    