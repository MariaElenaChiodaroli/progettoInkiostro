<?php 
include('db_connect.php');  //Connection to the db taken from another module

session_start();

if (!isset($_SESSION['NEWSESSION'])) {
    header('Location:LOGIN.php');
    exit;
} else {
    echo "Benvenuto utente ".$_SESSION['NEWSESSION'];
}
	$email=$_SESSION['NEWSESSION'];

$query = "SELECT NOME2, IMM, CODICE
from prod
 inner join fav on prod.CODICE=fav.IDPRODOTTO
where fav.emailcli = '$email'";

$result = mysqli_query($conn, $query);
$pref = mysqli_fetch_all($result, MYSQLI_ASSOC);


if(isset($_GET['DELETE'])){
	$togli = mysqli_real_escape_string($conn, $_GET['RIMUOVI']);
	$query= "DELETE FROM FAV WHERE EMAILCLI='$email' and IDPRODOTTO='$togli'"; 
	echo "Prodotto rimosso";
	print_r($togli);
	ECHO $email;}
	
mysqli_close($conn);
//echo $pref; //stampare
//print_r($pref);
?>


<!DOCTYPE html>

<html>
    
    <head>
        
        <title>
            Prodotti preferiti
        </title>

    </head>
        
        <?php include ('TOP.PHP'); ?>
    
    <body>       
       
    <div class="precar">
    <?php foreach($pref as $pref) { ?>
	
        <div class="col">
            <div class="final">
                
               <a href="detail2.php?id=<?php echo $pref['CODICE']; ?>">
                    <img class="product-car" src="<?php echo $pref['IMM']; ?>" alt="Image" ID="<?PHP ECHO $p['codice']; ?>" > 
					</a> 
               <h2><?php echo $pref['NOME2']; ?></h2>
                </div> 
			 </div>
	<form class="DELETE" action=" " method="GET">
	<INPUT TYPE="hidden" VALUE="<?pHP ECHO $pref['CODICE']; ?> " NAME="RIMUOVI" readonly>
	<INPUT TYPE="SUBMIT" NAME="DELETE" VALUE="Rimuovi da preferiti">
	
    <?php } ?>
    </div>
<?PHP INCLUDE ('BOTTOM.PHP'); ?>
</html>