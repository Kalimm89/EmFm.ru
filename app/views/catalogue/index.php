<div class="container">
<ol class="list-group list-group-numbered collection container m-5">
<?php foreach ($data as $cat) : ?>
  <a class=" show-products text-decoration-none d-flex justify-content-center align-items-start border-none" style="cursor: pointer;" data-id="<?= $cat['id']; ?>" data-path="<?= $cat['path']; ?>">
  <li class="list-group-item d-flex justify-content-between align-items-center m-2">
  <img src="<?= $cat['image']; ?>" class="img-fluid" width="100px">

      <h1 class="fw-bold"><b><?= $cat['name']; ?></b></h1>
    
    
    <span class="badge bg-primary rounded-pill  ms-5"><?= $cat['count']; ?></span>
  </li></a>
  <?php endforeach; ?>
</ol>
</div>

<script>
    $('.collection').on('click', '.show-products', function(e) {
        e.preventDefault();
        const catId = $(this).data('id');
        const path = $(this).data('path');
        // console.log($catId);
        location.replace(`catalogue/${path}?cat_id=${catId}`);
    })
</script>