<?php
include 'include/config.php';

$id = $_GET['edit'];
$query = "SELECT * FROM laporan WHERE id_laporan = '$id'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Pengaduan Masyarakat</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link href="css/custom/index.css" rel="stylesheet" /> -->
    <style>
        .container {
            max-width: 900px;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <div id="form-container">
            <div id="fire-form" class="report-form">
                <form action="function/proses_laporan.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo $data['id_laporan']; ?>" hidden>
                    <hr>
                    <h1>DATA DIRI</h1>
                    <div class="form-group">
                        <!-- <label for="nik">Nik</label> -->
                        <input type="number" class="form-control" id="nik" name="nik" minlength="16" maxlength="16"
                            pattern="\d{1,16}" placeholder="Masukan nik Anda" hidden value="<?php echo $data['nik']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Masukan nama Anda" value="<?php echo $data['nama']; ?>"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="birthplace">Tempat Lahir</label>
                        <input type="text" class="form-control" id="birthplace" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"
                            placeholder="Masukan Tempat Lahir Anda" required />
                    </div>
                    <div class="form-group">
                        <label for="birth">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birth" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="jenis_kelamin" required>
                            <option disabled selected value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>"
                            placeholder="Masukan Alamat Anda" required />
                    </div>
                    <div class="form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" class="form-control" id="job" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>"
                            placeholder="Masukan Pekerjaan Anda" required />
                    </div>
                    <!-- <div class="form-group">
                        <label for="ktp">Unggah Foto KTP</label>
                        <input type="file" class="form-control" id="ktp" name="foto_ktp" accept="image/*" required />
                        <div id="preview_ktp"></div>
                    </div> -->
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="text" pattern="[0-9]{12}"  class="form-control" id="hp" name="hp" placeholder="Masukan No HP Anda" value="<?php echo $data['no_hp']; ?>"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="wa">No WA (+62)</label>
                        <input type="text" pattern="[0-9]{12}" class="form-control" id="wa" name="wa" placeholder="Masukan No WA Anda" value="<?php echo $data['no_wa']; ?>"
                            required />
                    </div>
                    <hr>
                    <h1>LAPORAN PELANGGARAN PERDA</h1>
                    <div class="form-group">
                        <label for="tanggal_kejadiab">Tanggal Kejadian</label>
                        <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" value="<?php echo $data['tanggal_kejadian']; ?>"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="fire-location">Lokasi Kejadian</label>
                        <input type="text" class="form-control" id="fire-location" name="lokasi" value="<?php echo $data['alamat_kejadian']; ?>"
                            placeholder="Masukan alamat kejadian" required />
                    </div>
                    <!-- <div class="form-group">
                        <label for="terlapor">Terlapor</label>
                        <input type="text" class="form-control" id="terlapor" name="terlapor" placeholder="Terlapor" value="<?php //echo $data['terlapor']; ?>"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="korban">Korban</label>
                        <input type="text" class="form-control" id="korban" name="korban" placeholder="Korban" value="<?php //echo $data['korban']; ?>"
                            required />
                    </div> -->
                    <div class="form-group">
                        <label for="kejadian">Apa Yang Terjadi</label>
                        <input type="text" class="form-control" id="kejadian" name="yang_terjadi" value="<?php echo $data['yang_terjadi']; ?>"
                            placeholder="Yang Terjadi" required />
                    </div>
                    <div class="form-group">
                        <label for="bagaimana">Bagaimana Terjadi</label>
                        <input type="text" class="form-control" id="bagaimana" name="kejadian" value="<?php echo $data['bagaimana_terjadi']; ?>"
                            placeholder="Bagaimana Terjadi" />
                    </div>
                    <!-- <div class="form-group">
                        <label for="pidana">Tindak Pidana</label>
                        <input type="text" class="form-control" id="pidana" name="pidana" placeholder="Tindak Pidana" value="<?php //echo $data['pidana']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="saksi">Saksi</label>
                        <input type="text" class="form-control" id="saksi" name="saksi" placeholder="Saksi" value="<?php //echo $data['saksi']; ?>" required />
                    </div> -->
                    <div class="form-group">
                        <label for="description">Uraian Kejadian</label>
                        <textarea class="form-control" id="description" name="uraian" rows="3"
                            placeholder="Masukan laporan anda" required><?php echo $data['kejadian']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fire-upload">Unggah Foto Bukti Laporan</label>
                        <input type="file" class="form-control" id="bukti" name="foto_bukti" accept="image/*"
                            required />
                        <div id="preview_bukti"></div>
                    </div>
                    <button type="submit" name="change" class="btn btn-primary btn-block">
                        Edit Laporan
                    </button>
                </form>
                <button onclick="history.back();" class="btn btn-secondary btn-block mt-3">
                    Kembali
                </button>

            </div>
        </div>

        <script>
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