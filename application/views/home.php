<h4>Semua Product</h4>

<?php 

foreach ($products as $product) {
	if (!file_exists(base_url('assets/img/product/'.$product->gambar))) {
                  echo "<div class='col-xs-4'>
                  			<h4><a href='". base_url('home/show_product/'.$product->id) ."'>". $product->nama_product ."</a></h4>
                  			<img class='img-thumbnail' style='max-width:130px;' src='". base_url('assets/img/product/default.jpg') ."' alt='product'>
                  			<br>
                  			Rp.". number_format($product->harga) ."
	                  		<table class='table'>
	                          <tr>
	                            <td><p>". $product->nama_kategory ."</p></td>
	                          </tr>
	                        </table>
                        </div>";
                }
}

 ?>