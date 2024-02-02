document.addEventListener("DOMContentLoaded", function () {
    const clickableRows = document.querySelector(".list-table tbody");
    const pseudoFilterInput = document.getElementById("pseudo-filter");
    const idFilterInput = document.getElementById("id-filter");
    const emailFilterInput = document.getElementById("email-filter");
    const specieFilter = document.getElementById("specie-filter");
    const idFilter = document.getElementById("id-filter");
    const locationFilter = document.getElementById("location-filter");

    clickableRows.addEventListener("click", function (event) {
        if (event.target.classList.contains("clickable-row")) {
            window.location.href = event.target.dataset.href;
        }
    });

    pseudoFilterInput.addEventListener("input", function () {
        const filterValue = pseudoFilterInput.value.toLowerCase();
        Array.from(clickableRows.children).forEach((row) => {
            const pseudo = row.children[0].textContent.toLowerCase();
            row.style.display = pseudo.includes(filterValue) ? "" : "none";
        });
    });

    idFilterInput.addEventListener("input", function () {
        const filterValue = idFilterInput.value.toLowerCase();
        Array.from(clickableRows.children).forEach((row) => {
            const id = row.children[2].textContent.toLowerCase();
            row.style.display = id.includes(filterValue) ? "" : "none";
        });
    });

    emailFilterInput.addEventListener("input", function () {
        const filterValue = emailFilterInput.value.toLowerCase();
        Array.from(clickableRows.children).forEach((row) => {
            const email = row.children[1].textContent.toLowerCase();
            row.style.display = email.includes(filterValue) ? "" : "none";
        });
    });

    function filterTable() {
        const specieValue = specieFilter.value.toLowerCase();
        const idValue = idFilter.value.toLowerCase();
        const locationValue = locationFilter.value.toLowerCase();

        Array.from(clickableRows.children).forEach(function (row) {
            const specieText = row.children[0].textContent.toLowerCase();
            const locationText = row.children[1].textContent.toLowerCase();
            const idText = row.children[2].textContent.toLowerCase();

            const specieMatch = specieText.includes(specieValue);
            const locationMatch = locationText.includes(locationValue);
            const idMatch = idText.includes(idValue);

            if (specieMatch && locationMatch && idMatch) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    specieFilter.addEventListener("input", filterTable);
    idFilter.addEventListener("input", filterTable);
    locationFilter.addEventListener("input", filterTable);
});
