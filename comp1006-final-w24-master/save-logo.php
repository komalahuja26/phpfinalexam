
<?php
if ($_FILES['logo']['type'] == 'image/png') {
    $target_dir = "img/logo.png";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["logo"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Only PNG files are allowed.";
}
?>