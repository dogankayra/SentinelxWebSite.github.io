<?php
// Hata ayıklama için hata raporlamasını aç
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Veritabanı bağlantı dosyasını dahil et
require_once 'src/config/database.php';

// Veritabanından ekip üyelerini seç
$sql = "SELECT isim, soyisim, bolum, gorev, linkedin, mail, instagram, profil_resmi FROM ekip_uyeleri";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ekipUyeleri = $stmt->fetchAll(PDO::FETCH_ASSOC); // Sonuçları dizi olarak al
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekip Üyeleri</title>
    <!-- Google Fonts ile özel font ekle -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans">
    <style>
        /* Sayfa genel stil ayarları */
        body {
            padding: 0;
            margin: 0;
            background: #046075;
            font-family: 'Josefin Sans', sans-serif;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-align: center;
            background: #fff;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .card h2 {
            margin-top: 10px;
            font-size: 24px;
        }
        .card p {
            margin: 5px 0;
            font-size: 18px;
            color: #333;
        }
        .card a {
            color: #0073b1;
            text-decoration: none;
        }
        .card a:hover {
            text-decoration: underline;
        }
        .back-button {
            position: absolute;
            left: 20px;
            top: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            background: #034a5a;
            padding: 10px 15px;
            border-radius: 50%;
            transition: background 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .back-button:hover {
            background: #02343a;
            transform: scale(1.1);
        }
        .back-button i {
            font-size: 24px;
            margin-right: 5px;
        }
        h1 {
            text-align: center;
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Ana sayfaya dönüş butonu -->
    <a href="index.html" class="back-button"><i class="fas fa-angle-left"></i> Geri</a>
    <h1>Ekip Üyeleri</h1>
    <div class="container">
        <?php
        // Eğer ekip üyesi varsa kart olarak göster
        if (count($ekipUyeleri) > 0) {
            // Her bir ekip üyesi için kart oluştur
            foreach ($ekipUyeleri as $uye) {
                echo "<div class='card'>
                        <img src='" . htmlspecialchars($uye["profil_resmi"]) . "' alt='" . htmlspecialchars($uye["isim"]) . " " . htmlspecialchars($uye["soyisim"]) . "'>
                        <h2>" . htmlspecialchars($uye["isim"]) . " " . htmlspecialchars($uye["soyisim"]) . "</h2>
                        <p><strong>Bölüm:</strong> " . htmlspecialchars($uye["bolum"]) . "</p>
                        <p><strong>Görev:</strong> " . htmlspecialchars($uye["gorev"]) . "</p>
                        <p><strong>LinkedIn:</strong> <a href='" . htmlspecialchars($uye["linkedin"]) . "'>Profil</a></p>
                        <p><strong>Mail:</strong> " . htmlspecialchars($uye["mail"]) . "</p>
                        <p><strong>Instagram:</strong> <a href='" . htmlspecialchars($uye["instagram"]) . "'>Profil</a></p>
                      </div>";
            }
        } else {
            // Hiç kayıt yoksa mesaj göster
            echo "<p style='text-align: center; color: #fff;'>Kayıt bulunamadı</p>";
        }
        ?>
    </div>
    <!-- Font Awesome ikonları için script -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>