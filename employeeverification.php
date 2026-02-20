<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EXPONENT INSTITUTE - Employee Verification</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="icofont/css/icofont.css" rel="stylesheet" type="text/css" />
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <style>
        small {
            font-size: .6em;
        }
    </style>
</head>

<body>
    <?php include('inc/header.php'); ?>
    <div class="bread-crumb">
        <img src="images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="matter">
                        <h2>Employee Verification</h2>
                        <ul class="list-inline">
                            <li>
                                <a href="index.php">HOME</a>
                            </li>
                            <li>
                                <a href="#">Employee Verification</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contactus" style="margin: 20px 0;padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9  col-sm-9 col-xs-12">
                    <form action="" method="post" id="empl_check">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="emp_refe_no">Enter Refence No. </label>
                                <input name="empl_refno" type="text" id="emp_refe_no" required="" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="empldob">D.O.B</label>
                                <input name="setstu_dob" type="date" id="empldob" placeholder="YYYY-MM-DD" required="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" name="showstud_result" value="Verify" id="showResult" class="center-block btn btn-lg btn-primary" />
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="image">
                        <img style="height: auto;" src="images/teacher-study-book.png" class="img-responsive" alt="img" title="img">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 text-center">
                <div id="loader" class="" style="width:80px; margin:auto; margin-top:2%; display:none">
                    <img src="images/loading.gif" style="width:100%">
                </div>
            </div>
            <div class="row" style="margin-top:2%" id="record">

            </div><!-- // End Result Box -->
        </div>
    </div>
    <?php include('inc/footer.php'); ?>
    <script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/internal.js" type="text/javascript"></script>
    <script>
        /* Employee card*/
        $(document).ready(function() {
            $('#showResult').click(function() {
                var s = $('#emp_refe_no').val();
                var d = $('#empldob').val();
                $('#record').empty();
                //alert(d);
                $.ajax({
                    url: "ajax_emp_verification.php",
                    type: "post",
                    data: {
                        s: s,
                        d: d
                    },
                    beforeSend: function() {
                        $("#loader").show();
                    },
                    success: function(r) {
                        setTimeout(function() {
                            //alert(r);
                            $('#record').html(r);
                            $("#loader").hide();
                        }, 500);
                    }
                });
                return false;
            });
            /*end*/
        });
    </script>
    <script>
        function printDiv() {
            var divContents = document.getElementById("record").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<head><link href="bootstrap/css/bootstrap.css" rel="stylesheet"></head>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</body>

</html>