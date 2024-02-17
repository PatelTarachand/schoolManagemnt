<?php
    session_start();
    error_reporting(0);
    include "header.php";
    include "config.php";

    if(isset($_GET['edit_id'])){
        if(isset($_POST['save'])){
            $course_name=$_POST['course_name'];
            $course_status=isset($_POST['course_status']) == true ?'1':'0';
            $id=$_GET['edit_id'];
            $exist="SELECT * FROM course where `course_name`='$course_name'";
            $res1=$connection->query($exist);
            if(mysqli_num_rows($res1)>0){
                $_SESSION['message']="course name already exist";
            }else{
                $sql="UPDATE course SET `course_name`='$course_name',`course_status`='$course_status' WHERE `course_id`='$id'";
                $res=$connection->query($sql);
                if($res){
                    $_SESSION['message']="Course updadded successfully";
                }else{
                    $_SESSION['message']="Something is not successfully";
                }
            }
        }
    }else if(isset($_POST['save'])){
        $course_name=$_POST['course_name'];
        $course_status=isset($_POST['course_status']) == true ?'1':'0';

        $exist="SELECT * FROM course where `course_name`='$course_name'";
        $res1=$connection->query($exist);
        if(mysqli_num_rows($res1)>0){
            $_SESSION['message']="course name already exist";
        }else{
            $sql="INSERT INTO course (`course_name`,`course_status`) VALUES ('$course_name','$course_status')";
            $res=$connection->query($sql);
            if($res){
                $_SESSION['message']="Course added successfully";
            }else{
                $_SESSION['message']="Something is not successfully";
            }
        }
    }else if(isset($_POST['delete'])){
        $id=$_POST['delete'];
        $delete="DELETE FROM course WHERE `course_id`='$id'";
        $res=$connection->query($delete);
        if($res){
            $_SESSION['message']="Course deleted successfully";
        }else{
            $_SESSION['message']="Something is not successfully";
        }
    }
?>

<?php
    if(isset($_GET['edit_id'])){
        $id=$_GET['edit_id'];
        $sql="SELECT * FROM course WHERE `course_id`='$id'";
        $res=$connection->query($sql);
        foreach($res as $row4){
            ?>

            <?php
        }
    }
?>

        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-10"><h4>Course Details</h4></div>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="  table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Course Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql="SELECT * FROM course";
                                                $res=$connection->query($sql);
                                                if(mysqli_num_rows($res)>0){
                                                    $no=1;
                                                    foreach($res as $row){
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $row['course_name'];?></td>
                                                                <td><?= $row['course_status']=='1'?'Inactive':'Active';?></td>
                                                                <td>
                                                                    <a class="btn btn-danger" href="course.php?edit_id=<?= $row['course_id'];?>">Edit</a>
                                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $row['course_id'];?>">DELETE</button></td>
                                                            </tr>
                                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?= $row['course_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="" method="post">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mt-3">
                                                                <label class="form-label">Are you sure to delete the course</label>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="delete" value="<?= $row['course_id'];?>" class="btn btn-danger">delete</button>
                                                        </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                                        <?php
                                                    }
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="mt-3">
                                                <label class="form-label">Course Name</label>
                                                <input type="text" name="course_name" pattern="^[A-Za-z\-]+$" value="<?=$row4['course_name'];?>" class="form-control" required>
                                            </div>
                                            <div class="mt-3">
                                                <label class="form-label">Course Status</label>
                                                <input type="checkbox" name="course_status" <?=$row4['course_status']=='1'?'checked':'';?>>
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn btn-sm btn-primary" type="submit" name="save">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
<?php
    include "footer.php";
?>