<?php 
    include('db_connect.php'); 
    //include('customers.php');
    include('LOGCOD.PHP');
	
	session_start();
	
	if(isset($_GET['logout'])){
	session_destroy();   
	}
	
    mysqli_close($conn);  
	//print_r($UT);
?>

<!DOCTYPE html>
<html>
<?php include('TOP.php'); ?>

<DIV CLASS="STAMPE">
<section class="signup">
    <h2>Benvenuto!</h2>
    <form class="signup-form" action="login.php" method="GET">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email">
      
      <input type="submit" name="accedi" value="Login" class="submit-button">
	  <input type="submit" name="logout" value="Logout" class="submit-button">
	  <a href="reg.php"> <input type="button" value="Registrati"> </input></a>
	  
    </form>
  </section>

<div>

  <h2> Bentornato! </h2>
  
  <?php foreach($UT as $UT) { ?>
		<P> <?php echo $UT['nome'] ?> </P>  
        <P>   <?php echo $UT['email'] ?>  </P>  
    <?php }?>
  </div>
 </DIV>
 
<?php include('BOTTOM.php'); ?>
</html>