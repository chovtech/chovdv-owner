<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');

    $filename = $_POST['abbafilename'];
    
    if (file_exists($filename)) {
        if (unlink($filename)) {
            echo "File deleted successfully.";
        } else {
            echo "Unable to delete the file.";
        }
    } else {
        echo "File does not exist.";
    }

?>