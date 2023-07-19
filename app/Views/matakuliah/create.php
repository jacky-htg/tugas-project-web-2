<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mata Kuliah</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open('matakuliah/create'); ?>

                  <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode">Kode<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="kode" name="kode" required="required" class="form-control " value="<?= set_value('kode') ?>" >
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="matakuliah">Mata Kuliah <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="matakuliah" name="matakuliah" required="required" class="form-control " value="<?= set_value('matakuliah') ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="sks">Sks <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="sks" name="sks" required="required" class="form-control " value="<?= set_value('sks') ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nilai_angka">Nilai Angka <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nilai_angka" name="nilai_angka" required="required" class="form-control " value="<?= set_value('nilai_angka') ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nilai_huruf">Nilai Huruf <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nilai_huruf" name="nilai_huruf" required="required" class="form-control " value="<?= set_value('nilai_huruf') ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="semester">Semester <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                      <select id="semester" class="form-control" name="semester">
                          <option value="semester I" <?= set_value('semester')==='semester I'?'selected':'';?>>Semester I</option>
                          <option value="semester II" <?= set_value('semester')==='semester II'?'selected':'';?>>Semester II</option>
                          <option value="semester III" <?= set_value('semester')==='semester III'?'selected':'';?>>Semester III</option>
                          <option value="semester IV" <?= set_value('semester')==='semester IV'?'selected':'';?>>Semester IV</option>
                          <option value="semester V" <?= set_value('semester')==='semester V'?'selected':'';?>>Semester V</option>
                          <option value="semester VI" <?= set_value('semester')==='semester VI'?'selected':'';?>>Semester VI</option>
                          <option value="semester VII" <?= set_value('semester')==='semester VII'?'selected':'';?>>Semester VII</option>
                          <option value="semester VIII" <?= set_value('semester')==='semester VIII'?'selected':'';?>>Semester VIII</option>
                        </select>
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