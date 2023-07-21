<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Taruna</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open("taruna/{$taruna['id']}/update"); ?>
 
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= set_value('nama'):$taruna['nama'] ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomer_taruna">nomer_taruna<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nomer_taruna" name="nomer_taruna" required="required" class="form-control " value="<?= set_value('nomer_taruna'):$taruna['nomer_taruna'] ?>" >
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">tempat_lahir<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="tempat_lahir" name="tempat_lahir" required="required" class="form-control " value="<?= set_value('tempat_lahir'):$taruna['tempat_lahir'] ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">tanggal_lahir<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="tanggal_lahir" name="tanggal_lahir" required="required" class="form-control " value="<?= set_value('tanggal_lahir'):$taruna['tanggal_lahir'] ?>" >
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="program_studi">program_studi<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="program_studi" name="program_studi" required="required" class="form-control " value="<?= set_value('program_studi'):$taruna['program_studi'] ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="foto">foto<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="foto" name="foto" required="required" class="form-control " value="<?= set_value('foto'):$taruna['foto'] ?>" >
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