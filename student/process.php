<?php include('authentication.php'); 


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


if (isset($_POST['add_journal'])) {
  $user_id = $_POST['user_id'];
  $title = $_POST['title'];
  $message = $_POST['message'];

  $date = new DateTime();
  $date->setTimezone(new DateTimeZone('UTC'));
  $currentdate = $date->format('Y-m-d H:i:s');
  $grade = 0;

  $query = "INSERT INTO `journal`(`id`, `title`, `message`, `grade`, `date`) VALUES ('$user_id','$title','$message','$grade','$currentdate')";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $journal_id = mysqli_insert_id($con); // Get the auto-generated ID of the inserted journal

    // Check if files were uploaded
    if (!empty($_FILES['photos']['name'][0])) {
        $fileCount = count($_FILES['photos']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $tempFile = $_FILES['photos']['tmp_name'][$i];
            $fileName = $_FILES['photos']['name'][$i];
            $fileData = mysqli_real_escape_string($con, file_get_contents($tempFile));

            $query = "INSERT INTO `photos` (`journal_id`, `photo`) VALUES ('$journal_id', '$fileData')";
            mysqli_query($con, $query);
        }
    }

    $_SESSION['status'] = "Journal has been created";
    $_SESSION['status_code'] = "success";
    header('Location: journal_manage.php');
    exit(0);
  } else {
    echo "Error: " . mysqli_error($con);
    // echo "Error: " . mysqli_error($con);
  }
}

