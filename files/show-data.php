<?php 
require 'dbconn.php';
 $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
 if(!$cat_id){
    $cat_id = 'cat1';
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"></script> -->

 <style>

.main-carousel {
  width: 90%;
  display: flex;
  align-items: center;
  margin-top: 1%;
  margin-left: 5%;
}

.carousel-cell {
  width: 100%; /* full width */
  padding-left: 10px;
  background: #fff;
  /* center images in cells with flexbox */
  display: flex;
  align-items: center;
  justify-content: center;
}
.flickity-viewport {
    width: 550px !important;
}
.flickity-slider, .carousel-cell.is-selected {
    transform: translateX(0) !important;
}


.img-box {
    display: flex;
    justify-content: center;
}
img.card-img-top {
    border-radius: 50%;
    height: 80px;
    width: 80px;
}
a:active{
    background: blue !important;
    color: #fff !important;
}
.table_img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: flex;
    margin: 0 auto;
}
.image_tab img{
    width:100%;
}
ul.nav.nav-pills li {
    background: #fff;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
.tabing-section, .mobile-view {
	background: #10324d;
	padding: 40px;
}

.cat-lists{
    background: #fff;
	padding: 40px 10px;
}
.tab-content-block, .carousel-cell.is-selected, .card, .accordion-collapse {
	background: #63b4c9;
}
.flickity-page-dots {
	bottom: -10px !important;
}
li.dot {
	border: 2px solid #fff !important;
	background: transparent !important;
}
.dot.is-selected {
	background: #fff !important;
}
.list.active, .accordion-header.active{
    position: relative;
}
.list.active::after {
	position: absolute;
	content: '';
	height: 30px;
	width: 30px;
	background: #63b4c9;
	right: -40px;
	rotate: 45deg;
	top: 20%;
}
.list-link {
	background: #fff !important;
	color: #111 !important;
}
li.list {
	margin-bottom: 20px;
}
.accordion-header.active::before {
	position: absolute;
	content: ;
	content: '';
	height: 30px;
	width: 30px;
	background: #63b4c9;
	left: 50%;
	bottom: -15px;
	rotate: 45deg;
}
.mobile-view{
    display: none;
}
.accordion-collapse.show {
    height: 250px;
}
button.accordion-button {
    background: #fff !important;
}
@media only screen and (max-width:767px){
    .tabing-section{
        display: none;
    }
    .mobile-view{
        display: block;
    }
}

</style>
</head>
<body>
    <div class="container my-5">
        <!-- Show all form data -->
        <div class="show-all-data mb-5">
            <div class="d-flex justify-content-between">
            <h3 class="h2 text-left text-capitalize fs-1 fw-bold lh-base mb-4">Show all form data:</h3>
            <h4><a href="index.php" class="fs-3 btn btn-primary float-end">Add Data</a></h4>
            </div>
            
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="fs-2">ID</th>
                        <th class="fs-2">First Name</th>
                        <th class="fs-2">last Name</th>
                        <th class="fs-2">Email</th>
                        <th class="fs-2">Category</th>
                    </tr>
                    <?php
                    $index = 1;
                    $allData = 'SELECT * FROM `test`';
                    
                    $result2 = $conn->query($allData);

                    if ($result2->num_rows > 0) {
                        // output data of each row
                        while($row = $result2->fetch_assoc()) {
                        // echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";

                    ?>
                    <tr>
                        <td class="fs-3"><?php echo $index ?></td>
                        <td class="fs-3"><?php echo $row["first_name"] ?></td>
                        <td class="fs-3"><?php echo $row["last_name"] ?></td>
                        <td class="fs-3"><?php echo $row["email"] ?></td>
                        <td class="fs-3"><?php echo $row["caregory"] ?></td>
                        <td class="fs-3"><img src="<?php echo $row["filename"] ?>" class="table_img"></td>
                        <td class="text-center">
                            <a href="update.php?id=<?php echo $row["id"] ?>" class="btn btn-success btn-sm fs-3">Edit</a>
                            <form action="delete.php" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-danger btn-sm fs-3" name="delete_btn" value="<?php echo $row["id"] ?>">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        $index =$index+1;
                        }
                        
                    } else {
                        echo "0 results";
                    }
                    //print_r($result2);
                    ?>
                </tbody>
            </table>
        </div>


        <!-- Tabbing Section -->
        <form action="" method="post">
            <input type="hidden" name="catlist" value="">
        </form>

        

        <div class="tabing-section">
            <div class="container"><h1 class="text-white text-center">DelphinLogin in Action</h1>
                <p class="text-white text-center fs-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div id="exTab1" class="container">
                <div class="row no-gutters mt-5">
                    <div class="col-md-3 bg-light">
                        <ul  class="nav nav-pills d-flex flex-column gap-3 cat-lists"> 
                            <?php
                                $catArr = [];
                                $catgLists =  'SELECT DISTINCT caregory from `test`';
                                $tablists = $conn->query($catgLists);
                                if ($tablists->num_rows > 0) {
                                // output data of each row
                                while($listItems = $tablists->fetch_assoc()) {
                                    //print_r($listItems);
                                    ?>
                                    <li class="list" id="<?php echo $listItems['caregory'] ?>" data-attr="<?php echo $listItems['caregory'] ?>">
                                        <a href="show-data.php?id=<?php echo $listItems['caregory']?>" class="fs-3 fw-light text-decoration-none list-link" data-toggle="tab">
                                           <?php 
                                           if($listItems['caregory']=='cat1'){
                                            ?>
                                            <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                                            <?php 
                                           }
                                           if($listItems['caregory']=='cat2'){
                                            ?>
                                            <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                                            <?php
                                           }
                                           if($listItems['caregory']=='cat3'){
                                            ?>
                                            <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                                            <?php
                                           }
                                           
                                           ?> 
                                            <?php echo $listItems['caregory']?>
                                        </a>
                                    </li>
                                <?php
                                }}
                            ?>
                        </ul>
                    </div>


                    <!-- Category 1 -->

                    <div class="col-md-5 d-flex justify-content-center align-items-center tab-content-block">
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="<?php echo $cat_id ?>">
                                <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                                    <?php
                                        $cat1_val =  "SELECT * FROM `test` WHERE caregory='$cat_id'";
                                        $cat1_res = $conn->query($cat1_val);
                                        //print_r($cat1_res);
                                        if ($cat1_res->num_rows > 0) {
                                            // output data of each row
                                            while($row = $cat1_res->fetch_assoc()) {
                                            // echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
                
                                        ?>
                                        <div class="carousel-cell">
                                            <div class="card shadow-sm p-4 mx-3 border-0 rounded-3">
                                                <div class="img-box">
                                                    <img class="card-img-top" src="<?php echo $row["filename"] ?>" alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text fs-1 fw-bold lh-1 text-capitalize text-center"><?php echo $row["first_name"]." ".$row["last_name"] ?></p>
                                                    <p class="card-text fs-3 fw-light lh-1 text-center"><?php echo $row["email"] ?></p>
                                                    <p class="card-text fs-3 fw-light lh-1 text-center"><?php echo $row["caregory"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        //print_r($result2);
                                    ?>
                                    
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-center">
                        <div class="image_tab">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mobile section -->

        <div class="mobile-view">
        <div class="container"><h1 class="text-white text-center">DelphinLogin in Action</h1>
                <p class="text-white text-center fs-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php
                                $catArr = [];
                                $catgLists =  'SELECT DISTINCT caregory from `test`';
                                $tablists = $conn->query($catgLists);
                                if ($tablists->num_rows > 0) {
                                    while($listItems = $tablists->fetch_assoc()) {
                                    ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $listItems['caregory'] ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $listItems['caregory'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $listItems['caregory'] ?>">
                <p class="list" id="<?php echo $listItems['caregory'] ?>" data-attr="<?php echo $listItems['caregory'] ?>">
                    <a href="show-data.php?id=<?php echo $listItems['caregory']?>" class="fs-3 fw-light text-decoration-none list-link" data-toggle="tab">
                        <?php 
                        if($listItems['caregory']=='cat1'){
                        ?>
                        <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                        <?php 
                        }
                        if($listItems['caregory']=='cat2'){
                        ?>
                        <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                        <?php
                        }
                        if($listItems['caregory']=='cat3'){
                        ?>
                        <img src="images/<?php echo $listItems['caregory']?>.svg" alt="">
                        <?php
                        }
                        
                        ?> 
                        <?php echo $listItems['caregory']?>
                    </a>
                    </p>
                </button>
                </h2>
                <div id="panelsStayOpen-collapse<?php echo $listItems['caregory'] ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $listItems['caregory'] ?>">
                    <div class="accordion-body">
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                    <?php
                        $cat1_val2 =  "SELECT * FROM `test` WHERE caregory='$cat_id'";
                        $cat1_res2 = $conn->query($cat1_val2);
                        //print_r($cat1_res);
                        if ($cat1_res2->num_rows > 0) {
                            // output data of each row
                            while($row2 = $cat1_res2->fetch_assoc()) {
                            // echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";

                        ?>
                        <div class="carousel-cell">
                            <div class="card shadow-sm p-4 mx-3 border-0 rounded-3">
                                <div class="img-box">
                                    <img class="card-img-top" src="<?php echo $row2["filename"] ?>" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <p class="card-text fs-1 fw-bold lh-1 text-capitalize text-center"><?php echo $row2["first_name"]." ".$row2["last_name"] ?></p>
                                    <p class="card-text fs-3 fw-light lh-1 text-center"><?php echo $row2["email"] ?></p>
                                    <p class="card-text fs-3 fw-light lh-1 text-center"><?php echo $row2["caregory"] ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        //print_r($result2);
                    ?>
                    </div>
                    
                    </div>
                </div>
            </div>
            <?php
                                }}
                                ?>
        </div>

        </div>

        
    </div>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
    <script>
     jQuery( document ).ready(function() {

        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const cat_id = urlParams.get('id')
       
            if(cat_id){
           let catStyle = document.getElementById(cat_id);
           catStyle.classList.add("active");
        }
        else{
             let catStyle = document.getElementById('cat1');
             catStyle.classList.add("active");
        }
        


        let img_val = jQuery('.carousel-cell.is-selected .img-box img').attr('src');
                jQuery('.image_tab img').attr('src',img_val);

        jQuery('.flickity-button').click(function() {
            if(jQuery('.carousel-cell').hasClass('is-selected')){
            let img_val = jQuery('.carousel-cell.is-selected .img-box img').attr('src');
                console.log(img_val);
                jQuery('.image_tab img').attr('src',img_val);
            }
        })
        jQuery('.accordion-header').click(function(){
            jQuery('.accordion-header').removeClass('active');
            jQuery(this).addClass('active')
            jQuery('.accordion-collapse').removeClass('show');
            jQuery(this).siblings().toggleClass('show')
        })
     })
 
    </script>

</body>
</html>
