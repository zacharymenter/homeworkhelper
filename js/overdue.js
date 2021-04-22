var dates = document.getElementsByClassName("plain-date");

var displayedDates = document.getElementsByClassName("assignment-due-date");

var today = new Date().toLocaleString();
today = Date.parse(today);

var i;
for (i = 0; i < dates.length; i++) {
    var date = Date.parse(dates[i].innerHTML);

    if (date < today) {
        displayedDates[i].style.color = "red";
    }
}