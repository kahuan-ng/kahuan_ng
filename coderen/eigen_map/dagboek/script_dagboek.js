 document.querySelectorAll(".clickable-row").forEach(row => {
            row.addEventListener("click", function() {
                window.location.href = this.dataset.url;
            });
        });