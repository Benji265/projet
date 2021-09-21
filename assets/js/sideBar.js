function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}

const buttonOpenNav = document.getElementById('openNav');
const buttonCloseNav = document.getElementById('closeNav');

buttonOpenNav.addEventListener('click', openNav);
buttonCloseNav.addEventListener('click', closeNav);