<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Email</th>
		<th></th>
	</tr>
	<?php

		$no = 1;

		foreach ($users as $user) {
			echo "<tr>
				<td>". $no++ ."</td>
				<td>". $user->username ."</td>
				<td>". $user->email ."</td>
				<td></td>
			</tr>";
		}
	 ?>
</table>