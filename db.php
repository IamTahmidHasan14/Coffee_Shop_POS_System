<?php
    $conn = mysqli_connect("localhost", "root", "", "bill_reciept");

    if (mysqli_connect_errno()) {
        echo "Faild" . mysqli_connect_errno();
        exit();
    }
?>
