<?php 
include('db_connect.php');  //Connection to the db taken from another module
	
if(isset($_GET['id'])){
    $codice = mysqli_real_escape_string($conn, $_GET['id']);
    //echo $codice;
	
$sql = "SELECT * from prod where codice='$codice'";
$result = mysqli_query($conn, $sql);
$p = mysqli_fetch_all($result, MYSQLI_ASSOC);



mysqli_close($conn);
//Echo $p; //stampare
//print_r($p);
}
?>

<html>
<?php include('top.php'); ?>
  
    <?php foreach($p as $p) { ?>
        
            <div class="DETTAGLIO">
			
        <img src="<?php echo $p['IMM']; ?>" alt="Image" class="detail-image"> 
		<DIV CLASS="DEs">
		
					<h1><?php echo $p['NOME2']; ?></h1>
					<p> <?php echo $p['DESCR']; ?> </P> 
					<P CLASS="PRICE"> <?php echo $p['VALUTA']; ?> <?PHP echo $p['PRICE']; ?> 
					</P> 
					</DIV>
				<div class="add"> <button class="rapid" name="addfa" type="submit"> <img SRC="IMG/ADDFA.png" ALT= "Aggiungi a preferiti" class="rapid" type="submit" name="addfa"> </button> <img src="img/addbag.jpg" alt="aggiungi carrello" class="rapid"> </img>		
            </div> 
			
        </div>
	
	   <?php } ?>
 
   
   
 <?php include('bottom.php'); ?>
 
</html>