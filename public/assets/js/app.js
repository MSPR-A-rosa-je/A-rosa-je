let menuBurger = document.querySelector('#burger-menu div');
let navBar = document.querySelector('header.header nav');

if (menuBurger){
    menuBurger.addEventListener("click", () => {
         if (navBar.style.display != "block"){
             navBar.style.display = "block";
        }else {
            navBar.style.display = "none";
        }
        menuBurger.classList.toggle('burger-active');
        console.log(menuBurger);
    });
}
