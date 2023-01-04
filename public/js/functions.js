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

// Open menu sub menu in navbar for mobile
function unfoldMobileMenu() {
  const menuItem = document.getElementById('menu-sub-mobile');

  menuItem.classList.toggle('hidden');
  menuItem.classList.toggle('menu-animation');
}

// Mobile image carousel (dove siamo)
let slideIndex = 0;

function imageSlider1() {
  const mobileImg = document.getElementsByClassName('mobile-img');

  for (let i = 0; i < mobileImg.length; i++) {
    mobileImg[i].style.display = "none";
  }
  mobileImg[slideIndex].style.display = "inline-flex";
  slideIndex++;
  if (slideIndex >= mobileImg.length) {
      slideIndex = 0;
  }
  setTimeout(imageSlider1, 4000);
}

// Mobile image carousel (dove footer)
let slideIndex2 = 0;

function imageSlider2() {
  const mobileImgFooter = document.getElementsByClassName('mobile-img-footer');

  for (let i = 0; i < mobileImgFooter.length; i++) {
    mobileImgFooter[i].style.display = "none";
  }
  mobileImgFooter[slideIndex2].style.display = "inline-flex";
  slideIndex2++;
  if (slideIndex2 >= mobileImgFooter.length) {
      slideIndex2 = 0;
  }
  setTimeout(imageSlider2, 4000);
}

// Open mobile menu
const openBtn = document.getElementById('menu-open-btn');
const closeBtn = document.getElementById('menu-close-btn');

function openMenu() {
  const mobileMenu = document.getElementById('mobile');

  openBtn.classList.add('hidden');
  closeBtn.classList.remove('hidden');
  mobileMenu.classList.remove('hidden');
}

// Close mobile menu
function closeMenu() {
  const menuItem = document.getElementById('menu-sub-mobile');
  const mobileMenu = document.getElementById('mobile');

  closeBtn.classList.add('hidden');
  openBtn.classList.remove('hidden');
  mobileMenu.classList.add('hidden');
  menuItem.classList.add('hidden');
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

// Lang Vars
const lang = document.getElementById('lang');
const langBody = document.getElementById('lang-body');
const openLang = document.getElementById('open-lang');
const openLangBody = document.getElementById('open-lang-body');
const closeLang = document.getElementById('close-lang');
const openLangSelect = document.getElementById('open-lang-select');

// Handle language switch UI
closeLang.addEventListener('click', () => {
  langBody.classList.add('hidden');
  openLangBody.classList.remove('hidden');
  lang.classList.add('hidden');
});

openLang.addEventListener('click', () => {
  langBody.classList.remove('hidden');
  openLangBody.classList.add('hidden');
});

openLangSelect.addEventListener('click', () => {
  openLangBody.classList.add('hidden');
  lang.classList.remove('hidden');
});

zoomImg();  // Zoom in images when clicked

backToTop();  // Scroll to top of page when clicked

imageSlider1(); // Start mobile image carousel for 'dove siamo' section

imageSlider2(); // Start mobile image carousel for 'footer' section