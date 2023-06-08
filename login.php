<?php  

session_start();
require "functions.php";
//cek cookie 


if (isset($_COOKIE['id'])  && isset($_COOKIE['key'])){
    $id= $_COOKIE['id'];
    $key= $_COOKIE['key'];

    //ambil username berdasarkan id
$result = mysqli_query($conn,"SELECT username FROM user WHERE id=$id");
$row = mysqli_fetch_assoc($result);

//cek cookie dan username

if($key === hash('sha256',$row['username'])){
    $_SESSION['login']=true;
}

}
if(isset($_SESSION["login"])){
    header("Location: dashboard.php");
    exit;
}


if (isset($_POST['login'])){
   
    $username =$_POST['username'];
    $password = $_POST['password'];



    //cek apakah user meng inputkan atau tidak 
    if (empty($username || $password)){
        $require = true;
    }else{
        $error=true;
    }
    //cek data user ada gak di data base jika ada bisa masuk jika tidak tidak masuk
    $queryDataUser = "SELECT * FROM user WHERE 
    username = '$username' OR
    email = '$username'
    ";
    $result = mysqli_query($conn, $queryDataUser);

   
    //cek username
    if(mysqli_num_rows($result)=== 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        $sayToHello=$row['username'];
       if (password_verify($password,$row['password'])){
        //set session
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        //cek remember me
        if(isset($_POST['remember'])){
            //buat cookie 
            setcookie('id',$row['id'], time()+3600);
            setcookie('key', hash('sha256',$row['username']), time()+3600);
        } 	
        header("Location: dashboard.php?username=$sayToHello");
        exit;
       }
    }

    
}

require('view/login.view.php');