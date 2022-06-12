
// Вызов формы Авторизация/Регистрация
  $('#modal-auth').on('click', '.auth,.reg', function() {
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
  <button type="submit" class="btn btn-primary" id="registrate">Регистрация</button>
  
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
            const clientId = <?= $_SESSION['auth']['id']; ?>;
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
