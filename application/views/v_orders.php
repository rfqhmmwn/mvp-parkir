<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-flex justify-content-between align-items-center">
		<h1 class="h3 mb-4 text-gray-800 ">Parked Cars</h1>
		<?php if($this->session->flashdata('alert') == true): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('alert'); ?>
		</div>
		<?php endif; ?>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Slot</th>
							<th>Plat</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- <?php foreach($list_booking as $row): ?>
							<tr>
								<td><?php echo $row->id ?></td>
								<td><?php echo $row->slot_id ?></td>
								<td><?php echo $row->plat ?></td>
								<td><?php echo $row->jenis ?></td>
								<td>
									<a href="<?php echo site_url('orders/selesai/' . $row->id) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Konfirmasi Pembayaran?');">Selesai</a>
									<a href="<?php echo site_url('orders/print/' . $row->id) ?>" class="btn btn-warning btn-sm">Print</a>
								</td>
							</tr>
							
						<?php endforeach; ?> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

