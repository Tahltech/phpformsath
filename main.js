const notices = document.querySelectorAll('.notice');
const duration = 5000;

notices.forEach(notice => {

    setTimeout(() => {
        notice.classList.add('hidden');
    }, duration);

});