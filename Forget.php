<?php
  session_start();
  
    $servername = "shareddb-u.hosting.stackcp.net";
    $username = "DBMSPROJECT-31333374d5";
    $password = "DBMSPROJECT@";
    $con=mysqli_connect($servername,$username,$password,"DBMSPROJECT-31333374d5");
    function emailer($to, $subject){
      ini_set( 'display_errors', 1 );
      error_reporting( E_ALL );
      $from = "noreply@codeditor.com";
      $message = "PHP mail works just fine";
      $headers = "From:" . $from;
      mail($to,$subject,$message, $headers);
    }
    $otp = rand(1000,9999);
if(isset($_POST["name"]) && $_POST["email"]){
    $result=mysqli_query($con,"SELECT Name,Email,Verification FROM signup1 WHERE Name='".$_POST["name"]."' and Email='".$_POST["email"]."' ");
    
    $row=mysqli_fetch_array($result);
    if(isset($row[0]) & isset($row[1])){
        if($row[0]==$_POST["name"] & $row[1]==$_POST["email"]){
        $_SESSION["name"]=$_POST["name"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["otp"]=$otp;
        emailer($row[1],$otp);
        header("Location: otpchecker.php");
    }
    else{
         echo '<script type="text/JavaScript">  
              alert("No Account Found "); 
              </script>';
    }
    }
    else{
        echo '<script type="text/JavaScript">  
              alert("No Account Found "); 
              </script>';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  </head>
  <style type="text/css"> 
    
    body{
        background-color: #F2F3F4  ;
    }
    .nav-item{
		margin-left: 20px;
	}
	
  .main-box{
        position: relative;
        width:480px;
        left:32%;
        margin-top: 25px;
    }
    .box-1{
        
        min-width:400px;
        min-height:420px;
        background-color: white;
        border-radius: 1.5%;
    }
    .signup{
        text-align: center;
        padding-top:30px;
        font-family: 'Manrope', sans-serif;
    }
    .box-2{
        width: 420px;
        height:50px;
        background-color:#F2F3F4;
        margin-left:30px;
        margin-top: 40px;
        margin-right: 25px;
        margin-bottom: 20px;
        border-bottom: #F2F3F4 solid;
    }
    .object{
        margin-top: 25px;
        margin-left: 250px;
    }
    .button{
        background-color: #28B463;
        color:white;
        text-align: center;
        border:1px solid #28B463;
        padding-left:15px;
        padding-right:15px;
        padding-top:15px;
        padding-bottom:15px;
        font-family: 'Roboto Mono', monospace;
        font-size:100%;
    }
    .part-1{
        text-align: center;
        font-family: 'Manrope', sans-serif;
        margin-top: 70px;
    }
    .part-2{
        padding-left: 0px;
    }
    .input-1{
        padding-left: 400px;
        margin-top: -31px;
    }
    .button:hover{
        cursor: pointer;
    }
    @media screen and (max-width: 800px) {
        .main-box{
            position: relative;
            left:5%;
        }
    }
    .checking{
        font-family: 'Manrope', sans-serif;
        float: left;
        padding-left: 40px;
        margin-top: -40px;
        color:#28B463
    }
    .checking:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    .changer_1{
        display: none;
    }
    .account{
        font-family: 'Manrope', sans-serif;
        float: right;
        padding-top: 10px;
        padding-right: 30px;
    }
    .account:hover{
        text-decoration: underline;
    }
    @media screen and (max-width: 450px) {
        .main-box{
            
            left:0px;
        }
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <a class="navbar-brand" href="#"><img src="https://cdn1.iconfinder.com/data/icons/seo-icons-5/96/Coding-512.png" width="40px" style="margin-right: 15px;">Code Collector</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="newsignup2.php">Signup <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Signin.php">Login </a>
        </li>
        <li class="nav-item ">
			<a class="nav-link" href="Verification.php">Verification </a>
	    </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
          </li>
        </ul>
      </div>
      </nav>
    <div id="login-box">

      <div style="text-align: center;">
        <form  method="Post"  >
          <div class="main-box">
            <div class="box-1">
                <div class="signup">
                    <h2>Forget Password</h2>
                </div>
                <div>
                  <div class="box-2" id="box-2">
                      <div style="padding-top: 10px; margin-left:-350px;">
                          <img src="d524d8b49fec0aa8b6049d60a05978e6_raj-khan-opinions-heard_512-512.png" width="30px">
                          <div class="input-1">
                            <input type="text" id="name" name="name" placeholder="First & Last Name" style="width: 350px;font-size: medium;height:30px;border:1px solid #F2F3F4;background-color: #F2F3F4;">
                          </div>
                      </div>
                      
                  </div>
                  <div class="box-2" id="box-3">
                        <div style="padding-top: 8px; margin-left:-350px">
                            <img src="625-6255837_email-icon-message-vector-hd-png-download.png" width="35px" height="35px">
                            <div class="input-1" style="margin-top: -33.5px;">
                                <input type="email" id="email" name="email" placeholder="Email" style="width: 350px;font-size: medium;height:30px;border:1px solid #F2F3F4;background-color: #F2F3F4;">
                            </div>
                        </div>
                  </div>
                  <div class="object">
                    <a href="#" style="text-decoration: none; color:#F2F3F4"><button class="button" id="button">Submit</button></a>
                  </div>
                  <div class="checking" id="checking">
                    <p>Check Details</p>
                  </div>
                  <div class="account">
                    <a href="Login.php" style="text-decoration: none; color: black;"><p>or Already have account</p></a>
                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

    <script type="text/javascript">
      document.getElementById("checking").onclick=function(){
      var name_user=document.getElementById("name").value;
      var email_user=document.getElementById("email").value;
      function isEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
      };
      function isname(name){
          a=false;
          if(name.length>=4){
              a=true;
          }
          return a;
      };
      var changer=0;
      if(isname(name_user)){
          changer+=1;
          document.getElementById("box-2").style.borderBottomColor="green";
      }    
      else{
          document.getElementById("box-2").style.borderBottomColor="red";
      }

      if(isEmail(email_user)){
          changer+=1;
          document.getElementById("box-3").style.borderBottomColor="green";
      }    
      else{
          document.getElementById("box-3").style.borderBottomColor="red";
      }
    };
    
        
      </script>




  </body>
</html>