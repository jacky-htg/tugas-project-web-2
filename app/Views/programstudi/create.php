<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Program Studi</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open('programstudi/create'); ?>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= set_value('nama') ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="program_pendidikan">Program Pendidikan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select id="program_pendidikan" class="form-control" name="program_pendidikan">
                          <option value="Diploma III">Diploma III</option>
                          <option value="Diploma IV">Diploma IV</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="akreditasi">Akreditasi</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select id="akreditasi" class="form-control" name="akreditasi">
                          <option value="Baik">Baik</option>
                          <option value="Baik Sekali">Baik Sekali</option>
                          <option value="Unggul">Unggul</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="sk_akreditasi">SK Akreditasi</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="sk_akreditasi" name="sk_akreditasi" class="form-control " value="<?= set_value('sk_akreditasi') ?>" >
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