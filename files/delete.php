<?php
    require 'dbconn.php';
    if (isset($_POST['delete_btn'])) {
        echo $delete_data = $_POST['delete_btn'];
        $query = "DELETE FROM `test` WHERE `id` = '$delete_data'";
        $result = $conn->query($query);
    
        if ($result == TRUE) {
            header("Location: show-data.php");
          echo "Deleted successfully.";
          exit(0);
    
        }else{
    
          echo "Error:". $sql . "<br>". $conn->error;
          header("Location: show-data.php");
          //exit(0);
    
        } 
    
        $conn->close(); 
    }
?>