<?php
// Contact model sınıfı: iletişim formu verilerini temsil eder
class Contact {
    private $name;    // Kullanıcının adı
    private $email;   // Kullanıcının e-posta adresi
    private $message; // Kullanıcının mesajı

    // Sınıf başlatılırken veriler atanır
    public function __construct($name, $email, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    // Ad bilgisini döndürür
    public function getName() {
        return $this->name;
    }

    // E-posta bilgisini döndürür
    public function getEmail() {
        return $this->email;
    }

    // Mesaj bilgisini döndürür
    public function getMessage() {
        return $this->message;
    }

    // Veritabanına iletişim formu verilerini kaydeder
    public function saveToDatabase($pdo) {
        $stmt = $pdo->prepare("INSERT INTO iletisim_form (isim, email, mesaj) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':message', $this->message);
        return $stmt->execute();
    }
}
?>