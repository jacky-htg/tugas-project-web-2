<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Pejabat</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open("pejabat/{$pejabat['id']}/update"); ?>

                  <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= set_value('nama')?set_value('nama'):$pejabat['nama'] ?>" >
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NIP<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nip" name="nip" required="required" class="form-control " value="<?= set_value('nip')?set_value('nip'):$pejabat['nip'] ?>" >
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="golongan">Golongan<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="golongan" name="golongan" required="required" class="form-control " value="<?= set_value('golongan')?set_value('golongan'):$pejabat['golongan'] ?>" >
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="jabatan">Jabatan<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="jabatan" name="jabatan" required="required" class="form-control " value="<?= set_value('jabatan')?set_value('jabatan'):$pejabat['jabatan'] ?>" >
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