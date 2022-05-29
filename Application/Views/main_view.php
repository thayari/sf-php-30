<div class="row mt-5">
	<?php
	if (is_array($data) && !empty($data) > 0) {
		foreach ($data as $key => $value) { ?>
			<div class="card col-lg-3 col-md-4 col-sm-6 border-0" data-id="<?=$value['id'];?>">
				<img src="<?=$value['url']; ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<div class="btn-group" role="group">
						<a href="<?=ROOT_PATH?>/?url=comments&id=<?=$value['id'];?>" class="btn btn-light">Комментарии</a>
						<a href="<?=ROOT_PATH?>/?url=delete&id=<?=$value['id'];?>" class="btn btn-danger">×</a>
					</div>
				</div>
			</div>
		<?php
		}
	} else {
		echo 'Галерея пуста';
	}
	?>
</div>