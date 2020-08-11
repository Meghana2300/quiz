<?php
include"../connections.php";
$id=$_GET["id"];
$id=$_GET["id1"];
mysqli_query($link,"delete from questions where id=$id");
?>
?>

    <script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
</script>

    <?php