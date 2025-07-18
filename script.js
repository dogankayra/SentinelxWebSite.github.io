// Sayfa yüklendiğinde çalışacak fonksiyon
document.addEventListener('DOMContentLoaded', function() {
    // Haberleri almak için get_news.php'ye istek gönder
    fetch('get_news.php')
        .then(response => response.json()) // Gelen yanıtı JSON'a çevir
        .then(data => {
            const newsContainer = document.getElementById('news-container'); // Haberlerin ekleneceği alanı seç
            data.forEach(news => {
                const newsItem = document.createElement('article'); // Her haber için bir article oluştur
                
                const title = document.createElement('h2'); // Başlık etiketi oluştur
                title.textContent = news.baslik; // Başlığı ekle
                newsItem.appendChild(title);
                
                const content = document.createElement('p'); // İçerik etiketi oluştur
                content.textContent = news.icerik; // İçeriği ekle
                newsItem.appendChild(content);
                
                if (news.foto_url) { // Eğer fotoğraf varsa
                    const image = document.createElement('img'); // Görsel etiketi oluştur
                    image.src = news.foto_url; // Görselin kaynağını ekle
                    newsItem.appendChild(image);
                }
                
                const date = document.createElement('small'); // Tarih etiketi oluştur
                date.textContent = `Eklenme Tarihi: ${news.eklenme_tarihi}`; // Eklenme tarihini ekle
                newsItem.appendChild(date);
                
                newsContainer.appendChild(newsItem); // Haberi ana konteynıra ekle
            });
        })
        .catch(error => console.error('Haberler yüklenirken hata oluştu:', error)); // Hata olursa konsola yaz
});