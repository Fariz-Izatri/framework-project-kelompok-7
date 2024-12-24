<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<form class="row g-3">
    <div class="col-auto">
        <Select name="filter_bulan" class="form-control">
            <option value="">--Pilih Bulan--</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </Select>
    </div>
    <div class="col-auto">
        <select name="filter_tahun" class="form-control">
            <option value="">--Pilih Tahun--</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
        </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Tampilkan</button>
    </div>
    <div class="col-auto">
        <button type="submit" name="excel" class="btn btn-success mb-3">Export Exel</button>
    </div>
</form>

<span>Menampilkan data:
    <?php if ($bulan) : ?>
        <?= date('F Y', strtotime($tahun . '-' . $bulan)) ?>
    <?php else : ?>
        <?= date('F Y') ?>
    <?php endif; ?>
</span>
<table class="table table-striped table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Total Jam Kerja</th>
        <th>Total Keterlambatan</th>
    </tr>

    <?php if ($rekap_bulanan) : ?>
        <?php $no = 1;
        foreach ($rekap_bulanan as $rekap) : ?>
            <?php
            // Menghitung total jam kerja
            $timestamp_jam_masuk = strtotime($rekap['tanggal_masuk'] . $rekap['jam_masuk']);
            $timestamp_jam_keluar = strtotime($rekap['tanggal_keluar'] . $rekap['jam_keluar']);
            $selisih = $timestamp_jam_keluar - $timestamp_jam_masuk;
            $jam = floor($selisih / 3600);
            $selisih -= $jam * 3600;
            $menit = floor($selisih / 60);

            // Menghitung total jam keterlambatan
            $jam_masuk_real = strtotime($rekap['jam_masuk']);
            $jam_masuk_kantor = strtotime($rekap['jam_masuk_kantor']);
            $selisih_terlambat = $jam_masuk_real - $jam_masuk_kantor;
            $jam_terlambat = floor($selisih_terlambat / 3600);
            $selisih_terlambat -= $jam_terlambat * 3600;
            $menit_terlambat = floor($selisih_terlambat / 60);


            // dd($selisih);

            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rekap['nama'] ?></td>
                <td><?= date('d F Y', strtotime($rekap['tanggal_masuk'])) ?></td>
                <td><?= $rekap['jam_masuk'] ?></td>
                <td><?= $rekap['jam_keluar'] ?></td>
                <td>
                    <?php if ($rekap['jam_keluar'] == '00:00:00') : ?>
                        0 Jam 0 Menit
                    <?php else : ?>
                        <?= $jam . ' Jam ' . $menit . ' Menit ' ?>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if ($jam_terlambat < 0 || $menit_terlambat < 0) : ?>
                        <span class="btn btn-success">On Time</span>
                    <?php else : ?>
                        <?= $jam_terlambat . ' Jam ' . $menit_terlambat . ' Menit ' ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Data tidak tersedia.</td>
        </tr>
    <?php endif; ?>
</table>

<?= $this->endSection() ?>