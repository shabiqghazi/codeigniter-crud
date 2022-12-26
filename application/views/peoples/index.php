<div class="container mt-5">
<div  class="mb-3">
	<div class="form-check">
		<input class="form-check-input" type="radio" name="cobaradio" id="exampleRadios1" value="10">
		<label class="form-check-label" for="exampleRadios1">
			10
		</label>
	</div>
	<div class="form-check">
		<input class="form-check-input" type="radio" name="cobaradio" id="exampleRadios2" value="25">
		<label class="form-check-label" for="exampleRadios2">
			25
		</label>
	</div>
	<div class="form-check">
		<input class="form-check-input" type="radio" name="cobaradio" id="exampleRadios3" value="50">
		<label class="form-check-label" for="exampleRadios3">
			50
		</label>
	</div>
</div>
	<div class="mb-2 col-8">
		<form class="form-inline" action="" method="post">
			<input class="form-control mr-sm-2" type="search" placeholder="Cari Data Mahasiswa" aria-label="Search" name="keyword">
			<button class="btn btn-primary my-2 my-sm-0" type="submit" name="search">Cari</button>
		</form>
	</div>
	<nav aria-label="Page navigation example mt-3">
		<ul class="pagination mt-3">
			<li class="page-item"><a class="page-link" value="1" href="<?= base_url() ?>peoples/index/<?= $perpage ?>/1/<?= $keyword ?>">First</a></li>
		<?php foreach($pagination as $pgntn): ?>
			<?php if($pgntn != $halaman) { ?>
			<li class="page-item"><a class="page-link" value="1" href="<?= base_url() ?>peoples/index/<?= $perpage . '/' . $pgntn . '/' . $keyword ?>"><?= $pgntn ?></a></li>
			<?php } else { ?>
			<li class="page-item active"><a class="page-link" value="1" href="<?= base_url() ?>peoples/index/<?= $perpage . '/' . $pgntn . '/' . $keyword ?>"><?= $pgntn ?></a></li>
			<?php } ?>
		<?php endforeach ?>
			<li class="page-item"><a class="page-link" value="1" href="<?= base_url() ?>peoples/index/<?= $perpage ?>/<?= $jmlpage . '/' . $keyword ?>">Last</a></li>
		</ul>
	</nav>
	<?php if(!is_null($keyword)) : ?>
		<div class="pencarian">
			<div class="alert alert-light" role="alert">menampilkan <?= $allpeoples ?> hasil untuk <?= $keyword ?></div>
		</div>
	<?php endif; ?>
	<div style="overflow-x: auto;">
	<table class="table col-10" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama</th>
				<th scope="col">Alamat</th>
				<th scope="col">Email</th>
			</tr>
		</thead>
		<tbody id="tbody">
			<?php $i = 1; foreach($peoples as $people): ?>
			<tr>
				<td scope="row"><?= $start + $i++ ?></td>
				<td class="namapeople"><?= $people['nama']; ?></td>
				<td class="alamatpeople"><?= $people['alamat']; ?></td>
				<td class="emailpeople"><?= $people['email']; ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
		<?php if(empty($peoples)){ ?>
			<div class="container">
				Data Tidak Ada
			</div>
		<?php } ?>
</div>