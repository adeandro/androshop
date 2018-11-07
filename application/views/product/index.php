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
						<td>". $product->nama_product ."</td>
						<td>". $product->harga ."</td>
						<td>". $product->nama_kategory ."</td>
						<td>". substr($product->deskripsi, 0, 20) ." ...</td>
						<td>
							<a href='". base_url('product/edit/'.$product->id) ."' class='btn btn-info btn-xs btn-flat'><i class='fa fa-pencil'></i></a>
							<a href='#' class='btn btn-xs btn-warning btn-flat'><i class='fa fa-trash'></i></a>
						</td>
				</tr>";
			}

			?>
		</table>
	</div>
</div>