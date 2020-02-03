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
         header("Content-type: application/x-www-form-urlencoded");
         header("Access-Control-Allow-Headers: X-Requested-with, Content-Type, Authorization");
         header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
         // get the posted data
         $postdata = file_get_contents("php://input");

         if(isset($postdata) && !empty($postdata)){
                  // extract the date
          $request = json_decode($postdata);

          //sanitize
           $id = mysqli_real_escape_string($con, (int)$_GET['id']);
           $fName = mysqli_real_escape_string($con, trim($request->fName));
           $lName = mysqli_real_escape_string($con, trim($request->lName));
           $email = mysqli_real_escape_string($con, $request->email);

             // update

          $sql = "UPDATE students SET fName='$fName', lName='$lName', email = '$email'   WHERE sId = '{$id}' LIMIT 1;";

         }
    
    
      if(mysqli_query($con, $sql)){
        
       http_response_code(204);
  
       }
      else{
     // return  http_response_code(422);
    }

?>