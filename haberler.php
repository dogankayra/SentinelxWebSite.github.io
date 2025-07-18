<?php
// Hata ayıklama için hata raporlamasını aç
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Veritabanı bağlantı dosyasını dahil et
require_once 'src/config/database.php';

// Haberleri veritabanından çek
$sql = "SELECT * FROM haberler ORDER BY eklenme_tarihi DESC";
$haberler_result = $pdo->query($sql);

// Haberler dizisini oluşturma
$haberler = [];
if ($haberler_result->rowCount() > 0) {
    while ($row = $haberler_result->fetch(PDO::FETCH_ASSOC)) {
        $haberler[] = $row; // Her haberi diziye ekle
    }
}

// En son eklenen 5 haberi çek (slayt için)
$slayt_sql = "SELECT id, baslik, foto_url FROM haberler ORDER BY eklenme_tarihi DESC LIMIT 5";
$slayt_result = $pdo->query($slayt_sql);

// Slayt haberler dizisini oluşturma
$slayt_haberler = [];
if ($slayt_result->rowCount() > 0) {
    while ($row = $slayt_result->fetch(PDO::FETCH_ASSOC)) {
        $slayt_haberler[] = $row; // Her slayt haberini diziye ekle
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png"/>   <!-- favicon ekleme -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENTINELX - Haberler</title>
    <link rel="stylesheet" href="style.css"> <!-- Harici stil dosyası -->
</head>
<body>

<header>
    <!-- Ana sayfaya dönüş butonu -->
    <a href="index.html" class="back-button">&#8592; Geri</a>
</header>
<br>
<br>
<br>
<br>
<!-- Slayt gösterisi alanı -->
<div class="slideshow-container">
    <?php foreach ($slayt_haberler as $haber): ?>
        <div class="mySlides fade" onclick="location.href='haber.php?id=<?php echo $haber['id']; ?>'">
            <img src="<?php echo htmlspecialchars($haber['foto_url']); ?>" alt="<?php echo htmlspecialchars($haber['baslik']); ?>">
            <div class="info">
                <div class="text"><?php echo htmlspecialchars($haber['baslik']); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <!-- Önceki slayt -->
    <a class="next" onclick="plusSlides(1)">&#10095;</a> <!-- Sonraki slayt -->
</div>

<!-- Tüm haber kartları listesi -->
<div class="news-list">
    <?php foreach ($haberler as $haber): ?>
        <div class="card" onclick="location.href='haber.php?id=<?php echo $haber['id']; ?>'">
            <img src="<?php echo htmlspecialchars($haber['foto_url']); ?>" alt="<?php echo htmlspecialchars($haber['baslik']); ?>">
            <div class="info">
                <h1><?php echo htmlspecialchars($haber['baslik']); ?></h1>
                <p class="tarih">Eklenme Tarihi: <?php echo htmlspecialchars($haber['eklenme_tarihi']); ?></p>
                <a href="haber.php?id=<?php echo $haber['id']; ?>"><button>Haberi Oku</button></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Slayt gösterisi için JS dosyası -->
<script src="haber.js"></script>
</body>
</html>


