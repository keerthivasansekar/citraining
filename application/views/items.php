<!DOCTYPE html>
<html>
<head>
	<title>Items</title>
</head>
<body>
	<table>
		<tr>
			<th>S No</th>
			<th>Item Name</th>
		</tr>
		<?php foreach($items as $item): ?>
		<tr>
			<td><?= $item[0]; ?></td>
			<td><a href="details"><?= $item[1]; ?></a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>