<?php

include('db_connect.php');  //Connection to the db taken from another module
session_start();

if (!isset($_SESSION['NEWSESSION'])) {
    header('Location:LOGIN.php');
    exit;
} else {
    echo "Benvenuto utente ".$_SESSION['NEWSESSION'];
}

if(isset($_SESSION['NEWSESSION']) && isset($_POST['Aggiungi_al_carrello']))
{
    $userID = $_SESSION['NEWSESSION'];
    $prodID = $POST['ID'];
    $qty = $_POST['Qta'];

   
    $stmt = $conn->prepare("SELECT ID, quantita
                            FROM carrello.carrello
                            WHERE IDclienti=? AND ID=?");
    $stmt->bind_param("ii", $userID, $prodID);
    $stmt->execute();
    $resultC = $stmt->get_result();
    $res = $resultC->fetch_assoc();
    if($res)
    {
        $id_carrello = $res['ID'];
        $current_qty = $res['Quantita'];
        $current_qty += $qty;

        $stmt2 = $conn->prepare("UPDATE carrello.carrello
                                SET quantita = ?
                                WHERE ID = ?");
        $stmt2->bind_param("ii", $current_qty, $ID_carrello);
        $stmt2->execute();
        header("Location: carrello.php");
        die();
    }
    else
    {
        $stmt3 = $conn->prepare("INSERT INTO carrello.carrello
                                            (SET IDclienti, IDprodotto, quantita)
                                VALUES (?, ?, ?)");
        $stmt3->bind_param("iiI", $userID, $prodID, $qty);
        $stmt3->execute();
        header("Location: carrello.php");
        die();
    }
}