// Initialize and add the map
function initMap() {
    // The location of Uluru
    const alrobale = { lat: 45.75745, lng: 9.55686 };
    // The map, centered at alrobale
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: alrobale,
    });
    // The marker, positioned at alrobale
    const marker = new google.maps.Marker({
      position: alrobale,
      map: map,
    });
  }
  
  // Image zoom
  function zoomImg() {
    const images = document.getElementsByClassName('where-img');
    const modalBg = document.getElementById('img-modal-bg');
    const modalBody = document.getElementById('img-modal');
    const scaledImg = document.getElementById('scaled-img');

    // Hide modal at page load
    modalBg.classList.add('hidden');
    modalBody.classList.add('hidden');

    // Close modal on bg click
    modalBg.addEventListener('click', () => {
      modalBg.classList.add('hidden');
      modalBody.classList.add('hidden');
    });

    // Load image into modal on image click
    for (let i = 0; i < images.length; i++) {
      images[i].addEventListener('click', () => {
        modalBg.classList.remove('hidden');
        modalBody.classList.remove('hidden');
        scaledImg.src = images[i].src;
      });
    }
  }

// Scroll to page section
function goToSection(id) {
  $('html, body').animate({
    scrollTop: $(id).offset().top
}, 1000);
}

window.initMap = initMap;

zoomImg();