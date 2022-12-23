// Element variables
const galleryImg = document.getElementsByClassName('gallery-img');
const galleryBack = document.querySelector('#galleryBack');
const galleryForward = document.querySelector('#galleryForward');

let counter = 0;    // Images counter for progression or regression

// Hide all images
for (let i = 0; i < galleryImg.length; i++) {
    galleryImg[i].classList.add('hidden');
}

// Show first image when gallery first loads
galleryImg[counter].classList.remove('hidden');

// Listen for next image event
galleryForward.addEventListener('click', () => {
    counter++;
    if (counter > galleryImg.length - 1) {
        counter = 0;
        galleryImg[galleryImg.length - 1].classList.add('hidden');
    } else {
        galleryImg[counter - 1].classList.add('hidden');
    }
    galleryImg[counter].classList.remove('hidden');
});

// Listen for last image event
galleryBack.addEventListener('click', () => {
    counter--;
    if (counter < 0) {
        counter = galleryImg.length - 1;
        galleryImg[0].classList.add('hidden');
        galleryImg[galleryImg.length - 1].classList.remove('hidden');
    } else {
        galleryImg[counter + 1].classList.add('hidden');
    }
    galleryImg[counter].classList.remove('hidden');
});
