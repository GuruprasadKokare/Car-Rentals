
<?php
include("config2.php");
include("firebaseRDB.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phn=$_POST['phn'];
$email=$_POST['email'];
$message=$_POST['message'];
if($fname==""){

    echo  '<script>alert("YOUR NAME IS REQUIRED!!! ");
    location.href = "contact.html";
    </script>';

}
else if($lname==""){

    echo  '<script>alert("LAST NAME IS REQUIRED!!! ");
    location.href = "contact.html";
    </script>';

    
    }
else if($phn==""){
    echo  '<script>alert("PHONE NUMBER IS REQUIRED!!! ");
    location.href = "contact.html";
    </script>';

    
}
else if($email==""){

    echo  '<script>alert("ENTER YOUR EMAIL!!!");
    location.href = "contact.html";
    </script>';    



}else if($message==""){

    echo  '<script>alert("PLEASE SHARE YOUR PROBLEM WITH US MESSAGE BOX!!!");
    location.href = "contact.html";
    </script>';


}
else{

    $rdb= new firebaseRDB($databaseURL);
    $retrieve=$rdb->retrieve("/contact","fname","EQUAL",$fname);
    
    $data=json_decode($retrieve,1);

    
         $insert=$rdb->insert("/user",[
          
            "fname"=>$fname,
            "lname"=>$lname,
            "phn"=>$phn,
            "email"=>$email,
            "message"=>$message,
            
         ]);

        $result=json_decode($insert,1);

        if(!isset($result['email']))
        {
            echo  '<script>alert("PROBLEM RECIVED SUCCESFULLY!!! ");
            location.href = "index2.html";
            </script>';
        }else{
            echo  '<script>alert("sign up FAILED click ok!!! ");
            location.href = "contact.html";
            </script>';
        }
        
        
    }
    

