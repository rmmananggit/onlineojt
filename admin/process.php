<?php include('authentication.php'); 

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer/src/Exception.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';


if(isset($_POST['add_coordinator']))
{
    $picture = $_FILES['picture'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $password = uniqid();
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    
    $acctype = 2;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "INSERT INTO `accounts`(`fname`, `mname`, `lname`, `suffix`, `mobile`, `email`, `password`,`gender`, `picture`, `acc_type`, `acc_status`) VALUES ('$fname','$mname','$lname','$suffix','$phone','$email','$password','$gender','$picture','$acctype','$accstatus')";
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
        exit(0);
    }else{
      $_SESSION['status'] = "The account addition was unsuccessful";
      $_SESSION['status_code'] = "error";
      header('Location: coordinator_create.php');
      exit(0);
    }
   
}


if(isset($_POST['add_supervisor']))
{
    $picture = $_FILES['picture'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = uniqid();
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    
    $acctype = 3;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "INSERT INTO `accounts`(`fname`, `mname`, `lname`, `mobile`, `email`, `password`,`gender`, `picture`, `acc_type`, `acc_status`) VALUES ('$fname','$mname','$lname','$phone','$email','$password','$gender','$picture','$acctype','$accstatus')";
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
      $_SESSION['status_code'] = "success";
        header('Location: super_manage.php');
        exit(0);
    }else{
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
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $acctype = 2;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`picture`='$picture',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      $_SESSION['status_code'] = "success";
        header('Location: coordinator_manage.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: coordinator_manage.php');
      exit(0);
    }
   
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

    $acctype = 3;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`picture`='$picture',`acc_type`='$acctype',`acc_status`='$accstatus' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      
      $_SESSION['status_code'] = "success";
        header('Location: super_manage.php');
        exit(0);
    }else{
      $_SESSION['status_code'] = "error";
      header('Location: super_manage.php');
      exit(0);
    }
   
}



//delete supervisor

if(isset($_POST['delete_coordinator']))
{
    $id = $_POST['delete_coordinator'];

    $query = "UPDATE `accounts` SET `acc_status`='2' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "Account has been archived";
      $_SESSION['status_code'] = "success";
      header('Location: index.php');
        exit(0);
    }
    else
    {
      header('Location: index.php');
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
      header('Location: index.php');
        exit(0);
    }
    else
    {
      header('Location: super_manage.php');
        exit(0);
    }
}



//add student

if(isset($_POST['add_student']))
{
    $picture = $_FILES['picture'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $password = uniqid();
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    
    $acctype = 1;
    $accstatus = 1;

    $picture = addslashes(file_get_contents($_FILES["picture"]['tmp_name']));
    

    $query = "INSERT INTO `student`(`fname`, `mname`, `lname`,`suffix`, `mobile`, `email`, `password`, `gender`, `picture`, `course`, `acc_type`, `acc_status`) VALUES ('$fname','$mname','$lname','$suffix','$phone','$email','$password','$gender','$picture','$course','$acctype','$accstatus')";
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
        exit(0);
    }else{
      $_SESSION['status'] = "The account addition was unsuccessful";
      $_SESSION['status_code'] = "error";
      header('Location: student_create.php');
      exit(0);
    }
   
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

//logout
if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "You have been logout!";
    $_SESSION['status_code'] = "error";
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
    $acc_type = 4;
    $acc_stats = 1;

    $query = "UPDATE `accounts` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`password`='$password',`picture`='$picture',`acc_type`='$acc_type',`acc_status`='$acc_stats' WHERE `id` ='$user_id'";
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











