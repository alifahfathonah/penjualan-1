<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?=base_url()?>assets/img/profile.jpg" alt="" class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              Risdiantox 
              <span class="user-level">Administrator</span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#settings">
                  <span class="link-collapse">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item 
          <?php 
            if( $this->uri->segment('1') == 'dashboard' )
            {
              echo 'active';
            }
          ?>">
          <a  href="<?=site_url('dashboard')?>" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Menu</h4>
        </li>
        <li class="nav-item 
          <?php 
            if( $this->uri->segment('1') == 'customer' OR 
              $this->uri->segment('1') == 'pegawai' OR 
              $this->uri->segment('1') == 'supplier' OR 
              $this->uri->segment('1') == 'obat' )
            {
              echo 'active';
            }
          ?>">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Data Master</p>
            <span class="caret"></span>
          </a>
          <div class="collapse 
            <?php 
              if( $this->uri->segment('1') == 'customer' OR 
                $this->uri->segment('1') == 'pegawai' OR 
                $this->uri->segment('1') == 'supplier' OR 
                $this->uri->segment('1') == 'obat' )
              {
                echo 'show';
              }
            ?>" id="base">
            <ul class="nav nav-collapse">
              <li class="<?php if($this->uri->segment('1') == 'pegawai'){ echo 'active'; } ?>">
                <a href="<?=site_url('pegawai')?>">
                  <span class="sub-item show">Pegawai</span>
                </a>
              </li>
              <li class="<?php if($this->uri->segment('1') == 'supplier'){ echo 'active'; } ?>">
                <a href="<?=site_url('supplier')?>">
                  <span class="sub-item">Supplier</span>
                </a>
              </li>
              <li class="<?php if($this->uri->segment('1') == 'obat'){ echo 'active'; } ?>">
                <a href="<?=site_url('obat')?>">
                  <span class="sub-item">Obat</span>
                </a>
              </li>
              <li class="<?php if($this->uri->segment('1') == 'customer'){ echo 'active'; } ?>">
                <a href="<?=site_url('customer')?>">
                  <span class="sub-item">Customer</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-th-list"></i>
            <p>Transaksi</p>
            <span class="caret"></span>
          </a>
          <div class="collapse 
            <?php 
              if( $this->uri->segment('1') == 'pembelian' OR 
                $this->uri->segment('1') == 'penjualan' )
              {
                echo 'show';
              }
            ?>" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li class="<?php if($this->uri->segment('1') == 'pembelian'){ echo 'active'; } ?>">
                <a href="<?=site_url('pembelian')?>">
                  <span class="sub-item">Pembelian</span>
                </a>
              </li>
              <li class="<?php if($this->uri->segment('1') == 'penjualan'){ echo 'active'; } ?>">
                <a href="<?=site_url('penjualan')?>">
                  <span class="sub-item">Penjualan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#charts">
            <i class="far fa-chart-bar"></i>
            <p>Laporan</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Laporan 1</span>
                </a>
              </li>
              <li>
                <a href="charts/sparkline.html">
                  <span class="sub-item">Laporan 2</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a href="#">
            <i class="fas fa-user-alt"></i>
            <p>User Admin</p>
            <span class="badge badge-success">4</span>
          </a>
        </li> -->
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->