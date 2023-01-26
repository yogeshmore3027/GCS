<title>User Adhar Details</title>

<?php 
include('inc/header.php');
include('db.php');
include('section.php');



if (isset($_POST['submit_adhar'])) {
 

   $adhar_no = $_POST['adhar_no'];
   
   
    
  $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
//   $width = $fileinfo[0];
//   $height = $fileinfo[1];
  
  $allowed_image_extension = array(
      "png",
      "jpg",
      "jpeg"
  );
  
  // Get image file extension
  $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
  
  // Validate file input to check if is not empty
  if (! file_exists($_FILES["file-input"]["tmp_name"])) {
      $response = array(
          "type" => "danger",
          "message" => "Choose image file to upload."
      );
  }    // Validate file input to check if is with valid extension
  else if (! in_array($file_extension, $allowed_image_extension)) {
      $response = array(
          "type" => "danger",
          "message" => "Upload valid images. Only PNG and JPEG are allowed."
      );
  }    // Validate image file size
  else if (($_FILES["file-input"]["size"] > 2000000)) {
      $response = array(
          "type" => "danger",
          "message" => "Image size exceeds 2MB"
      );
  }    // Validate image file dimension
//   else if ($width > "300" || $height > "200") {
//       $response = array(
//           "type" => "danger",
//           "message" => "Image dimension should be within 300X200"
//       );
//   }
 else {
      $target = "image/" . basename($_FILES["file-input"]["name"]);
      if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {

        $sql="INSERT INTO `employee_doc`(`aadharCard`, `aadharCardfile`) VALUES ('$adhar_no','$target')";
      
        if (mysqli_query($con, $sql)) {
         
            }else{
              
            }
            // mysqli_close($con);
          $response = array(
              "type" => "success",
              "message" => "Adhar details uploaded successfully."
          );

       
       
      } else {
          $response = array(
              "type" => "danger",
              "message" => "Problem in uploading image files."
          );
      }
  }
   
//   echo $target;



   }

?>


<body style="background-color: rgb(223, 223, 218);" class="">
    <div class="container-sm">
        <!-- Content here -->
        <div class="d-flex flex-row-reverse">
            <div class="p-2">
                <a href="logout.php" type="submit" name="logout_user" class="btn btn-danger ">LOGOUT</a>
            </div>
            <div class="p-2"> <b> Successfully logged in - <?php echo $_SESSION['NAME']; ?></b></div>
            <!-- <div class="p-2">Flex item 3</div> -->
        </div>
        <div class="row justify-content-center" style="margin-top: 70px">
            <div class="col-md-8">

                <div class="card text-center">
                    <div class="mainCard" class="card-header"></div>

                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <b>Fill User Adhar Details</b>

                        </h5>

                        <form action="home.php" id="form1" class="" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <span class="input-group-text material-symbols-outlined" id="">
                                    feed
                                </span>
                                <input type="number" class="form-control" placeholder="Adhar Number" id="adhar_no"
                                    name="adhar_no" required />

                            </div>
                            <hr>
                            <div class="form-group files">
                                <label>Upload Your File <b style="color: red;"> PNG/JPG/JPEG</b> </label>

                                <input type="file" class="form-control" required name="file-input">
                            </div>

                            <h6 class="mb-3 mt-4">

                                <?php if(!empty($response)) { ?>
                                <div class="alert alert-<?php echo $response["type"]; ?> alert-dismissible fade show"
                                    role="alert">

                                    <div class="alert-<?php echo $response["type"]; ?> ">

                                        <strong> <?php echo $response["message"]; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <?php }?>
                            </h6>

                            <button type="submit" name="submit_adhar" class="btn btn-primary mt-3 btnSize1">
                                SUBMIT
                            </button>
                        </form>
                    </div>
                   
                </div>


            </div>


        </div>
    </div>
    <script>
    $('.file-upload').file_upload();
    </script>


    <?php include('inc/footer.php'); ?>