document.getElementById('announcementButton').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah form submit
    sendTelegramNotification("Announcement button clicked!");
});

document.getElementById('eventButton').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah form submit
    sendTelegramNotification("Button activated");
});

function sendTelegramNotification(message) {
    var token = '7486440516:AAHejRwGMJFmte5rUCBXKd_ImNEM5RbCBaQ'; // Ganti dengan token bot kamu
    var chat_id = '-1002234077488'; // Ganti dengan chat ID kamu

    var url = `https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${encodeURIComponent(message)}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.ok) {
                console.log('Pesan terkirim');
                // Jika kamu ingin melanjutkan submit form setelah pesan terkirim, hapus komentar di bawah ini
                // document.querySelector('form').submit();
            } else {
                console.error('Gagal mengirim pesan:', data.description);
            }
        })
        .catch(error => console.error('Error:', error));
}
