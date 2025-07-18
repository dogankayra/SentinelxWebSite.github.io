<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost'; // Veritabanı sunucusu
$dbname = 'httpdwkm1_iletisim_db'; // Veritabanı adı
$username = 'httpdwkm1_httpdwkm1'; // Database kullanıcı adı
$password = '3qdFQ))NF7eb'; // Database şifresi
try {
    // PDO ile veritabanı bağlantısını oluştur  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // PDO hata modunu ayarla
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Bağlantı hatası durumunda hata mesajını göster
    echo "Bağlantı başarısız: " . $e->getMessage();
    exit();
}
?>