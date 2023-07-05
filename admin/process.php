<?php include('authentication.php'); 

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer/src/Exception.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';


if(isset($_POST['add_coordinator']))
{
  if(isset($_POST['mname'])) {
    $mname = $_POST['mname'];
  } else{
    $mname = NULL;
  }
    $picture = $_FILES['picture'];
    $course = $_POST['course'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $password = uniqid();
    $gender = $_POST['gender'];
    $birthday = $_POST['dob'];
    $phone = $_POST['phone'];

    
    $acctype = 2;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "INSERT INTO `accounts`(`fname`, `mname`, `lname`, `suffix`, `mobile`, `email`, `password`,`gender`,`dob`, `picture`,`course`, `acc_type`, `acc_status`) VALUES ('$fname','$mname','$lname','$suffix','$phone','$email','$password','$gender','$birthday','$picture','$course','$acctype','$accstatus')";
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
      $_SESSION['status'] = "Account has been added";
      $_SESSION['status_code'] = "success";
        header('Location: coordinator_manage.php');
        exit(0);
    }else{
      $_SESSION['status'] = "The account addition was unsuccessful";
      $_SESSION['status_code'] = "error";
      header('Location: coordinator_manage.php');
      exit(0);
    }
   
}


if(isset($_POST['add_supervisor']))
{
  if(isset($_POST['mname'])) {
    $mname = $_POST['mname'];
  } else{
    $mname = NULL;
  }

    $picture = $_FILES['picture'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = uniqid();
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_address = $_POST['company_address'];
    
    $acctype = 3;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "INSERT INTO `accounts`(`fname`, `mname`, `lname`, `mobile`, `email`, `password`,`gender`, `picture`,`company_name`,`company_email`,`company_address`, `acc_type`, `acc_status`) VALUES ('$fname','$mname','$lname','$phone','$email','$password','$gender','$picture','$company_name','$company_email','$company_address','$acctype','$accstatus')";
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
      $_SESSION['status'] = "Account has been added";
      $_SESSION['status_code'] = "success";
        header('Location: super_manage.php');
        exit(0);
    }else{
      $_SESSION['status'] = "The account addition was unsuccessful";
      $_SESSION['status_code'] = "error";
      header('Location: super_manage.php');
      exit(0);
    }
   
}


//update ang coordinator
if(isset($_POST['update_coordinator']))
{
    $id = $_POST['id'];
    $picture = $_FILES['picture'];
    $course = $_POST['course'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $acctype = 2;
    $accstatus = 1;
    

    $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`course`='$course',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);

    if (!$query_run) {
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header('Location: coordinator_manage.php');
      exit(0);
  }

  // Update photo if a new photo is uploaded
  if ($_FILES["picture"]["tmp_name"]) {
      $picture_temp = $_FILES["picture"]["tmp_name"];

      // Retrieve existing photo, if any
      $retrieve_query = "SELECT `picture` FROM `accounts` WHERE `id`='$id'";
      $retrieve_result = mysqli_query($con, $retrieve_query);
      $retrieve_row = mysqli_fetch_assoc($retrieve_result);

      // Delete existing photo from MySQL
      if ($retrieve_row['picture']) {
          $delete_query = "UPDATE `accounts` SET `picture` = NULL WHERE `id`='$id'";
          $delete_result = mysqli_query($con, $delete_query);
      }

      // Upload new photo to MySQL
      $picture = mysqli_real_escape_string($con, file_get_contents($picture_temp));
      $update_photo_query = "UPDATE `accounts` SET `picture`='$picture' WHERE `id`='$id'";
      $update_photo_result = mysqli_query($con, $update_photo_query);

      if (!$update_photo_result) {
          $_SESSION['status'] = "Something went wrong!";
          $_SESSION['status_code'] = "error";
          header('Location: coordinator_manage.php');
          exit(0);
      }
  }

  $_SESSION['status'] = "Account has been successfully updated!";
  $_SESSION['status_code'] = "success";
  header('Location: coordinator_manage.php');
  exit(0);
}
   



//update ang supervisor
if(isset($_POST['super_update']))
{
    $id = $_POST['id'];
    $picture = $_FILES['picture'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_address = $_POST['company_address'];

    $acctype = 3;
    $accstatus = 1;
    

    $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`company_name`='$company_name',`company_email`='$company_email',`company_address`='$company_address',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
  
    
    if (!$query_run) {
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header('Location: super_manage.php');
      exit(0);
  }

  // Update photo if a new photo is uploaded
  if ($_FILES["picture"]["tmp_name"]) {
      $picture_temp = $_FILES["picture"]["tmp_name"];

      // Retrieve existing photo, if any
      $retrieve_query = "SELECT `picture` FROM `accounts` WHERE `id`='$id'";
      $retrieve_result = mysqli_query($con, $retrieve_query);
      $retrieve_row = mysqli_fetch_assoc($retrieve_result);

      // Delete existing photo from MySQL
      if ($retrieve_row['picture']) {
          $delete_query = "UPDATE `accounts` SET `picture` = NULL WHERE `id`='$id'";
          $delete_result = mysqli_query($con, $delete_query);
      }

      // Upload new photo to MySQL
      $picture = mysqli_real_escape_string($con, file_get_contents($picture_temp));
      $update_photo_query = "UPDATE `accounts` SET `picture`='$picture' WHERE `id`='$id'";
      $update_photo_result = mysqli_query($con, $update_photo_query);

      if (!$update_photo_result) {
          $_SESSION['status'] = "Something went wrong!";
          $_SESSION['status_code'] = "error";
          header('Location: super_manage.php');
          exit(0);
      }
  }

  $_SESSION['status'] = "Account has been successfully updated!";
  $_SESSION['status_code'] = "success";
  header('Location: super_manage.php');
  exit(0);
   
}


if(isset($_POST['delete_coordinator']))
{
    $id = $_POST['delete_coordinator'];

    $query = "UPDATE `accounts` SET `acc_status`='2' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Account has been archived";
      $_SESSION['status_code'] = "success";
      header('Location: coordinator_manage.php');
      mysqli_close($con);
        exit(0);
    }
    else
    {
      $_SESSION['status'] = "Account has been archived";
      $_SESSION['status_code'] = "success";
      header('Location: coordinator_manage.php');
      mysqli_close($con);
        exit(0);
    }
}

