<!DOCTYPE html>
<html>
<head>
	<title>Laptops</title>
</head>
<body>
	<table>
		<tr>
			<th>S No</th>
			<th>Brands</th>
		</tr>
		<?php foreach($detail as $details): ?>
		<tr>
			<td><?= $details[0];?></td>
			<td><?= $details[1]; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>