<?php
include("config.php");
include("firebaseRDB.php");

$email=$_POST['email'];
$password=$_POST['password'];

if($email==""){

echo '<script> alert("email is required!!")</script>';

}
else if($password==""){
    echo  '<script>alert("PASSWORD IS REQUIRED!!! ");
    location.href = "Login.html";
    </script>';
}
else{

    $rdb= new firebaseRDB($databaseURL);
    $retrieve=$rdb->retrieve("/user","email","EQUAL",$email);
     $data=json_decode($retrieve,1);

    if(count($data)==0){
        echo'<script>
        
                alert("IT SEEMS YOU HAVENT CREATED ACCOUNT PLEASE SIGNUP FIRST or CHECK YOUR NETWORK CONNECTION!!! ");
                location.href = "signup.html";
                </script>';
    }else {
        $id=array_keys($data)[0];
        if($data[$id]['password']==$password){
         echo'<script>
          location.href = "index2.html";
                </script>';
        }else{
            echo'<script>
        
                alert("Wrong Password!!! ");
                location.href = "Login.html";
                </script>';
        }
        
    }
    
}

     
