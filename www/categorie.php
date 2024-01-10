<?php 
include('db_connect.php');  //Connection to the db taken from another module

$sql = 'SELECT ID, DESCRI, IMM FROM CAT';
$result = mysqli_query($conn, $sql);
$CAT = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
//echo $CAT; //stampare
//print_r($CAT)
?>
<!DOCTYPE html>
<html>
<?php include('top.php'); ?>
  
    <div class="categorie">
    <?php foreach($CAT as $CAT) { ?>
        <div class="col">
            <div class="final">
                
               <a href="prodotti2.php?id=<?php echo $CAT['ID']; ?>">
                    <img src="<?php echo $CAT['IMM']; ?>" alt="Image" class="product-image"> 
					</a> 
               <h3><?php echo $CAT['DESCRI']; ?></h3>
                </div> 
        </div>
    <?php } ?>
    </div>
   
   
 <?php include('bottom.php'); ?>
 
</html>
