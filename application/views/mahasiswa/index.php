<div class="container">
	<a href="<?= base_url() ?>mahasiswa/tambah"><button type="button" class="btn btn-primary mt-5">Tambah Data Mahasiswa</button></a>
	<div class="input-group mt-2 col-4">
		<form action="" method="post">
			<input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit" name="subm_cari">Search</button>
			</div>
		</form>
	</div>
	<h2 class="mt-2">Daftar Mahasiswa</h2>
	<?php if ($this->session->flashdata('flash')): ?>
	<div class="alert alert-success alert-dismissible fade show col-5" role="alert">Data Mahasiswa
		<strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif ?>
	<?php if(empty($mahasiswa)): ?>
	<div class="alert alert-danger col-5" role="alert">
		Tidak Ada
	</div>
	<?php endif; ?>
	<ul class="list-group mt-3">

		<?php foreach($mahasiswa as $mhs) : ?>
			<li class="list-group-item d-flex justify-content-between align-items-center col-5">
				<?= $mhs['nama'] ?>
				<div>
					<a class="badge badge-primary badge-pill" href="<?= base_url() ?>mahasiswa/detail/<?= $mhs['id'] ?>">detail</a>
					<a class="badge badge-success badge-pill" href="<?= base_url() ?>mahasiswa/ubah/<?= $mhs['id'] ?>">ubah</a>
					<a class="badge badge-danger badge-pill" href="<?= base_url() ?>mahasiswa/hapus/<?= $mhs['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus <?= $mhs['nama'] ?>?')">hapus</a>
				</div>
			</li>
		<?php endforeach; ?>

	</ul>
</div>