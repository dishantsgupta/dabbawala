<?php

include 'connection.php';

$id = $_GET['id'];

$cardTitle = $_POST['title'];
$packageName = $_POST['name'];
$packagePrice = $_POST['price'];

$sql = "update rate_card set card_name = '$cardTitle', package_name = '$packageName', package_price = '$packagePrice' where id = '$id'";
$query = mysqli_query($connect,$sql);

if($query){
    header('location: add_rate_card.php');
}
