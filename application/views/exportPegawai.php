<table border="1">
    <tbody>
        <tr>
            <td style="font-weight: bold; font-size: 18px" colspan="19">DAFTAR PEGAWAI</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 18px" colspan="19">DINAS LINGKUNGAN HIDUP KOTA TANGERANG SELATAN</td>
        </tr>

        <tr>
            <td colspan="19"></td>
        </tr>

        <tr>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NIP&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NAMA&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;L/P&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;JABATAN&nbsp;</th>
            <th colspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;PENDIDIKAN TERAKHIR&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;TEMPAT LAHIR&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;TANGGAL LAHIR&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;EMAIL&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;ALAMAT&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO. KTP&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO. REKENING&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO. BPJS KESEHATAN&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO. BPJS KETENAGAKERJAAN&nbsp;</th>
            <th rowspan="2" style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;NO. NPWP&nbsp;</th>
        </tr>
        <tr>
            <th style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;JENJANG&nbsp;</th>
            <th style="background-color: #E0E0E0; font-weight: bold; white-space: nowrap;">&nbsp;JURUSAN&nbsp;</th>
        </tr>
        <?php $no = 1; foreach($pegawai->result() as $row){ ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $row->nip ?></td>
                <td><?= $row->nama ?></td>
                <td align="center"><?= $row->jenis_kelamin ?></td>
                <td><?= $row->jabatan ?></td>
                <td align="center"><?= $row->jenjang ?></td>
                <td align="center"><?= $row->jurusan ?></td>
                <td><?= $row->kd_lokasi_lahir ?></td>
                <td align="center"><?= date('d-m-Y', strtotime($row->tgl_lahir1)) ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->alamat ?></td>
                <td align="center"><?= $row->NOKTP ?></td>
                <td align="center"><?= $row->NOREK ?></td>
                <td align="center"><?= $row->NOBPJS ?></td>
                <td align="center"><?= $row->NOBPJSNAKER ?></td>
                <td align="center"><?= $row->NPWP ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>