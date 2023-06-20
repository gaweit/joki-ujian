       <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
		<!-- <th>Id User</th> -->
		<th>Nama Karyawan</th>
		<th>Tanggal Lapor</th>
		<th>File Laporan</th>
		<th>Klik URL Tugas</th>
		<th>Status Laporan</th>
		<th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($laporan_kerja as $laporan_kerja)
            {
                ?>
                <tr>
			<td width="80px"><?php echo '1' ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
			<td><?php echo $laporan_kerja->nama ?> - <b><?php echo $laporan_kerja->bagian_karyawan ?></b></td>
			<td><?php echo $laporan_kerja->tanggal_lapor ?></td>
			<td>       
                <a href="<?php echo base_url('admin/laporan_kerja/file_laporan/'.$laporan_kerja->id_laporan_kerja) ?>"><label><small style="color: blue"><i class="fa fa-download"></i> <?php echo $laporan_kerja->file_laporan ?></small></label><br><br></a>    
            </td>
			<td> <a href="<?php echo $laporan_kerja->url ?>" target=_blank ><?php echo $laporan_kerja->url ?></a></td>
			<td>
                       <?php
                if($laporan_kerja->status_laporan == "belum di proses"){ ?>
                    <?php echo '<span class="label label-warning">'.$laporan_kerja->status_laporan.'</span>' ?>
                <?php }else if($laporan_kerja->status_laporan == "diterima"){ ?> 
                    <?php echo '<span class="label label-success fa fa-check">'.$laporan_kerja->status_laporan.'</span>'
                    ?>
               <?php  }else{echo '<span class="label label-danger">'.$laporan_kerja->status_laporan.'</span>';}  
               ?>         
            </td>

		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>