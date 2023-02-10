<?php include('authentication.php'); 


    if (isset($_POST['add_file'])) {
 
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        if (isset($_FILES['pdf_file']['name']))
        {
          $file_name = $_FILES['pdf_file']['name'];
          $file_tmp = $_FILES['pdf_file']['tmp_name'];
 
          move_uploaded_file($file_tmp,"./pdf/".$file_name);
 
          $insertquery =
          "INSERT INTO `student_files`(`id`, `filetitle`, `filename`) VALUES ('$user_id','$name','$file_name')";
          $iquery = mysqli_query($con, $insertquery);

          $_SESSION['status_code'] = "success";
          header('Location: add_file.php');
          exit(0);
        }
        else
        {
          $_SESSION['status_code'] = "error";
          header('Location: add_file.php');
          exit(0);
        }
    }


//change task status
if(isset($_POST['done_btn']))
{
    $id = $_POST['done_btn'];
    $status = "Done";
   
    $query = "UPDATE `task` SET `status`='$status' WHERE `task_id` = '$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      $_SESSION['status_code'] = "success";
        header('Location: task_manage.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: task_manage.php');
      exit(0);
    }
   
}

//add_comment
if(isset($_POST['add_comment']))
{
    $id = $_POST['id'];
    $comment = $_POST['comment'];
   
    $query = "INSERT INTO `comment`(`student_id`, `message`) VALUES ('$id','$comment')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      $_SESSION['status_code'] = "success";
        header('Location: supervisor.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: supervisor.php');
      exit(0);
    }
   
}

if(isset($_POST['add_journal']))
{
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $currentdate = $date->format('Y-m-d H:i:s');
    $grade = 0;

    $pic1 = addslashes(file_get_contents($_FILES["pic1"]['tmp_name']));
    $pic2 = addslashes(file_get_contents($_FILES["pic2"]['tmp_name']));

    $query = "INSERT INTO `journal`(`id`, `title`, `message`, `pic1`, `pic2`, `grade`, `date`) VALUES ('$user_id','$title','$message','$pic1','$pic2','$grade','$currentdate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['status_code'] = "error";
      header('Location: index.php');
        exit(0);
    }
}


if(isset($_POST['edit_journal']))
{
    $journal_id = $_POST['journal_id'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $pic1 = addslashes(file_get_contents($_FILES["pic1"]['tmp_name']));
    $pic2 = addslashes(file_get_contents($_FILES["pic2"]['tmp_name']));

    $query = "UPDATE `journal` SET `title`='$title',`message`='$message',`pic1`='$pic1',`pic2`='$pic2' WHERE `journal_id`='$journal_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      header('Location: journal_manage.php');
        exit(0);
    }
    else
    {
        $_SESSION['status_code'] = "error";
      header('Location: journal_manage.php');
        exit(0);
    }
}


if(isset($_POST['timein']))
{
  $date = new DateTime();
  $date->setTimezone(new DateTimeZone('UTC'));
  $currentdate = $date->format('Y-m-d H:i:s');

    $name = "TIME-IN";
    $user_id2 = $_POST['user_id'];


    $query = "INSERT INTO `attendance`(`id`, `title`, `date`) VALUES ('$user_id2','$name','$currentdate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      header('Location: attendance_manage.php');
        exit(0);
    }
    else
    {
        $_SESSION['status_code'] = "error";
      header('Location: attendance_manage.php');
        exit(0);
    }
}


if(isset($_POST['timeout']))
{
  $date = new DateTime();
  $date->setTimezone(new DateTimeZone('UTC'));
  $currentdate = $date->format('Y-m-d H:i:s');

    $name = "TIME-OUT";
    $user_id2 = $_POST['user_id'];


    $query = "INSERT INTO `attendance`(`id`, `title`, `date`) VALUES ('$user_id2','$name','$currentdate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      header('Location: attendance_manage.php');
        exit(0);
    }
    else
    {
        $_SESSION['status_code'] = "error";
      header('Location: attendance_manage.php');
        exit(0);
    }
}

//logout
if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status_code'] = "success";
    header("Location: ../index.php");
    exit(0);
}


if(isset($_POST['update_student']))
{
    $id = $_POST['id'];
    $picture = $_FILES['picture'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];

    $acctype = 1;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "UPDATE `student` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`password`='$password',`picture`='$picture',`course`='$course',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      $_SESSION['status_code'] = "success";
        header('Location: student_manage.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: student_manage.php');
      exit(0);
    }
   
}


if(isset($_POST['update_account']))
{

    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $mobile= $_POST['mobile'];
    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    $acc_type = 1;
    $acc_stats = 1;

    $query = "UPDATE `student` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`password`='$password',`picture`='$picture',`acc_type`='$acc_type',`acc_status`='$acc_stats' WHERE `id` ='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status_code'] = "success";
        header('Location: settings.php');
        exit(0);
    }
    else
    {
        $_SESSION['status_code'] = "error";
        header('Location: settings.php');
        exit(0);
    }
}
