// document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('announcementButton').addEventListener('click', function(event) {

//         var message = "**PENGUMUMAN**\n\n" + document.getElementById('deskripsi').value; // Ambil nilai dari textarea
//         sendTelegramNotification(message);
//     });

//     document.getElementById('tugas-btn').addEventListener('click', function(event) {

//         var desk = document.getElementById('deskripsi-tugas').value; // Ambil nilai dari textarea
//         var mapel = document.getElementById('mapel-tugas').value;

//         var message = "Tugas: " + mapel + "\n\n" + desk;

//         sendTelegramNotification(message);
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('announcementButton').addEventListener('click', function(event) {
        var message = "PENGUMUMAN\n\n" + document.getElementById('deskripsi').value; // Ambil nilai dari textarea
        sendTelegramNotification(message, 'HTML', function() {
            document.querySelector('.form-container').submit(); // Submit form setelah pesan terkirim
        });
    });

    document.getElementById('eventButton').addEventListener('click', function(event) {
        var message = "Acara Baru\n\n" + document.getElementById('deskripsi').value; // Ambil nilai dari textarea
        sendTelegramNotification(message, 'HTML', function() {
            document.querySelector('.form-container').submit(); // Submit form setelah pesan terkirim
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.yes-btn').addEventListener('click', function(event) {
        var selectElement = document.getElementById('matpel');
        var mapelId = selectElement.value;
        var desc = document.getElementById('deskripsiTugas').value; // Ambil nilai dari textarea
        var mapel = selectElement.options[selectElement.selectedIndex].getAttribute('data-nama');
        
        var message = "Tugas: " + mapel + "\n\n" + desc;
        
        sendTelegramNotification(message, 'HTML', function() {
            document.querySelector('.form-container1').submit(); // Submit form setelah pesan terkirim
        });
    });
});

// function sendTelegramNotification(message) {
//     var token = '7486440516:AAHejRwGMJFmte5rUCBXKd_ImNEM5RbCBaQ'; // Ganti dengan token bot kamu
//     var chat_id = '-1002234077488'; // Ganti dengan chat ID channel kamu

//     var url = `https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${encodeURIComponent(message)}`;

//     fetch(url)
//         .then(response => response.json())
//         .then(data => {
//             if (data.ok) {
//                 console.log('Pesan terkirim');
//                 // Jika kamu ingin melanjutkan submit form setelah pesan terkirim, hapus komentar di bawah ini
//                 // document.querySelector('form').submit();
//             } else {
//                 console.error('Gagal mengirim pesan:', data.description);
//             }
//         })
//         .catch(error => console.error('Error:', error));
// }


// document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('announcementButton').addEventListener('click', function(event) {
//         event.preventDefault(); // Mencegah form submit
//         var message = "<b>PENGUMUMAN</b>\n\n" + document.getElementById('deskripsi').value; // Ambil nilai dari textarea
//         sendTelegramNotification(message, 'HTML', function() {
//             document.querySelector('.form-container1').submit(); // Submit form setelah pesan terkirim
//         });
//     });

//     document.getElementById('tugasButton').addEventListener('click', function(event) {
//         event.preventDefault(); // Mencegah form submit
//         var desk = document.getElementById('deskripsiTugas').value; // Ambil nilai dari textarea
//         var mapel = document.getElementById('mapelTugas').value;
        
//         var message = "<b>Tugas:</b> " + mapel + "\n\n" + desk;
        
//         sendTelegramNotification(message, 'HTML', function() {
//             document.querySelector('.form-container1').submit(); // Submit form setelah pesan terkirim
//         });
//     });
// });

function sendTelegramNotification(message, parseMode, callback) {
    var token = '7486440516:AAHejRwGMJFmte5rUCBXKd_ImNEM5RbCBaQ'; // Ganti dengan token bot kamu
    var chat_id = '-1002234077488'; // Ganti dengan chat ID channel kamu

    var url = `https://api.telegram.org/bot${token}/sendMessage`;
    var data = {
        chat_id: chat_id,
        text: message,
        parse_mode: parseMode
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            console.log('Pesan terkirim');
            if (callback) {
                callback();
            }
        } else {
            console.error('Gagal mengirim pesan:', data.description);
        }
    })
    .catch(error => console.error('Error:', error));
}
