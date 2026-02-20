<?php require_once('configDB.php');
    $logged_user_id = 0;
    
    if(getSession('admin_id') > 0)
    {
        $logged_user_id  = (int)(getSession('admin_id'));
    }
    
    /* logout session */
    if(getPost('action') == "logout_account")
    {
        removeSession("admin_id");
        removeSession("admin_username");
        session_destroy();

        $msg = "Logged out successfully.";
        $json_array = array('status'=>'success','message'=>$msg);
        echo json_encode($json_array);
        exit();
    }    

    if(getPost('action')== "user_loginform"){
        $validator = new validations();
        $validator->add_rule("user_name","Username","required|max_length[15]");
        $validator->add_rule("password","Password","required|max_length[40]");
        $error = $validator->run();

    if(trim($error) == '')
    {
        $uname = getPost('user_name');
        $pword = getPost('password');

            $query = "SELECT * FROM `tb_user` WHERE `username`='$uname' AND `password`='$pword' AND status = 1;";
            $query_result = mysqli_query($conn, $query);
            
            if($query_result)
            {
                if(mysqli_num_rows($query_result)>0)
                {
                    $query_data = mysqli_fetch_assoc($query_result);
                    saveSession('admin_id',$query_data['id']);
                    saveSession('admin_username',$uname);

                    $msg = "Logged In Successfully";
                    $json_array = array("status"=>"success","message"=>$msg);
                    echo json_encode($json_array);
                    exit();


                }else{
                    $msg = "Invalid ID or Password";
                    $json_array = array('status'=>'failed','message'=>$msg);
                    echo json_encode($json_array);
                    exit();
                }
            }
            else
            {
                $msg = "Some error occurred";
                $json_array = array('status'=>'failed','message'=>$msg);
                echo json_encode($json_array);
                exit();
            }
        }
        else
        {
            $msg = "$error";
            $json_array = array('status'=>'failed','message'=>$msg);
            echo json_encode($json_array);
            exit();
        }
    }

    
