<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="/public/css/bootstrap.css" rel="stylesheet"> -->
    <!-- Bootstrap 5 CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <title>EmFm</title>
    <link href="\public\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <script src="\public\js\jquery-3.6.0.js"></script>
    <link href="https://getbootstrap.com/docs/5.2/examples/carousel/carousel.css" rel="stylesheet">
    
</head>

 <!-- Модалка истории покупок-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">История покупок:</h5>
      </div>
      <div class="card mb-3" style="max-width: 540px;" id="modal-orders-content">
      
        ...
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        
      </div>
    </div>
  </div>
</div>
  
<!-- <div class="modal-dialog">
  <div class="modal-content">
    <h4>История покупок</h4>
      <div id="modal-orders-content" class="modal-client-cart">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    
    </div> -->

<body class="container-fluid mx-auto">
<div class="container row m-3 center-block mx-auto">
<ul class="nav d-flex justify-content-between align-items-center">
    <img src="/public/images/layout/logo.png" width="100" class="mx-5">
    <h1 class="text-primary fst-italic fw-weight-bold">EmFm - Enjoy your music today</h1>
    <div class="d-flex">
  <li class="nav-item bg-info">
    <a class="nav-link active" aria-current="page" href="/"><h4 class="fst-italic text-dark">Главная</h4></a>
  </li>
  <li class="nav-item bg-info">
    <a class="nav-link" href="/catalogue"><h4 class="fst-italic text-dark">Каталог</h4></a>
  </li>
  <?php if (isset($_SESSION['auth']) and !empty($_SESSION['auth'])) : ?>
    <li class="nav-item bg-info align-items-center">
    <div class="dropdown align-items-center">
  <a class="nav-link dropdown-toggle text-dark align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
  <?= $_SESSION['auth']['email']; ?>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item modal-trigger" id="user-cart" href="#" data-bs-toggle="modal" data-bs-target="#Modal3">Корзина</a></li>
    
    <li><button type="button" class="btn btn-primary" id="user-orders" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  История покупок
</button></li>
    <li><a class="dropdown-item" href="?do=exit">Выход</a></li>
  </ul>
</div>
    </li>
    <?php else : ?>
  <li class="nav-item bg-info">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><h4 class="fst-italic text-dark">Авторизация</h4></a>
  </li>
  <?php endif; ?>
  </div>
</ul>
</div>

<!-- Modal Auth/Reg-->
<div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" id="modal-auth">
    <div class="modal-content">
    <h4>Войти на сайт</h4>
                <div class="col-12">
                    <button class="btn btn-primary active-auth-btn auth" id="authTest">Авторизация</button>
                    <button class="btn btn-primary reg" id="regTest">Регистрация</button>
                </div>
    <form class="col-12" method="POST">
  <div class="m-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control validate" id="exampleInputEmail1 email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Не сообщайте ваш логин и пароль третьим лицам</div>
  </div>
  <div class="m-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="text" class="form-control validate" id="exampleInputPassword1 password" name="password">
  </div>
  <input type="submit" class="btn btn-primary" value="Вход">
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
    </div>
  </div>
</div>



<?php echo $content;?>



<div class="container">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Офицальный партнёр Музторга</span>
          <a type="button" class="btn btn-outline-light btn-rounded" href="https://www.muztorg.ru">
            Музторг
          </a>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="/">EmFm.ru</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div> 

<!-- КОНЕЦ ФУТЕРА -->

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

  
  <script src="\public\js\bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
// Вызов Истории покупок
$('#user-orders').on('click', function() {
            const clientId = '<?= $_SESSION['auth']['id']; ?>';
            if (clientId) {
                $.ajax({
                    method: 'post',
                    url: "/catalogue/get_client_orders",
                    data: {
                        client_id: clientId
                    }
                }).done(function(resp) {
                    const products = JSON.parse(resp);
                    var productCard = '';
                    products.forEach(product => {
                        productCard += `
                        <div class="row g-0" style="border-bottom:2px solid black;">
                        
      
      <div class="col-md-4" style="background-image: url(${product.image});background-size: contain;background-repeat:no-repeat;background-position: center;"></div>
    
    <div class="col-md-8">
      <div class="card-body">
      <input type="text" data-id="${product.id}" hidden>
        <h5 class="card-title">${product.name}</h5>
        <p class="card-text">Колличество: ${product.count}.</p>
        <p class="card-text"><small class="text-muted">Цена: ${product.price}</small></p>
      </div>
      </div>
    </div>`
                    });

                    $('#modal-orders-content').html(productCard);


                })
            } else {
                alert('Client not found');
            }


        });
