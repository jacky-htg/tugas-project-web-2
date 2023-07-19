<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
<div class="right_col" role="main" style="min-height: 998px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Sistem Informasi Akademik</h3>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12 col-sm-12  text-center"></div>
        <div class="clearfix"></div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Pengguna</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data pengguna.</p>
              </div>
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-users fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('users');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-users"> </i> Users
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Kota</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data kota.</p>
              </div>
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-building fa-5x"> </i>
              </div>            
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('kota');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-building"> </i> Kota
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Program Studi</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data program studi.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-desktop fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('programstudi');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-desktop"> </i> Program Studi
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Data Pejabat</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data pejabat.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-user fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('pejabat');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-user"> </i> Pejabat
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Mata Kuliah</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data mata kuliah.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-graduation-cap fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('matakuliah');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-graduation-cap"> </i> Mata Kuliah
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Taruna</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data taruna.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-child fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('taruna');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-child"> </i> Taruna
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Ijazah</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data ijazah.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-certificate fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('ijazah');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-certificate"> </i> Ijazah
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Nilai</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data nilai.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-bookmark fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('nilai');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-bookmark"> </i> Nilai
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4  profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><i>Manajemen Transkrip Nilai</i></h4>
              <div class="left col-md-8 col-sm-8">
                <p>Fitur bagi administrator untuk mengelola data-data transkrip nilai.</p>
              </div>            
              <div class="left col-md-4 col-sm-4">
                <i class="fa fa-line-chart fa-5x"> </i>
              </div>
            </div>
            <div class="bottom">
              <div class="col-sm-12 emphasis">
                <a href="<?= base_url('transkrip');?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-line-chart"> </i> Transakrip Nilai
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>