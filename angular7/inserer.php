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
         header("Access-Control-Allow-Origin: *");
         header("Content-type: application/json");
         header("Content-type: application/x-www-form-urlencoded");
         header("Access-Control-Allow-Headers: X-Requested-with, Content-Type, Authorization");
         header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");  //
         //header("Access-Control-Allow-Origin: http://localhost:4200");
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type");


         $postdata = file_get_contents("php://input");

         if(isset($postdata) && !empty($postdata)){
            $request = json_decode($postdata);
                 //sanitize
            $fName = mysqli_real_escape_string($con, trim($request->fName));
            $lName = mysqli_real_escape_string($con, trim($request->lName));
            $email = mysqli_real_escape_string($con, trim($request->email));

            //store
            $sql = "INSERT INTO students (fName, lName, email) VALUES ('{$fName}', '{$lName}', '{$email}');";

           if(mysqli_query($con, $sql)){
        
             // http_response_code(204);
              

             }
            else{
            // http_response_code(412);
                          }
         }

     ?>