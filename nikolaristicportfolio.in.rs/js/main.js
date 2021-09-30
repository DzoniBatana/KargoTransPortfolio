window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY > 0 );
});







function toggleMenu(){
    const menuToggle = document.querySelector('.burger');
    const navigation = document.querySelector('.nav-links');
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}



const navSlide = () => 
            {
                const burger = document.querySelector('.burger');
                const nav = document.querySelector('.nav-links');
                const navLinks = document.querySelectorAll('.nav-links li');
            
                burger.addEventListener('click', () => {
                    nav.classList.toggle('nav-active');
            
                    navLinks.forEach((link, index) =>
                {
                    if (link.style.animation){
                        link.style.animation = ''
                    }
                    else{
                        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
                    }
                });
            
                burger.classList.toggle('toggle');
                });
            
                
            }
            
            navSlide();







//galerija
$(document).ready(function(){
    $(".fancybox").fancybox({
          openEffect: "none",
          closeEffect: "none"
      });
      
      $(".zoom").hover(function(){
          
          $(this).addClass('transition');
      }, function(){
          
          $(this).removeClass('transition');
      });
  });