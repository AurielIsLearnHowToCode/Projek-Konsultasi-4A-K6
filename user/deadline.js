document.addEventListener('DOMContentLoaded', function() {
    fetchTasks();
    startClock();
    startAnnouncementCycle();
});

const messages = [
    "Pesan Penting 1",
    "Pesan Penting 2",
    "Pesan Penting 3",
    "Pesan Penting 4",
    "Pesan Penting 5"
];

function fetchTasks() {
    fetch('backend_deadline.php')
        .then(response => response.json())
        .then(data => {
            const tasksToday = document.getElementById('tasks-today');
            const tasksWeek = document.getElementById('tasks-week');
            const tasksMonth = document.getElementById('tasks-month');

            tasksToday.innerHTML = '';
            tasksWeek.innerHTML = '';
            tasksMonth.innerHTML = '';

            data.tasks.forEach(task => {
                const taskDiv = document.createElement('div');
                taskDiv.className = 'tugas';
                taskDiv.setAttribute('data-title', task.subject);

                const subjectSpan = document.createElement('span');
                subjectSpan.textContent = task.subject;
                taskDiv.appendChild(subjectSpan);

                const contentDiv = document.createElement('div');
                contentDiv.className = 'tugas-content';

                const contentSpan = document.createElement('span');
                contentSpan.textContent = task.content;
                contentDiv.appendChild(contentSpan);

                const dueDateSpan = document.createElement('span');
                const dueDate = new Date(task.due_date);
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const indonesianDate = new Intl.DateTimeFormat('id-ID', options).format(dueDate);
                dueDateSpan.textContent = `Batas Waktu: ${indonesianDate}`;
                contentDiv.appendChild(dueDateSpan);

                taskDiv.appendChild(contentDiv);

                taskDiv.addEventListener('click', () => {
                    taskDiv.classList.toggle('expanded');
                    if (taskDiv.classList.contains('expanded')) {
                        gsap.set(contentDiv, { display: "block", height: 0, opacity: 0 });
                        gsap.to(contentDiv, { height: "auto", opacity: 1, duration: 0.3 });
                    } else {
                        gsap.to(contentDiv, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
                            gsap.set(contentDiv, { display: "none" });
                        }});
                    }
                });

                const today = new Date();
                const endOfToday = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 23, 59, 59);
                const endOfWeek = new Date(today);
                endOfWeek.setDate(today.getDate() + (7 - today.getDay()));
                const endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

                if (dueDate <= endOfToday) {
                    tasksToday.appendChild(taskDiv);
                } else if (dueDate <= endOfWeek) {
                    tasksWeek.appendChild(taskDiv);
                } else if (dueDate <= endOfMonth) {
                    tasksMonth.appendChild(taskDiv);
                }
            });
        })
        .catch(error => console.error('Error fetching tasks:', error));
}

function togglePenggunaContent() {
    var penggunaContent = document.querySelector('.pengguna-content');
    var logoutContent = document.querySelector('.logout-content');
    var overlay = document.querySelector('.overlay');

    var isDisplayed = window.getComputedStyle(penggunaContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {
        gsap.set(penggunaContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(penggunaContent, { height: "auto", opacity: 1, duration: 0.3, onComplete: () => {
            gsap.set(logoutContent, { display: "block", opacity: 0, height: 0 });
            gsap.to(logoutContent, { height: "auto", opacity: 1, duration: 0.3 });
        }});
        overlay.style.display = "block";
        overlay.style.pointerEvents = "auto";
    } else {
        gsap.to(logoutContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
            gsap.set(logoutContent, { display: "none" });
        }});
        gsap.to(penggunaContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
            gsap.set(penggunaContent, { display: "none" });
            overlay.style.display = "none";
            overlay.style.pointerEvents = "none";
        }});
    }
}


function startClock() {
    const clockElement = document.getElementById('realtime-clock');

    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        clockElement.textContent = `${hours}:${minutes}:${seconds}`;
    }

    updateClock(); // Initialize the clock immediately
    setInterval(updateClock, 1000); // Update the clock every second
}

function startAnnouncementCycle() {
    let currentIndex = 0;
    const announcementElement = document.getElementById('announcement-text');

    function updateAnnouncement() {
        announcementElement.textContent = messages[currentIndex];
        currentIndex = (currentIndex + 1) % messages.length;
    }

    updateAnnouncement(); // Initialize with the first message
    setInterval(updateAnnouncement, 5000); // Change message every 5 seconds
}
