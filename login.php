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

    // Cek apakah username/email sudah ada
    $queryDataUserByUsername = "SELECT username FROM user WHERE username = '$username'";
    $queryDataUserByEmail = "SELECT username FROM user WHERE email = '$username'";
    $queryDataUserByPassword = "SELECT username FROM user WHERE password = '$password'";
    $resultByUsername = mysqli_query($conn, $queryDataUserByUsername);
    $resultByEmail = mysqli_query($conn, $queryDataUserByEmail);
    $resultByPassword = mysqli_query($conn, $queryDataUserByPassword);
    $userByUsername = mysqli_fetch_assoc($resultByUsername);
    $userByEmail = mysqli_fetch_assoc($resultByEmail);
    $userByPassword = mysqli_fetch_assoc($resultByPassword);
    
    //cek apakah user meng inputkan atau tidak 
if (empty($username) || empty($password)){
    $require =true;
}else if(($userByUsername !== $userByPassword) || ($userByEmail !== $userByPassword)){
    $error =true;
}else{ 
    if($userByEmail !== $username || $userByUsername !== $username){
   $invalid =true;
    }
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
        $emailUser=$row['email'];
       if (password_verify($password,$row['password'])){
        //set session
        $_SESSION["login"] = true;
        $_SESSION["username"] = $sayToHello;
        $_SESSION["email"] =$emailUser;
        //cek remember me
        if(isset($_POST['remember'])){
            //buat cookie 
            setcookie('id',$row['id'], time()+3600);
            setcookie('key', hash('sha256',$row['username']), time()+3600);
        } 	
        header("Location: dashboard.php?username=". base64_encode($sayToHello)."&email=". base64_encode($emailUser));
        exit;
       }
    }

    
}

require('view/login.view.php');