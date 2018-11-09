<div class="box-header with-border">
	<h3 class="box-title"><?php echo $product->nama_product ?></h3>
</div>
<div class="box-body">
	<?php if (!file_exists(base_url('assets/img/product/'.$product->gambar))): ?>
		<img class="img-responsive" style="max-width: 350px;" src="<?php echo base_url('assets/img/product/default.jpg'); ?>" alt="Product"><br>
	<?php else: ?>
		<img class="img-responsive" style="max-width: 350px;" src="<?php echo base_url('assets/img/product/'.$product->gambar); ?>" alt="Product"><br>
	<?php endif ?>
	<table class="table">
		<tr>
			<td>Harga :</td>
			<td>:</td>
			<td>Rp. <?php echo number_format($product->harga) ?></td>
		</tr>
		<tr>
			<td>Kategory </td>
			<td>:</td>
			<td><?php echo $product->nama_kategory; ?></td>
		</tr>
		<tr>
			<td>Deskripsi </td>
			<td>:</td>
			<td><?php echo $product->deskripsi; ?></td>
		</tr>
	</table>
	<br>
	<hr>
	<button class="btn btn-primary btn-flat" data-toggle='modal' data-target="#chart"><i class="fa fa-shopping-cart"></i> Tambah ke keranjang</button>
</div>

<div class="modal fade modal-primary" id="chart">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Jumlah product
			</div>
			<form action="<?php echo base_url('home/chart') ?>" method="post">
				<div class="modal-body">
					<table class="table">

						<input type="hidden" value="<?php echo $product->id; ?>" name="id_product">
						<input type="hidden" value="<?php echo $user->id; ?>" name="id_user">
						<input type="hidden" value="<?php echo $product->harga ?>" name='harga'>
						<tr>
							<th>Nama Product</th>
							<th>Harga</th>
							<th>Jumlah Product di pesan</th>
						</tr>
						<tr>
							<td><?php echo $product->nama_product; ?></td>
							<td>Rp. <?php echo number_format($product->harga); ?></td>
							<td>
								<select class="form-control" style="width: 80px;" name="qty" id="qty">
									<?php
										for ($i=1; $i <= 100 ; $i++) { 
											echo "<option value='". $i ."'>". $i ."</option>";
										}
									 ?>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default btn-flat" type="submit">Lanjutkan <i class="fa fa-chevron-right"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>