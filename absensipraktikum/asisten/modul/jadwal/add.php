<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add event listeners to toggle
    window.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('.toggle');
        toggles.forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    });
</script>
<style type="text/css">
    .toggle {
        width: 100%;
        height: 100%;
        justify-content: center;
        cursor: pointer;
    }

    .toggle.active {
        background-color: greenyellow;
    }
</style>
<?php
$sql = mysqli_query($con, "SELECT * FROM tb_asisten
        INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum
        WHERE id_asisten = '$id_login'") or die(mysqli_error($con));

$data = mysqli_fetch_array($sql);
?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jadwal</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Jadwal Mengajar</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Jadwal</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="col">
                <!-- card nama dan praktikum -->
                <div class="card">
                    <div class="form-group">
                        <label>Nama Asisten</label>
                        <input type="text" name="asisten" class="form-control-plaintext" readonly value="<?= $data['nama_asisten'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Praktikum</label>
                        <input type="text" name="praktikum" class="form-control-plaintext" readonly value="<?= $data['nama_praktikum'] ?>">
                    </div>
                </div>
                <!-- end card nama dan praktikum -->
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pilih Jadwal Mengajar</div>
                    </div>
                    <div class="card-body">
                        <!-- toggle pilih jadwal -->
                        <div class="table-responsive col-12 h-100 rounded">
                            <table class="schedule-table table table-bordered table-responsive-md">
                                <thead>
                                    <tr>
                                        <th scope="col">Shift</th>
                                        <th scope="col">Monday</th>
                                        <th scope="col">Tuesday</th>
                                        <th scope="col">Wednesday</th>
                                        <th scope="col">Thursday</th>
                                        <th scope="col">Friday</th>
                                        <th scope="col">Saturday</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light align-items-center">
                                    <tr>
                                        <th scope="col">Shift 1 (06.30-09.00)</th>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shift 2 (09.30-12.00)</th>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shift 3 (12.30-15.00)</th>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shift 4 (15.30-18.00)</th>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                        <td>
                                            <div class="toggle"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end toggle pilih jadwal -->
                        <!-- button bagian bawah -->
                        <div class="form-group">
                            <a href="javascript:history.back()" class="btn btn-default">
                                <i class="fa-solid fa-caret-left"></i> Kembali
                            </a>
                            <button type="submit" onclick='callPHP()' class="btn btn-primary">
                                <i class="far fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php

        if (isset($_POST['save'])) {


            $shift = $_POST['id_shift'];
            $asisten = $_POST['id_asisten'];
            $praktikum = $_POST['id_praktikum'];
            $hari = $_POST['id_hari'];

            $insert = mysqli_query($con, "INSERT INTO tb_mengajar VALUES (NULL,'$shift','$asisten','$praktikum','$hari') ");
            $del = mysqli_query($con, "DELETE FROM tb_asisten WHERE id_asisten=$_GET[id]");

            if ($insert) {
                echo "
								<script type='text/javascript'>
								setTimeout(function () { 

								swal('Sukses', 'Jadwal ditambahkan', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('?page=jadwal');
								} ,3000);   
								</script>";
            } elseif ($del) {
                echo " <script>
                                alert('Data telah dihapus !');
                                window.location='?page=jadwal';
                                </script>";
            }
        }
        ?>
    </div>
</div>

<script>
    //input  teach schedule to database
    function callPHP() {
        const toggles = document.getElemetsByClassName('toggle');
        const binaryArray = [
            [],
            [],
            [],
            [],
            [],
            []
        ];

        for (let i = 0; i < toggles.length; i++) {
            const toggle = toggles[i];
            const dayIndex = i % 6;
            const value = toggle.classList.contains('active') ? 1 : 0;
            binaryArry[dayIndex].push(value);
        }

        const combinedBinaryArray = binaryArray.flatMap(arr => arr);
        console.log(combinedBinaryArray);

        $.ajax({
            type: 'POST',
            url: 'proses.php',
            data: {
                combinedBinaryArray: combinedBinaryArray
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>