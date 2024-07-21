<?php
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan Pengaduan Masyarakat</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/custom/index.css" rel="stylesheet" />
  <style>
    .report-button img {
      height: 48px;
      width: 48px;
    }

    .report-form .alert {
      font-weight: bold;
    }

    .report-form {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container {
      max-width: 900px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_GET['hasil'])) {
    echo '<body onload="showForm(\'history\')">';
  }
  ?>

  <div class="container text-center mt-5">
    <h1>Laporan Pengaduan Masyarakat</h1>
    <p>
      Laporkan jika terjadi Pelanggaran Perda.
    </p>
    <div id="main-menu" class="mb-4">
      <div class="mb-3">
        <a href="#" class="btn btn-danger btn-block p-4 report-button" onclick="showForm('fire')">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="m-0">Buat Laporan</h2>
            <img src="image/write.png" alt="Fire Icon" />
          </div>
        </a>
      </div>
      <div class="mb-3">
        <a href="#" class="btn btn-primary btn-block p-4 report-button" onclick="showForm('medical')">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="m-0">Login Admin</h2>
            <img src="image/login.png" alt="Medical Icon" />
          </div>
        </a>
      </div>
      <div class="mb-3">
        <a href="#" class="btn btn-secondary btn-block p-4 report-button" onclick="showForm('history')">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="m-0">Cek Laporan Anda</h2>
            <img src="image/cek.png" alt="History Icon" />
          </div>
        </a>
      </div>
    </div>

    <div id="form-container">
      <div id="fire-form" class="report-form d-none">
        <div class="alert alert-danger" role="alert">
          Mohon jangan berikan laporan palsu!
        </div>
        <form action="function/proses_laporan.php" method="post" enctype="multipart/form-data">
          <hr>
          <h1>DATA DIRI</h1>
          <div class="form-group">
            <label for="nik">Nik</label>
            <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}" maxlength="16" placeholder="Masukan nik Anda" required oninput="validateLength(event)" onkeypress="validateKeyPress(event)" />
          </div>
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="nama" placeholder="Masukan nama Anda" required />
          </div>
          <div class="form-group">
            <label for="birthplace">Tempat Lahir</label>
            <input type="text" class="form-control" id="birthplace" name="tempat_lahir"
              placeholder="Masukan Tempat Lahir Anda" required />
          </div>
          <div class="form-group">
            <label for="birth">Tanggal Lahir</label>
            <input type="date" class="form-control" id="birth" name="tanggal_lahir" required />
          </div>
          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="jenis_kelamin" required>
              <option disabled selected value="">Pilih Jenis Kelamin</option>
              <option value="laki-laki">Laki - Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
            <!-- <input type="text" class="form-control" id="gender" name="jenis_kelamin"
              placeholder="Masukan Jenis Kelamin Anda" /> -->
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Anda"
              required />
          </div>
          <div class="form-group">
            <label for="job">Pekerjaan</label>
            <input type="text" class="form-control" id="job" name="pekerjaan" placeholder="Masukan Pekerjaan Anda"
              required />
          </div>
          <!-- <div class="form-group">
            <label for="ktp">Unggah Foto KTP</label>
            <input type="file" class="form-control" id="ktp" name="foto_ktp" accept="image/*" />
            <div id="preview_ktp"></div>
          </div> -->
          <div class="form-group">
            <label for="hp">No HP</label>
            <input type="number" class="form-control" id="hp" name="hp" placeholder="Masukan No HP Anda" required />
          </div>
          <div class="form-group">
            <label for="wa">No WA (+62)</label>
            <input type="number" class="form-control" id="wa" name="wa" placeholder="Masukan No WA Anda" required />
          </div>
          <hr>
          <h1>LAPORAN PELANGGARAN PERDA</h1>
          <div class="form-group">
            <label for="tanggal_kejadiab">Tanggal Kejadian</label>
            <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" required />
          </div>
          <div class="form-group">
            <label for="fire-location">Lokasi Kejadian</label>
            <input type="text" class="form-control" id="fire-location" name="lokasi"
              placeholder="Masukan alamat kejadian" required />
          </div>
          <!-- <div class="form-group">
            <label for="terlapor">Terlapor</label>
            <input type="text" class="form-control" id="terlapor" name="terlapor" placeholder="Terlapor" />
          </div> -->
          <!-- <div class="form-group">
            <label for="korban">Korban</label>
            <input type="text" class="form-control" id="korban" name="korban" placeholder="Korban" />
          </div> -->
          <div class="form-group">
            <label for="kejadian">Apa Yang Terjadi</label>
            <input type="text" class="form-control" id="kejadian" name="yang_terjadi" placeholder="Yang Terjadi"
              required />
          </div>
          <div class="form-group">
            <label for="bagaimana">Bagaimana Terjadi</label>
            <input type="text" class="form-control" id="bagaimana" name="kejadian" placeholder="Bagaimana Terjadi" />
          </div>
          <!-- <div class="form-group">
            <label for="pidana">Tindak Pidana</label>
            <input type="text" class="form-control" id="pidana" name="pidana" placeholder="Tindak Pidana" />
          </div> -->
          <!-- <div class="form-group">
            <label for="saksi">Saksi</label>
            <input type="text" class="form-control" id="saksi" name="saksi" placeholder="Saksi" />
          </div> -->
          <div class="form-group">
            <label for="description">Uraian Kejadian</label>
            <textarea class="form-control" id="description" name="uraian" rows="3" placeholder="Masukan laporan anda"
              required></textarea>
          </div>
          <div class="form-group">
            <label for="fire-upload">Unggah Foto Bukti Laporan</label>
            <input type="file" class="form-control" id="bukti" name="foto_bukti" accept="image/*" required />
            <div id="preview_bukti"></div>
          </div>
          <button type="submit" name="laporan" class="btn btn-primary btn-block">
            Kirim Laporan
          </button>
        </form>
        <button class="btn btn-secondary btn-block mt-3" onclick="showMenu()">
          Kembali
        </button>

      </div>

      <div id="medical-form" class="report-form d-none">
        <form method="POST" action="function/login.php">
          <div class="form-group">
            <label for="nik">Username</label>
            <input type="text" class="form-control" required name="username" placeholder="Masukan Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" required name="password" placeholder="Masukan password">
          </div>
          <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
        <button class="btn btn-secondary btn-block mt-3" onclick="showMenu()">
          Kembali
        </button>
      </div>

      <div id="history-form" class="report-form d-none">
        <form method="POST" action="view.php">
          <div class="form-group">
            <label for="nik">Nik</label>
            <input type="number" class="form-control" minlength="1" maxlength="16" pattern="\d{1,16}" required
              name="nik" placeholder="Masukan Nik">
          </div>
          <button type="submit" name="cek" class="btn btn-primary btn-block">Cek laporan</button>
        </form>
        <a href="index.php" class="btn btn-secondary btn-block mt-3">
          Kembali
        </a>
      </div>
    </div>
  </div>

  <script>
    function validateLength(event) {
      var input = event.target;
      if (input.value.length > 16) {
        input.value = input.value.slice(0, 16);
      }
    }

    function validateKeyPress(event) {
      var charCode = (event.which) ? event.which : event.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
      }
    }

    function validateForm(event) {
      var input = document.getElementById('nik');
      if (input.value.length !== 16) {
        event.preventDefault();
        alert("NIK must be exactly 16 digits.");
      }
    }

    function showForm(formType) {
      document.getElementById("main-menu").classList.add("d-none");
      document.querySelectorAll(".report-form").forEach((form) => {
        form.classList.add("d-none");
      });
      document.getElementById(formType + "-form").classList.remove("d-none");
    }

    function showMenu() {
      document.getElementById("main-menu").classList.remove("d-none");
      document.querySelectorAll(".report-form").forEach((form) => {
        form.classList.add("d-none");
      });
    }

    document.getElementById('ktp').addEventListener('change', function (event) {
      var files = event.target.files;
      var preview = document.getElementById('preview_ktp');

      // Clear any existing content
      preview.innerHTML = '';

      // Loop through all selected files
      for (var i = 0; i < files.length; i++) {
        var file = files[i];

        // Only process image files
        if (!file.type.match('image.*')) {
          continue;
        }

        var imgContainer = document.createElement('div');
        imgContainer.style.marginBottom = '20px'; // Spacing between each image container

        var img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.height = '100px';
        img.style.display = 'block'; // Ensure the image is displayed in a block to put it on a new line
        img.style.marginBottom = '10px';

        var fileInfo = document.createElement('p');
        //fileInfo.textContent = `File Name: ${file.name}, Type: ${file.type}, Size: ${file.size} bytes`;
        fileInfo.style.fontSize = '14px';
        fileInfo.style.marginTop = '0';

        // Append the image and file info to the container
        imgContainer.appendChild(img);
        imgContainer.appendChild(fileInfo);

        // Append the container to the preview div
        preview.appendChild(imgContainer);
      }
    });

    document.getElementById('bukti').addEventListener('change', function (event) {
      var files = event.target.files;
      var preview = document.getElementById('preview_bukti');

      // Clear any existing content
      preview.innerHTML = '';

      // Loop through all selected files
      for (var i = 0; i < files.length; i++) {
        var file = files[i];

        // Only process image files
        if (!file.type.match('image.*')) {
          continue;
        }

        var imgContainer = document.createElement('div');
        imgContainer.style.marginBottom = '20px'; // Spacing between each image container

        var img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.height = '100px';
        img.style.display = 'block'; // Ensure the image is displayed in a block to put it on a new line
        img.style.marginBottom = '10px';

        var fileInfo = document.createElement('p');
        //fileInfo.textContent = `File Name: ${file.name}, Type: ${file.type}, Size: ${file.size} bytes`;
        fileInfo.style.fontSize = '14px';
        fileInfo.style.marginTop = '0';

        // Append the image and file info to the container
        imgContainer.appendChild(img);
        imgContainer.appendChild(fileInfo);

        // Append the container to the preview div
        preview.appendChild(imgContainer);
      }
    });
  </script>
</body>

</html>