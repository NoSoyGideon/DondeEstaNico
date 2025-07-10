
function toggleFavorite(el) {
    const petId = el.dataset.petId;
    let isFavorite = el.dataset.isFavorite === "1";

    // Toggle
    isFavorite = !isFavorite;
    el.dataset.isFavorite = isFavorite ? "1" : "0";

    updateFavoriteUI(el, isFavorite);

    basededate(petId, isFavorite);
}

function updateFavoriteUI(el, isFavorite) {
    if (isFavorite) {
        el.classList.add("bg-purple-main", "text-white");
        el.classList.remove("bg-gray-200", "text-gray-400");
    } else {
        el.classList.add("bg-gray-200", "text-gray-400");
        el.classList.remove("bg-purple-main", "text-white");
    }
}

// ✅ Inicializa todas las estrellas cuando carga la página
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-pet-id]").forEach(el => {
        const isFavorite = el.dataset.isFavorite === "1";
        updateFavoriteUI(el, isFavorite);
    });
});

function basededate(petId, isFavorite) {
    console.log(`Pet ID: ${petId}, Is Favorite: ${isFavorite}`);
    // Aquí puedes hacer una llamada fetch/ajax a backend
}