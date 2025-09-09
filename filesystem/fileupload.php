<?php
if(isset($_FILES['image'])){
    echo"<pre>";
    print_r($_FILES);
    echo "</pre>";
    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_type=$_FILES['image']['type'];
    $file_tmp=$_FILES['image']['tmp_name'];
    if(move_uploaded_file($file_tmp,"upload-image/".$file_name));
    echo "<p style='color:green;'>✅ File uploaded successfully: <strong>$file_name</strong></p>";

}else{
    echo "Could not upload the file";
}

$allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    $max_size = 2 * 1024 * 1024; // 2 MB
 // Set upload folder
    $upload_dir = "upload-image/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Full file path
    $destination = $upload_dir . basename($file_name);

    // Check file extension
    if (!in_array($file_ext, $allowed_exts)) {
        echo "<p style='color:red;'>❌ Invalid file type. Only JPG, PNG, GIF, PDF allowed.</p>";
    }
    // Check file size
    elseif ($file_size > $max_size) {
        echo "<p style='color:red;'>❌ File size too large. Max 2MB allowed.</p>";
    }
    if (move_uploaded_file($file_tmp, $destination)) {
    echo "<p style='color:green;'>✅ File uploaded successfully: <strong>$file_name</strong></p>";

    // Display uploaded image or file link
    if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<h3>Preview:</h3>";
        echo "<img src='$destination' width='300' alt='Uploaded Image'>";
    } else {
        echo "<p>🔗 <a href='$destination' target='_blank'>View Uploaded File</a></p>";
    }
} else {
    echo "<p style='color:red;'>❌ Failed to move uploaded file.</p>";
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required/><br><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
    
</body>
</html>