// const monthNames = [
//     "January", "February", "March", "April", "May", "June",
//     "July", "August", "September", "October", "November", "December"
// ];

// let today = new Date();
// let currentMonth = today.getMonth();
// let currentYear = today.getFullYear();

// document.addEventListener("DOMContentLoaded", function() {
//     showCalendar(currentMonth, currentYear);
// });

// function showCalendar(month, year) {
//     let firstDay = (new Date(year, month)).getDay();
//     let daysInMonth = 32 - new Date(year, month, 32).getDate();

//     let tbl = document.getElementById("days"); // body of the calendar
//     tbl.innerHTML = "";

//     // filing data about month and in the page via DOM.
//     document.getElementById("month-year").innerHTML = monthNames[month] + " " + year;

//     // creating all cells
//     let date = 1;
//     for (let i = 0; i < 6; i++) {
//         let row = document.createElement("tr");

//         for (let j = 0; j < 7; j++) {
//             if (i === 0 && j < firstDay - 1) {
//                 let cell = document.createElement("td");
//                 let cellText = document.createTextNode("");
//                 cell.appendChild(cellText);
//                 row.appendChild(cell);
//             } else if (date > daysInMonth) {
//                 break;
//             } else {
//                 let cell = document.createElement("td");
//                 let cellText = document.createTextNode(date);
//                 if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
//                     cell.classList.add("active");
//                 }
//                 cell.appendChild(cellText);
//                 row.appendChild(cell);
//                 date++;
//             }
//         }
//         tbl.appendChild(row); // appending each row into calendar body.
//     }
// }

// function prevMonth() {
//     currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
//     currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
//     showCalendar(currentMonth, currentYear);
// }

// function nextMonth() {
//     currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
//     currentMonth = (currentMonth + 1) % 12;
//     showCalendar(currentMonth, currentYear);
// }

const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

document.addEventListener("DOMContentLoaded", function() {
    showCalendar(currentMonth, currentYear);
});

function showCalendar(month, year) {
    let firstDay = new Date(year, month, 1).getDay();
    firstDay = firstDay === 0 ? 7 : firstDay; // Adjust first day to start on Monday
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("days"); // body of the calendar
    tbl.innerHTML = "";

    // filling data about month and in the page via DOM.
    document.getElementById("month-year").innerHTML = monthNames[month] + " " + year;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        for (let j = 1; j <= 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("li");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                tbl.appendChild(cell);
            } else if (date > daysInMonth) {
                break;
            } else {
                let cell = document.createElement("li");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("active");
                }
                cell.appendChild(cellText);
                tbl.appendChild(cell);
                date++;
            }
        }
    }
}

function prevMonth() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function nextMonth() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}
