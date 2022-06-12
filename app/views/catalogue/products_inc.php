<?php

$products = $data['products'];
$count_products = $data['count'];
$count_on_page = $data['count_on_page'];
$cur_page = $data['cur_page'];
$count_pages = ceil($count_products / $count_on_page);
// debug($_SESSION['auth']);

?>

<div class="container d-flex cards">
<?php foreach ($products as $product) : ?>
<div class="card align-self-center justify-content-center mx-auto m-2" style="height:600px;width:400px;" >
<div class="align-self-center justify-content-center mx-auto m-2" style="height:400px;width:200px;background-image: url(<?= $product['image'] ?>);background-size: contain;background-repeat:no-repeat;background-position: center;">
</div>
  <div class="card-body">
    <h5 class="card-title product-name"><?= $product['name'] ?></h5>
    <p class="card-text product-price"><?= $product['price'] . ' Р' ?></p>
    <a href="#modal-products" class="btn btn-primary modal-trigger" data-id="<?= $product['id'] ?>" data-bs-toggle="modal" data-bs-target="#Modal1">В корзину</a>
  </div>
</div>
<?php endforeach; ?>
</div>


<!-- Modal add to cart-->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div id="modal-products">
  <div class="modal-dialog">
  <div class="modal-content">
    <h4>Корзина</h4>
      <div class="modal-body modal-client-cart" id="modal-products-content">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary checkout">Оформить заказ</button>
      </div>
    </div>
    </div>
  </div>

  
</div>
 <!-- Modal end -->
 
 <!-- Pagination -->
<div class="container">
<ul class="pagination justify-content-center m-4">

<?php for ($i = 1; $i <= $count_pages; $i++) : ?>
    <?php $class = ($cur_page == $i) ? ' active' : '';  ?>
    <li class="page-item active " aria-current="page"><a class="page-link <?= $class ?>" href="?page=<?= $i ?>"><?= $i ?></a></li>
        
<?php endfor; ?>

</ul>
</div>
<!-- Pagination end -->

<script>

// ДОБАВЛЕНИЕ В КОРЗИНУ
    $('.cards').on('click', '.modal-trigger', function() {   
        let productImage = $(this).closest('.card').find('.product-image').attr('src');
        let productName = $(this).closest('.card').find('.product-name').text();
        let productPrice = $(this).closest('.card').find('.product-price').text();
        let productId = $(this).data('id');     

        if (<?= (isset($_SESSION['auth']['id']) and !empty($_SESSION['auth']['id'])) ? $_SESSION['auth']['id'] : 'false'; ?>) {

              $.ajax({
                method: 'post',
                url: "/catalogue/add_to_cart",
                data: {
                    product_id: productId,
                    count: 1,
                    price: productPrice.replace(' Р', '')
                }                
            }).done(function(resp) {                
                if (resp == 'false') {
                    alert('Произошла ошибка. Попробуйте позже!');
                } else {                    
                    const products = JSON.parse(resp);
                    var productCard = '';
                    products.forEach(product => {
                        productCard += `        
                        <div class="container row">
                            <div class="card">
                                    <div class="card-image row d-flex">
                                        <img class="modal-product-image img-fluid d-block w-25" src="${product.image}">
                                        <p class="col-4">
                                            <input type="text" data-id="${product.id}" hidden>
                                            Товар: <span class="modal-product-name">${product.name}</span>
                                            <br>
                                            Количество: <span class=""><input type="number" name="amount" value="${product.count}" min="1"></span>
                                            <br>
                                            Цена: <span class="modal-product-price">${product.price} Р</span>
                                        </p>
                                        <a class="btn waves-effect waves-red btn-primary delete-product" style="position:absolute;bottom:10px;right:10px">Удалить товар</a>

                                    </div>
                                </div>
                                </div>`
                    });
                    $('#modal-products-content').html(productCard);
                }
            });
          } else {
            alert('авторизуйтесь');
            header('location: ' . $_SERVER['REDIRECT_URL']); 
          }

           });
    
          
    
</script>