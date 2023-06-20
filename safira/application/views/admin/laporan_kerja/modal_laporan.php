	<button class="btn btn-danger" data-toggle="modal" data-target="#1">
	<i class="fa fa-print"></i> Cetak Laporan Kerja Karyawan
</button>

<div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header alert alert-success">
	<button type="button" class="close" data-dismiss="modal" aria_hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Cetak Data Laporan Kerja Karyawan </h4>
</div>

<div class="modal-body">
	<h4>Cetak berdasarkan tanggal laporan dan nama karyawan</h4>
	<form action="laporan_kerja_admin/laporancetakperiode" method="post" target="_blank">

	<div class="col-md-12">
		<table>
			<tr>
				<td>
					<div class="form-group"><b>Dari Tanggal </b></div>				
				</td>
				<td align="center" width="5%">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group">
					<input type="date" class="form-control" name="tgl_a" required>
					</div>				
				</td>
					&nbsp;
			   <td>
					<div class="form-group"><b>Sampai Tanggal </b></div>				
				</td>
				<td align="center">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group">
					<input type="date" class="form-control" name="tgl_b" required>
					</div>				
				</td> 

			</tr>
			<tr>


			    <td>
					<div class="form-group"><b>Nama Karyawan </b></div>				
				</td>
				<td align="center">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group" >						
                    <select name="nama" class="default-select2 form-control">
                    <option>--Pilih Karyawan--</option>

                    <?php 
                        foreach ($this->db->get('karyawan')->result() as $row) {
                     ?>
                    <option value="<?php echo $row->nama ?>"><b><?php echo $row->NIK ?> - <?php echo $row->nama ?></b></option>
                        <?php } ?>
                    </select>
					</div>			
				</td>

		           <td>
					<div class="form-group"><b>Status Laporan </b></div>				
				</td>
				<td align="center">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group">						
                    <select name="status_laporan" class="form-control">
							<option value="">--Pilih Status--</option>
							<option value="diterima">diterima</option>
							<option value="ditolak">ditolak</option>
							<option value="belum di proses">belum di proses</option>
                    </select>
					</div>			
				</td>

			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="cetak" class="btn btn-danger" value="Cetak">
				</td>
			</tr>
		</table>
	</form>
	</div>

</div>
<div class="modal-footer">
	<a href="laporan_kerja_admin/laporancetak" target="_blank" class="btn btn-primary">Cetak Semua Data</a>
	<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>
