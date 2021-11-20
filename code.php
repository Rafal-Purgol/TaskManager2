<?php
session_start();
include_once('dbcon.php');

if(isset($_POST['register_btn']))
{
    $usrname = $_POST['username'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'passwd' => $passwd,
        'usr_nm' => $usrname,
    ];
    
    $createdUser = $auth->createUser($userProperties);

    if($createdUser)
    {
        $_SESSION['status'] = "User Created Correctly";
        header('Location: register.php');
        exit();
    }
    else
    {
        $_SESSION['status'] = "User Not Created";
        header('Location: index.php');
    }
}

if(isset($_POST['complete_btn']))
{
    $com_id = $_POST['complete_btn'];
    $ref_table = 'tasks/'.$com_id;

    $completeData= [
        'is_del' =>true,
        'is_com' =>true,
    ];
    $completequery_result = $database->getReference($ref_table)->update($completeData);

    if($completequery_result)
    {
        $_SESSION['status'] = "Task Completed Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Task Not Completed";
        header('Location: index.php');
    }
    
}



if(isset($_POST['delete_btn']) )
{
    $del_id = $_POST['delete_btn'];

    $ref_table = 'tasks/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if($deletequery_result)
    {
        $_SESSION['status'] = "Task Deleted Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Task Not Deleted";
        header('Location: index.php');
    }
}

if(isset($_POST['edit_task']))
{
    $key = $_POST['key'];
    $task_name = $_POST['task_name'];
    $task_dscr = $_POST['task_dscr'];
    $task_dead = $_POST['task_dead_date']." ".$_POST['task_dead_time'];
    $task_prio = $_POST['task_prio'];

    $updateData = [
        'name__' =>$task_name,
        'dscrpt' =>$task_dscr,
        'dl_dt' =>$task_dead,
        'prio__' =>$task_prio,
        'is_del' =>false,
        'is_com' =>null,

    ];
    $ref_table = 'tasks/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);

    if($updatequery_result)
    {
        $_SESSION['status'] = "Task Updated Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Task Not Updated";
        header('Location: index.php');
    }
}


if (isset($_POST['add_task']))
{
    $task_name = $_POST['task_name'];
    $task_dscr = $_POST['task_dscr'];
    $task_dead = $_POST['task_dead_date']." ".$_POST['task_dead_time'];
    $task_prio = $_POST['task_prio'];

    $postData = [
        'name__' =>$task_name,
        'dscrpt' =>$task_dscr,
        'dl_dt' =>$task_dead,
        'prio__' =>$task_prio,
        'is_del' =>false,
        'is_com' =>null,

    ];
    $ref_table = "tasks";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result)
    {
        $_SESSION['status'] = "Task Added Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Task Not Added";
        header('Location: index.php');
    }
    
}