<?php include('authentication.php'); 

//add student
if(isset($_POST['import_student']))
{

  $user_id = $_POST['user_id'];
    $stud_id = $_POST['studentId'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = "JR";
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = "3";
    $password = uniqid();
    
    $acctype = 1;
    $accstatus = 1;
    

    $query = "INSERT INTO `coordinator_student`(`coordinator`, `student_id`, `fname`, `mname`, `lname`, `suffix`, `mobile`, `email`, `password`, `gender`, `course`, `acc_type`, `acc_status`) VALUES ('$user_id','$stud_id','$fname','$mname','$lname','$suffix','$phone','$email','$password','$gender','$course','$acctype','$accstatus')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      // $name = htmlentities($_POST['lname']);
      // $email = htmlentities($_POST['email']);
      // $subject = htmlentities('Account Credentials');
      // $message =  nl2br("Hi! \r\n This is your USTP Web-based OJT Monitoring System Account! \r\n Email: $email \r\n Password: $password \r\n Please change the password immediately!");
  
      // $mail = new PHPMailer(true);
      // $mail->isSMTP();
      // $mail->Host = 'smtp.gmail.com';
      // $mail->SMTPAuth = true;
      // $mail->Username = 'ustponlineojt@gmail.com';
      // $mail->Password = 'tukuieeuncmktfiz';
      // $mail->Port = 465;
      // $mail->SMTPSecure = 'ssl';
      // $mail->isHTML(true);
      // $mail->setFrom($email, $name);
      // $mail->addAddress($_POST['email']);
      // $mail->Subject = ("$email ($subject)");
      // $mail->Body = $message;
      // $mail->send();
      $_SESSION['status'] = "Accout has been added";
      $_SESSION['status_code'] = "success";
        header('Location: index.php');
        mysqli_close($con);
        exit(0);
    }else{
    }
   
}

//delete attendance time-in
if(isset($_POST['delete_attendance']))
{
    $id = $_POST['delete_attendance'];

    $query = "DELETE FROM attendance WHERE attendance_id='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      $id = $_POST['id'];
      header("Location: attendance_update.php?id=$id");
        exit(0);
    }
    else
    {

    }
}

//delete attendance timeout
if(isset($_POST['delete_attendance_timeout']))
{
    $id = $_POST['delete_attendance'];

    $query = "DELETE FROM attendance WHERE attendance_id='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status_code'] = "success";
      $id = $_POST['id'];
      header("Location: attendance_update.php?id=$id");
        exit(0);
    }
    else
    {
      header('Location: attendance_manage.php');
        exit(0);
    }
}


//add rating
if(isset($_POST['journal_add_ratings']))
{
    $rate = $_POST['rate'];
    $id = $_POST['journalid'];

    $query = "UPDATE `journal` SET `grade`='$rate' WHERE `journal_id` = '$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "The rating has been successfully added!";
      $_SESSION['status_code'] = "success";
      header('Location: journal_manage.php');
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


if (isset($_POST['update_student'])) {
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $course = $_POST['course'];

  $acctype = 1;
  $accstatus = 1;


  // Update other data
  $query = "UPDATE `student` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`course`='$course',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
  $query_run = mysqli_query($con, $query);

  if (!$query_run) {
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header('Location: settings.php');
      exit(0);
  }

  // Update photo if a new photo is uploaded
  if ($_FILES["picture"]["tmp_name"]) {
    $picture_temp = $_FILES["picture"]["tmp_name"];

    // Retrieve existing photo, if any
    $retrieve_query = "SELECT `picture` FROM `student` WHERE `id`='$id'";
    $retrieve_result = mysqli_query($con, $retrieve_query);
    $retrieve_row = mysqli_fetch_assoc($retrieve_result);

    // Delete existing photo from MySQL
    if ($retrieve_row['picture']) {
        $delete_query = "UPDATE `student` SET `picture` = NULL WHERE `id`='$id'";
        $delete_result = mysqli_query($con, $delete_query);
    }

    // Upload new photo to MySQL
    $picture = mysqli_real_escape_string($con, file_get_contents($picture_temp));
    $update_photo_query = "UPDATE `student` SET `picture`='$picture' WHERE `id`='$id'";
    $update_photo_result = mysqli_query($con, $update_photo_query);

    if (!$update_photo_result) {
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: index.php');
        exit(0);
    }
}

$_SESSION['status'] = "Your Account has been updated!";
$_SESSION['status_code'] = "success";
header('Location: index.php');
exit(0);
}


if (isset($_POST['update_account'])) {
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $acc_type = 2;
  $acc_stats = 1;

  // Update other data
  $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`password`='$password',`acc_type`='$acc_type',`acc_status`='$acc_stats' WHERE `id`='$user_id'";
  $query_run = mysqli_query($con, $query);

  if (!$query_run) {
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header('Location: settings.php');
      exit(0);
  }

  // Update photo if a new photo is uploaded
  if ($_FILES["picture"]["tmp_name"]) {
      $picture_temp = $_FILES["picture"]["tmp_name"];

      // Retrieve existing photo, if any
      $retrieve_query = "SELECT `picture` FROM `accounts` WHERE `id`='$user_id'";
      $retrieve_result = mysqli_query($con, $retrieve_query);
      $retrieve_row = mysqli_fetch_assoc($retrieve_result);

      // Delete existing photo from MySQL
      if ($retrieve_row['picture']) {
          $delete_query = "UPDATE `accounts` SET `picture` = NULL WHERE `id`='$user_id'";
          $delete_result = mysqli_query($con, $delete_query);
      }

      // Upload new photo to MySQL
      $picture = mysqli_real_escape_string($con, file_get_contents($picture_temp));
      $update_photo_query = "UPDATE `accounts` SET `picture`='$picture' WHERE `id`='$user_id'";
      $update_photo_result = mysqli_query($con, $update_photo_query);

      if (!$update_photo_result) {
          $_SESSION['status'] = "Something went wrong!";
          $_SESSION['status_code'] = "error";
          header('Location: settings.php');
          exit(0);
      }
  }

  $_SESSION['status'] = "Your Account has been updated!";
  $_SESSION['status_code'] = "success";
  header('Location: settings.php');
  exit(0);
}


//add rating
if(isset($_POST['add_task']))
{
    $id = $_POST['id'];
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    $status = 'Pending';
    $grade =  '';

    $current_date = date("Y-m-d");


    $query = "INSERT INTO `task`(`student_id`, `task`, `status`, `grade`, `date_given`, `deadline`) VALUES ('$id','$task','$status','$grade','$current_date','$deadline')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Task Added Successfully";
      $_SESSION['status_code'] = "success";
      header('Location: manage_task.php');
        exit(0);
    }
    else
    {
      $_SESSION['status'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header('Location: manage_task.php');
        exit(0);
    }
}

