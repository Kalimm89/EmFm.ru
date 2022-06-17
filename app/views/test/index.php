<h1>Что-то</h1>

<ul class="" aria-labelledby="">
    <li><a class=" modal-trigger" id="user-cart" href="#" data-bs-toggle="modal" data-bs-target="#Modal3">Корзина</a></li>
    <li><button type="button" class="btn btn-primary" id="user-orders" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button></li>
  </ul>


  <li><a class="dropdown-item modal-trigger" id="user-orders" href="#" data-bs-toggle="modal" data-bs-target="#modal-orders">История покупок</a></li>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- Модалка Вызов корзины-->
<div class="modal fade modal-cart" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div id="modal-products">
  <div class="modal-dialog">
  <div class="modal-content">
    <h4>Корзина</h4>
      <div id="modal-cart-content" class="modal-client-cart">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary checkout">Оформить заказ</button>
      </div>
    </div>
    </div>
  </div>

 <!-- Модалка Вызов корзины-->
 
<!-- <div class="modal fade modal-cart" id="modal-orders" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  
  <div class="modal-dialog">
  <div class="modal-content">
    <h4>История покупок</h4>
      <div id="modal-orders-content" class="modal-client-cart">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    
    </div>
  </div> -->

  

