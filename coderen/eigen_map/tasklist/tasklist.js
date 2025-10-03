$(document).ready(function() {
    $('.task-toggle').on('change', function() {
        let checkbox = $(this); 
        let taskId = checkbox.data('id'); 

    $.post('action_tasklist.php', { task_id: taskId }, function() { 
        let container = checkbox.closest('.checklist-structure');

        let label = container.find('label'); 
            label.toggleClass('done', checkbox.is(':checked')); 
         
        let date = container.find('.task-date'); 
            date.toggleClass('done', checkbox.is(':checked')); 
        }); 
    }); 
});

document.querySelectorAll(".clickable-row").forEach(row => {
    row.addEventListener("click", function() {
        window.location.href = this.dataset.url;
    });
});


/* Dit stuk JQuery code heeft een andere volgorde of vorm
$(document).ready(function () {
    $('.task-toggle').on('change', function () {
        let checkbox = $(this);
        let taskId = checkbox.data('id');

        $.post('action_tasklist.php', { task_id: taskId }, function () {
            let container = checkbox.closest('.checklist-structure');

            // Titel (label) aanpassen
            let label = container.find('label');
            label.toggleClass('done', checkbox.is(':checked'));

            // Datum (p.task-date) aanpassen
            let date = container.find('.task-date');
            date.toggleClass('done', checkbox.is(':checked'));
        });
    });
});
*/
