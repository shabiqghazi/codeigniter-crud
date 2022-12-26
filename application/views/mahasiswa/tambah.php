<div class="container mt-5">
	<h2 class="mb-2 col-6">Form Tambah Data Mahasiswa</h2>
	<form action="" method="post" class="col-4">
		<?php if(validation_errors()) : ?>
		<div class="alert alert-warning" role="alert">
			<?= validation_errors() ?>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama">
		</div>
		<div class="form-group">
			<label for="nim">Nim</label>
			<input type="text" class="form-control" id="nim" name="nim">
		</div>
		<div class="form-group">
			<label for="angkatan">Angkatan</label>
			<input type="text" class="form-control" id="angkatan" name="angkatan">
		</div>
		<button type="submit" class="btn btn-primary" name="tamb_submit">Tambah</button>
	</form>
</div>