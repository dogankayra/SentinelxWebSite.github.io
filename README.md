# README.md

# SentinelX Web Uygulaması

## Genel Bakış
SentinelX Web Uygulaması, kullanıcıların SentinelX ekibiyle iletişime geçmesini kolaylaştırmak için tasarlanmış bir web uygulamasıdır. Kullanıcılar, iletişim formu aracılığıyla mesaj gönderebilir ve bu mesajlar veritabanında saklanır. Ayrıca ekip için haberler paylaşılabilir ve bu haberler de veritabanında saklanır. Ekip üyeleri hakkında bilgiler de uygulama üzerinden görüntülenebilir.

## Proje Yapısı
Proje aşağıdaki gibi organize edilmiştir:

```
sentinelx-web-app
├── public
│   ├── index.html        # Web uygulamasının ana HTML dosyası
│   ├── index.css         # HTML elemanlarının stilleri
│   ├── index.js          # Ön yüz mantığı ve form gönderimi
│   └── img
│       └── logo.png      # Uygulamada kullanılan logo
├── src
│   ├── config
│   │   └── database.php  # Veritabanı bağlantı ayarları
│   ├── controllers
│   │   └── ContactController.php  # İletişim formu işlemleri
│   ├── models
│   │   └── Contact.php   # İletişim verisinin yapısı
│   └── views
│       └── contact.php   # İletişim formunu gösterir ve mesajları işler
├── ekip
│   └── ...               # Ekip üyeleriyle ilgili ek PHP dosyaları (varsa)
├── haberler.php          # Tüm haberlerin ve slayt gösterisinin listelendiği sayfa
├── haber.php             # Tek bir haberin detayını gösteren sayfa
├── ekip.php              # Ekip üyelerinin listelendiği sayfa
├── get_news.php          # Haberleri JSON olarak dönen API dosyası (AJAX için)
├── style.css             # Genel stil dosyası
├── haber.css             # Haber detay sayfası için özel stil dosyası
├── haber.js              # Slayt gösterisi ve haberler için JavaScript dosyası
├── .htaccess             # Apache sunucu yapılandırması
├── composer.json         # Composer yapılandırma dosyası
├── 404.shtml             # 404 hata sayfası (bulunamayan sayfalar için)
└── README.md             # Proje dokümantasyonu
```

### Önemli Sayfalar ve Dosyalar

- **haberler.php**: Tüm haberlerin kartlar halinde ve üstte slayt gösterisiyle listelendiği sayfa. Her habere tıklayarak detayına ulaşabilirsiniz.
- **haber.php**: Seçilen bir haberin başlık, içerik, görsel ve eklenme tarihiyle detaylı olarak gösterildiği sayfa.
- **ekip.php**: Ekip üyelerinin fotoğraf, isim, bölüm, görev ve iletişim bilgileriyle listelendiği sayfa.
- **ekip/**: Ekip üyeleriyle ilgili ek PHP dosyalarını veya bileşenlerini barındıran klasör.
- **get_news.php**: Haberleri JSON formatında sunan ve AJAX ile dinamik olarak haberleri çeken API dosyasıdır.
- **style.css / haber.css**: Sayfaların görsel düzenini sağlayan stil dosyalarıdır.
- **haber.js**: Slayt gösterisi ve haberler sayfası için gerekli JavaScript fonksiyonlarını içerir.
- **404.shtml**: Projede bir sayfa bulunamazsa gösterilecek özel hata sayfasıdır. Kullanıcıya "404 - Sayfa Bulunamadı" mesajı gösterir.

## Kurulum Talimatları

1. **Depoyu Klonlayın**
   ```bash
   git clone <repository-url>
   cd sentinelx-web-app
   ```

2. **Bağımlılıkları Kurun**
   Composer yüklü olduğundan emin olun, ardından:
   ```bash
   composer install
   ```

3. **Veritabanı Yapılandırması**
   - Uygulama için bir MySQL veritabanı oluşturun.
   - `src/config/database.php` dosyasındaki veritabanı bağlantı ayarlarını kendi bilgilerinizle güncelleyin.

4. **Uygulamayı Çalıştırın**
   - Uygulamayı çalıştırmak için XAMPP veya MAMP gibi bir yerel sunucu kullanabilirsiniz.
   - Proje klasörünü sunucunun kök dizinine (ör. XAMPP için `htdocs`) yerleştirin.
   - Web tarayıcınızda `http://localhost/sentinelx-web-app/public/index.html` adresine gidin.

## Kullanım
- Web uygulamasındaki iletişim formuna gidin.
- Adınızı, e-posta adresinizi ve mesajınızı girin.
- Formu göndererek mesajınızı SentinelX ekibine iletebilirsiniz.
- Haberler ve ekip sayfalarına menüden ulaşabilirsiniz.
