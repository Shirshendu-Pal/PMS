<?php error_reporting(0) ?>
<?php session_start() ?>
<?php require "../authentication/dbconfig.php"; ?> 

<?php
$userid = $_SESSION["sessionID"];
$username = $_SESSION["sessionName"];
$time = date("Y-m-d");

$target_dir = "photos/";
//$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename   = $userid."-".$username . "-" .$time. "-".time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
$target_file = $target_dir.$basename;
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // sql query to 
      $sql = "INSERT INTO `gallery`( `file_name`) 
      VALUES ('$basename')";
       if(mysqli_query($conn, $sql)){

        header("Location: gallery.php");


    }
    else{
        echo "<h1> something went worng </h1> " ;
    }
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>