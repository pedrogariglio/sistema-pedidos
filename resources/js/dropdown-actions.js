// Cerrar los dropdowns cuando se hace clic fuera de ellos
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

// Función para mostrar/ocultar el dropdown específico
function toggleDropdown(id) {
    document.getElementById("myDropdown" + id).classList.toggle("show");
}

window.toggleDropdown = toggleDropdown;