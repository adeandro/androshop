<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-info">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php elseif($this->session->flashdata('error')): ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php elseif($this->session->flashdata('message')): ?>
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo $this->session->flashdata('message'); ?>
	</div>
<?php endif ?>
<div class="box box-primary">
	<div class="box-body with-border">
		<div class="col-xs-6">
			<h3 class="box-title"> List Kategory Product</h3>
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Kategory</th>
					<th>Aksi</th>
				</tr>

				<?php
				$no = 1;
					foreach ($kategory as $kategori) {
						echo "<tr>
							<td>". $no++ ."</td>
							<td>". $kategori->nama_kategory ."</td>
							<td>
								<button type='button' data-toggle='modal' data-target='#modal". $kategori->id_kategory ."' class='btn btn-xs btn-warning btn-flat'><i class='fa fa-trash'></i></buttona>
							</td>
						</tr>";
					}
				 ?>
			</table>
		</div>
		<div class="col-xs-6">
		<h3 class="box-title">Tambah atau Ubah Kategory Product</h3>
			<div class="box-group" id="accordion">
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a href="#tambah_kategory" data-toggle="collapse" data-parent="#accordion"><i class="fa fa-plus"></i> Tambah Kategory Product</a>
						</h4>
					</div>
					<div id="tambah_kategory" class="panel-collapse collapse in">
						<div class="box-body">
							<form action="<?php echo base_url('product/Kategory') ?>" method="post">
								<div class="form-group">
									<label for="nama">Nama Kategory:</label>
									<input type="text" class="form-control" name="nama" placeholder="Nama Kategory Product">
									<?php if (form_error('nama')): ?>
										<p class="text-red">*Nama Kategory Belum di isi</p>
									<?php endif ?>
								</div>
								<button class="btn btn-block btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel box box-warning">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a href="#edit_kategory" data-toggle="collapse" data-parent="#accordion"><i class="fa fa-pencil"></i> Edit Kategory Product</a>
						</h4>
					</div>
					<div id="edit_kategory" class="panel-collapse collapse">
						<div class="box-body">
							<form action="<?php echo base_url('product/update_kategory') ?>" method="post">
								<div class="form-group">
									<label for="nama">Pilih Kategory :</label>
									<select name="kategory" id="kategory" class="form-control">
										<option value="">--</option>
										<?php
											foreach ($kategory as $kategori) {
												echo "<option value='". $kategori->id_kategory ."'>". $kategori->nama_kategory ."</option>";
											}
										 ?>
									</select>
									<hr> 
									<label for="nama">Ubah Menjadi :</label>
									<input type="text" class="form-control" name="nama" placeholder="Nama Kategory Product">
									<?php if (form_error('nama')): ?>
										<p class="text-red">*Nama Kategory Belum di isi</p>
									<?php endif ?>
								</div>
								<button class="btn btn-block btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal here -->

<?php

foreach ($kategory as $kategori) {
	echo "<div class='modal modal-warning fade' id='modal". $kategori->id_kategory ."'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>				
				<h4 class='modal-title'>Apakah anda yakin mau menghapus kategory <i class='text-red'>". $kategori->nama_kategory ."</i> ?</h4>
			</div>			
			<div class='modal-footer'>			
				<form action='". base_url('product/delete_kategory/'.$kategori->id_kategory) ."' method='post'>
					<button class='btn btn-primary btn-flat' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn btn-danger btn-flat'>Lanjutkan</button>
				</form>
			</div>
		</div>
	</div>
</div>";	
}
	
 ?>


