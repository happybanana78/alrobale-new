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
      document.body.style.overflow = 'visible'; // Make main scroll bar visible again
      modalBg.classList.add('hidden');
      modalBody.classList.add('hidden');
    });

    // Load image into modal on image click
    for (let i = 0; i < images.length; i++) {
      images[i].addEventListener('click', () => {
        document.body.style.overflow = 'hidden';  // Hide main scroll bar
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

// Scroll up to top
function backToTop() {
  const topBtn = document.getElementById('to-top-btn');

  topBtn.addEventListener('click', () => {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
  });
}

// Open menu sub menu in navbar
function unfoldMenu() {
  const menuItem = document.getElementById('menu-sub-menu');

  menuItem.classList.toggle('hidden');
  menuItem.classList.toggle('menu-animation');
}

window.initMap = initMap; // Intialize google maps map

window.addEventListener('scroll', () => {
  const topBtn = document.getElementById('to-top-btn');

  if (window.scrollY >= 900) {
    topBtn.classList.remove('hidden');
  } else {
    topBtn.classList.add('hidden');
  }
}); 

zoomImg();  // Zoom in images when clicked

backToTop();  // Scroll to top of page when clicked