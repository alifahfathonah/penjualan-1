<div class="page-header">
	<h4 class="page-title">Data Pengajian</h4>
	<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-database"></i>
			</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Master</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Pengajian</a>
		</li>
	</ul>
</div>
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-head-row">
					<div class="card-title"></div>
					<div class="card-tools">
						<!-- <a href="#" class="btn btn-info btn-round btn-sm mr-2">
							<span class="btn-label">
								<i class="fa fa-pencil"></i>
							</span>
							Export
						</a> -->
						<button class="btn btn-info btn-round btn-sm mr-2" data-toggle="modal" data-target="#addRowModal">
						<i class="fa fa-plus"></i> Pengajian
						</button>
					</div>
				</div>
			</div>
			<div class="card-body">

				<!---Modal -->
				<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header no-bd">
								<h5 class="modal-title">
									<span class="fw-mediumbold">
									Input Pengajian</span> 
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo site_url('/gaji') ?>" method="POST">
									<div class="modal-body">
										<div class="row">
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<select name="id_pegawai" class="form-control input-solid" id="selectFloatingLabel2" required>
															<option value="">&nbsp;</option>
															<?php 
																$this->db->select('*');
																$this->db->from('pegawai');                            
																$query = $this->db->get();            
																foreach ($query->result() as $row)
																{
															?>
																<option value="<?php echo $row->id_pegawai;?>"><?php echo $row->nama_pegawai;?></option>
															<?php	} ?>
														</select>
														<label for="selectFloatingLabel2" class="placeholder">Pegawai</label>
													</div>
											</div>
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<select name="bulan" class="form-control input-solid" id="selectFloatingLabel2" required>
															<option value="">&nbsp;</option>
                              <?php
                              $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                              for($bulan=1; $bulan<=12; $bulan++){
                                echo "<option value='$bln[$bulan]'>$bln[$bulan]</option>";
                              }
                              ?>
														</select>
														<label for="selectFloatingLabel2" class="placeholder">Bulan</label>
													</div>
											</div>
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<select name="tahun" class="form-control input-solid" id="selectFloatingLabel2" required>
															<option value="">&nbsp;</option>
                              <?php
                              $thn=date('Y');
                              echo $thn_min=date('Y', strtotime('-1 year', strtotime( $thn ))); 
                              echo $thn_plus=date('Y', strtotime('+1 year', strtotime( $thn ))); 
                              for($x=$thn_min; $x<=$thn_plus; $x++){
                              ?>
                                <option value='<?php echo $x; ?>' <?php if($x == $thn){ echo 'selected';} ?>><?php echo $x?></option>
                              <?php 
                              }
                              ?>
														</select>
														<label for="selectFloatingLabel2" class="placeholder">Tahun</label>
													</div>
											</div>
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<input name="gaji_pokok" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
														<label for="inputFloatingLabel2" class="placeholder">Gaji Pokok</label>
													</div>
											</div>
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<input name="gaji_lembur" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" >
														<label for="inputFloatingLabel2" class="placeholder">Gaji Lembur</label>
													</div>
											</div>
											<div class="col-sm-12">
													<div class="form-group form-floating-label">
														<select name="lembur_perjam" class="form-control input-solid" id="selectFloatingLabel2">
															<option value="">&nbsp;</option>
                              <?php
                              for($x='1'; $x<=8; $x++){
                              ?>
                                <option value='<?php echo $x; ?>' ><?php echo $x?></option>
                              <?php 
                              }
                              ?>
														</select>
														<label for="selectFloatingLabel2" class="placeholder">Lembur Perjam</label>
													</div>
											</div>
										</div>
									</div>
									<div class="modal-footer no-bd">
										<button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!--End Modal -->
				<div class="table-responsive">
					<table id="multi-filter-select" class="display table table-striped table-hover" >
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pegawai</th>
								<th>Bulan</th>
								<th>Gaji Pokok</th>
								<th>Lembur</th>
								<th>Total Gaji</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php foreach($data as $u){ ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $u->nama_pegawai ?></td>
								<td><?php echo $u->bulan.' '.$u->tahun; ?></td>
								<td><?php echo number_format($u->gaji_pokok) ?></td>
								<td><?php echo number_format($total_lembur=$u->gaji_lembur*$u->lembur_perjam) ?></td>
								<td><?php echo number_format($u->gaji_pokok+$total_lembur) ?></td>
								<td>
								<div class="form-button-action">
									<label class="selectgroup-item">
									<a href="javascript:void(0)" onclick="$('#view-modal').modal('show');" data-id="<?php echo $u->id_gaji; ?>" id="get_data" data-toggle="tooltip" title="Approval">
										<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-edit btn btn-warning btn-xs"></i></span>
									</a>
									
									</label>
									<label class="selectgroup-item">
										<a href="<?php echo base_url('gaji/delete/'.$u->id_gaji)?>">
											<span class="selectgroup-button selectgroup-button-icon "><i class="fas fa-trash-alt btn btn-danger btn-xs"></i></span>
										</a>
									</label>
								</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- /.modal EDIT-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Pengajian</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">              
				<div id="dynamic-content">
				</div>
			</div> 
			<!-- 
			<div class="modal-footer"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
			</div> 
			-->
		</div>
	</div>
</div>
<!-- /.modal EDIT-->
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
			$(document).on('click', '#get_data', function(e){
					e.preventDefault();
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
							url  : "<?php echo site_url(); ?>gaji/get_conten/"+uid,
							type: 'POST',
							dataType: 'html'
					})
					.done(function(url){ 
							console.log(url);
							$('#dynamic-content').html(url); // load response 
					})
					.fail(function(){
							$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
							$('#modal-loader').hide();
					});
			});
	});

	$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
</script>