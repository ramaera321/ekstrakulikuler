<?php $this->load->view("includes/header.php") ?>

<div class="app-body">
    <?php $this->load->view("includes/menu.php") ?>

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                Hasil Perhitungan
            </li>
            <li class="breadcrumb-item active">Proses hitung</li>
            <!-- Breadcrumb Menu-->

        </ol>



        <div class="container-fluid justify-content-center">
            <div class="animated fadeIn">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <strong>Fuzzy Tsukamoto</strong>
                            </div>
                            <div class="card-body">
                                <hr>
                                <p><strong>Defuzzifikasi</strong></p>
                                <div class="form-group">
                                    <p>Total Rata-rata dari tiap ekstra</p>
                                    <div class="text-align-center">
                                        <table class="tabelku">
                                            <tr>
                                                <th>Bulu Tangkis</th>
                                                <td>: <?php echo $ekstra[0] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Futsal</th>
                                                <td>: <?php echo $ekstra[1] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Modern Dance</th>
                                                <td>: <?php echo $ekstra[2] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Tapak Suci</th>
                                                <td>: <?php echo $ekstra[3] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Tari</th>
                                                <td>: <?php echo $ekstra[4] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Paskibra</th>
                                                <td>: <?php echo $ekstra[5] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Film</th>
                                                <td>: <?php echo $ekstra[6] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Seni Musik</th>
                                                <td>: <?php echo $ekstra[7] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Pemrograman</th>
                                                <td>: <?php echo $ekstra[8] ?></td>

                                            </tr>
                                            <tr>
                                                <th>Hizbul Wathan</th>
                                                <td>: <?php echo $ekstra[9] ?></td>

                                            </tr>
                                            <tr>
                                                <th>KIR</th>
                                                <td>: <?php echo $ekstra[10] ?></td>

                                            </tr>
                                            <tr>
                                                <th>PMR</th>
                                                <td>: <?php echo $ekstra[11] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Qiroa'ah</th>
                                                <td>: <?php echo $ekstra[12] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Basket</th>
                                                <td>: <?php echo $ekstra[13] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jurnalistik</th>
                                                <td>: <?php echo $ekstra[14] ?></td>
                                            </tr>
                                            <tr class="align-top">
                                                <th>Rekomendasi Ekstra</th>
                                                <td><?php arsort($ekstra);
                                                    $no = 1;
                                                    $arr = array('Bulu Tangkis', 'Futsal', 'Modern Dance', 'Tapak Suci', 'Tari', 'Paskibra', 'Film', 'Seni Musik', 'Premrograman', 'Hizbul Wathan', 'KIR', 'PMR', "Qiroa'ah", 'Basket', 'Jurnalistik');
                                                    foreach ($ekstra as $x => $x_value) { //gae nyeluk extra teko array sing wes di urutno
                                                        echo '&nbsp; ' . $no . '. ' . $arr[$x] . ' Dengan Nilai ' . $x_value . "<br>";
                                                        $no++;
                                                        if ($no == 4) break;
                                                    } ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <form action="<?php echo base_url('index.php/produksi/C_produksi/save') ?>" method="post">
                                <input type="hidden" name="extra0" value="<?= $ekstra[0] ?>">
                                <input type="hidden" name="extra1" value="<?= $ekstra[1] ?>">
                                <input type="hidden" name="extra2" value="<?= $ekstra[2] ?>">
                                <input type="hidden" name="extra3" value="<?= $ekstra[3] ?>">
                                <input type="hidden" name="extra4" value="<?= $ekstra[4] ?>">
                                <input type="hidden" name="extra5" value="<?= $ekstra[5] ?>">
                                <input type="hidden" name="extra6" value="<?= $ekstra[6] ?>">
                                <input type="hidden" name="extra7" value="<?= $ekstra[7] ?>">
                                <input type="hidden" name="extra8" value="<?= $ekstra[8] ?>">
                                <input type="hidden" name="extra9" value="<?= $ekstra[9] ?>">
                                <input type="hidden" name="extra10" value="<?= $ekstra[10] ?>">
                                <input type="hidden" name="extra11" value="<?= $ekstra[11] ?>">
                                <input type="hidden" name="extra12" value="<?= $ekstra[12] ?>">
                                <input type="hidden" name="extra13" value="<?= $ekstra[13] ?>">
                                <input type="hidden" name="extra14" value="<?= $ekstra[14] ?>">

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-dot-circle-o"></i> Simpan</button>
                            </form>
                            <a class="btn btn-sm btn-danger" href="<?= site_url('produksi/c_produksi/lihat/' . $tanggal)
                                                                    ?>">
                                Kembali
                            </a>

                        </div>

                        </form>

                    </div>
                </div>
                <!-- /.col-->
            </div>

        </div>

</div>


</main>
</div>
<?php $this->load->view("includes/footer"); ?>