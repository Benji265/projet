function compte_a_rebours() {

    const selectTimer = document.querySelectorAll('th[id=timer]');
    selectTimer.forEach(element => {

        var actualDate = new Date();
        var event = element.dataset.timebuilt * 1000
        var total_secondes = (event - actualDate) / 1000;

        if (total_secondes > 0) {
            var jours = Math.floor(total_secondes / (60 * 60 * 24));
            var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
            var minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
            var secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));

            var mot_jour = "jours";
            var mot_heure = "heures";
            var mot_minute = "minutes";
            var mot_seconde = "secondes";

            if (jours == 0) {
                jours = '';
                mot_jour = '';
            } else if (jours == 1) {
                mot_jour = "jour";
            }

            if (heures == 0) {
                heures = '';
                mot_heure = '';
            } else if (heures == 1) {
                mot_heure = "heure";
            }

            if (minutes == 0) {
                minutes = '';
                mot_minute = '';
            } else if (minutes == 1) {
                mot_minute = "minute";
            }

            if (secondes == 0) {
                secondes = '';
                mot_seconde = '';
            } else if (secondes == 1) {
                mot_seconde = "seconde";
            }

            element.innerHTML = jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + secondes + ' ' + mot_seconde;

        } else {
            document.location.replace('buildings.php');
        }

    });

    setTimeout(compte_a_rebours, 1000);
}

compte_a_rebours();