<?php 

$db = mysqli_connect('localhost','root','','db_php');

if(isset($_POST['country_id']))
{
	$country_id = $_POST['country_id'];

	$q =  $db->query("SELECT * FROM tbl_state WHERE country_id =".$_POST['country_id']." ORDER BY state_name ASC");

//we can also use count function
	 $rowCount = $q->num_rows;
     if($rowCount > 0){
     	  echo '<option value="">Select state</option>';
        while($row = $q->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
        }
     }else{
        echo '<option value="">State not available</option>';
    }	 
}	


	
if(isset($_POST['state_id']))
{
	$q = $db->query("SELECT * FROM tbl_cities WHERE state_id =".$_POST['state_id']." ORDER BY city_name ASC  ");

	$rowCount = $q->num_rows;

	if($rowCount > 0)
	{
		  echo '<option value="">Select City</option>';
        while($row = $q->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
        }
	}
	else
	{
		 echo '<option value="">City not available</option>';
	}
}		
?>