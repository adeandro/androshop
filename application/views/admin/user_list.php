<div class="box box-primary">
	<div class="box-body">
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Level</th>
			</tr>
			<?php

				$no = 1;


				foreach ($users as $user) {
					if ($user->id_level == 1) {
						echo "<tr>
								<td>". $no++ ."</td>
								<td>". $user->username ."</td>
								<td>". $user->email ."</td>
								<td><p class='label label-info'>Admin</p></td>
							</tr>";
					}else if ($user->id_level == 3) {
						echo "<tr>
								<td>". $no++ ."</td>
								<td>". $user->username ."</td>
								<td>". $user->email ."</td>
								<td><p class='label label-warning'>Super Admin</p></td>
							</tr>";
					}else{
						echo "<tr>
								<td>". $no++ ."</td>
								<td>". $user->username ."</td>
								<td>". $user->email ."</td>
								<td><p class='label label-success'>Member</p></td>
							</tr>";
					}
				}
			 ?>
		</table>
		<div class="box-footer clearfix" align="center">
		              <ul class="pagination pagination-sm no-margin pull-right">
		                <li><a href="#">&laquo;</a></li>
		                <li><a href="#">1</a></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">&raquo;</a></li>
		              </ul>
		            </div>
	</div>
</div>