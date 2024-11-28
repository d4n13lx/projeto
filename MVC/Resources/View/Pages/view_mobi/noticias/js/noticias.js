document.querySelectorAll('.item-img').forEach(item => {
    item.addEventListener('mouseover', () => {
        let infoCard = item.querySelector('.info-card');
        infoCard.style.display = 'block';  // Mostrar o card de informações
    });
    item.addEventListener('mouseout', () => {
        let infoCard = item.querySelector('.info-card');
        infoCard.style.display = 'none';  // Esconder o card de informações
    });
});