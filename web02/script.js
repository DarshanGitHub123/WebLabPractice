// alert("Hello Darshan")
let passengerCnt = 0;
function addPassengerRow() {
    const tableBody = document.querySelector("#PassengerTable tbody");
    if (passengerCnt >= 7) {
        alert("Maximum of 7 passengers allowed per ticket.");
        return;
    }
    const row = document.createElement("tr");
    row.innerHTML = `
        <td><input type="text" required></td>
        <td><input type="number" min="1" required></td>
        <td>
            <select required>
                <option value="Lower">Lower</option>
                <option value="Middle">Middle</option>
                <option value="Upper">Upper</option>
            </select>
        </td>
        <td><button type="button" class="btn" onclick="removePassengerRow(this)">Remove</button></td>
    `;
    tableBody.appendChild(row);
    passengerCnt++;
}

function removePassengerRow(button) {  // Added 'button' parameter
    const row = button.parentNode.parentNode;
    row.remove();
    passengerCnt--;
}

function submitForm() {
    const source = document.getElementById("source").value;         // Added .value to get input
    const destination = document.getElementById("destination").value; // Added .value to get input

    if (passengerCnt < 3) {
        alert("Minimum of 3 passengers required.");
        return false;
    }
    alert(`Ticket booking successful from ${source} to ${destination}.`);
    return true;
}
