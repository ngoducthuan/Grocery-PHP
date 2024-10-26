let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}

let menuBtn = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');
// Listen click event
document.addEventListener('click', function(event) {
   // Not click navbar or menuBtn, hide navbar
   if (!navbar.contains(event.target) && !menuBtn.contains(event.target)) {
      navbar.classList.remove('active');
   }

   // Not click profile or userBtn, hide profile
   if (!profile.contains(event.target) && !userBtn.contains(event.target)) {
      profile.classList.remove('active');
   }
});