 <?php

 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'angular7crud');
   
     function connect(){
        $connect = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno($connect)){
            die("Failed to connect:" . mysqli_connect_error());
        }

        mysqli_set_charset($connect, "utf8");
        return $connect;
     }
         $con = connect();
    
         error_reporting(E_ERROR);
         header("Access-Control-Allow-Origin:*");
         header("Content-type:application/json");
         header("Access-Control-Allow-Methods:PUT, GET, POST, DELETE, OPTIONS");
         header("Content-type: application/x-www-form-urlencoded");
         header("Access-Control-Allow-Headers: X-Requested-with, Content-Type, Authorization");
     
     $id = $_GET['id'];
      {
      	//return http_response_code(400);
      }
      // get by id
        $sql = "SELECT * FROM students WHERE sId = '{$id}' LIMIT 1;";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
      
        echo $json = json_encode($row);

        exit();
?>