<?php

declare(strict_types=1);

namespace App\helper;

use Exception;

define('ALLOWED_FILES',  [
    'image/png' => 'png',
    'image/jpeg' => 'jpg',
]);

define('MESSAGES',  [
    'UPLOAD_ERR_OK' => 'File uploaded successfully',
    'UPLOAD_ERR_INI_SIZE' => 'File is too big to upload',
    'UPLOAD_ERR_FORM_SIZE' => 'File is too big to upload',
    'UPLOAD_ERR_PARTIAL' => 'File was only partially uploaded',
    'UPLOAD_ERR_NO_FILE' => 'No file was uploaded',
    'UPLOAD_ERR_NO_TMP_DIR' => 'Missing a temporary folder on the server',
    'UPLOAD_ERR_CANT_WRITE' => 'File is failed to save to disk.',
    'UPLOAD_ERR_EXTENSION' => 'File is not allowed to upload to this server'
]);

function uploadImage(array $uploaded_items)
{
    $temporaryPath = $uploaded_items['uploaded-image']['tmp_name'];

    $mime_type = $uploaded_items['uploaded-image']['type'];
    $uploaded_file = pathinfo($_FILES['uploaded-image']['name'], PATHINFO_FILENAME) . '.' . ALLOWED_FILES[$mime_type];

    $filepath = __DIR__ . '/../../uploads/' . $uploaded_file;

    $success = move_uploaded_file($temporaryPath, $filepath);
    if ($success === false) {
        throw new Exception("Error moving file");
    }
     return $filepath;
}
