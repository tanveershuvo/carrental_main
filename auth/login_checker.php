<?php
			session_start();
			include_once '../dbCon.php';
			$conn = connect();
			if(isset($_POST['login'])){
				$mail 		= mysqli_real_escape_string($conn,$_POST['email']);
				$password 	= mysqli_real_escape_string($conn,$_POST['password']);
				$sql = "SELECT * FROM `user_details` WHERE `email`='$mail' AND `password`='$password'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					$_SESSION['isLoggedIn'] = TRUE;
					foreach($result as $row){
							$_SESSION['cus_id']=$row['cus_id'];
							$_SESSION['name']=$row['name'];
							$_SESSION['email']=$row['email'];
							$_SESSION['phone']=$row['phone'];
							$_SESSION['address']=$row['address'];
            }
            echo "<script>window.location.href='../index.php'</script>";
          } else {
            echo "<script>window.location.href='login.php'</script>";
          }
        }

?>