// Вызов формы Авторизация/Регистрация
  $('.modal-content').on('click', '.auth,.reg', function() {
            if ($(this).hasClass('active-auth-btn') == false) {
                if ($(this).hasClass('reg')) {
                    $('.auth').removeClass('active-auth-btn');
                    $(this).addClass('active-auth-btn');
                    const markup = modalStructure('reg');
                    // console.log(markup);
                    $('#modal-auth .modal-content').empty();

                    $('#modal-auth .modal-content').append(markup);
                } else {
                    $('.reg').removeClass('active-auth-btn');
                    $(this).addClass('active-auth-btn');
                    const markup = modalStructure('auth');
                    $('#modal-auth .modal-content').empty();
                    // console.log(markup);

                    $('#modal-auth .modal-content').append(markup);
                }
            }
        })


        function modalStructure(clazz) {
            if (clazz == 'reg') {
                return `
                <h4>Регистрация</h4>
                <div class="col-12">
                    <button class="btn btn-primary auth">Авторизация</button>
                    <button class="btn btn-primary active-auth-btn reg">Регистрация</button>
                </div>
                <div id="testForm">
    <form class="col-12" id="regForm" method="POST">
  <div class="m-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control validate" id="exampleInputEmail1 email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Не сообщайте ваш логин и пароль третьим лицам</div>
  </div>
  <div class="m-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="text" class="form-control validate" id="exampleInputPassword1 password" name="password">
  </div>
  <input type="submit" class="btn btn-primary" id="registrate" value="Регистрация">
  
</form>
</div>
            `
            } else {
                return `
                <h4>Войти на сайт</h4>
                <div class="col-12">
                    <button class="btn btn-primary active-auth-btn auth">Авторизация</button>
                    <button class="btn btn-primary reg">Регистрация</button>
                </div>
    <form class="col-12" method="POST">
  <div class="m-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control validate" id="exampleInputEmail1 email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Не сообщайте ваш логин и пароль третьим лицам</div>
  </div>
  <div class="m-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="text" class="form-control validate" id="exampleInputPassword1 password" name="password">
  </div>
  <input type="submit" class="btn btn-primary" value="Вход">
  
</form>
                `
            }
        };
        
// Вызов корзины
$('#user-cart').on('click', function() {
            
  let clientId = '<?= $_SESSION['auth']['id'] ?>';
            if (clientId) {
                $.ajax({
                    method: 'post',
                    url: "/catalogue/get_client_cart",
                    data: {
                        client_id: clientId
                    }
                }).done(function(resp) {
                  // console.log(resp);
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

                    $('#modal-cart-content').html(productCard);


                })
            } else {
                alert('Client not found');
            }
         

        });
  // Регистрация на сайте
  $('#regForm').on('click', '#registrate', function(e) {   
    e.preventDefault();
    console.log('products');
        let regName = '<?= $_POST['email']; ?>';
        let regPassword = '<?= $_POST['password']; ?>';
       
              $.ajax({
                method: 'post',
                url: "/catalogue/registration",
                data: {
                    regName: regName,
                    regPassword: regPassword
                }                
            }).done(function(resp) {                
                if (resp == 'false') {
                    alert('Произошла ошибка. Попробуйте позже!');
                } else {                    
                  alert('Вы зарегистрировались');
                }
            });
           });

  // Удаление товаров
           $('.modal-client-cart').on('click', '.delete-product', function(e) {
            e.preventDefault();
            const productId = $(this).closest('.card-image').find('input[data-id]').data('id');
            $.ajax({
                method: 'post',
                url: "/catalogue/delete_from_cart",
                data: {
                    product_id: productId
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
                    $('.modal-client-cart').html(productCard);
                }
            })
        });

    // Оформление товаров
    $('.checkout').on('click', function(e) {
            e.preventDefault();
            const cardsArr = $('.modal-client-cart .card');
            let dataArr = [];

            cardsArr.each(function() {
                let productId = $(this).find('input[data-id]').data('id');
                let count = $(this).find('input[name="amount"]').val();

                dataArr.push({
                    productId: productId,
                    count: count
                })
            })

            const productId = $(this).closest('.card-image').find('input[data-id]').data('id');
            $.ajax({
                method: 'post',
                url: "/catalogue/checkout",
                data: {
                    products: dataArr
                }
            }).done(function(resp) {
                if (resp == 'false') {
                    alert('Произошла ошибка. Попробуйте позже!');
                } else {
                    alert('Заказ успешно оформлен!');
                    header('location: ' . $_SERVER['REDIRECT_URL']);
                }
            })

        });

</script>

</body>
</html>


