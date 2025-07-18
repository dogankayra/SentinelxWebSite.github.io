<?php
// Hata ayıklama için hata raporlamasını aç
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Gerekli dosyaları dahil et (Model ve veritabanı bağlantısı)
require_once '../models/Contact.php';
require_once '../config/database.php';

// Form gönderildiyse işlemleri başlat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Contact modelinden nesne oluştur
    $contact = new Contact($name, $email, $message);

    // Veritabanına kaydet ve yönlendir
    if ($contact->saveToDatabase($pdo)) {
        // Başarı mesajı için yönlendirme
        header("Location: ../../index.html?status=success");
        exit();
    } else {
        // Hata mesajı için yönlendirme
        header("Location: ../../index.html?status=error");
        exit();
    }
}
?>