/* Add Department  */
if(getPost('action')== "add_department")
{ 
    $validator = new validations();
    $validator->add_rule("depart_name","Department Title","required|max_length[250]");
    $error = $validator->run();
    
      if(trim($error) == ''){
        $depart_title = getPost('depart_name');
        $depart_img = getPost('depart_img');
        //$rank = getNPost('rank');
        $depart_active = getNPost('active');
        $created_date = date("Y-m-d");

      $depart_img_upload = $_FILES['depart_img']['name'];
    
        if(!empty($_FILES['depart_img']['name']))
        {
        $slide_img = $_FILES["depart_img"]["name"]; //stores the original filename from the client
        $tmp =      $_FILES["depart_img"]["tmp_name"]; //stores the name of the designated temporary file
        $errorimg = $_FILES["depart_img"]["error"]; //stores any error code resulting from the transfer

        $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG','PNG'); // valid extensions
        $path = '../uploads/departments/'; // upload directory

        // get uploaded file's extension
        $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));

        // can upload same image size limit using function 
        $file_size = $_FILES['depart_img']['size'];

        // can upload same image using rand function
        $final_image = rand(1000,1000000).$slide_img;
        /* edit profile */

              // check's valid format
              if(in_array($ext, $valid_extensions)) { 
                $path = $path.strtolower($final_image); 
                $uploadreport1 = move_uploaded_file($tmp,$path);
                    
            if($uploadreport1) {
                
            $add_depart_sql = "INSERT INTO `tb_department` (`name`,`image`, `created_date`) VALUES ('$depart_title', '$final_image','$created_date')";
                        
            $add_depart_query = $conn->query($add_depart_sql);

              if($add_depart_query)
                    {
                        $msg = "Department Form Update Successfully";
                        $json_array = array("status"=>"success", "message"=>$msg);
                        echo json_encode($json_array);
                        exit();
                    }
                    else
                    {
                        $msg = "Failed to Update, try again later";
                        $json_array = array("status"=>"failed", "message"=>$msg);
                        echo json_encode($json_array);
                        exit();
                    }

                }// end uploadreport
                  else{
                      $msg = 'Failed to upload image';
                      $json_array = array("status"=>"failed", "message"=> $msg);
                      echo json_encode($json_array);
                      exit();
                    }// end else uploadreport

                }// end check's valid format
                else{
                    $msg = 'Invalid file path';
                    $json_array = array("status"=>"failed", "message"=> $msg);
                    echo json_encode($json_array);
                    exit();
                    }

                } // not empty
                    else if(empty($_FILES['depart_img']['name'])){
        
                    $add_depart_sql = "INSERT INTO `tb_department` (`name`, `created_date`) VALUES ('$depart_title','$created_date')";
                    
                    $add_depart_query = $conn->query($add_depart_sql);
                    
                    if($add_depart_query)
                      {
                          $msg = "Department Form Update Successfully";
                          $json_array = array("status"=>"success", "message"=>$msg);
                          echo json_encode($json_array);
                          exit();
                      }
                      else
                      {
                          $msg = "Failed to Update, try again later";
                          $json_array = array("status"=>"failed", "message"=>$msg);
                          echo json_encode($json_array);
                          exit();
                      }
                    }// if empty upload file end
                }// trim end
          else
          {
            $msg = $error;
            $json_array = array("status"=>"failed", "message"=>$msg);
            echo json_encode($json_array);
            exit();
          } // trim else end 
  } //action - "End Add Department Image"

  /* Edit Department  */
    if(getPost('action')== "edit_department")
    { 
        $validator = new validations();
        $validator->add_rule("depart_name","Department Title","required|max_length[250]");
        $error = $validator->run();
        
        
        if(trim($error) == ''){
            $depart_title = getPost('depart_name');
            $depart_img = getPost('depart_img');
            //$rank = getNPost('rank');
            $depart_active = getNPost('set_status');
            $created_date = getPost('depart_created_on');
            $depart_img_upload = $_FILES['depart_img']['name'];
            $depart_edID = getNPost('id');
            
                    
            if(!empty($_FILES['depart_img']['name']))
            {
            $slide_img = $_FILES["depart_img"]["name"]; //stores the original filename from the client
            $tmp =      $_FILES["depart_img"]["tmp_name"]; //stores the name of the designated temporary file
            $errorimg = $_FILES["depart_img"]["error"]; //stores any error code resulting from the transfer

            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG','PNG'); // valid extensions
            $path = '../uploads/departments/'; // upload directory

            // get uploaded file's extension
            $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));

            // can upload same image size limit using function 
            $file_size = $_FILES['depart_img']['size'];

            // can upload same image using rand function
            $final_image = rand(1000,1000000).$slide_img;
            /* edit profile */

                // check's valid format
                if(in_array($ext, $valid_extensions)) { 
                    $path = $path.strtolower($final_image); 
                    $uploadreport1 = move_uploaded_file($tmp,$path);
                        
                if($uploadreport1) {
                    
                $edit_depart_sql = "UPDATE  `tb_department` SET  `name`='$depart_title', `image`='$final_image', `created_date`='$created_date', `status`=$depart_active WHERE `id`=$depart_edID";
                            
                $edit_depart_query = $conn->query($edit_depart_sql);

                $json_array = array("status"=>"failed", "message"=>$edit_depart_sql);
                echo json_encode($json_array);
                exit();
                
                if($edit_depart_query)
                        {
                            $msg = "Department Form Update Successfully";
                            $json_array = array("status"=>"success", "message"=>$msg);
                            echo json_encode($json_array);
                            exit();
                        }
                        else
                        {
                            $msg = "Failed to Update, try again later";
                            $json_array = array("status"=>"failed", "message"=>$msg);
                            echo json_encode($json_array);
                            exit();
                        }

                    }// end uploadreport
                    else{
                        $msg = 'Failed to upload image';
                        $json_array = array("status"=>"failed", "message"=> $msg);
                        echo json_encode($json_array);
                        exit();
                        }// end else uploadreport

                    }// end check's valid format
                    else{
                        $msg = 'Invalid file path';
                        $json_array = array("status"=>"failed", "message"=> $msg);
                        echo json_encode($json_array);
                        exit();
                        }

                    } // not empty
                        else if(empty($_FILES['depart_img']['name'])){
            
                        $edit_depart_sql = "UPDATE `tb_department` SET `name`='$depart_title', `created_date`='$created_date', `status`=$depart_active WHERE `id`=$depart_edID";
                        
                        $edit_depart_query = $conn->query($edit_depart_sql);
                        
                        if($edit_depart_query)
                        {
                            $msg = "Department Form Update Successfully";
                            $json_array = array("status"=>"success", "message"=>$msg);
                            echo json_encode($json_array);
                            exit();
                        }
                        else
                        {
                            $msg = "Failed to Update, try again later";
                            $json_array = array("status"=>"failed", "message"=>$msg);
                            echo json_encode($json_array);
                            exit();
                        }
                        }// if empty upload file end
                    }// trim end
            else
            {
                $msg = $error;
                $json_array = array("status"=>"failed", "message"=>$msg);
                echo json_encode($json_array);
                exit();
            } // trim else end 
    } //action - "End Edit Department Image"


    // Department Disable Enable //
    
    if(getPost('action') == "status_updt"){
        
        $stusid = getNPost('id');
        
        //$stus_val = getNPost('');
        $stus_sql = "SELECT `status` FROM `tb_department` WHERE id= $stusid "; 

        $del = "UPDATE `tb_department` SET  `status`=  WHERE `tb_department`.`id` =".$stusid;
        $query_result = $conn->query($del);
        
            
          if($query_result){
            $msg = "<div class='alert alert-success'> Deleted Successfully </div>";
            $json_array = array("status"=>"success", "message"=> $msg);
            echo json_encode($json_array);
            exit();
          }else{
            $msg = "<div class='alert alert-success'> Not Delete </div>";
            $json_array = array("status"=>"failed", "message"=> $msg);
            echo json_encode($json_array);
            exit();
          }
      }

?>