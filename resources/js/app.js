import './bootstrap';

const userInputForm = document.getElementById('userInputForm');
const pendingList = document.getElementById('pendingList');

let pendingApprovals = [];

// Handle form submission
userInputForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('nama').value;
    const mapel = document.getElementById('mapel').value;
    const barangTempat = document.getElementById('barangtempat').value;
    const jam = document.getElementById('jam').value;

    const newEntry = { name, mapel, barangTempat, jam, status: 'Pending' };
    pendingApprovals.push(newEntry);

    updatePendingList();
    userInputForm.reset();
});

// Update the admin pending list
function updatePendingList() {
    pendingList.innerHTML = '';
    pendingApprovals.forEach((entry, index) => {
        const li = document.createElement('li');
        li.className = 'flex items-center justify-between border-b border-gray-300 py-2';
        li.textContent = `${entry.name} - ${entry.mapel} - ${entry.barangTempat} - ${entry.jam} [${entry.status}]`;

        // Approve Button
        const approveButton = document.createElement('button');
        approveButton.textContent = 'Approve';
        approveButton.className = 'ml-2 bg-green-600 text-white rounded-md px-2 py-1 hover:bg-green-700';
        approveButton.onclick = () => approveEntry(index);

        // Reject Button
        const rejectButton = document.createElement('button');
        rejectButton.textContent = 'Reject';
        rejectButton.className = 'ml-2 bg-red-600 text-white rounded-md px-2 py-1 hover:bg-red-700';
        rejectButton.onclick = () => rejectEntry(index);

        li.appendChild(approveButton);
        li.appendChild(rejectButton);
        pendingList.appendChild(li);
    });
}

// Approve an entry
function approveEntry(index) {
    pendingApprovals[index].status = 'Approved';
    updatePendingList();
}

// Reject an entry
function rejectEntry(index) {
    pendingApprovals[index].status = 'Rejected';
    updatePendingList();
}
