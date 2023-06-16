/*
var closeBtn = document.querySelector('#closeBtn')
var modal = document.querySelector('.modal')
var btnFiesta = document.querySelector('.btnFiesta')
closeBtn.addEventListener('click', closeModal)
btnFiesta.addEventListener('click', openModal)

function openModal(){
    console.log('clicando')
    if(modal == 'block'){
        console.log('click')
        modal.style.display = 'none'
    }else{
        modal.style.display = 'block'
    }
}
function closeModal(){
    console.log('clicando')
    if(modal == 'none'){
        console.log('click')
        modal.style.display = 'block'
    }else{
        modal.style.display = 'none'
    }
}
*/
//vitrine-destaque
//slide
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

//slide1
var slideIndex = 1;
showSlides1(slideIndex);

function plusSlides1(n) {
  showSlides1(slideIndex += n);
}

function currentSlide1(n) {
  showSlides1(slideIndex = n);
}

function showSlides1(n) {
  var i;
  var slides1 = document.getElementsByClassName("slide1");
  var dots1 = document.getElementsByClassName("dot1");

  if (n > slides1.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides1.length}
  for (i = 0; i < slides1.length; i++) {
      slides1[i].style.display = "none";  
  }
  for (i = 0; i < dots1.length; i++) {
      dots1[i].className = dots1[i].className.replace(" active", "");
  }
  slides1[slideIndex-1].style.display = "block";  
  dots1[slideIndex-1].className += " active";
}
//slide2
var slideIndex2 = 1;
showSlides2(slideIndex);

function plusSlides2(n) {
  showSlides2(slideIndex2 += n);
}

function currentSlide2(n) {
  showSlides2(slideIndex2 = n);
}

function showSlides2(n) {
  var i;
  var slides2 = document.getElementsByClassName("slide2");
  var dots2 = document.getElementsByClassName("dot2");

  if (n > slides2.length) {slideIndex2 = 1}    
  if (n < 1) {slideIndex2 = slides2.length}
  for (i = 0; i < slides2.length; i++) {
      slides2[i].style.display = "none";  
  }
  for (i = 0; i < dots2.length; i++) {
      dots2[i].className = dots2[i].className.replace(" active", "");
  }
  slides2[slideIndex2-1].style.display = "block";  
  dots2[slideIndex2-1].className += " active";
}
//contact
var y = document.querySelector('#contact')
var contact = document.querySelector('.contato')
y.addEventListener('click', scrollWin)

function scrollWin(){
  window.scroll({
    top: 2100,
    left: 0,
    behavior: 'smooth'
  });
}
//scroll-top-date(goTOTop)
var x = document.querySelector('#scroll-top-img')

x.addEventListener('click', scrollTop)

function scrollTop(){
  window.scroll({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
};
//date
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  var t = d.toLocaleTimeString();
  var dat = d.toLocaleDateString();
  //var day = d.getVarDate()
  document.querySelector(".scroll-top-date").innerHTML = t;
  document.querySelector(".scroll-top-date").innerHTML = dat + '<br>' + t;
}