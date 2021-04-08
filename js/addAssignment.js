function openForm() {
    document.getElementById("assignment-form").style.display = "block";
}

function closeForm() {
    document.getElementById("assignment-form").style.display = "none";
}

function addAssignment() {
    var name = document.getElementById("name").value;
    var desc = document.getElementById("description").value;
    var date = document.getElementById("due-date").value;
    var time = document.getElementById("due-time").value;

    if (name != "" && date != "" && time != "") {
        var li = document.createElement("li");

        li.innerHTML = "<div class=\"assignment\"><div class=\"assignment-name\"><h3>" + name + "</h3></div><div class=\"assignment-desc\">" + desc + "</div><div class=\"assignment-due-date\">" + date + " at " + time + "</div><input type=\"checkbox\" class=\"assignment-checkbox\"></div>"

        document.getElementById("assignment-list").appendChild(li);
        closeForm();

        document.getElementById("name").value = "";
        document.getElementById("description").value = "";
        document.getElementById("due-date").value = "";
    }
}