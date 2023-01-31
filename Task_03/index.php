<?php 
include('inc/header.php');
include('db.php');
session_start();
if (isset($_SESSION['ID'])) {
    header("Location:userinfo.php");
    exit();
}
if (isset($_POST['login'])) {
 
    $errorMsg = "";
    $email = $_POST['email'];
    $password = ($_POST['password']);
    
  
      $query  = "SELECT * FROM register WHERE email = '$email'";
      $result = $con->query($query);
       if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($password == $row['password'] ){
            $_SESSION['ID'] = $row['u_id'];
            $_SESSION['EMAIL'] = $row['email'];
            $_SESSION['NAME'] = $row['fname'];
            echo "<script>
            alert('Login Successful');
            window.location.href='userinfo.php';
            </script>";
           
            // die();  
          } 
          else{
            echo "<script>
            alert('Password Not Match');
            window.location.href='index.php';
            </script>";
          }
                                     
      } 
   }

   


?>

<body class="mainBody">
    <div class="container-sm">
        <!-- Content here -->
        <div class="row justify-content-center" style="margin-top: 130px">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="mainCard" class="card-header"></div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <b>Login</b>
                        </h5>
                        <form action="index.php" class="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text material-symbols-outlined" id="">
                                    mail
                                </span>
                                <input type="email" class="form-control" placeholder="email" name="email"
                                      required />
                                      
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text material-symbols-outlined" id="">
                                    lock
                                </span>
                                <input type="password" class="form-control" placeholder="password" name="password"
                                      required />
                            </div>
                           

                            

                          
                            <h6 class="mb-3 mt-4">
                                
                                <a href="#" class="forgot"> FORGOT YOUR PASSWORD?</a>  
                            </h6>
                           

                            <a href="register.php" class="btn btn-outline-warning mt-3 btnSize">
                                REGISTER
                            </a>

                            <button type="submit" name="login" class="btn btn-primary mt-3 btnSize1">
                                SIGN UP
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('inc/footer.php'); ?>