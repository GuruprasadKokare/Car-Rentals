
<?php
include("config.php");
include("firebaseRDB.php");

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

if($username==""){

    echo  '<script>alert("USERNAME IS REQUIRED!!! ");
    location.href = "signup.html";
    </script>';

}
else if($email==""){

    echo  '<script>alert("EMAIL IS REQUIRED!!! ");
    location.href = "signup.html";
    </script>';

    
    }
else if($password==""){
    echo  '<script>alert("PASSWORD IS REQUIRED!!! ");
    location.href = "signup.html";
    </script>';

    
}
else{

    $rdb= new firebaseRDB($databaseURL);
    $retrieve=$rdb->retrieve("/user","email","EQUAL",$email);
    
    $data=json_decode($retrieve,1);

    if(isset($data['email'])){
            echo '<script> alert("EMAIL IS ALREADY USED!!!")</script>';
            echo'<a href="signup.html">BACK</a>';
            


    }else 
    {
         $insert=$rdb->insert("/user",[
          
            "username"=>$username,
            "email"=>$email,
            "password"=>$password
            
         ]);

        $result=json_decode($insert,1);
        if(!isset($result['email']))
        {
            echo  '<script>alert("SIGNED UP SUCCESFULLY CLICK OK!!! ");
            location.href = "Login.html";
            </script>';
        }else{
            echo  '<script>alert("sign up FAILED click ok!!! ");
            location.href = "signup.html";
            </script>';
        }
    }
    
}
