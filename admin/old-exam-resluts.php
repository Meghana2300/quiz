<?php 
session_start();
 
include "header.php";
include "../connections.php";
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
                        <h1>Results</h1>
                    </div>
                </div>
            </div>
            </div>
            <div class="content mt-3">
              <div class="animated fadeIn">
              <div class="row">
                <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                   <center>

<h1> Exam Results</h1>
</center>


<?php 
$res=mysqli_query($link,"select * from exam_resluts  order by id desc");
$count=mysqli_num_rows($res);

if($count==0)
{
    ?>
    <center>

<h1> Results Not Found</h1>
</center>
<?php

}
else{

 echo "<table class='table table-bordered'>";
 echo "<tr style='background-color:blue; color:white'>";
 echo "<th>"; echo "username"; echo "</th>";
 echo "<th>"; echo "Exam"; echo "</th>";
 echo "<th>"; echo " Questions"; echo "</th>";
 echo "<th>"; echo "Correct"; echo "</th>";
 echo "<th>"; echo "Wrong"; echo "</th>";
 echo "<th>"; echo "Date"; echo "</th>";

 echo "</tr>";
 while($row=mysqli_fetch_array($res)){

     echo "<tr>";
     echo "<td>"; echo $row["username"]; echo "</td>";
     echo "<td>"; echo  $row["exam_type"]; echo "</td>";
     echo "<td>"; echo  $row["total_question"]; echo "</td>";
     echo "<td>"; echo  $row["correct_answer"]; echo "</td>";
     echo "<td>"; echo  $row["wrong_answer"]; echo "</td>";
     echo "<td>"; echo  $row["exam_time"]; echo "</td>";
 
     echo "</tr>" ;

 }

 echo"</table>";

}

?>
                   </div>
                 </div>
                </div>
              
              </div>
              </div>
            </div>

<?php 
include "footer.php"
?>
