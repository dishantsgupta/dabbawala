<?php
include 'connection.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql1 = "select * from order_master where id = '$id'";
$query1 = mysqli_query($connect, $sql1);
$fetch1 = mysqli_fetch_array($query1);

$area = $fetch1['parea'];



$sql2 = "select * from delivery_master where area = '$area' && active_inactive = 1";
$query2 = mysqli_query($connect, $sql2);

?>
<section class="attendance">
    <div class="attendance-list">
        <h1><?php echo $fetch1['name'] ?></h1>
        
        <table class="table">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Area / City</td>
                    <td>Select</td>
                </tr>
            </thead>
            <?php
            while ($fetch2 = mysqli_fetch_assoc($query2)) {
                $sql3 = "select * from area where id = {$fetch2['area']}";
                $sql4 = "select * from district where id = {$fetch2['city']}";

                $sqlQuery1 = mysqli_query($connect, $sql3);
                $sqlQuery2 = mysqli_query($connect, $sql4);

                $result6 = mysqli_fetch_assoc($sqlQuery1);
                $result7 = mysqli_fetch_assoc($sqlQuery2);

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $fetch2['dname'] ?></td>
                        <td><?php echo $result6['area']." / ".$result7['district']; ?></td>
                        <td style="display:flex;justify-content: center;"><a href="approved.php?id=<?php echo $fetch1['id']; ?>&assign=<?php echo $fetch2['ids']; ?>&approved=1" style="background: green; color:#fff; width:50px; border-radius: 15px; font-size:1.5rem; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"><i id="approve" onclick="clickme(<?php echo $fetchData['id'] ?>)" class="uil uil-check-circle"></i></a></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</section>