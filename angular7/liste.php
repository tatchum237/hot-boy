<?php
    try
    {
        $bdd = new PDO ('mysql:host = localhost; dbname=angular7crud', 'root', '');
        $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(Execution $e)
    {
        die('Erreur : '. $e->getMessage());
    }

        error_reporting(E_ERROR);
        header("Access-Control-Allow-Origin:*");
        header("Content-type:application/json");

         $students = [];
         $sc = 0;
    	 $query = $bdd-> query('SELECT * FROM students;');

    	while ($row = $query->fetch()){
    		$students[$sc]['sId'] = $row['sId'];
            $students[$sc]['fName'] = $row['fName'];
            $students[$sc]['lName'] = $row['lName'];
            $students[$sc]['email'] = $row['email'];
            $sc++;
    	}

        //print_r($students);
    	echo json_encode($students);
?>





