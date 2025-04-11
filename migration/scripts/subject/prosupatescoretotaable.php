<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');

    /* Getting file name */
    if (!empty($_FILES['file']['name'])) 
    {
        $abba_campus = $_POST['abba_campus'];
        $abba_term = $_POST['abba_term'];
        $abba_session = $_POST['abba_session'];

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is part of the group of CSV file above, if it is, then upload
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) 
        {
            $filename = $_FILES['file']['name'];
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);
            //echo count($linecount);
            while (($line = fgetcsv($csvFile)) !== FALSE) 
            {
                
                echo $Old_Subject_Id = $line[0];
                $New_Subject_Id_old = $line[2];
                $New_Subject_Title = $line[3];
                $class_temp_id = $line[5];
                $Class_Id = $line[6];
                
            }
            
        }
        else
        {
            echo 'file empty<br>';
        }
    } 
    else 
    {
        echo 'file empty<br>';

    }
?>