<?php include('authentication.php'); 



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

if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "Logout Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../login/index.php");
    exit(0);
}