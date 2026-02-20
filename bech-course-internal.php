<?php include('inc/connection.php');

    //$dpID = getNGet('dept_id');

    $dept_pg_id = getNGet('dept_id');
    // $deptSql = "SELECT * FROM `tb_department` WHERE id=".$dept_pg_id;

    // $deptquery = $conn->query($deptSql); 

    // $deptResult = $deptquery->fetch_assoc();

    $deptSql = "SELECT * FROM `tb_course` WHERE id=".$dept_pg_id;
    $deptquery = $conn->query($deptSql); 
    $deptResult = $deptquery->fetch_assoc();
    
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />


<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exponent Institute - Department Course</title>

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

				<li> <a href="index.php">HOME</a> </li>
				<li> <a href="#">Department Courses</a> </li>

			</ul>

		</div>

	</div>

</div>



<!-- bread-crumb end here -->



<!-- coures start here -->

<div class="coures">

	<div class="container">

		<div class="row">

            <?php 
                // $coursSql="SELECT `curs`.id as cursid,`curs`.dept_id as curs_deptid, `dept`.id as `deptid`, `dept`.name as deptname, `dept`.description 
                //            FROM `tb_course` curs 
                //            LEFT JOIN `tb_department` as dept 
                //            ON `curs`.id = `dept`.id 
                //            WHERE `curs`.`dept_id`=".$dept_pg_id;

                $coursSql="SELECT * FROM `tb_department` WHERE id=".$dept_pg_id;

                $coursquery = $conn->query($coursSql); 
                $coursResult = $coursquery->fetch_assoc();

                //echo $coursSql;exit();
            ?>

			<div class="col-sm-12 col-xs-12 mainpage">

				<div class="col-sm-12 sort">

					<div class="col-md-12 col-sm-12">

						<h3><span id="ContentPlaceHolder1_lbldepnam"><?php echo $coursResult['name'];?> </span> </h3>

						<!--<h2 style=color:black;font-size:14px;> Introduction</h2>-->

                        <p style="color:black;font-size:14px;text-align:justify;">

                             <span id="ContentPlaceHolder1_Label1">

                                <?php echo html_entity_decode($coursResult['description']); ?>

                            </span>

                        </p>

					</div>

				</div>

				<div class="row">

					

                    <div class="col-sm-12 col-xs-12">

				<div class="box">

					

					<div class="caption">

						 

				<div class="table-responsive">

					<table class="table table-bordered table-striped"> 

						<thead> 

							<tr> 

								<th style="text-align:center"><b>SERIAL NO.</b></th> 

								<th style="text-align:center"><b>COURSE TITLE</b></th>

                                <th style="text-align:center"><b>COURSE DURATION</b></th>

                                <th style="text-align:center"><b>VIEW DETAIL</b></th>

							</tr>

						</thead>

						<tbody> 



                                <?php 

                                    
                                    // $curs_sql = "SELECT curs.*,curs.`id` as curs_id , dept.`id` FROM `tb_course` curs 

                                    // JOIN `tb_department` dept 

                                    // ON dept.`id` = curs.`dept_id`  

                                    // WHERE curs.`id` = $dept_pg_id AND curs.`status`= 1 

                                    // ORDER BY curs.`id` ASC";

                                    // if($curs_query = $conn->query($curs_sql)){

                                    // $curs_no = 1;

                                    // if($curs_query->num_rows > 0){

                                    //     while($curs_result = $curs_query -> fetch_assoc()){    

                                    $curs_sql = "SELECT curs.*,curs.`name`,curs.`id` as curs_id , dept.`id` FROM `tb_course` curs 

                                    JOIN `tb_department` dept 

                                    ON dept.`id` = curs.`dept_id`  

                                    WHERE curs.`dept_id` = $dept_pg_id AND curs.`status`= 1 

                                    ORDER BY curs.`id` ASC";

                                    if($curs_query = $conn->query($curs_sql)){

                                    $curs_no = 1;

                                    if($curs_query->num_rows > 0){

                                        while($curs_result = $curs_query -> fetch_assoc()){  

                                ?>

                            <tr>

                                <td scope="row" style="text-transform: uppercase;text-align:center"><?php echo $curs_no; ?></td>

                                <td scope="row" style="text-transform: uppercase;"> <?php echo $curs_result['name'];?></td>

                                <td scope="row" style="text-transform: uppercase;text-align:center"> <?php echo $curs_result['course_duration'];?></td>

                                <td scope="row" style="text-transform: uppercase; text-align:center">

                                    <a id="curs_view" href="ViewCourseDetails.php?dptvw_id=<?php echo $curs_result['curs_id']; ?>">View Courses</a></td>

                                 

                           </tr>

                           <?php

                                $curs_no++; 

                                } 



                                    }else {echo "<h4> Sorry, No Department Found!</h4>";} 

                                }

                            ?>

                                            

                        <!--<tr>

                            <td scope="row" style="text-transform: uppercase;text-align:center">2</td>

                            <td scope="row" style="text-transform: uppercase;">DIPLOMA IN MARKETING MANAGEMENT</td>

                            <td scope="row" style="text-transform: uppercase;text-align:center">1 YEAR</td>

                            <td scope="row" style="text-transform: uppercase; text-align:center">

                                <a id="ContentPlaceHolder1_Repeater1_LinkButton1_1" href="ViewCourseDetails.php">View Courses</a></td>

                             

                           </tr>

                        

                        <tr>

                            <td scope="row" style="text-transform: uppercase;text-align:center">3</td>

                            <td scope="row" style="text-transform: uppercase;">DIPLOMA IN ADVERTISING MANAGEMENT</td>

                            <td scope="row" style="text-transform: uppercase;text-align:center">1 YEAR</td>

                            <td scope="row" style="text-transform: uppercase; text-align:center">

                                <a id="ContentPlaceHolder1_Repeater1_LinkButton1_2" href="ViewCourseDetails.php">View Courses</a></td>

                             

                           </tr>

                        

                        <tr>

                            <td scope="row" style="text-transform: uppercase;text-align:center">4</td>

                            <td scope="row" style="text-transform: uppercase;">DIPLOMA IN INSURANCE AND RISK MANAGEMENT</td>

                            <td scope="row" style="text-transform: uppercase;text-align:center">1 YEAR</td>

                            <td scope="row" style="text-transform: uppercase; text-align:center">

                                <a id="ContentPlaceHolder1_Repeater1_LinkButton1_3" href="ViewCourseDetails.php">View Courses</a></td>

                             

                           </tr>

                        

                        <tr>

                            <td scope="row" style="text-transform: uppercase;text-align:center">5</td>

                            <td scope="row" style="text-transform: uppercase;">DIPLOMA IN MATERIAL MANAGEMENT</td>

                            <td scope="row" style="text-transform: uppercase;text-align:center">1 YEAR</td>

                            <td scope="row" style="text-transform: uppercase; text-align:center">

                                <a id="ContentPlaceHolder1_Repeater1_LinkButton1_4" href="ViewCourseDetails.php">View Courses</a></td>

                             

                           </tr>-->

                                            

                                            

                                            

						</tbody>			 

					</table>

			   </div>

			   

			</div> 

				</div> 

			</div>

                   

					

				</div>

			</div>

		</div>

	</div>

</div>

<!-- coures end here --> </br></br>

 <?php include('inc/footer.php'); ?>







<script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>

<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

<script src="js/internal.js" type="text/javascript"></script>







</body>



</html>