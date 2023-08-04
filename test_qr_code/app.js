// Ambil referensi ke video dan buat konteks
const video = document.getElementById('qr-video');
const canvas = document.createElement('canvas');
const canvasContext = canvas.getContext('2d');

// Fungsi untuk memulai kamera dan pemindaian QR
function startCamera() {
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert('Perangkat Anda tidak mendukung akses kamera!');
        return;
    }

    navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
        .then(stream => {
            video.srcObject = stream;
            video.play();
            requestAnimationFrame(scanQR);
        })
        .catch(error => {
            console.error('Error accessing the camera:', error);
            alert('Terjadi kesalahan saat mengakses kamera!');
        });
}

// Fungsi untuk menghentikan kamera
function stopCamera() {
    const stream = video.srcObject;
    const tracks = stream.getTracks();
    tracks.forEach(track => track.stop());
    video.srcObject = null;
}

// Fungsi untuk mendeteksi QR code dan mengekstraksi data dari QR code
function scanQR() {
    try {
        canvasContext.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = canvasContext.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);

        if (code) {
            handleQRData(code.data); // Fungsi untuk menangani data dari QR code
        } else {
            requestAnimationFrame(scanQR);
        }
    } catch (error) {
        console.error('Error scanning QR code:', error);
        requestAnimationFrame(scanQR);
    }
}

// Fungsi untuk menangani data dari QR code dan mengirimkan ke server PHP
function handleQRData(data) {
    stopCamera();
    fetch('save_attendance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ user_name: data })
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        startCamera();
    })
    .catch(error => {
        console.error('Error saving attendance:', error);
        alert('Terjadi kesalahan saat menyimpan kehadiran!');
        startCamera();
    });
}

// Memulai kamera saat dokumen selesai dimuat
document.addEventListener('DOMContentLoaded', () => {
    canvas.style.display = 'none'; // Sembunyikan elemen canvas
    document.body.appendChild(canvas); // Tambahkan elemen canvas ke dalam body
    startCamera();
});
// Fungsi untuk menangani data dari QR code dan mengirimkan ke server PHP
function handleQRData(data) {
    stopCamera();
    fetch('save_attendance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ user_name: data })
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        startCamera();
    })
    .catch(error => {
        console.error('Error saving attendance:', error);
        alert('Terjadi kesalahan saat menyimpan kehadiran!');
        startCamera();
    });
}