if (isset($_POST['update_journal'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $message = $_POST['message'];

  // Check if files were uploaded
  if (!empty($_FILES['photos']['name'][0])) {
    // Delete all existing photos for the journal
    $deleteQuery = "DELETE FROM `photos` WHERE `journal_id` = $id";
    mysqli_query($con, $deleteQuery);

    // Update the journal information
    $query = "UPDATE `journal` SET `title`='$title', `message`='$message' WHERE `journal_id` = $id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
      $journal_id = $id;

      $fileCount = count($_FILES['photos']['name']);

      for ($i = 0; $i < $fileCount; $i++) {
        $tempFile = $_FILES['photos']['tmp_name'][$i];
        $fileName = $_FILES['photos']['name'][$i];
        $fileData = mysqli_real_escape_string($con, file_get_contents($tempFile));

        $query = "INSERT INTO `photos` (`journal_id`, `photo`) VALUES ('$journal_id', '$fileData')";
        mysqli_query($con, $query);
      }

      $_SESSION['status'] = "Journal has been updated";
      $_SESSION['status_code'] = "success";
      header('Location: journal_manage.php');
      exit(0);
    } else {
      echo "Error: " . mysqli_error($con);
    }
  } else {
    // No new photos were uploaded, so update the journal without changing the existing photos
    $query = "UPDATE `journal` SET `title`='$title', `message`='$message', `date`='$currentdate' WHERE `journal_id` = $id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
      $_SESSION['status'] = "Journal has been updated";
      $_SESSION['status_code'] = "success";
      header('Location: journal_manage.php');
      exit(0);
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
}


if (isset($_POST['delete_journal'])) {
  $id = $_POST['delete_journal'];

  // Perform deletion in the 'journal' table
  $query = "DELETE FROM `journal` WHERE `journal_id` = $id";
  $query_run = mysqli_query($con, $query);

  // Perform deletion in the 'photos' table
  $query1 = "DELETE FROM `photos` WHERE `journal_id` = $id";
  $query_run1 = mysqli_query($con, $query1);

  if ($query_run && $query_run1) {
      $_SESSION['status'] = "Journal and associated photos have been deleted successfully.";
      $_SESSION['status_code'] = "success";
  } else {
    echo "Error: " . mysqli_error($con);
  }

  mysqli_close($con);

  // Redirect to the desired page
  header('Location: journal_manage.php');
  exit(0);
}

if (isset($_POST['timein'])) {
  $user_id2 = $_POST['user_id'];
  date_default_timezone_set('Asia/Singapore'); // Set timezone to GMT+8
  $current_time = date('h:i:s A'); // Format: 12-hour time with AM/PM
  $currentDate = date('Y-m-d'); // Format: YYYY-MM-DD
  
  // Splitting the current time into hours, minutes, and seconds
  $time_parts = explode(':', $current_time);
  $hours = $time_parts[0];
  $minutes = $time_parts[1];
  $seconds = $time_parts[2];
  
  // Checking if the current time is PM and converting to 12-hour format
  if (strpos($current_time, 'PM') !== false) {
    $hours = $hours + 12;
    $hours = ($hours == 24) ? 0 : $hours;
  }
  
  // Formatting the time in 12-hour format
  $current_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
  
  $query = "INSERT INTO attendance (`user_id`, `date`, `time_in`, `time_out`) VALUES ('$user_id2', '$currentDate', '$current_time', '$current_time')";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['status'] = "Time in recorded successfully";
    $_SESSION['status_code'] = "success";
    header('Location: attendance_manage.php');
    mysqli_close($con);
    exit(0);
  } else {
    echo "Error: " . mysqli_error($con);
    mysqli_close($con);
    exit(0);
  }
}





if (isset($_POST['timeout'])) {
  $user_id2 = $_POST['user_id'];
  date_default_timezone_set('Asia/Singapore'); // Set timezone to GMT+8
  $current_time = date('h:i:s A'); // Format: 12-hour time with AM/PM
  $currentDate = date('Y-m-d'); // Format: YYYY-MM-DD
  
  // Splitting the current time into hours, minutes, and seconds
  $time_parts = explode(':', $current_time);
  $hours = $time_parts[0];
  $minutes = $time_parts[1];
  $seconds = $time_parts[2];
  
  // Checking if the current time is PM and converting to 12-hour format
  if (strpos($current_time, 'PM') !== false) {
    $hours = $hours + 12;
    $hours = ($hours == 24) ? 0 : $hours;
  }
  
  // Formatting the time in 12-hour format
  $current_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

  $query = "UPDATE attendance SET time_out = '$current_time' WHERE user_id = $user_id2 AND time_out = time_in";
  $query_run = mysqli_query($con, $query);

  if($query_run)
    {
      $_SESSION['status'] = "Time out recorded successfully!";
      $_SESSION['status_code'] = "success";
      header('Location: attendance_manage.php');
      mysqli_close($con);
        exit(0);
    }
    else
    {
      echo "Error: " . mysqli_error($con);
      mysqli_close($con);
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
    $_SESSION['status_code'] = "success";
    header("Location: ../index.php");
    exit(0);
}


if(isset($_POST['update_account']))
{
  if(isset($_POST['mname'])) {
    $mname = $_POST['mname'];
  } else{
    $mname = NULL;
  }
  $student_id = $_POST['student_id'];
    $id = $_POST['id'];
    $picture = $_FILES['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $user_id = $_SESSION['auth_user']['user_id'];

   // Check student_id
$check_id = mysqli_query($con, "SELECT * FROM supervisor_student WHERE student_id='$student_id' AND id != $user_id");
if (mysqli_num_rows($check_id) > 0) {
  $_SESSION['status'] = "Student Id already exists.For more information, you can contact your coordinator.";
  $_SESSION['status_code'] = "error";
  header('Location: settings.php');
  exit(0);
}



  //check mail

  $check_mail = mysqli_query($con, "SELECT * FROM supervisor_student WHERE email='$email' AND id != $user_id");
  if(mysqli_num_rows($check_mail) > 0) {
    $_SESSION['status'] = "Email address already exists.For more information, you can contact your coordinator.";
    $_SESSION['status_code'] = "error";
    header('Location: settings.php');
    exit(0);
  }

    //check phone number

    $check_mail = mysqli_query($con, "SELECT * FROM supervisor_student WHERE mobile='$phone' AND id != $user_id");
    if(mysqli_num_rows($check_mail) > 0) {
      $_SESSION['status'] = "Mobile Number already exists.For more information, you can contact your coordinator.";
      $_SESSION['status_code'] = "error";
      header('Location: settings.php');
      exit(0);
    }
 

    $query = "UPDATE `supervisor_student` SET `student_id`='$student_id',`fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`password`='$password' WHERE `id`='$id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
      $_SESSION['status'] = "You Account has been successfully updated!";
      $_SESSION['status_code'] = "success";
        header('Location: settings.php');
        exit(0);
    }else{
      echo "Error: " . mysqli_error($con);
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

if(isset($_POST['change_password']))
{

    $user_id= $_POST['user_id'];
    $currentpassword= $_POST['currentpassword'];
    $newpassword= $_POST['newpassword'];
    $confirmpassword= $_POST['confirmpassword'];
  
    //check current password
    $current_pass = "SELECT
    *, 
    student.`password`
  FROM
    student
  WHERE
    student.id = $user_id AND
    student.`password` = $currentpassword";
$query_run = mysqli_query($con, $current_pass);

if(mysqli_num_rows($query_run) > 0)
{
  if ($newpassword === $confirmpassword) {
    $query = "UPDATE `student` SET `password`='$newpassword' WHERE `id` ='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    { 
      $_SESSION['status'] = "Password has been changed";
        $_SESSION['status_code'] = "success";
        header('Location: changepassword.php');
        exit(0);
    }
    else
    {
      $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: changepassword.php');
        exit(0);
    }
} else {
        $_SESSION['status'] = "New Password and Confirm Password does not match";
        $_SESSION['status_code'] = "error";
        header('Location: changepassword.php');
        exit(0);
}
}
else
{
  $_SESSION['status'] = "Invalid Current Password!";
          $_SESSION['status_code'] = "error";
          header('Location: changepassword.php');
          exit(0);
}
}

if (isset($_POST['submit_file'])) {

  $name = $_POST['name'];
  $user_id = $_POST['user_id'];

  if (isset($_FILES['pdf_file']['name']))
  {
  $file_name = $_FILES['pdf_file']['name'];
  $file_tmp = $_FILES['pdf_file']['tmp_name'];

  move_uploaded_file($file_tmp,"./pdf/".$file_name);

  $insertquery =
  "INSERT INTO files_table(student_id,file_name) VALUES('$user_id','$file_name')";
  $iquery = mysqli_query($con, $insertquery);

  $_SESSION['status'] = "Your File has been added";
  $_SESSION['status_code'] = "success";
  header('Location: add_file.php');
  exit(0);

  }
  else
  {

  }
}