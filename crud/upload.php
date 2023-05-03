<?php
error_reporting(3);
include("../config/connection.php");

function compress($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}

# Save file on the server
try {
    $title = $_POST["title"];
    $sinopsis = $_POST["description"];
    $genero = $_POST["genero"];
    $duracion = $_POST["duracion"];
    $director = $_POST["director"];
    $productora = $_POST["productora"];
    $ano = $_POST["ano"];
    $uploadPath = "../uploads/"; 
 
$statusMsg = ''; 
$status = 'danger'; 
 
// If file upload form is submitted 
if(isset($_FILES["image"])){ 
    // Check whether user inputs are empty 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $fileName = basename($_FILES["image"]["name"]); 
        $target_file = $uploadPath . $fileName; 
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source and size 
            $imageTemp = $_FILES["image"]["tmp_name"];  
             
            // Compress size and upload image 
            $compressedImage = compress($imageTemp, $target_file, 75); 
             
            if($compressedImage){ 
                $compressedImageSize = filesize($compressedImage); 
                 move_uploaded_file($compressedImage, $target_file);
                $status = 'success'; 
                $statusMsg = "Image compressed successfully."; 
                $target_file =substr($target_file, 1);
            }else{ 
                $statusMsg = "Image compress failed!"; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
}
} catch (\Throwable $th) {
    error_log("\n$th", 3, "error.log");
    echo $th;
}
error_clear_last();


