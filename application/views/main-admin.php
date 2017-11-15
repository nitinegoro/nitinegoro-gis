<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<div class="page-header">
  <h1>Home</h1>
</div>
					<p>Nitinegoro GIS adalah GIS yang dibangun dengan PHP (Framework Codeigniter 3), Google Maps V3 API dan Twitter bootstrap, Dibuat demi memenuhi tugas Mata Kuliah <i>Geographic Information System</i> STMIK Atma Luhur, Dosen (<i>Yohannes Setiawan</i>).</p>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama Pengembang</td>
								<td width="50" class="text-center">:</td>
								<td>Muhammad Viky Saputra</td>
							</tr>
							<tr>
								<td>Biografi</td>
								<td width="50" class="text-center">:</td>
								<td><a href="http://vicky.work">http://vicky.work</a></td>
							</tr>
							<tr>
								<td>Kelompok</td>
								<td width="50" class="text-center">:</td>
								<td>TW</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td width="50" class="text-center">:</td>
								<td>1411500174</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td width="50" class="text-center">:</td>
								<td><a href="https://www.google.com/maps/place/Servis+Kursi+Pak+Zaini/@-2.1286468,106.1209883,18z/data=!4m5!3m4!1s0x0:0x23035b1edf16240f!8m2!3d-2.1287544!4d106.1208218?hl=en-US">Jl. Pasir Putih, Pasir Putih, Rangkui, Kota Pangkal Pinang</a></td>
							</tr>
							<tr>
								<td>Nomor Telepon</td>
								<td width="50" class="text-center">:</td>
								<td><a href="https://api.whatsapp.com/send?phone=6282373004116&text=Halo, Vicky Saputra, saya ada kendala dalam menginstal aplikasi Nitinegoro GIS V1">082-373-004-116</a></td>
							</tr>
						</tbody>
<?php
$this->load->view('footerAdmin', $this->data);

/* End of file main-admin.php */
/* Location: ./application/views/main-admin.php */