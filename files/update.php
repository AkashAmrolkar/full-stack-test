<?php
    require 'dbconn.php';
    echo $get_id = mysqli_real_escape_string($conn, $_GET['id']);
    if (isset($_POST['update'])) {

        $first_name = $_POST['first_name'];
    
        $last_name = $_POST['last_name'];
    
        $email = $_POST['email'];
    
        $cat_name = $_POST['cat_name'];
       // $file_path = $_POST['uploadfile'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $upload_dir = "images/";
        $file_path = $upload_dir . $filename;
        move_uploaded_file($tempname, $file_path);
         $sql = "UPDATE `test` SET `first_name`= '$first_name', `last_name` = '$last_name', `email` = '$email', `caregory` = '$cat_name', `filename` = '$file_path' WHERE `id` = '$get_id'";
    
        $result = $conn->query($sql);
    
        if ($result == TRUE) {
            header("Location: show-data.php");
          echo "Updated records successfully.";
          exit(0);
    
        }else{
    
          echo "Error:". $sql . "<br>". $conn->error;
          header("Location: show-data.php");
          //exit(0);
    
        } 
    
        $conn->close(); 
    
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="h2 text-center text-uppercase fs-1 fw-bold lh-base my-5">Update Data</h2>

        <!-- Edit Form -->
        <?php
            if(isset($_GET['id']))
            {
                
                $query = "SELECT * FROM `test` where id='$get_id'";
                $result2 = $conn->query($query);
                //print_r($result2);
                if ($result2->num_rows > 0) {
                    $edit_data = mysqli_fetch_array($result2);
                    print_r($edit_data);
                    ?>
                    <div class="bg-white border p-4 shadow-sm mb-5" >
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="f_name" class="form-label fs-2">First Name: </label>
                                        <input type="text" class="form-control fs-2 shadow-none" value="<?php echo $edit_data['first_name']?>" id="f_name" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="l_name" class="form-label fs-2">Last Name: </label>
                                        <input type="text" class="form-control fs-2 shadow-none" value="<?php echo $edit_data['last_name']?>" id="l_name" name="last_name" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label fs-2">Email address:</label>
                                <input type="email" class="form-control fs-2 shadow-none" value="<?php echo $edit_data['email']?>" id="email" name="email" required>
                            </div>
                            
                            <select class="form-select fs-2 mb-3 shadow-none" name="cat_name" value="<?php echo $edit_data['caregory']?>" required>
                                <option selected>Select Category</option>
                                <option value="cat1">Cat1</option>
                                <option value="cat2">Cat2</option>
                                <option value="cat3">Cat3</option>
                            </select>
                            <div class="mb-3">
                                <label for="file" class="form-label fs-2">Select File:</label>
                                <input class="form-control" type="file" name="uploadfile" value="<?php echo $edit_data['filename']?>" required>
                            </div>
                            <input type="submit" name="update" value="update" class="bg-primary px-5 py-3 fs-2 border-0 rounded" >
                        </form>
                    </div>


                <?php
                }
                
            }
        ?>

        
    </div>
</body>
</html>