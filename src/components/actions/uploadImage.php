<?php
function uploadImage($file, $uploadDir = '/ncst/public/uploads/reports/', $maxSize = 5000000, $allowedExtensions = ['jpg','jpeg','png']) {
    if (!isset($file) || $file['error'] != 0) {
        return ['success' => false, 'message' => 'No file uploaded'];
    }

    $fileName = $file['name'];
    $fileSize = $file['size'];
    $tmpName = $file['tmp_name'];
    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedExtensions)) {
        return ['success' => false, 'message' => 'Invalid image extension'];
    }

    if ($fileSize > $maxSize) {
        return ['success' => false, 'message' => 'Image size is too large'];
    }

    $newFileName = uniqid() . '.' . $extension;
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDir . $newFileName;

    if (move_uploaded_file($tmpName, $fullPath)) {
        return ['success' => true, 'file' => $newFileName];
    } else {
        return ['success' => false, 'message' => 'Failed to upload image'];
    }
}
?>
