<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
        <div class="right_col" role="main" style="min-height: 3790px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Transkrip</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= validation_list_errors() ?>

                  <?= form_open("transkrip/{$transkrip['id']}/update"); ?>
                  <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="taruna">Taruna <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="taruna" name="taruna" required="required" class="form-control " value="<?= $transkrip['taruna'] ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="ijazah">Ijazah</label>
                      <div class="col-md-6 col-sm-6 ">
                      <select class='form-control col-lg-5 itemSearch' id="ijazah" name="ijazah"></select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="program_studi">Program Studi</label>
                      <div class="col-md-6 col-sm-6 ">
                      <select class='form-control col-lg-5 itemSearch' id="program_studi" name="program_studi"></select>
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
          $(document).ready( function () {
              $("#program_studi").select2({
                allowClear: true,
                data:[{id: "<?= $transkrip['program_studi_id'];?>", text: "<?= $transkrip['program_studi'];?>"}],
                minimumInputLength: 2,
                tags: [],
                ajax: {
                    url: "<?= base_url('api/programstudi/lookup');?>",
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
            $('#program_studi').val("<?= $transkrip['program_studi_id'];?>").trigger('change');

            $("#ijazah").select2({
                allowClear: true,
                data:[{id: "<?= $transkrip['ijazah_id'];?>", text: "<?= $transkrip['ijazah'];?>"}],
                minimumInputLength: 2,
                tags: [],
                ajax: {
                    url: "<?= base_url('api/ijazah/lookup');?>",
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
            $('#ijazah').val("<?= $transkrip['ijazah_id'];?>").trigger('change');
          });
          
        
        </script>
<?= $this->endSection() ?>