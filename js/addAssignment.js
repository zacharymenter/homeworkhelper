function openForm() {
    document.getElementById("assignment-form").style.display = "block";
}



function closeForm() {
    document.getElementById("assignment-form").style.display = "none";
}



function addAssignment() {
    var assignment = {
        name:document.getElementById("name").value,
        desc:document.getElementById("description").value, 
        date:document.getElementById("due-date").value, 
        time:document.getElementById("due-time").value
    };

    if (assignment.name != "" && assignment.date != "" && assignment.time != "") {
        var li = document.createElement("li");

        li.innerHTML = "<div class=\"assignment\"><div class=\"assignment-name\"><h3>" + assignment.name + "</h3></div><div class=\"assignment-desc\">" + assignment.desc + "</div><div class=\"assignment-due-date\">" + assignment.date + "</div><input type=\"checkbox\" class=\"assignment-checkbox\"></div>"

        document.getElementById("assignment-list").appendChild(li);
        closeForm();

        //reset form fields to empty
        document.getElementById("name").value = "";
        document.getElementById("description").value = "";
        document.getElementById("due-date").value = "";
        document.getElementById("due-time").value = "";

        
        var assignments = JSON.parse(sessionStorage.getItem("assignments"));
        assignments.push(assignment);
        sessionStorage.setItem("assignments", JSON.stringify(assignments));
    }
}