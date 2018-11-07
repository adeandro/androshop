<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-info">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo $this->session->flashdata('message'); ?>
	</div>
<?php elseif($this->session->flashdata('error') || validation_errors()): ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo $this->session->flashdata('message')." ".validation_errors(); ?>
	</div>
<?php endif ?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Tambah Product Baru</h3>
	</div>
	<div class="box-body">
		<form action="<?php echo base_url('product/edit/'.$product->id) ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $product->id; ?>">
			<table class="table">
				<tr>
					<td>Nama Product</td>
					<td>
						<div class="form-group">
							<input type="text" class="form-control" name="nama" value="<?php echo $product->nama_product ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>Harga Product</td>
					<td>
						<div class="form-group">
							<input type="text" class="form-control" name="harga" value="<?php echo $product->harga ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>Kategory Product</td>
					<td>
						<div class="form-group">
							<select name="kategory" id="kategory" class="form-control"
							>
							<option value="">--</option>
								<?php
									foreach ($kategory as $kategori) {

										if ($product->id_kategory == $kategori->id_kategory) {
											echo "<option value='". $kategori->id_kategory ."' selected>". $kategori->nama_kategory ."</option>";
										}else{
											echo "<option value='". $kategori->id_kategory ."'>". $kategori->nama_kategory ."</option>";
										}
									}
								 ?>

							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>Deskripsi Product</td>
					<td>
						<div class="form-group">
							<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $product->deskripsi; ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td>Gambar Product</td>
					<td>
						<div class="form-group">
							<input type="file" enctype="multipart/form-data" name="gambar">
						</div>
					</td>
				</tr>
			</table>
			<a href="<?php echo base_url('product') ?>" class="btn btn-warning btn-flat"><i class="fa fa-chevron-left"></i> Kembali</a>
			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
		</form>
	</div>
</div>