            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?= base_url();?>"><i class="fa fa-home"></i> Home</a></li>
                  <li <?= str_contains(current_url(), base_url('users')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('users');?>"><i class="fa fa-users"></i> User</a></li>
                  <li <?= str_contains(current_url(), base_url('kota')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('kota');?>"><i class="fa fa-building"></i> Kota</a></li>
                  <li <?= str_contains(current_url(), base_url('programstudi')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('programstudi');?>"><i class="fa fa-desktop"></i> Program Studi</a></li>
                  <li <?= str_contains(current_url(), base_url('pejabat')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('pejabat');?>"><i class="fa fa-user"></i> Pejabat</a></li>
                  <li <?= str_contains(current_url(), base_url('matakuliah')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('matakuliah');?>"><i class="fa fa-graduation-cap"></i> Mata Kuliah</a></li>
                  <li <?= str_contains(current_url(), base_url('taruna')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('taruna');?>"><i class="fa fa-child"></i>Taruna</a></li>
                  <li <?= str_contains(current_url(), base_url('ijazah')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('ijazah');?>"><i class="fa fa-certificate"></i> Ijazah</a></li>
                  <li <?= str_contains(current_url(), base_url('nilai')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('nilai');?>"><i class="fa fa-bookmark"></i> Nilai</a></li>
                  <li <?= str_contains(current_url(), base_url('transkrip')) ? 'class="current-page"' : '' ?>><a href="<?= base_url('transkrip');?>"><i class="fa fa-line-chart"></i> Transkrip Nilai</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->