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
