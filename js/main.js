const navMenu = document.getElementById('nav-menu'),
      toggleMenu = document.getElementById('nav-toggle'),
      closeMenu = document.getElementById('nav-close')

/*SHOW*/ 
toggleMenu.addEventListener('click', ()=>{
    navMenu.classList.toggle('show')
})

/*HIDDEN*/
closeMenu.addEventListener('click', ()=>{
    navMenu.classList.remove('show')
})

/*===== ACTIVE AND REMOVE MENU =====*/
const navLink = document.querySelectorAll('.nav__link');   

function linkAction(){
  /*Active link*/
  navLink.forEach(n => n.classList.remove('active'));
  this.classList.add('active');
  
  /*Remove menu mobile*/
  navMenu.classList.remove('show')
}
navLink.forEach(n => n.addEventListener('click', linkAction));

(function(){
  const divs = document.getElementsByClassName('card__image');
  for (let i = 0; i < divs.length; i++) {
      const div = divs[i];
      const img = div.getElementsByTagName('img')[0]
                      .getAttribute('src');
      div.style.backgroundImage = 'url(' + img + ')';
  }
}());

const items = document.querySelectorAll(".accordion a");
 
function toggleAccordion(){
  this.classList.toggle('activeFaq');
  this.nextElementSibling.classList.toggle('activeFaq');
}
 
items.forEach(item => item.addEventListener('click', toggleAccordion));

document.getElementById("establecimiento").addEventListener('click', function () {
  document.getElementById("establecimiento").style.border = "3px dotted black";
  document.getElementById("establecimiento").style.background = "#3664F4";
  document.getElementById("establecimiento").style.color = "white";

  document.getElementById("asociacion").style.border = "1px solid #3664F4";
  document.getElementById("asociacion").style.background = "transparent";
  document.getElementById("asociacion").style.color = "black";
});

document.getElementById("asociacion").addEventListener('click', function () {
  document.getElementById("asociacion").style.border = "3px dotted black";
  document.getElementById("asociacion").style.background = "#3664F4";
  document.getElementById("asociacion").style.color = "white";

  document.getElementById("establecimiento").style.border = "1px solid #3664F4";
  document.getElementById("establecimiento").style.background = "transparent";
  document.getElementById("establecimiento").style.color = "black";
});


if (screen.width > 768) {
  window.addEventListener('scroll', function(evt) {
    console.log(window.scrollY)
    if(window.scrollY > 0 && window.scrollY < 100) {
      document.getElementById('inicio-id').classList.add('active');
      document.getElementById('about-id').classList.remove('active');
      document.getElementById('faqs-id').classList.remove('active');
      document.getElementById('contact-id').classList.remove('active');
    }

    if(window.scrollY > 2235 && window.scrollY < 2325) {
      document.getElementById('about-id').classList.add('active');
      document.getElementById('inicio-id').classList.remove('active');
      document.getElementById('faqs-id').classList.remove('active');
      document.getElementById('contact-id').classList.remove('active');
    }

    if(window.scrollY > 2870 && window.scrollY < 3000) {
      document.getElementById('faqs-id').classList.add('active');
      document.getElementById('inicio-id').classList.remove('active');
      document.getElementById('about-id').classList.remove('active');
      document.getElementById('contact-id').classList.remove('active');
    }

    if(window.scrollY > 3290) {
      document.getElementById('contact-id').classList.add('active');
      document.getElementById('inicio-id').classList.remove('active');
      document.getElementById('faqs-id').classList.remove('active');
      document.getElementById('about-id').classList.remove('active');
    }

  });
} else {
  alert("es movil");
}