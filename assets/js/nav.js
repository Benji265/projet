const selectNavButton = document.querySelectorAll("a[data-nav]");

SortContent();

//Fonction qui permet de trier l'affichage de l'index
function SortContent() {
    selectNavButton.forEach(element => {
        element.addEventListener("click", function () {
            //Si on clique sur accueil on affiche que les element concerner
            if (this.dataset.nav == "accueil") {
                let selectAccueilNav = document.getElementById("accueilNav");
                let selectScreenNav = document.getElementById("screenNav");
                let selectInscNav = document.getElementById("inscNav");
                selectAccueilNav.classList.remove("d-none");
                selectScreenNav.classList.add("d-none");
                selectInscNav.classList.add("d-none");
            }
            //Si on clique sur ScreenShots on affiche que les element concerner
            if (this.dataset.nav == "screen") {
                let selectAccueilNav = document.getElementById("accueilNav");
                let selectScreenNav = document.getElementById("screenNav");
                let selectInscNav = document.getElementById("inscNav");
                selectAccueilNav.classList.add("d-none");
                selectScreenNav.classList.remove("d-none");
                selectInscNav.classList.add("d-none");
            }
            //Si on clique sur Inscription/Connexion on affiche que les element concerner
            if (this.dataset.nav == "insc") {
                let selectAccueilNav = document.getElementById("accueilNav");
                let selectScreenNav = document.getElementById("screenNav");
                let selectInscNav = document.getElementById("inscNav");
                selectAccueilNav.classList.add("d-none");
                selectScreenNav.classList.add("d-none");
                selectInscNav.classList.remove("d-none");
            }
        })
    });
}