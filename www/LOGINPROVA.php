<?php 
    include('db_connect.php'); 
    //include('customers.php');
    
    if(!$conn){  
      die('Could not connect: '.mysqli_connect_error());  
    }  
    echo 'Connected successfully<br/>';  

    if(isset($_GET['submit'])){
      // Get the form data and sanitize using mysqli_real_escape_string
      $email = (isset($_GET['email']))? trim($_get['email']) :' ';
     // echo $email;
         
       $sql = "SELECT NOME FROM CLIENTI WHERE email='$email'";
	   $result = mysqli_query($conn, $sql);
	$UT = mysqli_fetch_all($result, MYSQLI_ASSOC);
	    
	}
	
	mysqli_close($conn);  
	print_r($UT);
?>

<!DOCTYPE html>
<html>
<?php include('TOP.php'); ?>

<section class="signup">
    <h2>Benvenuto!</h2>
    <form class="signup-form" action="" method="GET">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email">
      
      <input type="submit" name="submit" value="Accedi" class="submit-button">
	  <a href="reg.php"> <input type="button" value="Registrati"> </input></a>
	  
    </form>
  </section>

<div>

  <h2> Bentornato! </h2>
  
  <?php foreach($UT as $UT) { ?>
		<P> <?php echo $UT['NOME'] ?> </P>  
        <P>   <?php echo $UT['EMAIL'] ?>  </P>  
    <?php }?>
  </div>
 
<?php include('BOTTOM.php'); ?>
</html>