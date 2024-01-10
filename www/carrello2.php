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

$query = "SELECT prod.NOME2, prod.IMM, prod.PRICE,carrello.qnt
from prod
 inner join carrello on prod.CODICE=carrello.articolo
where carrello.utente = '$email'";

$result = mysqli_query($conn, $query);
$carrello = mysqli_fetch_all($result, MYSQLI_ASSOC);



mysqli_close($conn);
//echo $carrello; //stampare
//print_r($carrello);
?>

<html>
<?php include('top.php'); ?>
<body onpageshow="prezzotot()">
<p class="intestazione"><b><i> Ecco il tuo carrello, <?php echo $email; ?>
 <div class="precar">
    <?php foreach($carrello as $carrello) { ?>
      <div class="car">
     <img src="<?php echo $carrello['IMM']; ?>" alt="Image" 
	 class="product-car"> </img> 
		<form>	
               <h2><?php echo $carrello['NOME2']; ?></h2>
			   <p> Quantità desiderata: </P>
			 <input type="text" class="qnt" value= "<?php echo $carrello['qnt']; ?>" />
			 <input type="hidden"  class="prezzo" value="<?php echo $carrello['PRICE']; ?>" />
			 </div>
	<?php } ?>		
			</form>

	<script>
	function prezzotot(){
		
var qnt = document.getElementsByClassName("qnt");
var prezzo = document.getElementsByClassName("prezzo");
var somma = 0
for (var k = 0; k < 10; k++){
prezzotot[k] = qnt[k].value * prezzo[k].value
//alert(prezzotot[k]);
somma = somma + prezzotot[k]
document.getElementById("R").innerHTML = "Totale carrello: €" + somma;
	}}
		</script>
		
		
	
        </div>
		
 <p id="R"> </P>
</div>
	
 <?php include('bottom.php'); ?>
 
</html>