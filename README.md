# SentinelX Web Uygulaması / SentinelX Web Application

---

## Türkçe

### Genel Bakış
SentinelX Web Uygulaması, kullanıcıların SentinelX ekibiyle iletişime geçmesini kolaylaştırmak için tasarlanmış bir web uygulamasıdır. Kullanıcılar, iletişim formu aracılığıyla mesaj gönderebilir ve bu mesajlar veritabanında saklanır. Ayrıca ekip için haberler paylaşılabilir ve bu haberler de veritabanında saklanır. Ekip üyeleri hakkında bilgiler de uygulama üzerinden görüntülenebilir.

### Proje Yapısı
Proje aşağıdaki gibi organize edilmiştir:

```
sentinelx-web-app
└── img
│       └── logo.png      # Uygulamada kullanılan logo
│
├── src
│   ├── config
│   │   └── database.php  # Veritabanı bağlantı ayarları
│   ├── controllers
│   │   └── ContactController.php  # İletişim formu işlemleri
│   ├── models
│   │   └── Contact.php   # İletişim verisinin yapısı
│   └── views
│       └── contact.php   # İletişim formunu gösterir ve mesajları işler
│ 
├── ekip
│   └── ...               # Ekip üyeleriyle ilgili profil fotoğrafları (varsa)
│
├── index.html            # Web uygulamasının ana HTML dosyası
├── index.css             # HTML elemanlarının stilleri
├── index.js              # Ön yüz mantığı ve form gönderimi
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

#### Önemli Sayfalar ve Dosyalar

- **haberler.php**: Tüm haberlerin kartlar halinde ve üstte slayt gösterisiyle listelendiği sayfa. Her habere tıklayarak detayına ulaşabilirsiniz.
- **haber.php**: Seçilen bir haberin başlık, içerik, görsel ve eklenme tarihiyle detaylı olarak gösterildiği sayfa.
- **ekip.php**: Ekip üyelerinin fotoğraf, isim, bölüm, görev ve iletişim bilgileriyle listelendiği sayfa.
- **ekip/**: Ekip üyeleriyle ilgili ek PHP dosyalarını veya bileşenlerini barındıran klasör.
- **get_news.php**: Haberleri JSON formatında sunan ve AJAX ile dinamik olarak haberleri çeken API dosyasıdır.
- **style.css / haber.css**: Sayfaların görsel düzenini sağlayan stil dosyalarıdır.
- **haber.js**: Slayt gösterisi ve haberler sayfası için gerekli JavaScript fonksiyonlarını içerir.
- **404.shtml**: Projede bir sayfa bulunamazsa gösterilecek özel hata sayfasıdır. Kullanıcıya "404 - Sayfa Bulunamadı" mesajı gösterir.

### Kurulum Talimatları

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

### Kullanım
- Web uygulamasındaki iletişim formuna gidin.
- Adınızı, e-posta adresinizi ve mesajınızı girin.
- Formu göndererek mesajınızı SentinelX ekibine iletebilirsiniz.
- Haberler ve ekip sayfalarına menüden ulaşabilirsiniz.

---

## English

### Overview
SentinelX Web Application is designed to make it easy for users to contact the SentinelX team. Users can send messages via the contact form, and these messages are stored in a database. News for the team can also be shared and stored in the database. Information about team members can be viewed through the application.

### Project Structure
The project is organized as follows:

```
sentinelx-web-app

└── img
│       └── logo.png      # Logo used in the application
│
├── src
│   ├── config
│   │   └── database.php  # Database connection settings
│   ├── controllers
│   │   └── ContactController.php  # Contact form operations
│   ├── models
│   │   └── Contact.php   # Contact data structure
│   └── views
│       └── contact.php   # Displays the contact form and handles messages
│
├── ekip
│   └── ...               # Profil pictures related to team members (if any)
│
├── index.html            # Main HTML file of the web application
├── index.css             # Styles for HTML elements
├── index.js              # Frontend logic and form submission
├── haberler.php          # Page listing all news and the slideshow
├── haber.php             # Page showing the details of a single news item
├── ekip.php              # Page listing team members
├── get_news.php          # API file returning news as JSON (for AJAX)
├── style.css             # General stylesheet
├── haber.css             # Special stylesheet for news detail page
├── haber.js              # JavaScript file for slideshow and news
├── .htaccess             # Apache server configuration
├── composer.json         # Composer configuration file
├── 404.shtml             # 404 error page (for not found pages)
└── README.md             # Project documentation
```

#### Key Pages and Files

- **haberler.php**: Page listing all news as cards and with a slideshow at the top. You can click on any news to see its details.
- **haber.php**: Page showing the details of a selected news item, including title, content, image, and date.
- **ekip.php**: Page listing team members with their photo, name, department, role, and contact information.
- **ekip/**: Folder containing additional PHP files or components related to team members.
- **get_news.php**: API file that provides news in JSON format and is used for dynamic AJAX news loading.
- **style.css / haber.css**: Stylesheets for the visual layout of the pages.
- **haber.js**: JavaScript functions for the slideshow and news page.
- **404.shtml**: Custom error page shown when a page is not found. Displays "404 - Page Not Found" message.

### Installation Instructions

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd sentinelx-web-app
   ```

2. **Install Dependencies**
   Make sure Composer is installed, then run:
   ```bash
   composer install
   ```

3. **Database Configuration**
   - Create a MySQL database for the application.
   - Update the database connection settings in `src/config/database.php` with your own information.

4. **Run the Application**
   - Use a local server like XAMPP or MAMP to run the application.
   - Place the project folder in your server's root directory (e.g., `htdocs` for XAMPP).
   - Open `http://localhost/sentinelx-web-app/public/index.html` in your web browser.

### Usage
- Go to the contact form in the web application.
- Enter your name, email address, and message.
- Submit the form to send your message to the SentinelX team.
- You can access the news and team
