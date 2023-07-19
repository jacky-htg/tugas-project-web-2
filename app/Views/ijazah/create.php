<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
<div class="right_col" role="main" style="min-height: 3790px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ijazah</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?= validation_list_errors() ?>

                        <?= form_open('ijazah/create'); ?>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="taruna">Taruna <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="taruna" name="taruna" required="required" class="form-control " value="<?= set_value('taruna') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="program_studi">Program Studi <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="program_studi" name="program_studi" required="required" class="form-control " value="<?= set_value('program_studi') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_ijazah">Tanggal Ijazah <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="tanggal_ijazah" name="tanggal_ijazah" required="required" class="form-control " value="<?= set_value('tanggal_ijazah') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_pengesahan">Tanggal Pengesahan <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="tanggal_pengesahan" name="tanggal_pengesahan" required="required" class="form-control " value="<?= set_value('tanggal_pengesahan') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="gelar_akademik">Gelar Akademik <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="gelar_akademik" name="gelar_akademik" required="required" class="form-control " value="<?= set_value('gelar_akademik') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomer_sk">Nomor SK <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama" name="nomer_sk" required="nomer_sk" class="form-control " value="<?= set_value('nomer_sk') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="wakil_direktur">Wakil Direktur <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="wakil_direktur" name="wakil_direktur" required="required" class="form-control " value="<?= set_value('wakil_direktur') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="direktur">Direktur <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="direktur" name="direktur" required="required" class="form-control " value="<?= set_value('direktur') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomer_ijazah">Nomor Ijazah <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nomer_ijazah" name="nomer_ijazah" required="required" class="form-control " value="<?= set_value('nomer_ijazah') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomer_seri">Nomor Seri <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nomer_seri" name="nomer_seri" required="required" class="form-control " value="<?= set_value('nomer_seri') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_yudisium">Tanggal Yudisium <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="tanggal_yudisium" name="tanggal_yudisium" required="required" class="form-control " value="<?= set_value('tanggal_yudisium') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="judul_kkw">Judul KKW <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="judul_kkw" name="judul_kkw" required="required" class="form-control " value="<?= set_value('judul_kkw') ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>