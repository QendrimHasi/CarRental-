 <div class="container shadow-lg mt-5 mb-5">
	<table class="table table-hover">
		<thead class="thead-light">
		    <tr>
		      <th>Brand</th>
		      <th>Type</th>
		      <th>Build</th>
		      <th>Username</th>
		      <th>Email</th>
		      <th>Date from</th>
		      <th>Date to</th>
		      <th>Amount</th>
		      <th></th>
		    </tr>
	  	</thead>
	  	<tbody>
	<?php foreach ($reservations as $reservation) : ?>
			<tr>
				<td><?php echo $reservation['name']; ?></td>
				<td><?php echo $reservation['type']; ?></td>
				<td><?php echo $reservation['build']; ?></td>
				<td><?php echo $reservation['username']; ?></td>
				<td><?php echo $reservation['email']; ?></td>
				<td><?php echo $reservation['date_from']; ?></td>
				<td><?php echo $reservation['date_to']; ?></td>
				<td><?php echo $reservation['amount']; ?></td>
				<td ><?php echo form_open('Admins/handover/'.$reservation['rid']); ?>
           				<input type="submit" value="Hand over" id="submitbutton" class="btn btn-success btn-block"></input>
           			<?php echo form_close(); ?>
           		</td>
				

			</tr>
	<?php endforeach; ?>
	  	</tbody>
	</table>

</div>

