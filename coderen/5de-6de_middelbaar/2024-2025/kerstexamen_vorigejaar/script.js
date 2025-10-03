$(document).ready(function () {
    $(".clickable-row").click(function (event) {
        // Voorkom klikken op links binnen de rij
        if (!$(event.target).is("a")) {
            window.location.href = $(this).data("url");
        }
    });
});
