<?php
session_start();
include('./admin/config/dbcon.php');

if(isset($_POST['login']))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT id,fname,mname,lname,email,password,acc_status,course,acc_type FROM accounts WHERE email='$email' AND password= '$password' UNION SELECT id,fname,mname,lname,student_id,password,acc_status,course,acc_type FROM supervisor_student WHERE student_id='$email' AND password= '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $full_name = $data['fname'] . ' ' . $data['lname'];
            $user_status = $data['acc_status'];
            $role_as = $data['acc_type'];
            $user_email = $data['email'];
            $user_course = $data['course'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['u_status'] = "$user_status";
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$full_name,
            'user_email' =>$user_email,
            'user_course' =>$user_course,
        ];

            if($_SESSION['u_status'] != '2')
            {
                if( $_SESSION['auth_role'] == '4')
        {
            $_SESSION['status'] = "Welcome $full_name";
            $_SESSION['status_code'] = "success";
            header("Location: ./admin/index.php");
            exit(0);
        }elseif( $_SESSION['auth_role'] == '1')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./student/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '3')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./supervisor/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '2')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./coordinator/index.php");
            exit(0);
        } 
            }else{
                $_SESSION['message'] = "Your account has been disabled";
            header("Location: index.php");
            exit(0); 
            }
           

           
        }
        else{
            $_SESSION['status'] = "Invalid Username and Password";
            $_SESSION['status_code'] = "error";
            header("Location: index.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Invalid Username and Password";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit(0);
    }   


?>

