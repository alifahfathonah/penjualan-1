<body onload="cekFunction()">
	<div class="page-header">
		<h4 class="page-title">Data Penjualan</h4>
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
				<a href="#">Transaksi</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Penjualan</a>
			</li>
		</ul>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<form action="<?php echo site_url('/penjualan') ?>" method="POST">
				<div class="row row-demo-grid">
					<div class="col-xl-3">
						<div class="card">
							<div class="card-body">
								<label for="inputFloatingLabel2" class="placeholder" >Kode Transaksi</label>
								<input style="font-size:13px;" readonly value="<?php echo $header[0]->id_penjualan;?>" name="id_penjualan" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid">
							</div>
						</div>
					</div>
				</div>
				<div class="row row-demo-grid">
					<div class="col-xl-3">
						<div class="card">
							<div class="card-body">
								<label for="selectFloatingLabel2" class="placeholder">Customer</label>
								<select name="id_customer" class="form-control input-solid" id="selectFloatingLabel2" required>
									<option value="">&nbsp;</option>
									<?php 
										$query = $this->db->get('customer');
										foreach ($query->result() as $row)
										{
									?>
										<option value="<?php echo $row->id_customer;?>" <?php if($row->id_customer == $header[0]->id_customer){ echo 'selected'; }?>><?php echo $row->nama_customer.' ( '.$row->no_telp.' )';?></option>
									<?php	} ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-xl-3">
						<div class="card">
							<div class="card-body">
								<label for="inputFloatingLabel2" class="placeholder">Tanggal Penjualan</label>
								<input style="font-size:13px;" value="<?php echo $header[0]->tanggal_penjualan;?>" name="tanggal_penjualan" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
							</div>
						</div>
					</div>
					<div class="col-xl-3">
						<div class="card">
							<div class="card-body">
								<label for="inputFloatingLabel2" class="placeholder">Jam Penjualan</label>
								<input value="<?php echo $header[0]->jam_penjualan;?>" name="jam_penjualan" autocomplete="off" id="inputFloatingLabel2" type="time" class="form-control input-solid" size="20">
							</div>
						</div>
					</div>
					<div class="col-xl-3">
						<div class="card">
							<div class="card-body">
								<label for="selectFloatingLabel2" class="placeholder">Status Penjualan</label>
								<select name="status" class="form-control input-solid" id="selectFloatingLabel2" required>
									<option value="Proses" <?php if($header[0]->status == 'Proses'){ echo 'selected';} ?>>Proses</option>
									<option value="Done" <?php if($header[0]->status == 'Done'){ echo 'selected';} ?>>Done</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div id="myDIV" style="display:none;">
					<div class="row row-demo-grid">
						<div class="col-xl-3">
							<div class="card">
								<div class="card-body">
									<label for="inputFloatingLabel2" class="placeholder">No Resep</label>
									<input value="<?php echo $header[0]->no_resep;?>" name="no_resep" autocomplete="off" id="no_resep" type="text" class="form-control input-solid" size="20" required>
								</div>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="card">
								<div class="card-body">
									<label for="inputFloatingLabel2" class="placeholder">Tanggal Resep</label>
									<input style="font-size:13px;" value="<?php echo $header[0]->tanggal_resep;?>" name="tanggal_resep" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
								</div>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="card">
								<div class="card-body">
									<label for="inputFloatingLabel2" class="placeholder">Dokter</label>
									<input value="<?php echo $header[0]->dokter;?>" name="dokter" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20">
								</div>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="card">
								<div class="card-body">
									<label for="inputFloatingLabel2" class="placeholder">Keterangan</label>
									<textarea autocomplete="off" name="keterangan" class="form-control input-solid" id="inputFloatingLabel2" rows="2"><?php echo $header[0]->keterangan;?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-head-row">
					<div class="card-title">
						<button onclick="return confirm('Apakah anda yakin proses edit data atau transaksi penjualan Selesai?\nStatus Penjualan rubah jadi Done untuk menyelesai Penjualan. ')" type="submit" name="submit" value="edit" class="btn btn-success btn-round btn-sm mr-2" style="margin-left: 26px;">
						<i class="fa fa-plus"></i> Simpan
						</button>
					</div>
				</div>
				</form>
				<script>
				function myFunction() {
					var x = document.getElementById("myDIV");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						document.getElementById("no_resep").required=false;
						x.style.display = "none";
					}
				}
				</script>
				<div class="card-head-row">
					<div class="card-tools">
						<button onclick="myFunction()" class="btn btn-secondary btn-round btn-sm mr-2"><i class="fa fa-plus"></i> Resep Dokter</button>
						<button class="btn btn-info btn-round btn-sm mr-2" data-toggle="modal" data-target="#addRowModal">
						<i class="fa fa-plus"></i> Item Pembelian
						</button>
					</div>
				</div>
			</div>

			<div class="card-body">
				<!---Modal INPUT-->
				<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header no-bd">
								<h5 class="modal-title">
									<span class="fw-mediumbold">
									Input Pembelian</span> 
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?php echo site_url('/penjualan/item/'.$header[0]->id_penjualan) ?>" method="POST">
							<input type="text" name="id_penjualan" value="<?php echo $header[0]->id_penjualan;?>">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
												<div class="form-group form-floating-label">
													<select name="id_obat" class="form-control input-solid" id="selectFloatingLabel2" required>
														<option value="">&nbsp;</option>
														<?php 
															$this->db->select('*');
															$this->db->from('obat');                            
															$this->db->join('supplier', 'supplier.id_supplier = obat.id_supplier');
															$query = $this->db->get();            
															foreach ($query->result() as $row)
															{
														?>
															<option value="<?php echo $row->id_obat;?>"><?php echo $row->id_obat.' - '.$row->nama_obat.' - ['.$row->stok.'] - '.$row->nama_supplier;?></option>
														<?php	} ?>
													</select>
													<label for="selectFloatingLabel2" class="placeholder">Obat</label>
												</div>
										</div>
										<div class="col-sm-12">
												<div class="form-group form-floating-label">
													<input name="qty" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" required>
													<label for="inputFloatingLabel2" class="placeholder">Qty</label>
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
				<!--End Modal INPUT-->

				<div class="table-responsive">
					<table id="basic-datatables" class="display table table-striped table-hover" >
						<thead>
							<tr>
								<th>No</th>
								<th>Obat</th>
								<th>Satuan</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php $grand_total=0; ?>
							<?php foreach($data as $u){ ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $u->nama_obat ?></td>
								<td><?php echo $u->satuan ?></td>
								<td><?php echo number_format($u->harga) ?></td>
								<td><?php echo number_format($u->qty) ?></td>
								<td><?php echo number_format($u->total) ?></td>
								<td>
								<div class="form-button-action">
									<label class="selectgroup-item">
									<a href="javascript:void(0)" onclick="$('#view-modal').modal('show');" data-id="<?php echo $u->id_detail_penjualan; ?>" id="get_data" data-toggle="tooltip" title="Approval">
										<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-edit btn btn-warning btn-xs"></i></span>
									</a>
									</label>
									<label class="selectgroup-item">
										<a href="<?php echo base_url('penjualan/delete_item/'.$u->id_detail_penjualan.'/'.$u->id_penjualan)?>" onclick="return confirm('Apakah anda yakin ingin menghapus item?')">
											<span class="selectgroup-button selectgroup-button-icon "><i class="fas fa-trash-alt btn btn-danger btn-xs"></i></span>
										</a>
									</label>
								</div>
								</td>
							</tr>
							<?php $grand_total +=$u->total; ?>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan='4'>&nbsp;</th>
								<th>Grand Total</th>
								<th><?php echo number_format($grand_total);?></th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
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
						<span class="fw-mediumbold">
						Pembelian</span> 
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
								url  : "<?php echo site_url(); ?>penjualan/get_conten/"+uid,
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
	<script>
function cekFunction() {
	var x = document.getElementById("no_resep").value;
	if (x !== "") {
		document.getElementById("no_resep").required=false;
		document.getElementById("myDIV").style.display = "block";
	} else {
		document.getElementById("myDIV").style.display = "none";
	}
}
</script>
</body>