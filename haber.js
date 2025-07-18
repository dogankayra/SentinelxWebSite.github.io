let slideIndex = 0;
showSlides(slideIndex);

// Slaytları belirli bir süre sonra otomatik olarak geçiş yapacak şekilde ayarla
setInterval(function() { showSlides(slideIndex += 1); }, 3000); // Her 3 saniyede bir slayt değiştir

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides"); // Tüm slaytları al
    if (n >= slides.length) {slideIndex = 0}    // Son slayttan sonra başa dön
    if (n < 0) {slideIndex = slides.length - 1} // İlk slayttan önce sona git
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  // Tüm slaytları gizle
    }
    slides[slideIndex].style.display = "block";  // Sadece aktif slaytı göster
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}