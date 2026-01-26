<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-flex justify-content-between align-items-center">
		<h1 class="h3 mb-4 text-gray-800">Form Edit</h1>
		<a href="<?php echo site_url('Kelola_tiket/index') ?>" class="btn btn-primary btn-sm d-sm-inline-block d-none"><i class="fas fa-chevron-left"></i> kembali</a>
	</div>
	<!-- <div class="row">
		<div class="col">
		<h1 class="h3 mb-4 text-gray-800">Form Add Groups</h1>
		</div>
		<div class="col">
			<div class="float-right">
				<a href="groups.php" class="btn btn-primary btn-sm d-sm-inline-block d-none"><i class="fas fa-chevron-left"></i> kembali</a>
			</div>
		</div>
	</div> -->
	<div class="card">
		<form action="<?php echo site_url('history/do_edit') ?>" method="post">
			<div class="card-body">
				<input type="hidden" name="id" value="<?php echo $list_booking->id ?>">
				<div class="form-group">
					<label for ="Plat">Plat</label>
					<input type="text" name="plat" value="<?php echo $list_booking->plat ?>" class="form-control" id="Plat" placeholder="Enter plat">
					<?php echo form_error('plat', '<div class="text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for ="Jenis">Jenis</label>
					<select 
						id="jenis"
						name="jenis"
						class="form-select"
						required
						style="max-width: 150px;"
						>
						<option value="">Pilih</option>
						<option value="mobil(5000)" 
							<?= ($list_booking->jenis == 'mobil(5000)') ? 'selected' : '' ?>>
							mobil
						</option>
						<option value="motor(2000)" 
							<?= ($list_booking->jenis == 'motor(2000)') ? 'selected' : '' ?>>
							motor
						</option>
					</select>
					<?php echo form_error('jenis', '<div class="text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for ="Jam Masuk">Jam Masuk</label>
					<input type="datetime-local" name="jam_masuk" value="<?php echo $list_booking->jam_masuk ?>" class="form-control" id="Jam Masuk" placeholder="Enter jam masuk">
					<?php echo form_error('jam_masuk', '<div class="text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for ="Jam Keluar">Jam Keluar</label>
					<input type="datetime-local" name="jam_keluar" value="<?php echo $list_booking->jam_keluar ?>" class="form-control" id="Jam Keluar" placeholder="Enter jam keluar">
					<?php echo form_error('jam_keluar', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
<!-- /.container-fluid -->



