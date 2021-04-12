function sortByDueDate() {
var list, i, switching, b, shouldSwitch;
  list = document.getElementById("assignment-list");
  switching = true;

  while (switching) {

    switching = false;

    b = list.getElementsByTagName("li");
    var c = document.getElementsByClassName("assignment-due-date")

    for (i = 0; i < (b.length - 1); i++) {
      shouldSwitch = false;

      var date1 = Date.parse(c[i].innerHTML)
      var date2 = Date.parse(c[i + 1].innerHTML)
      if (date1 > date2) {
        shouldSwitch = true;
        break;
      }
    }

    if (shouldSwitch) {
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}

sortByDueDate();