<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-info">
		<button class="close" data-dismiss='alert'>&times;</button>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php elseif($this->session->flashdata('error')): ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss='alert'>&times;</button>
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif ?>

<div class="box">
	<div class="box-header with-border">
		<a href="<?php echo base_url('product/create_product') ?>" class="btn btn-default btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Product</a>
	</div>
	<div class="box-body">
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Product</th>
				<th>Harga Product</th>
				<th>Kategory Product</th>
				<th>Descripsi Product</th>
				<th>Aksi</th>
			</tr>

			<?php
			$no = 1;

			foreach ($products as $product) {
				echo "<tr>
						<td>". $no++ ."</td>
						<td><a href='#' data-toggle='modal' data-target='#detail". $product->id ."'>". $product->nama_product ."</a></td>
						<td>". $product->harga ."</td>
						<td>". $product->nama_kategory ."</td>
						<td>". substr($product->deskripsi, 0, 20) ." ...</td>
						<td>
							<a href='". base_url('product/edit/'.$product->id) ."' class='btn btn-info btn-xs btn-flat'><i class='fa fa-pencil'></i></a>
							<button class='btn btn-warning btn-xs btn-flat' data-toggle='modal' data-target='#modal". $product->id ."'><i class='fa fa-trash'></i></button>
						</td>
				</tr>";
			}

			?>
		</table>
	</div>
</div>


<?php 

foreach ($products as $product) {
	echo "<div class='modal modal-warning fade' id='modal". $product->id ."'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h4>Apakah anda yakin mau menghapus product <i class='text-red'>". $product->nama_product ."</i> ?</h4>
			</div>
			<div class='modal-footer'>
				<form action='product/delete/". $product->id ."' method='post'>
					<button class='btn btn-primary btn-flat' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn btn-danger btn-flat'>Lanjutkan</button>
				</form>
			</div>
		</div>
	</div>
</div>";
}

foreach ($products as $product) {

	if (!file_exists(base_url('assets/img/product/'.$product->gambar))) {

		echo "<div class='modal modal-default fade' id='detail". $product->id ."'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button class='close' data-dismiss='modal'>&times;</button>
							<h4 style='text-weigh: bold;'>". $product->nama_product ."</h4>
						</div>
						<div class='modal-body'>
						<div style='max-width: 350px;' align='center'>
							<img src=". base_url('assets/img/product/default.jpg') ." alt='product' class='img-thumbnail'>
						</div>
							<table class='table'>
								<tr>
									<td>
										Harga
									</td>
									<td>
										:
									</td>
									<td>
										". $product->harga ."
									</td>
								</tr>
								<tr>
									<td>
										Kategory
									</td>
									<td>
										:
									</td>
									<td>
										". $product->nama_kategory ."
									</td>
								</tr>
								<tr>
									<td>
										Deskripsi
									</td>
									<td>
										:
									</td>
									<td>
										". $product->deskripsi ."
									</td>
								</tr>
							</table>
						</div>
						<div class='modal-footer'>
							<button data-dismiss='modal' class='btn btn-primary btn-flat'>Tutup</button>
						</div>
					</div>
				</div>
			</div>";
	}else{
		echo "hozi";
	}

	
}
 ?>

