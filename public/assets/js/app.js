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
    });
}

let logHeader = document.getElementById('bloc-cnx-hd');
let blocHeader = document.getElementById('bloc-cnx');
if (logHeader){
    logHeader.addEventListener("click", () => {
        console.log(blocHeader.style.display);
        if (blocHeader.style.display != "block"){
            blocHeader.style.display = "block";
        }else {
            blocHeader.style.display = "none";
        }
    })
}
