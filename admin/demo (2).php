<?php 
session_start();
include "header.php";
include "connections.php";
if(!isset($_SESSION["admin"]))
{
    ?>

    <script type="text/javascript">
    window.location="index.php";
    </script>
    <?php



}
?>
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>

<?php 
include "footer.php"
?>
