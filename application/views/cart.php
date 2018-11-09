<h4><i class="fa fa-shopping-cart"></i> Keranjang belanja</h4>
<table class="table">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Nama Product</th>
		<th>Harga</th>
		<th>Jumlah Pembelian</th>
		<th>Total</th>
	</tr>
	<?php 
		$no = 1;
		

		foreach ($carts as $cart) {
			echo "<tr>
				<td>". $no++ ."</td>
				<td>". $cart->username ."</td>
				<td>". $cart->nama_product ."</td>
				<td>Rp.". number_format($cart->harga) ."</td>
				<td>". $cart->qty ."</td>
				<td>Rp.". number_format($cart->harga * $cart->qty) ."</td>
			</tr>";
		}

	 ?>
</table>

<br>
<a href="<?php echo base_url('') ?>" class="btn btn-success btn-flat"><i class="fa fa-chevron-left"></i> Belanja Lagi</a>
<button class="btn btn-primary btn-flat">Lanjut ke Pembayaran</button>