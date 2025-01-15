document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");

    searchForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const searchTerm = searchInput.value.trim();

        // Send an AJAX request to search.php
        if (searchTerm !== "") {
            fetch("search.php", {
                method: "POST",
                body: new URLSearchParams({ search: searchTerm }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .then(response => response.json())
            .then(data => displaySearchResults(data));
        }
    });

    function displaySearchResults(results) {
        // Clear previous results
        searchResults.innerHTML = "";

        if (results.length > 0) {
            const ul = document.createElement("ul");

            results.forEach(result => {
                const li = document.createElement("li");
                li.textContent = result;
                li.addEventListener("click", function () {
                    // Redirect to restaurant_details.php with the selected restaurant name
                    window.location.href = `restaurant_details.php?name=${result}`;
                });
                ul.appendChild(li);
            });

            searchResults.appendChild(ul);
        } else {
            searchResults.textContent = "No results found.";
        }
    }
});
