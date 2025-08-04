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

const UPLOAD_DIR = 'uploads/';

function uploadImage(array $uploaded_items)
{

    // Check if an image was actually uploaded
    // Return null if no file was uploaded
    if (
        empty($uploaded_items['uploaded-image']) ||
        $uploaded_items['uploaded-image']['error'] !== UPLOAD_ERR_OK
    ) {
        return null;
    }

    $temporaryPath = $uploaded_items['uploaded-image']['tmp_name'];
    // $mime_type = $uploaded_items['uploaded-image']['type'];
    if (!file_exists(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR);
    }

    $filepath = UPLOAD_DIR . $_FILES['uploaded-image']['name'];
    $success = move_uploaded_file($temporaryPath, $filepath);
    if ($success === false) {
        throw new Exception("Error moving file");
    }
    return $filepath;
}
