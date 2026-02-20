<?php include('inc/connection.php'); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />





<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EXPONENT INSTITUTE - Student Result</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link href="icofont/css/icofont.css" rel="stylesheet" type="text/css" />

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

    <link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />

    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <style>

        td {

            border-top: unset !important;

        }



        th {

            vertical-align: middle !important;

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

                        <h2>Student Result</h2>

                        <ul class="list-inline">

                            <li>

                                <a href="index.php">HOME</a>

                            </li>

                            <li>

                                <a href="#">Student Result</a>

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

                <?php

                /*$stusql_srch = "SELECT admt.*, stu.`id`,stu.`name`,curs.`id`,curs.`name`

                    FROM `tb_admit_card` admt

                    JOIN tb_student stu ON stu.`id` = admt.`st_id`

                    JOIN tb_course curs ON curs.`id` = admt.`course_id`

                    WHERE stu.status = 1"; */

                ?>

                <div class="col-sm-9 col-xs-12">

                    <form action="" method="post" id="verify_stud">

                        <div class="row">

                            <div class="form-group col-md-6">

                                <label for="stud_name">Select Course</label>

                                <select class="form-control" name="setcours_name" id="stud_name">

                                    <option value=""> -- Select Option -- </option>

                                    <?php

                                    $stusql_srch = "SELECT * FROM `tb_course` WHERE status = 1";

                                    $stusql_query = $conn->query($stusql_srch);

                                    if ($stusql_query->num_rows > 0) {

                                        while ($stusql_result = $stusql_query->fetch_assoc()) {



                                    ?>

                                            <option value="<?php echo $stusql_result['id']; ?>">

                                                <?php echo $stusql_result['name']; ?> </option>

                                    <?php

                                        }

                                    } else {

                                        echo "Sorry, no record found";

                                    }

                                    ?>

                                </select>

                            </div>



                            <div class="form-group col-md-6">

                                <label for="studdob">D.O.B</label>

                                <input name="setstu_dob" type="date" id="studdob" placeholder="YYYY-MM-DD" required="" class="form-control" />

                            </div>

                            <div class="form-group col-md-12">

                                <label for="studname">Roll number </label>

                                <input name="stu_exam_rollno" type="text" id="studrollno" required="" class="form-control" />

                            </div>

                        </div>

                        <div class="form-group">

                            <input type="submit" name="showstud_info" value="Verify" id="showResult" class="center-block btn btn-lg btn-primary" />

                        </div>

                    </form>

                </div>

                <div class="col-sm-3 col-xs-12">

                    <div class="image">

                        <img style="height: auto;" src="images/about-2.jpg" class="img-responsive" alt="img" title="img">



                    </div>

                </div>

            </div>

            <div class="container ">

                <div class="col-sm-12 col-xs-12 text-center">

                    <div id="loader" class="" style="width:80px; margin:auto; display:none">

                        <img src="images/loading.gif" style="width:100%">

                    </div>

                </div>

            </div>

            <div class="showresult_box" id="record" style="margin-top:8px">



                <!-- <div class="row">

                    <div class="col-md-12">

                        <div class="stud_record_wrapper">

                            <table>

                                <thead>

                                    <th> Student Name</th>

                                    <th> Course</th>

                                    <th> Session</th>

                                    <th> Roll no.</th>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td> Ankit Kumar</td>

                                        <td> Senior Secondry Exam</td>

                                        <td> 2020-2021</td>

                                        <td> 123456</td>



                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div> -->

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

        /* Admit Card Status Enable/Disabled */

        $(document).ready(function() {



            $('#showResult').click(function() {



                var s = $('#stud_name').val();

                var d = $('#studdob').val();

                var n = $('#studrollno').val();

                $('#record').empty();

                /*  alert(s);

                 alert(d);

                 alert(n); */

                $.ajax({

                    url: "ajax_stud_result.php",

                    type: "post",

                    data: {

                        s: s,

                        d: d,

                        n: n



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





                    },







                });



                return false;

            });

            /* End Status Admit Card*/

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