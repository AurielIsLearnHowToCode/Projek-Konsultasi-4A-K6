function toggleMatematikaContent() {
    var matematikaContent = document.querySelector('.matematika-content');


    var isDisplayed = window.getComputedStyle(matematikaContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent, { display: "none" });
        } });
    }
}
function toggleMatematikaContent2() {
    var matematikaContent2 = document.querySelector('.matematika2-content');


    var isDisplayed = window.getComputedStyle(matematikaContent2).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent2, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent2, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent2, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent2, { display: "none" });
        } });
    }
}

function toggleMatematikaContent3() {
    var matematikaContent3 = document.querySelector('.matematika3-content');


    var isDisplayed = window.getComputedStyle(matematikaContent3).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent3, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent3, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent3, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent3, { display: "none" });
        } });
    }
}

function togglebindoContent() {
    var bindoContent = document.querySelector('.bindo-content');


    var isDisplayed = window.getComputedStyle(bindoContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(bindoContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(bindoContent, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(bindoContent, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(bindoContent, { display: "none" });
        } });
    }
}

function togglebindo2Content() {
    var bindo2Content = document.querySelector('.bindo2-content');


    var isDisplayed = window.getComputedStyle(bindo2Content).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(bindo2Content, { display: "block", opacity: 0, height: 0 });
        gsap.to(bindo2Content, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(bindo2Content, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(bindo2Content, { display: "none" });
        } });
    }

}

function togglePenggunaContent() {
    var penggunaContent = document.querySelector('.pengguna-content');
    var logoutContent = document.querySelector('.logout-content');
    var overlay = document.querySelector('.overlay');

    var isDisplayed = window.getComputedStyle(penggunaContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {
        gsap.set(penggunaContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(penggunaContent, { height: "auto", opacity: 1, duration: 0, onComplete: () => {
            // Tampilkan logout-content hanya setelah pengguna-content sepenuhnya terbuka
            gsap.set(logoutContent, { display: "block", opacity: 0, height: 0 });
            gsap.to(logoutContent, { height: "auto", opacity: 1, duration: 0 });
        }});
        overlay.style.display = "block";
    } else {
        gsap.to(logoutContent, { height: 0, opacity: 0, duration: 0, onComplete: () => {
            gsap.set(logoutContent, { display: "none" });
        }});
        gsap.to(penggunaContent, { height: 0, opacity: 0, duration: 0, onComplete: () => {
            gsap.set(penggunaContent, { display: "none" });
            overlay.style.display = "none";
        }});
    }
}

function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var timeString = hours + ':' + minutes + ':' + seconds;
    document.getElementById('realtime-clock').textContent = timeString;
    setTimeout(updateClock, 1000);
}

// Memulai jam saat dokumen siap
document.addEventListener('DOMContentLoaded', function() {
    updateClock();
});

const announcements = ['Harusnya Running Text', 'New updates available!', 'Reminder: Meeting at 2 PM'];
let index = 0;

function updateAnnouncement() {
    document.getElementById('announcement-text').textContent = announcements[index];
    index = (index + 1) % announcements.length;
}

// Panggil fungsi updateAnnouncement() setiap beberapa detik
setInterval(updateAnnouncement, 5000); // Ganti pengumuman setiap 5 detik