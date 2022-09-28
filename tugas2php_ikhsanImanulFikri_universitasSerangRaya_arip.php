<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tugas 2 php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container px-5 my-5">
        <form id="contactForm" method="POST">
            <div class="mb-3">
                <label class="form-label" for="namaPegawai">Nama Pegawai</label>
                <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai"
                    data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="agama">Agama</label>
                <select class="form-select" name="agama" aria-label="Agama">
                    <option value="--Masukan Agama--">--Masukan Agama--</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen</option>
                    <option value="Katolik">Hindu</option>
                    <option value="Hindu">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Jabatan</label>
                <div class="form-check">
                    <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="assisten" type="radio" name="jabatan" value="Assisten Manager"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="assisten">Assisten</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kabag"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="kabag">Kabag</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="staff">Staff</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Status</label>
                <div class="form-check">
                    <input class="form-check-input" id="menikah" type="radio" name="status" value="Menikah"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah"
                        data-sb-validations="required" />
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
                <input class="form-control" name="anak" type="text" placeholder="Jumlah Anak"
                    data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" name="proses" type="submit">Simpan</button>
            </div>
        </form>
        <?php
        error_reporting(0);
            $nama = $_POST['namaPegawai'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $anak = $_POST['anak'];
            $gapok = 0;
            $zakat;
            $klik = $_POST['proses'];

            switch ($jabatan) {
                case 'Manager':$gapok = 20000000; break;
                case 'Assisten Manager':$gapok =  15000000; break;
                case 'Kabag':$gapok =  10000000; break;
                case 'Staff':$gapok =  4000000; break;
                default:$gapok = 0;
            }

            $tunjab = 0.2 * $gapok;
            $tunkel = 0;

            if ($status  == 'Menikah' && $anak <= 2) $tunkel = 0.05 * $gapok;
            else if ($status == 'Menikah' && $anak >= 3 && $anak <= 5) $tunkel = 0.1 * $gapok;
            else if ($status == 'Menikah' && $anak > 5) $tunkel = 0.15 * $gapok;
            else $tunkel = 0;;

            $gakot = $gapok + $tunjab + $tunkel;

            if ($agama == 'Islam' && $gakot >= 6000000) $zakat = 0.025 * $gakot;
            else $zakat = 0;

            $hompey = $gakot - $zakat;

        if (isset($klik)) { ?>
        <br>
        <table class="table table-info">
            <thead>
                <tr>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Tunjangan Jabatan</th>
                    <th scope="col">Tunjangan Keluarga</th>
                    <th scope="col">Gaji Kotor</th>
                    <th scope="col">Zakat</th>
                    <th scope="col">Take Home Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $nama; ?></td>
                    <td><?= $agama; ?></td>
                    <td><?= $jabatan; ?></td>
                    <td><?= $status; ?></td>
                    <td><?= number_format($gapok, 0, ',', '.'); ?></td>
                    <td><?= number_format($tunjab, 0, ',', '.'); ?></td>
                    <td><?= number_format($tunkel, 0, ',', '.'); ?></td>
                    <td><?= number_format($gakot, 0, ',', '.');; ?></td>
                    <td><?= number_format($zakat, 0, ',', '.');?></td>
                    <td><?= number_format($hompey, 0, ',', '.'); ?></td>
            </tbody>
        </table>
        <?php } ?>



    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</html>