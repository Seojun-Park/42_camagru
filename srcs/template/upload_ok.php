<?php 
$up_dir = '../upload';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

$error = $_FILES['upimage']['error'];
$name = $_FILES['upimage']['name]'];
$ext = array_pop(explode('.', $name));

if ($error != UPLOAD_ERR_OK){
    switch( $error) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "Size is too big. ($error)";
            break;
        case UPLOAD_ERR_FILE:
            echo "No image attached. ($error)";
            break;
        default:
            echo "Fail to upload the image. ($error)";
    }
    exit;
}

if (!in_array($ext, $allowed_ext)){
    echo "Not allowed file type";
    exit;
}

move_uploaded_file($_FILES['upimage']['tmp_name'], "$up_dir/$name");