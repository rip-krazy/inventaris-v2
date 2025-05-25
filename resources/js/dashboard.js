// Place this in your public/js/dashboard.js file or inline in your dashboard blade template

document.addEventListener('DOMContentLoaded', function() {
    // Initialize the counters
    animateCounters();
    
    // Add event listeners (these are already in the HTML via onclick attributes)
    // But we could also add them here if you prefer
});

function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 1000; // Animation duration in milliseconds
        const frameRate = 30; // Frames per second
        const totalFrames = duration / (1000 / frameRate);
        const increment = target / totalFrames;
        
        let current = 0;
        const animate = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(animate);
            }
            counter.textContent = Math.floor(current);
        }, 1000 / frameRate);
    });
}

function showItemDetails() {
    // AJAX request to get item details
    fetch('/admin/items/details', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Show item details in a modal
            showModal('Barang Aktif', createItemTable(data.data));
        } else {
            console.error('Error fetching item details');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function showPendingReturns() {
    // AJAX request to get pending returns
    fetch('/admin/pengembalian/pending', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Show pending returns in a modal
            showModal('Pengembalian Tertunda', createPendingReturnsTable(data.data));
        } else {
            console.error('Error fetching pending returns');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function createItemTable(items) {
    if (items.length === 0) {
        return '<p class="text-center text-gray-500 py-4">Tidak ada barang aktif saat ini.</p>';
    }
    
    let tableHtml = `
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4 text-left">No</th>
                    <th class="py-2 px-4 text-left">Nama Barang</th>
                    <th class="py-2 px-4 text-left">Kondisi</th>
                    <th class="py-2 px-4 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
    `;
    
    items.forEach((item, index) => {
        const statusClass = item.kondisi_barang === 'baik' ? 'text-green-600' : 'text-red-600';
        tableHtml += `
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">${index + 1}</td>
                <td class="py-2 px-4">${item.nama_barang}</td>
                <td class="py-2 px-4 ${statusClass}">${item.kondisi_barang}</td>
                <td class="py-2 px-4">${item.status || 'Tersedia'}</td>
            </tr>
        `;
    });
    
    tableHtml += `
            </tbody>
        </table>
    </div>
    `;
    
    return tableHtml;
}

function createPendingReturnsTable(returns) {
    if (returns.length === 0) {
        return '<p class="text-center text-gray-500 py-4">Tidak ada pengembalian tertunda saat ini.</p>';
    }
    
    let tableHtml = `
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4 text-left">No</th>
                    <th class="py-2 px-4 text-left">Nama User</th>
                    <th class="py-2 px-4 text-left">Barang/Tempat</th>
                    <th class="py-2 px-4 text-left">Mapel</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
    `;
    
    returns.forEach((item, index) => {
        const itemName = item.barangTempat || item.ruangTempat || '-';
        tableHtml += `
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">${index + 1}</td>
                <td class="py-2 px-4">${item.name}</td>
                <td class="py-2 px-4">${itemName}</td>
                <td class="py-2 px-4">${item.mapel || '-'}</td>
                <td class="py-2 px-4">
                    <a href="/admin/pengembalian/approve/${index}" class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded text-sm">
                        Approve
                    </a>
                </td>
            </tr>
        `;
    });
    
    tableHtml += `
            </tbody>
        </table>
    </div>
    `;
    
    return tableHtml;
}

function showModal(title, content) {
    // Check if modal already exists
    let modal = document.getElementById('dashboard-modal');
    
    if (!modal) {
        // Create modal if it doesn't exist
        modal = document.createElement('div');
        modal.id = 'dashboard-modal';
        modal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50';
        document.body.appendChild(modal);
    }
    
    // Set modal content
    modal.innerHTML = `
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl mx-4 overflow-hidden">
            <div class="flex justify-between items-center bg-gray-100 px-4 py-3 border-b">
                <h3 class="text-lg font-medium text-gray-900">${title}</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4 max-h-[70vh] overflow-y-auto">
                ${content}
            </div>
            <div class="bg-gray-100 px-4 py-3 flex justify-end">
                <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                    Tutup
                </button>
            </div>
        </div>
    `;
    
    // Show modal
    modal.style.display = 'flex';
    
    // Prevent body scrolling
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('dashboard-modal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}