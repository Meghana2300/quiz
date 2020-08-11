<?php
session_start();
include"header.php";
include "../connections.php";
if(!isset($_SESSION["admin"]))
{
    ?>

    <script type="text/javascript">
    window.location="index.php";
    </script>
    <?php
}
$id=$_GET["id"];
$id1=$_GET["id1"];
$question="";
$Opt1="";
$Opt2="";
$Opt3="";
$Opt4="";
$Answer="";
$res=mysqli_query($link,"select * from questions where id=$id");
while($row=mysqli_fetch_array($res))
{
    $question=$row["question"];
    $Opt1=$row["opt1"];
    $Opt2=$row["opt2"];
    $Opt3=$row["opt3"];
    $Opt4=$row["opt4"];
    $Answer=$row["answer"];

 
}
?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
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
                                <!-- Credit Card -->
                                 <!-- Credit Card -->
                                 <div class="col-lg-12">
                        <form name="form1" action="" method="post" enctype="multi/form-data">
                        <div class="card">
                            <div class="card-header"><strong>
                            
                            update Questions With text</strong>
                        </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text"  placeholder="Add Question" class="form-control" name="question" value="<?php echo $question; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt1</label><input type="text"  placeholder="Add opt1" class="form-control" name="Opt1" value="<?php echo $Opt1; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt2</label><input type="text"  placeholder="Add opt2" class="form-control" name="Opt2" value="<?php echo $Opt2; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt3</label><input type="text"  placeholder="Add opt3" class="form-control" name="Opt3" value="<?php echo $Opt3; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt4</label><input type="text"  placeholder="Add opt4" class="form-control" name="Opt4" value="<?php echo $Opt4; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Answer</label><input type="text"  placeholder="Add Answer" class="form-control" name="Answer" value="<?php echo $Answer; ?>"></div>
                                <div class="form-group">
                                            <input type="submit" name="submit1" value="Update Question" class="btn-btn-success">
                                        
                                            
                                        

                                                </div>
                                            </div>
                               </div>

                             </form>
                            </div>
                                        


                            </div>
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
                                             
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                               
                                    <?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"update questions set question='$_POST[question]', opt1='$_POST[Opt1]',opt2='$_POST[Opt2]',opt3='$_POST[Opt3]',opt4='$_POST[Opt4]',answer='$_POST[Answer]' where id=$id");

?>
<script type="text/javascript">
    window.location="add_edit_questions.php?id=<?php echo $id1;?>";
</script>
<?php
}
?>

<?php
include"footer.php";
?>