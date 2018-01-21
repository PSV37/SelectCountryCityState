<?php
    
    $db = mysqli_connect('localhost','root','','db_php');
     $countries = mysqli_query($db , "SELECT * FROM tbl_countries");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Select City,Country,State</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<h4 class="text-center" >Select Country : </h4>
	<div class="text-center" style="margin-top: 8%;">
			<label>Select Countries</label>
			<!-- select countries -->
			<select class="country">
				<option value="">Select Country</option>
				<?php 
		         while($row = mysqli_fetch_array($countries)){
				 ?>
				<option value="<?php echo $row['id'] ?>"><?php echo $row['country_name'] ?></option>
				<?php } ?>
			</select> 

            <!-- select states -->
			<select id="state">
		    	<option value="">Select country first</option>
			</select>

           <!-- select cities -->
			<select id="city">
			    <option value="">Select state first</option>
			</select>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	 //select country_id 
		$('.country').on('change',function(){
			var countryID = $(this).val();
			
				$.ajax({
					type:'POST',
					url : 'ajaxUrl.php',
					data : 'country_id='+countryID,

					success:function(response){
						//console.log(response);
						$('#state').html(response);
                      $('#city').html('<option value="">Select state first</option>'); 
					}
				});
		});
      //select state_id from countries
		$('#state').on('change',function(){
			var stateId = $(this).val();
			
				$.ajax({
					type:'POST',
					url : 'ajaxUrl.php',
					data : 'state_id='+stateId,

					success:function(response){
						//console.log(response);
						$('#city').html(response);
					}
				})
		})
	})
</script>
</body>
</html>