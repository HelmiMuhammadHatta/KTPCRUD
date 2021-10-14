<table>
	<thead>
		<tr>
			<th>NO</th>
			<th>NIK</th>
			<th>NAMA</th>
			<th>TEMPAT TANGGAL LAHIR</th>
			<th>JENIS KELAMIN</th>
			<th>GOLONGAN DARAH</th>
			<th>ALAMAT</th>
			<th>AGAMA</th>
			<th>STATUS KAWIN</th>
			<th>PEKERJAAN</th>
			<th>KEWARGANEGARAAN</th>
			<th>FOTO</th>
		</tr>
	</thead>
	<tbody>
		<?php $num=0; foreach ($ktpData as $key => $kd) { $num++; ?>

		<tr>
			<td><?= $num ?></td>
			<td><?= sprintf("%016d",$kd->id) ?></td>
			<td><?= $kd->nama ?></td>
			<td><?= $kd->tempat_lahir.' / '.$kd->tanggal_lahir ?></td>
			<td><?= $kd->jenis_kelamin ?></td>
			<td><?= $kd->golongan_darah ?></td>
			<td><?= $kd->alamat ?></td>
			<td><?= $kd->agama ?></td>
			<td><?= $kd->status_kawin ?></td>
			<td><?= $kd->pekerjaan ?></td>
			<td><?= $kd->kewarganegaraan ?></td>
			<td><img height="32px" src="<?= asset(Storage::url($kd->foto)) ?>" alt=""></td>
		</tr>

		<?php } ?>
	</tbody>
</table>