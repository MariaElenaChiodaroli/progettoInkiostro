<?PHP
    if(!$conn){  
      die('Could not connect: '.mysqli_connect_error());  
    }  
    echo 'Connected successfully<br/>';  

    if(isset($_GET['accedi'])){
      
	//$email=(isset($_GET['email'])) ? trim($_GET['email']) : ''; 
      $email = mysqli_real_escape_string($conn, $_GET['email']);
	  
     //echo $email;
         
       $sql = "SELECT nome,email FROM CLIENTI WHERE email='$email'";
	   $result = mysqli_query($conn, $sql);
	$UT = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
		//echo $conta;
	    //print_r($UT);
		if ($UT != null ){
		
		session_start ();
		$_SESSION['NEWSESSION']= $email;
		ECHO "Benvenuto utente ".$_SESSION['NEWSESSION'];
			}
	ELSE {header("LOCATION:REG.PHP"); }
	
	}
	
	
	
	
		
	
	//IF(!isset($_SESSION['NEWSESSION'])) {
    //header('Location:LOGIN.php');
   
//} else {
  //  echo "Benvenuto utente ".$_SESSION['NEWSESSION'];
//}
	
	