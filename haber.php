<?php
// Hata ayıklama için hata raporlamasını aç
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Veritabanı bağlantı dosyasını dahil et
require_once 'src/config/database.php';

// URL'den haber ID'si alınıyor ve kontrol ediliyor
if (isset($_GET['id'])) {
    $haber_id = intval($_GET['id']); // ID'yi tam sayıya çevir
    $sql = "SELECT * FROM haberler WHERE id = :id"; // İlgili haberi seç
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $haber_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $haber = $stmt->fetch(PDO::FETCH_ASSOC); // Haber bulunduysa veriyi al
    } else {
        echo "Haber bulunamadı."; // Haber yoksa mesaj göster
        exit;
    }
} else {
    echo "Haber ID'si belirtilmedi."; // ID yoksa mesaj göster
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png"/>   <!-- favicon ekleme -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($haber['baslik']); ?> - Povie</title>
    <link rel="stylesheet" href="haber.css"> <!-- Harici CSS dosyası -->
</head>
<body>
    <header>
        <!-- Geri dönüş butonu -->
        <a href="haberler.php" class="back-button">&#8592; Geri</a>
    </header>

    <div class="main-content">
        <div class="haber-detay">            
            <!-- Haber başlığı -->
            <h2><?php echo htmlspecialchars($haber['baslik']); ?></h2>
            <br>
            <div class="haber-konu-container">
                <!-- Haber görseli -->
                <img src="<?php echo htmlspecialchars($haber['foto_url']); ?>" alt="<?php echo htmlspecialchars($haber['baslik']); ?>">
                <!-- Haber içeriği -->
                <p class="haber-konu"><?php echo nl2br(htmlspecialchars($haber['icerik'])); ?></p>
            </div>
            <!-- Eklenme tarihi -->
            <p class="tarih">Eklenme Tarihi: <?php echo htmlspecialchars($haber['eklenme_tarihi']); ?></p>
        </div>
    </div>
</body>
</html>