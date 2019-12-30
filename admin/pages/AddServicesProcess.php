<?php
    session_start();
    include_once("../conn.php");
        $_SESSION['error'] = null;
    if(isset($_REQUEST['services'])){
         $serviceName = $_REQUEST['serviceName'];
         $serviceId = $_REQUEST['serviceId'];
         $description = $_REQUEST['description'];

    //  fileuploading
    $target_dir = "../serviceicons/";
    $target_file = $target_dir . basename($_FILES["serviceIcon"]["name"]);
    $file_name = basename($_FILES["serviceIcon"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["services"])) {
        $check = getimagesize($_FILES["serviceIcon"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['error'] = "File is not an image.";
            $uploadOk = 0;
            header("location:../index.php?AddServices");
            exit;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error'] = "Sorry, file already exists.";
        $uploadOk = 0;
        header("location:../index.php?AddServices");
        exit;
    }
    // Check file size
    if ($_FILES["serviceIcon"]["size"] > 500000) {
        $_SESSION['error'] = "Sorry, your file is too large.";
        $uploadOk = 0;
        header("location:../index.php?AddServices");
        exit;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        header("location:../index.php?AddServices");
        exit;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['error'] = "Sorry, your file was not uploaded.";
        header("location:../index.php?AddServices");
        exit;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["serviceIcon"]["tmp_name"], $target_file)) {
             // "The file ". basename( $_FILES["serviceIcon"]["name"]). " has been uploaded.";
             $query = "insert into services (service_name,p_id,icon,description) values('$serviceName',$serviceId,'$file_name','$description')";
             $result = mysqli_query($conn , $query);
             $rows =  mysqli_affected_rows($conn);
             if($rows){
                $_SESSION['success'] = true;
                header("location:../index.php?AddServices");
             }else{
                $_SESSION['error'] =  "Sorry, there was an error";
                header("location:../index.php?AddServices");
                exit;     
             }
        } else {
            $_SESSION['error'] =  "Sorry, there was an error uploading your file.";
            header("location:../index.php?AddServices");
            exit;
        }
    }
            
        }

?>