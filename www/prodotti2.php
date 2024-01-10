<?php 
include('db_connect.php');  //Connection to the db taken from another module
	
if(isset($_GET['id'])){
    $prova = mysqli_real_escape_string($conn, $_GET['id']);
    //echo $prova;
	
$sql = "SELECT codice,nome2,descr,imm from prod where categoria='$prova'";
$result = mysqli_query($conn, $sql);
$u = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
//echo $u; //stampare
//print_r($u);
}
?>

<html>
<?php include('top.php'); ?>
 
    <div class="categorie">
    <?php foreach($u as $u) { ?>
        <div class="col">
            <div class="final">
                
               <a href="detail2.php?id=<?php echo $u['codice']; ?>">
                    <img src="<?php echo $u['imm']; ?>" alt="Image" class="product-image"> 
					</a> 
               <h2><?php echo $u['nome2']; ?></h2>
                </div> 
        </div>
    <?php } ?>
    </div>
   
   
 <?php include('bottom.php'); ?>
 
</html>
