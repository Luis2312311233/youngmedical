document.getElementById('learn-more-btn').addEventListener('click', function() {
    window.scrollTo({
        top: document.querySelector('.content').offsetTop,
        behavior: 'smooth'
    });
});