//delete supervisor
if(isset($_POST['delete_supervisor']))
{
    $id = $_POST['delete_supervisor'];

    $query = "UPDATE `accounts` SET `acc_status`='2' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Account has been archived";
      $_SESSION['status_code'] = "success";
      header('Location: super_manage.php');
        exit(0);
    }
    else
    {
      header('Location: super_manage.php');
        exit(0);
    }
}

//add course
if(isset($_POST['add_course']))
{
    $course_name = $_POST['course'];
    $acronym = $_POST['acronym'];

    $query = "INSERT INTO `course`(`course_name`, `acronym`) VALUES ('$course_name','$acronym')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Course added successfully";
      $_SESSION['status_code'] = "success";
      header('Location: add_course.php');
        exit(0);
    }
    else
    {
      header('Location: add_course.php');
        exit(0);
    }
}



//add student

if(isset($_POST['add_student']))
{
  if(isset($_POST['mname'])) {
    $mname = $_POST['mname'];
  } else{
    $mname = NULL;
  }
    $picture = $_FILES['picture'];

    $stud_id = $_POST['student_id'];
    $fname = $_POST['fname'];

    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    
    $acctype = 1;
    $accstatus = 1;
    

    $query = "INSERT INTO `student`(`student_id`,`fname`, `mname`, `lname`,`suffix`, `mobile`, `email`, `gender`, `course`, `acc_type`, `acc_status`) VALUES ('$stud_id','$fname','$mname','$lname','$suffix','$phone','$email','$gender','$course','$acctype','$accstatus')";
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
        header('Location: student_manage.php');
        exit(0);
    }else{
      $_SESSION['status'] = "Student ID already taken";
      $_SESSION['status_code'] = "error";
      header('Location: student_create.php');
      exit(0);
    }
   
}


if(isset($_POST['update_student']))
{
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $stud_id = $_POST['stud_id'];
    $suffix = $_POST['suffix'];

    $acctype = 1;
    $accstatus = 1;

    

    $query = "UPDATE `student` SET `student_id`='$stud_id',`fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix` = '$suffix',`mobile`='$mobile',`email`='$email',`course`='$course',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Account has been successfully updated!";
      $_SESSION['status_code'] = "success";
        header('Location: student_manage.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: student_manage.php');
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

    $_SESSION['status'] = "You have been logout!";
    $_SESSION['status_code'] = "successss";
    header("Location: ../index.php");
    exit(0);
}


//delete student
if(isset($_POST['delete_student']))
{
    $id = $_POST['delete_student'];

    $query = "UPDATE `student` SET `acc_status`='2' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Account has been archived";
      $_SESSION['status_code'] = "success";
      header('Location: student_manage.php');
        exit(0);
    }
    else
    {
      header('Location: student_manage.php');
        exit(0);
    }
}

if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['message'] = "Logout Successfully";
    header("Location: ../login/index.php");
    exit(0);
}


//delete attendance
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
      header('Location: attendance_manage.php');
        exit(0);
    }
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



if (isset($_POST['download_student'])) {
  $student_id = $_POST['download_student'];

  // Fetch the selected student's data
  $query = "SELECT 
                student.student_id,
                student.fname, 
                student.mname, 
                student.lname, 
                student.suffix,
                student.email, 
                student.mobile,
                student.gender,
                student.course, 
                student.mobile
            FROM
                student
                INNER JOIN
                account_type
                ON 
                    student.acc_type = account_type.acc_id
                INNER JOIN
                acc_status
                ON 
                    student.acc_status = acc_status.status_id
            WHERE
                student.acc_status = 1
                AND student.id = $student_id";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run) > 0) {
      $student_data = mysqli_fetch_assoc($query_run);
      $last_name = $student_data['lname'];
      $filename = $last_name . '.csv';

      // Create a CSV file
      $file = fopen($filename, 'w');

      // Write data to the CSV file
      fputcsv($file, array_values($student_data));

      fclose($file);

      // Download the CSV file
      header('Content-Type: application/csv');
      header('Content-Disposition: attachment; filename=' . $filename);
      readfile($filename);

      // Delete the CSV file
      unlink($filename);
  } else {
      echo "No records found.";
  }
}







