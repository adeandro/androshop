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
		<form action="<?php echo base_url('product/create_product') ?>" method="post">
			<table class="table">
				<tr>
					<td>Nama Product</td>
					<td>
						<div class="form-group">
							<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>Harga Product</td>
					<td>
						<div class="form-group">
							<input type="text" class="form-control" name="harga" value="<?php echo set_value('harga') ?>">
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
										if (set_value('kategory') == $kategori->id_kategory) {
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
							<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo set_value('deskripsi'); ?></textarea>
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
			<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
		</form>
	</div>
</div>