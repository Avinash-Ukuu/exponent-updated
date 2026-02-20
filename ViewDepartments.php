<?php include('inc/connection.php');?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />





<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exponent Institute - All Departments</title>

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

	<img src="images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">

	<div class="container">

		<div class="matter">

			<h2>all departments</h2>

			<ul class="list-inline">

				<li>

					<a href="index.php">HOME</a>

				</li>

				<li>

					<a href="#">all departments</a>

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

			

			<div class="col-sm-12 col-xs-12 mainpage">

				<div class="col-sm-12 sort">

					<div class="col-md-6 col-sm-5">

						<h3>ALL DEPARTMENTS</h3>

						<p>TOTAL 150+ COURSES</p>

					</div>

				</div>

				<div class="row">

				<?php 

                    $dpart_sql = "SELECT * FROM `tb_department`  WHERE `status` = 1 ORDER BY `id` ASC;";

                    $dpart_query = $conn->query($dpart_sql);

                    if($dpart_query->num_rows > 0){

                      while($dpart_result = $dpart_query -> fetch_assoc()){

              	?>	

                <div class="product-layout  product-grid col-lg-4 col-md-3 col-sm-6 col-xs-12">



						<div class="product-thumb">

							<div class="image">

									<img src='uploads/departments/<?php echo $dpart_result['image'];?>' class="img-responsive" alt="img" title="img" />

							</div>

							<div class="caption">

									<h4>  

										<a id="" href="department-internal.php?dept_id=<?php echo $dpart_result['id'];?>">

											<?php echo $dpart_result['name'];?>

										</a>

									</h4>


							</div>

						</div>

					</div>

				<?php 

					} 

						}else {echo "<h4> Sorry, No Department Found!</h4>";} 

				?>

                </div>

			</div>

		</div>

	</div>

</div>

<!-- coures end here -->



<?php include('inc/footer.php'); ?>







<script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>

<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

<script src="js/internal.js" type="text/javascript"></script>







</body>



</html>