<?php include('inc/connection.php');?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />





<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exponenet Institute - Course Detail</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link href="icofont/css/icofont.css" rel="stylesheet" type="text/css" />

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

    <link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />

    <link href="css/style.css" rel="stylesheet" type="text/css" />



</head>



<body>

    <?php include('inc/header.php'); ?>

    <!-- bread-crumb start here -->

    <div class="bread-crumb">

        <img src="images/internal-dept.jpg" class="img-responsive" alt="banner-top" title="banner-top">

        <div class="container">

            <div class="matter">

                <h2>all Courses</h2>

                <ul class="list-inline">

                    <li>

                        <a href="">HOME</a>

                    </li>

                    <li>

                        <a href="">Department Courses</a>

                    </li>

                </ul>

            </div>

        </div>

    </div>



    <!-- bread-crumb end here -->



    <!-- coures start here -->

    <div class="coures">

        <div class="container">

            <div class="row">

                <div class="col-sm-1 col-xs-12 hidden-xs">





                </div>

                <?php 

                    $dept_pg_id = getNGet('dptvw_id');

                    $curs_sql = "SELECT curs.*, dept.`id` FROM `tb_course` curs 

                                 JOIN `tb_department` dept 

                                 ON dept.`id` = curs.`dept_id`  

                                 WHERE curs.`id` = $dept_pg_id AND curs.`status`= 1 

                                 ORDER BY curs.`id` ASC;";

                    if($curs_query = $conn->query($curs_sql)){

                        if($curs_query->num_rows > 0){

                            $curs_result = $curs_query -> fetch_assoc();    

                    

                ?>

                <div class="col-sm-10 col-xs-12 details">

                    <h4>

                        <span id="ContentPlaceHolder1_Label1"><?php echo $curs_result['name']; ?> </span> </h4>

                    <br>

                    <?php 

                        $curs_img = $curs_result['image'];

                        if($curs_img !='' || $curs_img !='null'){



                        

                    ?>

                    <div class="image">
                        <img id="ContentPlaceHolder1_Image1" class="img-responsive" src="<?php echo $curs_img;?>">
                    </div>

                <?php }else{?>

                    <div class="image">
                        <img id="ContentPlaceHolder1_Image1" class="img-responsive" src="images/internal-dept.jpg">
                    </div>

                <?php }?>

                    <br>

                    <center>

                        <h4>About Course</h4>

                    </center>



                    <div class="tab-content">

                        <div class="tab-pane active" id="tab-description">

                            <p style="align-content:flex-start"> <span id="ContentPlaceHolder1_Label2">
                                
                                <?php echo html_entity_decode($curs_result['description']);  ?>
                            </p>

                            <h3> <?php echo $curs_result['name'];?> </h3>

                            <table class="table" cellpadding="20" cellspacing="10">

                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    
                                    <tr>
                                        <th scope="row">Course Code</th>
                                        <td><span id=""><?php echo $curs_result['course_code'];?></span></td>

                                    </tr>

                                    <tr>

                                        <th scope="row">Duration</th>

                                        <td><span id="ContentPlaceHolder1_Label4">

                                            <?php echo $curs_result['course_duration'];?></span></td>

                                    </tr>

                                    <tr>

                                        <th scope="row">Eligibility</th>

                                        <td><span id="ContentPlaceHolder1_Label6">

                                            <?php echo $curs_result['course_eligibility'];?> </span></td>

                                    </tr>

                                    <!--tr>

                                        <th scope="row">Career Oppurtunities</th>

                                        <td><span id="ContentPlaceHolder1_Label7"></span></td>

                                    </tr-->

                                    <tr>

                                        <th scope="row">Course Type</th>

                                        <td><span id="ContentPlaceHolder1_Label8">

                                            <?php echo $curs_result['course_type'];?> 

                                        </span></td>

                                    </tr>

                                </tbody>

                            </table>

                            



                        </div>







                    </div>







                </div>

                <?php

                                

                    }

                    else {echo "<h4> Sorry, No Department Found!</h4>";} 

                    }

                ?>

            </div>

        </div>

    </div>

    <!-- coures end here -->

    <!-- coures end here -->



    <?php include('inc/footer.php'); ?>







    <script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>

    <script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

    <script src="js/internal.js" type="text/javascript"></script>







</body>



</html>