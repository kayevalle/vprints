<?php 
  include 'dbcon.php';
  echo $_get['id'];

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $fetchPass = mysql_query("SELECT * FROM user_table WHERE email = '$email'");

    if(mysql_num_rows($fetchPass) >= 1){
      
      $resultPass = mysql_fetch_object($fetchPass);
      
      $password = $resultPass -> password;

      if ($_POST['password'] == $password) {
        session_start();
        $fetchEmail = mysql_query("SELECT * FROM user_table WHERE email = '$email'");
        while($fetch = mysql_fetch_object($fetchEmail)){
          $_SESSION['email'] = $fetch -> email;
          $_SESSION['id'] = $fetch -> user_id;
          $_SESSION['password'] = $fetch -> password;
        }
        
        echo  "success";
      }else{
        echo "fail";
      }
    }

    
  }

  


?>