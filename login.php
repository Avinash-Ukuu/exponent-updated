<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GALAXY TECHNO India - Home</title>
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
                    <h2>register now</h2>
                    <ul class="list-inline">
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="login_register.php">register now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- bread-crumb end here -->

        <!-- login start here -->
        <div class="login">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 box padd0">
                    <div class="col-md-6 col-sm-6 col-xs-12 bor">
                        <h5>sign in</h5>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Email*</label>
                                <input name="ctl00$ContentPlaceHolder1$TextBox1" type="text" id="ContentPlaceHolder1_TextBox1" placeholder="Johndoe@example.com" class="form-control" />
                                <!--<input type="text" name="email" value="" placeholder="Johndoe@example.com" id="input-email" class="form-control" />-->
                            </div>
                            <div class="form-group">
                                <label>password*</label>
                                <input name="ctl00$ContentPlaceHolder1$TextBox2" type="password" id="ContentPlaceHolder1_TextBox2" placeholder="***********" class="form-control" />
                                <!--<input type="text" name="password" value="" placeholder="********" id="input-password" class="form-control" />-->
                            </div>
                            <div class="links">
                                <input type="checkbox" name="credit" class="checkclass checkbox-inline" />Remember me
                                <a href="#" class="pull-right">Forgot Password?</a>
                            </div>
                            <input type="submit" name="ctl00$ContentPlaceHolder1$Button1" value="Login Here" id="ContentPlaceHolder1_Button1" class="btn btn-primary btn-block" />

                            <!--<button type="submit" class="btn btn-primary btn-block" >Login Now</button>-->
                        </form>
                        <div class="or">
                            <span>OR</span>
                            <hr/>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank" class="fb"><i class="fa fa-facebook"></i> Login Via Facebook</a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank" class="tw"><i class="fa fa-twitter"></i> Login Via Twitter</a>
                            </li>
                        </ul>
                        <div class="donot">Don't have an account? <a href="#">Create a New Account</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h5>sign UP</h5>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NAME*</label>
                                <input type="text" name="name" value="" placeholder="Example : John Doe" id="input-name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="text" name="email" value="" placeholder="Johndoe@example.com" id="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>password*</label>
                                <input type="text" name="password" value="" placeholder="********" id="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>comfirm password*</label>
                                <input type="text" name="confirmpassword" value="" placeholder="********" id="input-confirmpassword" class="form-control" />
                            </div>
                            <div class="links">
                                <input type="checkbox" name="credit" class="checkclass checkbox-inline" /> By register, I read & accept the terms.
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Register now</button>
                        </form>
                        <div class="donot">
                            Have an account?
                            <a href="#">Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login end here -->

        <!-- newsletter start here -->
        <div id="newsletter">
            <div class="container">
                <div class="row">
                    <div id="subscribe">
                        <form class="form-horizontal" name="subscribe">
                            <div class="col-sm-12">
                                <p class="news">SUBSCribe to our <span>newsletter</span></p>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="input-group">
                                    <input value="" name="subscribe_email" id="subscribe_email" placeholder="Type your e-mail..." type="text">
                                    <button class="btn btn-news" type="submit" value="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter end here -->
        <?php include('inc/footer.php'); ?>



<script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/internal.js" type="text/javascript"></script>



</body>

</html>