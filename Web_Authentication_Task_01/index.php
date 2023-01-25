<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Page Authentication</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .mainBody {
            background-color: #caedf1;
        }

        .mainCard {
            background-color: #f2ed5b;
            height: 5px;
        }
        .btnSize{
            width: 48%;
        }
        .btnSize1{
            width: 50%;
        }
        .forgot{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<?php
include('db.php');

if (isset($_POST['login'])) {
 

    $email = $_POST['email'];
    $password = ($_POST['password']);
    
  
      $query  = "SELECT * FROM register WHERE email = '$email'";
      $result = $con->query($query);
       if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($password == $row['password'] ){
            echo "<script>
            alert('Login Successful');
            window.location.href='home.php';
            </script>";
           
            die();  
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
                                <input type="email" class="form-control" placeholder="EMAIL" name="email"
                                      required />
                                      
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text material-symbols-outlined" id="">
                                    lock
                                </span>
                                <input type="text" class="form-control" placeholder="PASSWORD" name="password"
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

    <script src="dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>