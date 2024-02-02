// import "./bootstrap.js";

document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");
    const pseudoFilter = document.getElementById("pseudo-filter");
    const idFilter = document.getElementById("id-filter");

    if (pseudoFilter && idFilter) {
        rows.forEach((row) => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });

        pseudoFilter.addEventListener("input", function () {
            const filterValue = pseudoFilter.value.toLowerCase();
            rows.forEach((row) => {
                const pseudo = row
                    .querySelector("td:first-child")
                    .textContent.toLowerCase();
                if (pseudo.includes(filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        idFilter.addEventListener("input", function () {
            const filterValue = idFilter.value.toLowerCase();
            rows.forEach((row) => {
                const id = row
                    .querySelector("td:nth-child(3)")
                    .textContent.toLowerCase();
                if (id.includes(filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    }
});
