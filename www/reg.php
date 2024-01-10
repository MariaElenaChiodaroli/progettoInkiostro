<?php 
    include('db_connect.php'); 
    //include('customers.php');
    
    if(!$conn){  
      die('Could not connect: '.mysqli_connect_error());  
    }  
    echo 'Connected successfully<br/>';  

    if(isset($_GET['submit'])){
      // Get the form data and sanitize using mysqli_real_escape_string
      
	  $email = mysqli_real_escape_string($conn, $_GET['email']);
     // echo $email;
	 $location = mysqli_real_escape_string($conn, $_GET['location']);
	 $nome = mysqli_real_escape_string($conn, $_GET['nome']);
	 $cognome = mysqli_real_escape_string($conn, $_GET['cognome']);
	 $data = mysqli_real_escape_string($conn, $_GET['data']);
	 
	 $sql = "INSERT INTO CLIENTI(CLIENTIID,email,location,nome,cognome,datanascita) VALUES (NULL, '$email', '$location','$nome', '$cognome','$data')";  
        if(mysqli_query($conn, $sql)){  
        echo "Record inserted successfully";  
		header ("location:login.php");
        }else{  
        echo "Could not insert record: ". mysqli_error($conn);  
      } 
	}
	    mysqli_close($conn);  
?>

<html>

<?php include('TOP.php'); ?>

<section class="signup">
    <h2>Registrati</h2>
    <form class="signup-form" action="REG.php" method="GET">
	
    <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="prova@prova.it">
	  
	<label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" placeholder="Ex. Mario">
	  
	<label for="cognome">Cognome:</label>
      <input type="text" id="cognome" name="cognome" placeholder="Ex. Rossi">
	  
	 <label for="location">Residenza:</label>
      <input type="text" id="location" name="location" placeholder="Ex. Roma(IT)">
	  
	<label for="data">Data di nascita:</label>
      <input type="date" id="data" name="data" placeholder="aaaa/mm/gg)">
	  
      <input type="submit" name="submit" value="submit" class="submit-button"> </INPUT>
    </form>
  </section>
<button onclick="window.location.href='login.php'">Login </button>

<?php include('BOTTOM.php'); ?>
</html>