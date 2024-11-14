$(document).ready(function() {
    $('.togglePaassword').click(function() {
        var input = $(this).siblings('input');
        var icon = $(this);

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.html('<i class="fa-regular fa-eye-slash"></i>');
            icon.attr('title', "Ukryj hasło");
        } else {
            input.attr('type', 'password');
            icon.html('<i class="fa-regular fa-eye"></i>');
            icon.attr('title', "Pokaż hasło");
        }
    });
});