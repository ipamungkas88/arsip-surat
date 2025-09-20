/**
 * Arsip Surat JavaScript Functions
 * File: confirmation.js
 * Author: M.Firdaus Suraningrat
 * Created: 14 September 2025
 * Description: JavaScript functions for confirmation dialogs and user interactions
 */

/**
 * Konfirmasi hapus arsip surat
 * @param {HTMLElement} button - Element button yang diklik
 */
function confirmDeleteArsip(button) {
    // Ambil ID dari data attribute
    const id = button.getAttribute('data-id');
    
    // Tampilkan konfirmasi menggunakan SweetAlert2
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data surat akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form hapus jika dikonfirmasi
            const form = document.getElementById('delete-form');
            form.action = '/arsip/' + id;
            form.submit();
        }
    });
}

/**
 * Konfirmasi hapus kategori surat
 * @param {HTMLElement} button - Element button yang diklik
 */
function confirmDeleteCategory(button) {
    // Ambil ID dari data attribute
    const id = button.getAttribute('data-id');
    
    // Tampilkan konfirmasi menggunakan SweetAlert2
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data kategori akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form hapus jika dikonfirmasi
            const form = document.getElementById('delete-form');
            form.action = '/categories/' + id;
            form.submit();
        }
    });
}

/**
 * Konfirmasi edit/ganti file arsip
 * @param {HTMLElement} button - Element button yang diklik
 */
function confirmEditArsip(button) {
    // Ambil ID dari data attribute
    const id = button.getAttribute('data-id');
    
    // Tampilkan konfirmasi menggunakan SweetAlert2
    Swal.fire({
        title: 'Edit/Ganti File',
        text: "Apakah Anda ingin mengedit atau mengganti file ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Edit!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect ke halaman edit arsip dengan ID yang benar
            window.location.href = '/arsip/' + id + '/edit';
        }
    });
}

/**
 * Update display file name saat browse file
 * @param {HTMLElement} fileInput - Input file element
 */
function updateFileName(fileInput) {
    const fileDisplay = document.getElementById('file-display');
    
    if (fileInput.files.length > 0) {
        // Tampilkan nama file yang dipilih
        fileDisplay.value = fileInput.files[0].name;
    } else {
        // Reset jika tidak ada file
        fileDisplay.value = 'Belum ada file dipilih';
    }
}

/**
 * Trigger file browser ketika button Browse diklik
 */
function triggerFileBrowser() {
    document.getElementById('file').click();
}

// Event listeners yang dijalankan setelah DOM ready
document.addEventListener('DOMContentLoaded', function() {
    
    // Event listener untuk file input jika ada
    const fileInput = document.getElementById('file');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            updateFileName(this);
        });
    }
    
    // Auto-hide alert messages setelah 5 detik
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 500);
            }
        }, 5000);
    });
    
    // Console log untuk debugging
    console.log('Arsip Surat JavaScript loaded successfully');
});