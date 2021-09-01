<form action="" method="POST" role="form">
	<legend>Thêm</legend>

	<div class="form-group">
		<label for="">Ten</label>
		<input type="text" class="form-control" id="" placeholder="Input field" name="name">
	</div>

	<div class="form-group">
		<label for="">Gia</label>
		<input type="text" class="form-control" id="" placeholder="Input field" name="price">
	</div>


	<div class="form-group">
		<label for="">Số lượng</label>
		<input type="text" class="form-control" id="" placeholder="Input field" name="amount">
	</div>


	<div class="form-group">
		<label for="">Mô tả</label>
		<input type="text" class="form-control" id="" placeholder="Input field" name="intro">
	</div>




	Tên Mặt Hàng
	<select class="form-select" aria-label="Default select example" name= "id_item">
  		<?php foreach ($items as $key => $item): ?>
  		<option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
  		<?php endforeach ?>
	</select>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>