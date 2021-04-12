<html>
<head>
	<title>Menampilkan Data MySQL Ke Dalam Tabel HTML</title>
</head>
<body>
	<h1>Tabel 1</h1>
	<table class="data-table">
		<caption class="title">Data Penjualan Divisi Elektronik</caption>
		<thead>
			<tr>
				<th>IDPerson</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$bulan	= array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		while ($row = mysqli_fetch_array($query))
		{
			$tgl 	= explode('-', $row['tanggal']);
			$harga  = $row['harga'] == 0 ? '' : number_format($row['harga'], 0, ',', '.');
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['nama'].'</td>
					<td>'.$row['item'].'</td>
					<td>'.$tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0] . '</td>
					<td>'.$harga.'</td>
				</tr>';
			$total += $row['harga'];
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($total, 0, ',', '.')?></th>
			</tr>
		</tfoot>
	</table>
</body>
</html>