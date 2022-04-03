/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */

function fonctionresponsively() {
    var x = document.getElementById("menuresp");
    if (x.className === "navhaut") {
        x.className += " responsively";
    } else {
        x.className = "navhaut";
    }
}