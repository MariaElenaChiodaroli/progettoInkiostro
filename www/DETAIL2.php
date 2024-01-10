<?php 
include('db_connect.php');  //Connection to the db taken from another module
session_start();


	$email=$_SESSION['NEWSESSION'];
	
if(isset($_GET['id'])){
    $codice = mysqli_real_escape_string($conn, $_GET['id']);
    //echo $codice;
	
$sql = "SELECT * from prod where codice='$codice'";

$result = mysqli_query($conn, $sql);
$p = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r( $p);
}
if(isset($_GET['preferiti'])){
	if ($email != null) {
		$fav = mysqli_real_escape_string($conn, $_GET['fav']);
	$query= "insert into fav (SEQ, IDPRODOTTO,EMAILCLI) VALUES (NULL,'$fav','$email')";
header("location:pagina preferiti.php");	}
	else { header ("location:login.php");}
	
 if(mysqli_query($conn, $query)){  
        echo "Record inserted successfully";  
        }else{  
        echo "Could not insert record: ". mysqli_error($conn);  
      } 
       
} 
if(isset($_GET['carrello'])){
	if ($email != null) {
		$fav = mysqli_real_escape_string($conn, $_GET['fav']);
		$qnt = mysqli_real_escape_string($conn, $_GET['qnt']);
	$query= "insert into carrello (numero, utente,articolo,qnt) VALUES (NULL,'$email','$fav','$qnt')";
	header ("location:carrello2.php");}
	else { header ("location:login.php");}
	
 if(mysqli_query($conn, $query)){  
        echo "Record inserted successfully";  
        }else{  
        echo "Could not insert record: ". mysqli_error($conn);  
      } 
       
}

mysqli_close($conn);
//Echo $p; //stampare
//print_r($p);

?>

<html>
<?php include('top.php'); ?>
  
    <?php foreach($p as $p) { ?>
        
            <div class="categorie">
		
			
        <img src="<?php echo $p['IMM']; ?>" alt="Image" class="product-image" id="<?php echo $p['codice']; ?>"> </img>
		<DIV CLASS="DEs">  
		<h1><?php echo $p['NOME2']; ?></h1>
		
		<p> <?php echo $p['DESCR']; ?> </P> 
			<P CLASS="PRICE"> <?php echo $p['VALUTA']; ?> <?PHP echo $p['PRICE']; ?> 
					
					</p> 
			
		
	
	<form class="preferiti" action="detail2.php?<?php echo $p['CODICE'];?>" method="GET">
	<INPUT type="hidden" readonly name="fav" VALUE="<?php echo $p['CODICE'];?>" id="<?php echo $p['CODICE'];?>">
         <label>  Quantità  <select name="qnt">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
		
	<input type="submit" name="preferiti" value="Aggiungi a preferiti" class="submit-button" >
	<input type="submit" name="carrello" value="Aggiungi a carrello" class="submit-button" >
	
	            </div> 
			
        </div>
	</form>
	   <?php } ?>
 
   
   
 <?php include('bottom.php'); ?>
 
</html>