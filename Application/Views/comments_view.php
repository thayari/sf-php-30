<div class="row mt-5">
	<div class="card col-sm-12 col-md-10 col-lg-8 border-0" data-id="<?= $data['imageData'][0]['id']; ?>">
		<img src="<?= $data['imageData'][0]['url']; ?>" class="card-img-top mb-5" alt="...">

		<ul class="list-group list-group-flush">
			<?php
			if (is_array($data['commentsData']) && !empty($data['commentsData'])) {
				foreach ($data['commentsData'] as $key => $value) { ?>
					<li class="list-group-item">
						<span><?= $value['date']; ?></span> <span><strong><?= $value['user']; ?>:</strong></span> <?= $value['text']; ?>
						<?php if ($_COOKIE['sf30_id'] == $value['id_user']):?>
						<form class="deleteCommentForm" action="" method="post">
							<button type="submit" name="delete" value="<?=$value['id']?>">×</button>
						</form>
						<?php endif;?>
					</li>
			<?php
				}
			} ?>
		</ul>
		<?php if ($isUserAuthorised):?>
		<form action="<?=ROOT_PATH?>?url=comments&id=<?=$data['imageData'][0]['id'];?>" method='post'>
			<input type="text" name="commentText" id="">
		</form>
		<?php endif; ?>
	</div>
</div>