document.addEventListener("DOMContentLoaded", function () {
    const clickableRows = document.querySelectorAll(".clickable-row");
    const pseudoFilterInput = document.getElementById("pseudo-filter");
    const idFilterInput = document.getElementById("id-filter");

    if (pseudoFilterInput && idFilterInput) {
        clickableRows.forEach((row) => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });

        pseudoFilterInput.addEventListener("input", function () {
            const filterValue = pseudoFilterInput.value.toLowerCase();
            clickableRows.forEach((row) => {
                const pseudo = row
                    .querySelector("td:first-child")
                    .textContent.toLowerCase();
                row.style.display = pseudo.includes(filterValue) ? "" : "none";
            });
        });

        idFilterInput.addEventListener("input", function () {
            const filterValue = idFilterInput.value.toLowerCase();
            clickableRows.forEach((row) => {
                const id = row
                    .querySelector("td:nth-child(3)")
                    .textContent.toLowerCase();
                row.style.display = id.includes(filterValue) ? "" : "none";
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const emailFilterInput = document.getElementById("email-filter");
    emailFilterInput.addEventListener("keyup", function () {
        const searchTerm = emailFilterInput.value.toLowerCase();
        const tableRows = document.querySelectorAll(".user-table tbody tr");
        tableRows.forEach(function (row) {
            const emailTd = row.querySelector("td:nth-child(2)");
            const email = emailTd.textContent.toLowerCase();
            row.style.display = email.includes(searchTerm) ? "" : "none";
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");

    rows.forEach((row) => {
        row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");
    const addressFilterInput = document.getElementById("address-filter");
    const cityFilterInput = document.getElementById("city-filter");
    const zipCodeFilterInput = document.getElementById("zip_code-filter");
    const userIdFilterInput = document.getElementById("user_id-filter");

    // Function to filter rows based on the input fields
    function filterRows() {
        const addressValue = addressFilterInput.value.toLowerCase();
        const cityValue = cityFilterInput.value.toLowerCase();
        const zipValue = zipCodeFilterInput.value.toLowerCase();
        const userIdValue = userIdFilterInput.value.toLowerCase();

        rows.forEach((row) => {
            const addressText = row
                .querySelector("td:nth-child(1)")
                .textContent.toLowerCase();
            const cityText = row
                .querySelector("td:nth-child(2)")
                .textContent.toLowerCase();
            const zipText = row
                .querySelector("td:nth-child(3)")
                .textContent.toLowerCase();
            const userIdText = row
                .querySelector("td:nth-child(5)")
                .textContent.toLowerCase();

            let isVisible = true;
            if (addressValue && !addressText.includes(addressValue)) {
                isVisible = false;
            }
            if (cityValue && !cityText.includes(cityValue)) {
                isVisible = false;
            }
            if (zipValue && !zipText.includes(zipValue)) {
                isVisible = false;
            }
            if (userIdValue && !userIdText.includes(userIdValue)) {
                isVisible = false;
            }
            row.style.display = isVisible ? "" : "none";
        });
    }

    // Event listeners for each filter input
    addressFilterInput.addEventListener("input", filterRows);
    cityFilterInput.addEventListener("input", filterRows);
    zipCodeFilterInput.addEventListener("input", filterRows);
    userIdFilterInput.addEventListener("input", filterRows);

    // Clickable rows functionality
    rows.forEach((row) => {
        row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");
    const idFilter = document.getElementById("id-filter");
    const addressFilter = document.getElementById("address-filter");
    const cityFilter = document.getElementById("city-filter");
    const zipCodeFilter = document.getElementById("zip_code-filter");
    const userIdFilter = document.getElementById("user_id-filter");
    const tableBody = document.getElementById("table-body");

    function filterRows() {
        const idValue = idFilter.value.toLowerCase();
        const addressValue = addressFilter.value.toLowerCase();
        const cityValue = cityFilter.value.toLowerCase();
        const zipCodeValue = zipCodeFilter.value.toLowerCase();
        const userIdValue = userIdFilter.value.toLowerCase();

        rows.forEach((row) => {
            const idText = row
                .querySelector("td:nth-child(4)")
                .textContent.toLowerCase();
            const addressText = row
                .querySelector("td:nth-child(1)")
                .textContent.toLowerCase();
            const cityText = row
                .querySelector("td:nth-child(2)")
                .textContent.toLowerCase();
            const zipCodeText = row
                .querySelector("td:nth-child(3)")
                .textContent.toLowerCase();
            const userIdText = row
                .querySelector("td:nth-child(5)")
                .textContent.toLowerCase();

            row.style.display =
                idText.includes(idValue) &&
                addressText.includes(addressValue) &&
                cityText.includes(cityValue) &&
                zipCodeText.includes(zipCodeValue) &&
                userIdText.includes(userIdValue)
                    ? ""
                    : "none";
        });
    }

    idFilter.addEventListener("input", filterRows);
    addressFilter.addEventListener("input", filterRows);
    cityFilter.addEventListener("input", filterRows);
    zipCodeFilter.addEventListener("input", filterRows);
    userIdFilter.addEventListener("input", filterRows);

    rows.forEach((row) => {
        row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const specieFilter = document.getElementById("specie-filter");
    const idFilter = document.getElementById("id-filter");
    const locationFilter = document.getElementById("location-filter");
    const user_idFilter = document.getElementById("user_id-filter");

    function filterTable() {
        const specieValue = specieFilter.value.toLowerCase();
        const idValue = idFilter.value.toLowerCase();
        const locationValue = locationFilter.value.toLowerCase();
        const userIdValue = user_idFilter.value.toLowerCase();

        document
            .querySelectorAll(".list-table tbody tr")
            .forEach(function (row) {
                const specieText = row.children[0].textContent.toLowerCase();
                const locationText = row.children[1].textContent.toLowerCase();
                const idText = row.children[2].textContent.toLowerCase();
                const userIdText = row.children[3].textContent.toLowerCase();

                const specieMatch = specieText.includes(specieValue);
                const locationMatch = locationText.includes(locationValue);
                const idMatch = idText.includes(idValue);
                const userIdMatch = userIdText.includes(userIdValue);

                if (specieMatch && locationMatch && idMatch && userIdMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
    }

    specieFilter.addEventListener("input", filterTable);
    idFilter.addEventListener("input", filterTable);
    locationFilter.addEventListener("input", filterTable);
    user_idFilter.addEventListener("input", filterTable);
});
