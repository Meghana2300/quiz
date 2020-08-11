<?php
include"header.php";
include"../connections.php";
$id=$_GET["id"];
$exam_category="";
$res=mysqli_query($link,"select *from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];

}
?>


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Questions inside <?php  echo"<font color='red'>" .$exam_category."</font>"; ?></h1>
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
                                <div class="col-lg-6">
                                <form name="form1" action="" method="post" enctype="multi/form-data">
                        <div class="card">
                            <div class="card-header"><strong>
                            
                            Add New Questions With text</strong>
                        </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text"  placeholder="Add Question" class="form-control" name="question"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt1</label><input type="text"  placeholder="Add opt1" class="form-control" name="Opt1"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt2</label><input type="text"  placeholder="Add opt2" class="form-control" name="Opt2"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt3</label><input type="text"  placeholder="Add opt3" class="form-control" name="Opt3"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt4</label><input type="text"  placeholder="Add opt4" class="form-control" name="Opt4"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Answer</label><input type="text"  placeholder="Add Answer" class="form-control" name="Answer"></div>
                                <div class="form-group">
                                            <input type="submit" name="submit1" value="Add Question" class="btn-btn-success">
                                        
                                            
                                        

                                                </div>
                                            </div>
                               </div>

                               
                            </div>
                            <div class="col-lg-6">
                                
                        <div class="card">
                            <div class="card-header"><strong>
                            
                            Add New Questions With Images</strong>
                        </div>
                                <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text"  placeholder="Add Question" class="form-control" name="fquestion"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt1</label><input type="file"   class="form-control" name="fOpt1" style="padding-bottom: 45px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt2</label><input type="file"   class="form-control" name="fOpt2" style="padding-bottom: 45px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt3</label><input type="file"   class="form-control" name="fOpt3" style="padding-bottom: 45px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Opt4</label><input type="file"  class="form-control" name="fOpt4" style="padding-bottom: 45px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Answer</label><input type="file"   class="form-control" name="fAnswer" style="padding-bottom: 45px;"></div>
                                <div class="form-group">
                                            <input type="submit" name="submit2" value="Add Question" class="btn-btn-success">
                                        
                                            
                                        

                                                </div>
                                            </div>
                               </div></form>
                                        


                            </div>
                        </div> <!-- .card -->
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>no</th>
                                        <th>questions</th>
                                        <th>Opt1</th>
                                        <th>Opt2</th>
                                        <th>Opt3</th>
                                        <th>Opt4</th>
                                        <th>Edit</th>
                                        <th>Delete</th>


                                    </tr>
                                
                                <?php
                                $res=mysqli_query($link,"select *from questions where category='$exam_category'order by question_no asc");
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["question_no"]; echo"</td>";
                                     echo "<td>"; echo $row["question"]; echo"</td>";
                                      echo "<td>"; 
                                      if(strpos($row["opt1"],'opt_iamges/')!==false)
                                      {
                                        ?>
                                        <img src="<?php echo $row["opt1"];?>"height="50" width="50">
                                        <?php
                                      }
                                      else {
                                        echo $row["opt1"];
                                      }
                                       echo"</td>";
                                      echo "<td>"; 
                                      if(strpos($row["opt2"],'opt_iamges/')!==false)
                                      {
                                        ?>
                                        <img src="<?php echo $row["opt2"];?>"height="50" width="50">
                                        <?php
                                      }
                                      else {
                                        echo $row["opt2"];
                                      }
                                       echo"</td>";
                                      
                                      echo "<td>"; 
                                      if(strpos($row["opt3"],'opt_iamges/')!==false)
                                      {
                                        ?>
                                        <img src="<?php echo $row["opt3"];?>"height="50" width="50">
                                        <?php
                                      }
                                      else {
                                        echo $row["opt3"];
                                      }
                                       echo"</td>";

                                       echo "<td>"; 
                                      if(strpos($row["opt4"],'opt_iamges/')!==false)
                                      {
                                        ?>
                                        <img src="<?php echo $row["opt4"];?>"height="50" width="50">
                                        <?php
                                      }
                                      else {
                                        echo $row["opt4"];
                                      }
                                       echo"</td>";

                                      echo "<td>"; 
                                      if(strpos($row["opt4"],'opt_images/')!==false)
                                      {
                                        ?>
                                        
                                        <a href="edit_option_images.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                        <?php
                                      }
                                      else {
                                        
                                        ?>
                                        <a href="edit_option.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                        <?php
                                      }
                                       echo"</td>";
                                      
                                      echo"<td>";
                                      ?>
                                      <a href="delete_option.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>"> Delete</a>
                                      
                                      <?php
                                      echo"</td>";
                                      


                                      
                                    echo "</tr>";
                                }
                                ?></table>
                            </div></div></div></div>

                                             
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
<?php
if(isset($_POST["submit1"]))
{
    $loop=0;
           $count=0;

           $res=mysqli_query($link,"select *from questions where category='$exam_category'order by id asc") or die (mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count==0)
    {

    }
    else{
            while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop'where id=$row[id]");
        }
    }

    $loop=$loop+1;
    mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[question]','$_POST[Opt1]','$_POST[Opt2]','$_POST[Opt3]','$_POST[Opt4]','$_POST[Answer]','$exam_category')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
</script>

    <?php

}
?>                                    
                               
<?php
if(isset($_POST["submit2"]))
{
    $loop=0;
           $count=0;

           $res=mysqli_query($link,"select *from questions where category='$exam_category'order by id asc") or die (mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count==0)
    {

    }
    else{
            while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop'where id=$row[id]");
        }
    }

    $loop=$loop+1;

    $tm=md5(time());

    $fnm1=$_FILES["fOpt1"]["name"];
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db1="opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fOpt1"]["tmp_name"],$dst1);

    $fnm2=$_FILES["fOpt2"]["name"];
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2="opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fOpt2"]["tmp_name"],$dst2);

    $fnm3=$_FILES["fOpt3"]["name"];
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3="opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fOpt3"]["tmp_name"],$dst3);

    $fnm4=$_FILES["fOpt4"]["name"];
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4="opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fOpt4"]["tmp_name"],$dst4);

    $fnm5=$_FILES["fAnswer"]["name"];
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5="opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fAnswer"]["tmp_name"],$dst5);

    mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','
        $dst_db5','$exam_category')") or die(mysqli_error($link));
    ?>

    <script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
</script>

    <?php

}
?>                                    
                               
                             

<?php
include"footer.php";
?>