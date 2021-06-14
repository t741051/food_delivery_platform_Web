<?php
	include('php/connect.php');
?>
<HTML>
	<HEAD>
		<TITLE></TITLE>
		<link rel="stylesheet" href="css/style.css">
	</HEAD>
	<BODY>
		<div>test___test</div>		

		<?php 
			$test = 111;

/* 
			for($i = 0;$i < 5; $i++ ){
				$array[$i]["food_id"] 	 = $i + 1;
				$array[$i]["food_amount"] = 2;
				$array[$i]["food_price"]  = $i * 10;
				$array[$i]["food_option"] = "";
			}
		
			$food_attribute = array(
				"contents" => $array
			);
			
			//echo $food_attribute["contents"][3]["food_price"];
			//echo $array[3]["food_price"];

			$data_json_en = json_encode($food_attribute);
			
			$sql = "INSERT INTO test SET 
					id = '7',
					json = '$data_json_en'				
					";
			$res = mysqli_query($conn, $sql) or die(mysqli_error());
*/
			$sql = "SELECT * FROM test									
					";

			$res = mysqli_query($conn, $sql) or die(mysqli_error());

			$rows = mysqli_fetch_assoc($res);

			$data_json_de = json_decode($rows['json']);

			//echo $data_json_de->contents[1] -> food_amount . "<br />";
			
			echo count($data_json_de);
			



		?>
		
		
	</BODY>
</HTML>