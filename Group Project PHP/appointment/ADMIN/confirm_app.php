<?php session_start(); ?>


<?php



		$var_value = $_SESSION['varname'];

		

		if(isset($_POST['AP'])){	


			echo "Danish";


			/*

						if(isset($_POST['cfm'])){



		  	echo "yeah";
										require('database_connect.php'); 
										$confirmation = $mysqli->query("UPDATE appointments SET confirm = 'Cl' WHERE appNo=1 "); 

										if($confirmation){ echo"Done";}




									}	

*/


									  $del_id = $_POST['cfm1']; 


				foreach($del_id as $value){

   									$confirmation = $mysqli->query("UPDATE appointments SET confirm = 'Cl' WHERE appNo=1 "); 
   									if($confirmation){ echo"Done";}
   							
}



									

					}				
								

			?>