<?php

declare(strict_types=1);

namespace App\Controllers;
use Assert\Assertion;
use Core\Router;
use Exception;

/*class HandleUploadImage
{
    private $ALLOWED_FILES = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
    ];

    private $MESSAGES = [
        UPLOAD_ERR_OK => 'File uploaded successfully',
        UPLOAD_ERR_INI_SIZE => 'File is too big to upload',
        UPLOAD_ERR_FORM_SIZE => 'File is too big to upload',
        UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder on the server',
        UPLOAD_ERR_CANT_WRITE => 'File is failed to save to disk.',
        UPLOAD_ERR_EXTENSION => 'File is not allowed to upload to this server',
    ];

    public function __construct(
        private Router $router
    ) {}

    public function action()
    {


        try {
            Assertion::notEmpty($_FILES['user-image'], "User image is required.");

            if ($_FILES['user-image']['error'] !== 0) {
                $message = $this->MESSAGES[$_FILES['user-image']['error']];
                throw new Exception($message);
            }

            $temporaryPath = $_FILES['user-image']['tmp_name'];

            $mime_type = $_FILES['user-image']['type'];
            $uploaded_file = pathinfo($_FILES['user-image']['name'], PATHINFO_FILENAME) . '.' . $this->ALLOWED_FILES[$mime_type];

            $filepath = __DIR__ . '/../../uploads/' . $uploaded_file;

            $success = move_uploaded_file($temporaryPath, $filepath);
            if ($success === false) {
                throw new Exception("Error moving file");
            }

            echo $filepath;
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $this->router->redirect("/dashboard");
    }
}*/
