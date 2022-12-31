<?php $this->load->view("includes/header.php") ?>

<div class="app-body">
    <?php $this->load->view("includes/menu.php") ?>

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Perhitungan</a>
            </li>
            <li class="breadcrumb-item active">Tambah Hitungan</li>
            <!-- Breadcrumb Menu-->

        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">

                                <strong>hitung</strong>
                            </div>
                            <?= $this->session->flashdata('pesan') ?>
                            <div class="card-body">
                                <?php
                                foreach ($detail_pengetahuan as $p) :
                                    $tanggal = date('d/m/Y', strtotime($p->tanggal));
                                ?>
                                    <form class="form-horizontal" action="<?= site_url('produksi/c_produksi/hitung/' . $p->Id_perhitungan) ?>" method="post">
                                        <input type="hidden" name="id_p" value="<?php echo $p->Id_perhitungan ?>">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Nama Siswa</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="Username" placeholder="Text" value="<?php echo $p->Username ?>" readonly>

                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                        <input class="col-md-2 col-form-label" for="text-input">Nama Siswa</input>

                                        <div class="form-group col-sm-4">
                                            <select class="form-control" name="Username">

                                                <input value="<?php echo $p->Username ?>"  readonly><?php echo $p->Username ?> 
                                                </input> 

                                            </select>
                                        </div> 
                                    </div>  -->
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tanggal/Bulan/Tahun
                                                Produksi</label>

                                            <div class="col-sm-4">
                                                <input class="form-control tanggal1" value="30-11-2022" type="text" name="tgl_p" placeholder="Tanggal Produksi" value="<?= $this->input->post('tgl_p') ?>">
                                                <?= form_error('tgl_p') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="tanggal" readonly placeholder="Text" value="<?php echo $tanggal ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K1
                                                Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K1_min" placeholder="Text" value="<?php echo $p->K1_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K1
                                                Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K1_max" placeholder="Text" value="<?php echo $p->K1_baik ?>" readonly>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K2
                                                Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K2_min" placeholder="Text" value="<?php echo $p->K2_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K2
                                                Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K2_max" placeholder="Text" value="<?php echo $p->K2_baik ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K3 Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K3_min" placeholder="Text" value="<?php echo $p->K3_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K3 Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K3_max" placeholder="Text" value="<?php echo $p->K3_baik ?>" readonly>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K4 Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K4_min" placeholder="Text" value="<?php echo $p->K4_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K4 Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K4_max" placeholder="Text" value="<?php echo $p->K4_baik ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K5 Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K5_min" placeholder="Text" value="<?php echo $p->K5_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K5 Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K5_max" placeholder="Text" value="<?php echo $p->K5_baik ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K6 Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K6_min" placeholder="Text" value="<?php echo $p->K6_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K6 Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K6_max" placeholder="Text" value="<?php echo $p->K6_baik ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">K7 Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K7_min" placeholder="Text" value="<?php echo $p->K7_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">K7 Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="K7_max" placeholder="Text" value="<?php echo $p->K7_baik ?>" readonly>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Ekstra Minimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="nilai_ekstra_min" placeholder="Text" value="<?php echo $p->nilai_ekstra_cukup ?>" readonly>

                                            </div>
                                            <label class="col-md-2 col-form-label" for="text-input">Ekstra Maksimal</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="nilai_ekstra_max" placeholder="Text" value="<?php echo $p->nilai_ekstra_baik ?>" readonly>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- <div class="col-md-5">
		
		<form method="post">
			<?php foreach ($variabel as $index => $data) : ?>
				<?php
                                        if ($data['id_variabel'] == "1") {
                                            $label = "Kemampuan Olahraga";
                                        } elseif ($data['id_variabel'] == "2") {
                                            $label = "Hasil Tes Minat";
                                        } elseif ($data['id_variabel'] == "3") {
                                            $label = "Tinggi Badan";
                                        } elseif ($data['id_variabel'] == "4") {
                                            $label = "Kemampuan Dasar";
                                        } else {
                                            $label = "";
                                        }
                ?>
				<div class="form-group">
					<label><?php echo $data['nama_variabel'] ?></label>
					<div class="input-group">						
						<?php if ($data['status_himpunan_variabel'] == "sembunyikan") : ?>				
							<input class="form-control" type="text" name="id_variabel[<?php echo $data['id_variabel']; ?>]" value ="<?php if ($data['nama_variabel'] == "IMT") {
                                                                                                                                        echo $imt;
                                                                                                                                    } ?>" required>
							<span class="input-group-addon"><?php echo $label; ?></span>
							<?php else : ?>
								<br>
								<?php foreach ($himpunan[$data['id_variabel']] as $key => $value) : ?>
									<input type="radio" name="id_variabel[<?php echo $data['id_variabel'] ?>]" value="<?php if ($value['nama_himpunan'] == "Ya") {
                                                                                                                            echo "1";
                                                                                                                        } else {
                                                                                                                            echo "0";
                                                                                                                        } ?>"> <?php echo $value['nama_himpunan'] ?>
								<?php endforeach ?>
							<?php endif ?>
						</div>
					</div>
				<?php endforeach ?>
                <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
			</form>
		</div>
	</div> -->
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="text-input">K1</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K1" value="92">
                                                    <?= form_error('K1') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K2</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K2" value="89">
                                                    <?= form_error('K2') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K3</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K3" value="178">
                                                    <?= form_error('K3') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K4</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K4" value="90">
                                                    <?= form_error('K4') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K5</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K5" value="87">
                                                    <?= form_error('K5') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K6</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K6" value="86">
                                                    <?= form_error('K6') ?>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="text-input">K7</label>
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="number" name="K7" value="88">
                                                    <?= form_error('K7') ?>
                                                </div>
                                            </div>






                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                                                <button class="btn btn-sm btn-danger" type="reset">
                                                    <i class="fa fa-ban"></i> Reset</button>
                                            </div>

                                    </form>
                                <?php endforeach; ?>

                            </div>

                        </div>
                    </div>



                </div>
            </div>

            <!-- /.col-->
        </div>
    </main>
</div>
<?php $this->load->view("includes/footer"); ?>