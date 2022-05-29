<div class="row justify-content-center">
  <div class="card border-0 col-6 mt-5">
    <form name="uploadFile" method="post" action="<?=ROOT_PATH?>index.php?url=upload" enctype="multipart/form-data">
      <div class="mb-3">
				<input type="file" name="files">
				<button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
  </div>
</div>
