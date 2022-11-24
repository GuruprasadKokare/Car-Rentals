 
<?php
include("config1.php");
include("firebaseRDB.php");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$con=$_POST['con'];
$dli=$_POST['dli'];
$pickdate=$_POST['pickdate'];
$dropdate=$_POST['dropdate'];
$ccat=$_POST['ccat'];
$car=$_POST['car'];
$picloc=$_POST['picloc'];
$droploc=$_POST['droploc'];
$tc=$_POST['tc'];

if($firstname==""){

echo '<script> alert("firstname is required!!")</script>';

}
else if($lastname==""){

    echo '<script> alert("lastname is required!!")</script>';
    
    }
else if($con==""){
    echo '<script> alert("contact-no IS REQUIRED!!!")</script>';
   
    
}
else if($pickdate==""){
    echo '<script> alert("pick-up date IS REQUIRED!!!")</script>';
   
    
}else if($dropdate==""){
    echo '<script> alert("drop date IS REQUIRED!!!")</script>';
   
    
}else if($ccat==""){
    echo '<script> alert("car category IS REQUIRED!!!")</script>';
   
    
}else if($car==""){
    echo '<script> alert("car IS REQUIRED!!!")</script>';
   
    
}else if($picloc==""){
    echo '<script> alert("pick up location IS REQUIRED!!!")</script>';
   
    
}else if($droploc==""){
    echo '<script> alert("drop location IS REQUIRED!!!")</script>';
   
    
}else {
    $rdb= new firebaseRDB($databaseURL);
    $retrieve=$rdb->retrieve("/book","firstname","EQUAL",$firstname);
    $data=json_decode($retrieve,1);
      
         $insert=$rdb->insert("/book",[
          
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "con"=>$con,
            "dli"=>$dli,
            "pickdate"=>$pickdate,
            "dropdat"=>$dropdate,
            "ccat"=>$ccat,
            "car"=>$car,
            "picloc"=>$picloc,
            "droploc"=>$droploc,

            
         ]);

        $result=json_decode($insert,1);
        if($tc!="0")
        {
            
        
            
            echo'<script>
            location.href = "index.html";
            </script>';
        
            
        }
    }
    
