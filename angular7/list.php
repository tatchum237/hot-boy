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

         $students = [];
    	 $sql = "SELECT * FROM students;";
     if($result = mysqli_query($con, $sql)){
         $sc = 0;
        
    	while ($row =mysqli_fetch_assoc($result)){
    		$students[$sc]['sId'] = $row['sId'];
            $students[$sc]['fName'] = $row['fName'];
            $students[$sc]['lName'] = $row['lName'];
            $students[$sc]['email'] = $row['email'];
            $sc++;
    	}

        //print_r($students);
    	echo json_encode($students);
    }
    else{
        http_response_code(404);
    }
?>





