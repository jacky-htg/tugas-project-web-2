                  <?= validation_list_errors() ?>
                  <?= $error ? $error : null ?>

                  <?= form_open('login'); ?>
                  <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="email" id="email" name="email" required="required" class="form-control " value="<?= set_value('email') ?>" >
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="password" id="password" name="password" required="required" class="form-control" >
                      </div>
                    </div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                      </div>
                    </div>
                  <?= form_close() ?>