<h1>List </h1>

<div class="col-lg-8">
	<a href="./index.php?page=add" class="btn btn-info">Thêm mới</a>

	

	<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Mô tả</th>
				<th>Danh mục</th>
			</tr>
		</thead>

		<tbody>

			<?php foreach ($products as $key => $product): ?>
				<!-- <?php var_dump($city) ?> -->
				<tr>
					<td><?php echo ++$key ?></td>
					<td><?php echo $product->name ?></td>
					<td><?php echo $product->price ?></td>
					<td><?php echo $product->amount ?></td>
					<td><?php echo $product->intro ?></td>
					<td><?php echo $product->id_item ?></td>

					<td>
						<a href="./index.php?page=delete&id=<?php echo $product->id; ?>" class="btn btn-info">Edit</a>
						<a href="./index.php?page=update&id=<?php echo $product->id; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>
