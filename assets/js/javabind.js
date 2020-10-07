function loadTable(table_id, controller_url) {

    const request = new XMLHttpRequest();
    request.open("get", controller_url, false);
    request.onload = () => {

        try {
            const json = JSON.parse(request.responseText);
            populateTable(table_id, json);
        } catch (e) {
            console.warn('Non riesco a caricare i dati');
        }
    }
    request.send();
}

function populateTable(table_id, json) {
    const tableBody = document.querySelector("#" + table_id + ">tbody");
    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild)
    }

    json.forEach(obj => {
        const tr = document.createElement("tr");
        Object.entries(obj).forEach(([key, value]) => {
            const td = document.createElement("td");
            td.setAttribute("class", "td_generic td_" + key);
            td.textContent = value;
            tr.appendChild(td);

        });
        tableBody.appendChild(tr);

    });

}
/*
 document.addEventListener("DOMContentLoaded", () => {
 loadTable();
 })
 */