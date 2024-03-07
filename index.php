<?php
// Ambil nilai dari parameter controller dan action dari URL
$controller = $_GET['controller'] ?? 'pegawai';
$action = $_GET['action'] ?? 'index';

// Perbaiki path untuk inklusi file controller
$controllerFileName = __DIR__ . '/controller/' . ucfirst($controller) . 'Controller.php';

// Cek apakah file controller tersebut ada
if (file_exists($controllerFileName)) {
    // Include file controller
    include_once $controllerFileName;

    // Buat nama class controller sesuai dengan nilai parameter controller
    $controllerClass = ucfirst($controller) . 'Controller';

    // Cek apakah class controller tersebut ada
    if (class_exists($controllerClass)) {
        // Buat objek dari class controller
        $controllerObj = new $controllerClass();

        // Panggil method sesuai dengan nilai parameter action
        if (method_exists($controllerObj, $action)) {
            // Panggil method dengan parameter yang sesuai
            $controllerObj->$action();
        } else {
            // Jika method tidak ditemukan, tampilkan pesan error
            echo "Error: Method $action tidak ditemukan dalam controller $controllerClass";
        }
    } else {
        // Jika class controller tidak ditemukan, tampilkan pesan error
        echo "Error: Class $controllerClass tidak ditemukan";
    }
} else {
    // Jika file controller tidak ditemukan, tampilkan pesan error
    echo "Error: File controller $controllerFileName tidak ditemukan";
}
?>
