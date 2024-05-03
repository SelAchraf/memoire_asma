<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $sql="SELECT course_id FROM course";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if(isset($_REQUEST['checkid'])&& $_REQUEST['checkid']==$row['course_id']){
            $sql="SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['course_id'])== $_REQUEST['checkid']){
                $_SESSION['course_id']=$row['course_id'];
                $_SESSION['course_name']=$row['course_name'];
                if(isset($_SESSION['course_id'])){
                    echo 
                    '<div>
                        <a class="btn btn-danger box" href="./addLesson.php"><i class="fas fa-plus fa-2x"></i></a>
                    </div>';
                }
                ?>
                <br>
                <br>    
                <div class="form-group row" style="margin-bottom: 5rem; width: 30rem;margin-left: 10rem;">
                    <div class="col">
                        <h5><label for="course_id">Course ID: </label></h5>
                        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) { echo $row['course_id'];}?>" readonly>
                    </div>
                    <div class="col">
                        <h5><label for="course_name">Course Name: </label></h5>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) { echo $row['course_name'];}?>" readonly>
                    </div>
                </div>
                <?php
                    $sql = "SELECT * FROM lesson WHERE course_id ={$_REQUEST['checkid']}";
                    $result = $conn->query($sql);
                    echo 
                    '<div style="margin-right:200px,width:100%;">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th scope="col">Lesson ID</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Lesson Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        <tbody>';
                    while($row = $result->fetch_assoc()){ 
                        echo '<tr>';
                        echo'<th scope="row">'.$row['lesson_id'].'</th>';
                        echo '<td>'.$row['lesson_name'].'</td>';
                        echo '<td>'.$row['lesson_link'].'</td>';
                        echo  
                        '<td>
                            <form action="editLesson.php" method="Post" class="d-inline">
                                <input type="hidden" name="id" value='.$row["lesson_id"].'>
                                <button
                                type="submit"
                                class="btn btn-info mr-3"
                                name="view"
                                value="View">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </form>
                            <form action="" method="Post" class="d-inline">
                                <input type="hidden" name="id" value='.$row["lesson_id"].'>
                                <button
                                type="submit"
                                class="btn btn-secondary"
                                name="delete"
                                value="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        </tr>';
                    }
                ?>
                </tbody>
                </table>   
                </div> 
                <?php
            }
            else{
                // echo'<div class="alert alert_dark mt-4" role="alert">Course not found!</div>'; 
            }
            if(isset($_REQUEST['delete'])){
                $sql="DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<mete http-equiv="refresh" content="0;URL=?deleted" />'; 
                }
                else{
                    echo"Unable to delete data";
                }
            }
        }
    }
    if(isset($_POST['course_id'])) {
        $_SESSION['course_id'] = $_POST['course_id']; // Set session variable
    }
?>