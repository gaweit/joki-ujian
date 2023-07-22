<!DOCTYPE html>
<html>
  <head>
    <title>Scan QR Code Absensi</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/instascan/instascan.min.js"></script>
  </head>
  <body>
    <h1>Scan QR Code Absensi</h1>
    <video id="video-preview"></video>

    <script>
      // Membuat objek scanner
      let scanner = new Instascan.Scanner({
        video: document.getElementById("video-preview"),
      });

      // Event saat QR code terdeteksi
      scanner.addListener("scan", function (content) {
        // Mengirim data QR code (NIM) ke server untuk diproses
        $.post("process_qr.php", { nim: content }, function (response) {
          alert(response);
        });
      });

      // Memulai pemindaian QR code
      Instascan.Camera.getCameras()
        .then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error("No cameras found.");
          }
        })
        .catch(function (error) {
          console.error(error);
        });
    </script>
  </body>
</html>
