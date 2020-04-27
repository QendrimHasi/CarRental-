<div class="container shadow-lg mt-5 mb-5">
	<table class="table table-hover">
		<thead class="thead-light">
		    <tr>
		      <th>Brand</th>
		      <th>Type</th>
		      <th>Build</th>
		      <th>Price/Day</th>
		      <th>Activity</th>
		      <th></th>
		    </tr>
	  	</thead>
	  	<tbody>
	<?php foreach ($cars as $car) : ?>
			<tr>
				<td><?php echo $car['name']; ?></td>
				<td><?php echo $car['type']; ?></td>
				<td><?php echo $car['build']; ?></td>
				<td><?php echo $car['price_day']; ?></td>
				<td><?php if ($car['activity']==0) {
					echo'Active';
				}else {
					echo'Deactive';
				}  ?></td>
				<?php if ($car['activity']==0): ?>
					<td ><?php echo form_open('Admins/deactivate/'.$car['carid']); ?>
           				<input type="submit" value="Deactivate" id="submitbutton" class="btn btn-danger btn-block"></input>
           			<?php echo form_close(); ?></td>
				<?php endif; ?>
				<?php if ($car['activity']==1): ?>
					<td ><?php echo form_open('Admins/activate/'.$car['carid']); ?>
           				<input type="submit" value="Activate" id="submitbutton" class="btn btn-success btn-block"></input>
           			<?php echo form_close(); ?></td>
				<?php endif; ?>

			</tr>
	<?php endforeach; ?>
	  	</tbody>
	</table>

</div>

