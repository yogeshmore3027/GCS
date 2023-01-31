
<?php  
// database connection
$connect = mysqli_connect("localhost", "root", "", "gcs"); 

 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM emp_details WHERE emp_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>