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