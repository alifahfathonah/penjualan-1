<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?=base_url()?>assets/img/icon.jpeg" alt="" class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
               Username
              <span class="user-level"><?php echo $this->session->userdata("nama_pegawai"); ?></span>
            </span>
          </a>
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
        <li class="nav-item 
          <?php 
            if( $this->uri->segment('1') == 'laporan' )
            {
              echo 'active';
            }
          ?>">
          <a  href="<?=site_url('laporan')?>" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <p>Laporan</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->