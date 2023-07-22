<?php
$id = $_GET['id'];
if ($_GET['status'] == 'N') {
    $non = mysqli_query($con, "UPDATE tb_asisten SET status='N' WHERE id_asisten='$id' ");

    echo " <script>
window.location='?page=asisten';
</script>";
} else {
    $aktifkan = mysqli_query($con, "UPDATE tb_asisten SET status='Y' WHERE id_asisten='$id' ");
    echo " <script>
window.location='?page=asisten';
</script>";
}
