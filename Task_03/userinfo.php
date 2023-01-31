<title>Employeement Details</title>

<?php 
include('inc/header.php');
include('db.php');
include('section.php');



if (isset($_POST['save_userDetails'])) {
 

   $cname = $_POST['cname'];
  $joindate = $_POST['joindate'];
   $lastdate = $_POST['lastdate'];
  
   $fileinfo = @getimagesize($_FILES["file"]["tmp_name"]);
  
     
     $allowed_extension = array(
         "pdf"
     );
     
     // Get image file extension
     $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
     
     // Validate file input to check if is not empty
     if (! file_exists($_FILES["file"]["tmp_name"])) {
         $response = array(
             "type" => "danger",
             "message" => "Choose  file to upload."
         );
     }    // Validate file input to check if is with valid extension
     else if (! in_array($file_extension, $allowed_extension)) {
         $response = array(
             "type" => "danger",
             "message" => "Upload valid file. Only PDF are allowed."
         );
     }    // Validate image file size
     else if (($_FILES["file"]["size"] > 2000000)) {
         $response = array(
             "type" => "danger",
             "message" => "file size exceeds 2MB"
         );
     }   
    else {
         $target = "uploads/" . basename($_FILES["file"]["name"]);
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
   
           $sql="INSERT INTO `emp_details`(`cname`, `joindate`, `lastdate`, `file`) VALUES ('$cname','$joindate','$lastdate','$target')";
         
           if (mysqli_query($con, $sql)) {
            
               }else{
                 
               }
             $response = array(
                 "type" => "success",
                 "message" => "details uploaded successfully."
             );
   
          
          
         } else {
             $response = array(
                 "type" => "danger",
                 "message" => "Problem in uploading PDF files."
             );
         }
     }
      
    //  echo $target;
   
   
   
      }



    //   Edit Info

    if (isset($_POST['edit_userDetails'])) {
 

        $cname = $_POST['cname'];
       $joindate = $_POST['joindate'];
        $lastdate = $_POST['lastdate'];
        $emp_id = $_POST['emp_id'];
        $pdf =  $_FILES["file"]["name"];
        

        if ($pdf == !null){
            $fileinfo = @getimagesize($_FILES["file"]["tmp_name"]);
       
          
            $allowed_extension = array(
                "pdf"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            
            // Validate file input to check if is not empty
            if (! file_exists($_FILES["file"]["tmp_name"])) {
                $response = array(
                    "type" => "danger",
                    "message" => "Choose  file to upload."
                );
            }    // Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_extension)) {
                $response = array(
                    "type" => "danger",
                    "message" => "Upload valid file. Only PDF are allowed."
                );
            }    // Validate image file size
            else if (($_FILES["file"]["size"] > 2000000)) {
                $response = array(
                    "type" => "danger",
                    "message" => "file size exceeds 2MB"
                );
            }   
           else {
  
              
                $target = "uploads/" . basename($_FILES["file"]["name"]);
  
  
                
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
          
                  $sql="UPDATE `emp_details` SET `cname`='$cname',`joindate`='$joindate',`lastdate`='$lastdate',`file`='$target' WHERE `emp_id` = '$emp_id'";
                
                  if (mysqli_query($con, $sql)) {
                   
                      }else{
                        
                      }
                    $response = array(
                        "type" => "success",
                        "message" => "details updated successfully."
                    );
          
                 
                 
                } else {
                    $response = array(
                        "type" => "danger",
                        "message" => "Problem in uploading PDF files."
                    );
                }
            }
             
           //  echo $target;
        }
        elseif ($pdf == null) { 

            $sql="UPDATE `emp_details` SET `cname`='$cname',`joindate`='$joindate',`lastdate`='$lastdate'  WHERE `emp_id` = '$emp_id'";
                
            if (mysqli_query($con, $sql)) {
             
                }else{
                  
                }
            $response = array(
                "type" => "success",
                "message" => "details updated successfully."

            );


        }
       
        
           }

?>


<body class="">
    <div class="container-sm">
        <!-- Content here -->
        <div class="d-flex flex-row-reverse mb-5">
            <div class="p-2">
                <a href="logout.php" type="submit" name="logout_user" class="btn btn-danger ">LOGOUT</a>
            </div>
            <div class="p-2"> <b> Successfully logged in - <?php echo $_SESSION['NAME']; ?></b></div>
            <!-- <div class="p-2">Flex item 3</div> -->
        </div>


        <div class="d-flex flex-row mb-5">
            <div class="p-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Employee Details
                </button>
            </div>

            <h6 class="">

                <?php if(!empty($response)) { ?>
                <div class="alert alert-<?php echo $response["type"]; ?> alert-dismissible fade show" role="alert">

                    <div class="alert-<?php echo $response["type"]; ?> ">

                        <strong> <?php echo $response["message"]; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php }?>
            </h6>

        </div>
        <!-- modal  -->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee info...</h1>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                    </div>
                    <div class="modal-body">
                        <form action="userinfo.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-5">
                                <div class="input-group">
                                    <span class="input-group-text">Company name</span>
                                    <input type="text" name="cname" required class="form-control">

                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Joining date</span>
                                        <input type="date" name="joindate" required class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Last working date</span>
                                        <input type="date" name="lastdate" required class="form-control">

                                    </div>
                                </div>

                            </div>

                            <div class="input-group mb-5">
                                <input type="file" name="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_userDetails" class="btn btn-primary">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Edit modal -->
        <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee info...</h1>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                    </div>
                    <div class="modal-body">
                        <form action="userinfo.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-5">
                                <div class="input-group">
                                    <span class="input-group-text">Company name</span>
                                    <input type="text" name="cname" id="cname" class="form-control">

                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Joining date</span>
                                        <input type="date" name="joindate" id="joindate" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Last working date</span>
                                        <input type="date" name="lastdate" id="lastdate" class="form-control">

                                    </div>
                                </div>
                                <input type="hidden" name="emp_id" id="emp_id">

                            </div>

                            <div class="input-group mb-5">
                                <input type="file" name="file" class="form-control"> <span id="profile"></span>


                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_userDetails" class="btn btn-primary">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="example" class="table">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Company name</th>
                    <th>Joining date</th>
                    <th>Last working date</th>
                    <th>File</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `emp_details`";
                    $result = mysqli_query($con, $sql);
                    $sr = 1;
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['joindate']; ?></td>
                    <td><?php echo $row['lastdate']; ?></td>
                    <td> <a href="<?php echo $row['file']; ?>"  style="color:red" target="_blank"> <span class="material-symbols-outlined">
                    visibility
                            </span> </a></td>
                    <th>

                        <a onclick="editinfo('<?php echo $row['emp_id']; ?>')"> <span class="material-symbols-outlined">
                                edit
                            </span> </a>
                    </th>

                </tr>
                <?php
                 $sr++; 
                    }
                                  
                    }
                    ?>
            </tbody>

        </table>


    </div>


    <script type="text/javascript">
    function editinfo(employee_id) {
        // alert(id)
        $.ajax({
            url: "select_info.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                $('#editmodal').modal('show');
                // alert(data.cname);
                $('#cname').val(data.cname);
                $('#joindate').val(data.joindate);
                $('#lastdate').val(data.lastdate);
                $('#emp_id').val(data.emp_id);

                $('#profile').html('<a href="' + data.file +
                    '" style="color:red" target="_blank"> View Uploaded PDF</a>');
            }
        });
    }
    </script>

    <?php include('inc/footer.php'); ?>