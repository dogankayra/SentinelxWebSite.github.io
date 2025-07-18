<?php
// Hata ayıklama için hata raporlamasını aç
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Veritabanı bağlantı bilgileri
$host = 'localhost'; // Veritabanı sunucusu
$dbname = 'httpdwkm1_iletisim_db'; // Veritabanı adı
$username = 'httpdwkm1_httpdwkm1'; // Veritabanı kullanıcı adı
$password = '3qdFQ))NF7eb'; // Veritabanı şifresi

try {
    // PDO ile veritabanı bağlantısı oluştur
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Hata modunu exception olarak ayarla
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Bağlantı hatası olursa mesaj göster ve çık
    echo "Connection failed: " . $e->getMessage();
    exit();
}

try {
    // Haberleri veritabanından çek
    $sql = "SELECT baslik, icerik, foto_url, eklenme_tarihi FROM haberler";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Sonuçları dizi olarak al
    $haberler = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // JSON formatında çıktı ver
    echo json_encode($haberler);
} catch (PDOException $e) {
    // Sorgu hatası olursa mesaj göster
    echo "Query failed: " . $e->getMessage();
}
?>