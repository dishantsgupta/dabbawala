<?php

include 'connection.php';
$id = $_GET['id'];

$query = "delete from order_master where id = '$id'";

$result = mysqli_query($connect,$query);

if($result){
    header('location:Order.php?id='.$id);
}

?>
<script>
    co
</script>