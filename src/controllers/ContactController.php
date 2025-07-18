<?php
// Veritabanı bağlantı dosyasını dahil et
require_once '../config/database.php';

// İletişim formu işlemlerini yöneten controller sınıfı
class ContactController {
    private $db; // Veritabanı bağlantı nesnesi

    // Sınıf başlatılırken veritabanı bağlantısı alınır
    public function __construct($database) {
        $this->db = $database;
    }

    // İletişim formu gönderimini işler
    public function submitContactForm($name, $email, $message) {
        // Girdi doğrulaması yapılır
        if ($this->validateInput($name, $email, $message)) {
            // Doğruysa veritabanına kaydedilir
            $this->saveToDatabase($name, $email, $message);
            return "Mesajınız başarılı bir şekilde gönderildi!";
        } else {
            // Eksik veya hatalıysa uyarı döner
            return "Lütfen formu tam doldurun.";
        }
    }

    // Formdan gelen verilerin doğruluğunu kontrol eder
    private function validateInput($name, $email, $message) {
        // Tüm alanlar dolu mu ve e-posta geçerli mi kontrol edilir
        return !empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Doğrulanan verileri veritabanına kaydeder
    private function saveToDatabase($name, $email, $message) {
        $stmt = $this->db->prepare("INSERT INTO iletisim_form (isim, email, mesaj) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }
}

// Veritabanı bağlantısını oluştur ve ContactController örneğini oluştur
$contactController = new ContactController($pdo);
?>