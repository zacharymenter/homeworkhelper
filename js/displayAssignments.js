var assignments;

if (sessionStorage.getItem("assignments") == null) {
    assignments = new Array();
    storeAssignment("Test", "Test assignment description.", "2021-02-13", "11:59", assignments);
    storeAssignment("Test1", "Another test assignment description.", "2021-04-13", "11:59", assignments);
    storeAssignment("Test2", "Yet another test assignment description.", "2019-03-24", "11:59", assignments);  
    storeAssignment("Test3", "Here is another hardcoded test assignment.", "2021-04-15", "11:59", assignments);


    sessionStorage.setItem("assignments", JSON.stringify(assignments));

} else {
    assignments = JSON.parse(sessionStorage.getItem("assignments"));
}

//display the assignments
var i;
for (i = 0; i < assignments.length; i++) {
    var li = document.createElement("li");

    li.innerHTML = "<div class=\"assignment\"><div class=\"assignment-name\"><h3>" + assignments[i].name + "</h3></div><div class=\"assignment-desc\">" + assignments[i].desc + "</div><div class=\"assignment-due-date\">" + assignments[i].date + "</div><input type=\"checkbox\" class=\"assignment-checkbox\"></div>"

    document.getElementById("assignment-list").appendChild(li);
}





function storeAssignment(name, desc, date, time, assignments) {
    var assignment = {
        name:name, 
        desc:desc, 
        date:date, 
        time:time
    };

    assignments.push(assignment);
}