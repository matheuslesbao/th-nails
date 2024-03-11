
document.addEventListener("DOMContentLoaded", function() {
  let currentPage = window.location.pathname; // Obtém o caminho da URL da página atual
  let menuItems = document.querySelectorAll('.menu li');

  // Adiciona classes ao item do menu correspondente à página atual
  menuItems.forEach(function(item) {
    if (item.querySelector('a').getAttribute('href') === currentPage) {
      item.classList.add('selected');
    } else {
      item.classList.add('not-selected');
    }
  });
});
