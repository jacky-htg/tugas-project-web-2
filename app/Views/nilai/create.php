<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Nilai</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open('nilai/create'); ?>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="taruna">Taruna <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                         <select class='form-control col-lg-5 itemSearch' id="taruna" name="taruna" value="<?= set_value('taruna') ?>" ></select>
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="matakuliah">Mata Kuliah <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class='form-control col-lg-5 itemSearch' id="matakuliah" name="matakuliah" value="<?= set_value('matakuliah') ?>" ></select>
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
  <script src="<?= base_url('vendors');?>/select2/dist/js/select2.min.js"></script>
        <script>
        $("#taruna").select2({
            placeholder: "Select taruna",
            allowClear: true,
            minimumInputLength: 2,
            tags: [],
            ajax: {
                url: "<?= base_url('api/taruna/lookup');?>",
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                  return { results: data };
                }
            }
        });
                $("#matakuliah").select2({
            placeholder: "Select matakuliah",
            allowClear: true,
            minimumInputLength: 2,
            tags: [],
            ajax: {
                url: "<?= base_url('api/matakuliah/lookup');?>",
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                  return { results: data };
                }
            }
        });
          </script>       
<?= $this->endSection() ?>
