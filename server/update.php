<?php
  session_start();
  include_once "config.php";
<<<<<<< HEAD
  global $connection;
  extract($_POST);
  if (isset($update)) {  
  if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($day) && !empty($month) && !empty($year) 
  && !empty($gender) && !empty($country)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
=======
  $fname = mysqli_real_escape_string($connection, $_POST['fname']);
  $lname = mysqli_real_escape_string($connection, $_POST['lname']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $phone = mysqli_real_escape_string($connection, $_POST['phone']);
  $day = mysqli_real_escape_string($connection, $_POST['day']);
  $month = mysqli_escape_string($connection, $_POST['month']);
  $year = mysqli_escape_string($connection, $_POST['year']);
  $gender = mysqli_escape_string($connection, $_POST['gender']);
  $country = mysqli_escape_string($connection, $_POST['country']);
  if (isset($update)) {  
  if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($day) && !empty($month) && !empty($year) 
  && !empty($gender) && !empty($country)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
>>>>>>> 2f0c52dd718ada22dc31c1125f6fdf78a3d19824
       $sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
          echo "$email - This email is already in use" ."<br>";
        }elseif(!preg_match("/^[0-9]{11}+$/", $phone)){
               echo "Invalid Phone Number";
        } else{
<<<<<<< HEAD
          $unique_id = $_SESSION['unique_id'];
           if (isset($_FILES['image'])) {
=======
          if (isset($_FILES['image'])) {
>>>>>>> 2f0c52dd718ada22dc31c1125f6fdf78a3d19824
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
              $types = ['image/jpeg', "image/jpg", "image/png"];
               if(in_array($img_type, $types) === true){
                  $time = time();
                  $new_img_name = $time.$img_name;
                  if (move_uploaded_file($tmp_name, "uploads/".$new_img_name)) {
                      $ran_id = rand(time(), 1000000000);
                      $status = "Active now";
                      $dob = $day. '/' .$month. '/' .$year;
<<<<<<< HEAD
                      
                      $insert_query = mysqli_query($connection, "UPDATE `users` SET `fname`='$fname',`lname`='$lname',
                      `email`='$email',`phone`='$phone',`dob`='$dob',`country`='$country',`gender`='$gender',`img`='$new_img_name' WHERE unique_id = '{$unique_id}'");
                      if($insert_query){
                            echo "Updated Successfully";
                            $_SESSION['unique_id']=$unique_id;
                      } else{
                            echo "DB Connection Error"; 
                        }
=======
                      $insert_query = mysqli_query($connection, "UPDATE `users` SET =`fname`='$fname',`lname`='$lname',`email`='$email',`phone`=''$phone,`dob`='$dob',`country`='$country',`gender`='$gender',`img`='$new_img_name',
                      WHERE email= {'$email'}");
                      if($insert_query){
                        $select_sql2 = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            $result = mysqli_fetch_assoc($select_sql2);
                            $_SESSION['unique_id'] = $result['unique_id'];
                            echo "Updated Successfully";
                        } else{
                            echo "This email address does not exist"; 
                        }
                      }else{
                            echo "Something went wrong. Please try again";
                      }

>>>>>>> 2f0c52dd718ada22dc31c1125f6fdf78a3d19824
                  }
               }else{
                        echo "Please upload an image file - jpeg, png, jpg";
               }
            }else{
              echo "Please upload an image file - jpeg, png, jpg";
            }

          }
        }
    }else{
      echo "$email is not a valid email";
    }
  }else{
    echo "All input fields are required!";
  }
}

function tabledata()
{global $connection;
	$query = mysqli_query($connection, "SELECT * FROM users");
while ($result = mysqli_fetch_assoc($query)) {
	echo '<tr>
	<td>'.$result['first'].'</td>
	<td>'.$result['last'].'</td>
	<td>'.$result['email'].'</td>
	<td>'.$result['phone'].'</td>
	<td>'.$result['dob'].'</td>
	<td>'.$result['gender'].'</td>
</tr>';
}
}
?>