const button = document.getElementById("addButton");
const list = document.getElementById("users");
const number = 1;

button.addEventListener("click", AddEmployee);

function AddEmployee() {

    var table = document.getElementById("myTable");
    var row = document.createElement("tr");

    var time = document.createElement("input");
    time.setAttribute("type", "time");
    time.value = "08:00";

    var employee = document.getElementById("fname").value;

    var employeeName = document.createElement("td");
    employeeName.textContent = employee;
    row.appendChild(employeeName);

    for(let i = 0; i < 7; i++){

        var day = document.createElement("td");
        day.appendChild(time.cloneNode(false));
        row.appendChild(day);
    }

    table.appendChild(row);

};