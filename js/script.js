
// Skrypt do przyszłych funkcji, np. filtrowania roślin.
document.addEventListener("DOMContentLoaded", () => {
    console.log("Sklep z Roślinami jest gotowy!");
});
function toggleCategoryClass(id) {
    var badge = document.getElementById('badge_' + id); // Pobieramy odpowiedni <span>
    var checkbox = document.getElementById('category_' + id); // Pobieramy odpowiedni checkbox
    console.log(checkbox.checked);
    if (checkbox.checked) {
        badge.classList.add('category-checked');
        badge.classList.remove('category-unchecked');
    } else {
        badge.classList.add('category-unchecked');
        badge.classList.remove('category-checked');

    }
}