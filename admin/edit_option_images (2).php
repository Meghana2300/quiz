<?php
session_start();
include"header.php";
include"../connections.php";
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
                        <h1>Update Questions with Images</h1>
                    </div>
                </div>
            </div>
            

        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-12">
                                
                        <div class="card">
                            <div class="card-header"><strong>
                            
                            Add New Questions With Images</strong>
                        </div>
                                <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text"  placeholder="Add Question" class="form-control" name="fquestion" value="<?php echo $question; ?>"></div>
                                <div class="form-group">
                                    <img src="<?php echo $Opt1;?>" height="50" width="50"><br>
                                    <label for="company" class=" form-control-label"> Add Opt1</label><input type="file"   class="form-control" name="fOpt1" style="padding-bottom: 45px;"></div>

                                <div class="form-group"><img src="<?php echo $Opt2;?>" height="50" width="50"><br><label for="company" class=" form-control-label"> Add Opt2</label><input type="file"   class="form-control" name="fOpt2" style="padding-bottom: 45px;"></div>

                                <div class="form-group"><img src="<?php echo $Opt3;?>" height="50" width="50"><br><label for="company" class=" form-control-label"> Add Opt3</label><input type="file"   class="form-control" name="fOpt3" style="padding-bottom: 45px;"></div>

                                <div class="form-group"><img src="<?php echo $Opt4;?>" height="50" width="50"><br><label for="company" class=" form-control-label"> Add Opt4</label><input type="file"  class="form-control" name="fOpt4" style="padding-bottom: 45px;"></div>

                                <div class="form-group"><img src="<?php echo $Answer;?>" height="50" width="50"><br><label for="company" class=" form-control-label"> Add Answer</label><input type="file"   class="form-control" name="fAnswer" style="padding-bottom: 45px;"></div>
                                <div class="form-group">
                                            <input type="submit" name="submit2" value="Update Question" class="btn-btn-success">
                                        
                                            
                                        

                                                </div>
                                            </div>
                               </div>
                                        


                            </div>
                                

                                

                            </div>
                        </form>

                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
                               
<?php
if(isset($_POST["submit2"]))
{
    $opt1=$_FILES["fOpt1"]["name"];
    $opt2=$_FILES["fOpt2"]["name"];
    $opt3=$_FILES["fOpt3"]["name"];
    $opt4=$_FILES["fOpt4"]["name"];
    $answer=$_FILES["fAnswer"]["name"];
    $tm=md5(time());

    if($opt1!="")
    {

    $dst1="./opt_images/".$tm.$opt1;
    $dst_db1="opt_images/".$tm.$opt1;
    move_uploaded_file($_FILES["fOpt1"]["tmp_name"],$dst1);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt1='$dst_db1' where id=$id") or die(mysqli_error($link));


    }
    if($opt2!="")
    {

    $dst2="./opt_images/".$tm.$opt2;
    $dst_db2="opt_images/".$tm.$opt2;
    move_uploaded_file($_FILES["fOpt2"]["tmp_name"],$dst2);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt2='$dst_db2' where id=$id") or die(mysqli_error($link));


    }
    if($opt3!="")
    {

    $dst3="./opt_images/".$tm.$opt3;
    $dst_db3="opt_images/".$tm.$opt3;
    move_uploaded_file($_FILES["fOpt3"]["tmp_name"],$dst3);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt3='$dst_db3' where id=$id") or die(mysqli_error($link));


    }
    if($opt4!="")
    {

    $dst4="./opt_images/".$tm.$opt4;
    $dst_db4="opt_images/".$tm.$opt4;
    move_uploaded_file($_FILES["fOpt4"]["tmp_name"],$dst4);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt4='$dst_db4' where id=$id") or die(mysqli_error($link));


    }
    if($answer!="")
    {

    $dst5="./opt_images/".$tm.$answer;
    $dst_db5="opt_images/".$tm.$answer;
    move_uploaded_file($_FILES["fAnswer"]["tmp_name"],$dst5);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',answer='$dst_db5' where id=$id") or die(mysqli_error($link));


    }
    mysqli_query($link,"update questions set question='$_POST[fquestion]' where id=$id") or die(mysqli_error($link));



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