
<div class="container">
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>


    <div class="container raw carousel-inner collection d-none d-lg-block">

      <div class="carousel-item">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg> -->
        <img src="\public\images\Mic.jpg" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-end d-none d-lg-block">
            <h1>Студийное звучание.</h1>
            <p>Раскрой свой творческий потенциал наполную!.</p>
            <p><a class="show-products btn btn-primary" style="cursor: pointer;" data-id="1" data-path="microphone">Купить</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item active">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg> -->
        <img src="\public\images\Guit.jpg" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-dark d-none d-lg-block">
            <h1>Почувствуй драйв в твоих руках.</h1>
            <p>Стань рок звездой.</p>
            <p><a class="show-products btn btn-primary" style="cursor: pointer;" data-id="2" data-path="guitar">Купить</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg> -->
        <img src="\public\images\Drum.jpg" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-start text-primary d-none d-lg-block">
            <h1>Отрывайся по полной.</h1>
            <p>Пусть все услышат ритм в котором ты живёшь!.</p>
            <p><a class="show-products btn btn-primary" data-id="3" data-path="drum" style="cursor: pointer;">Купить</a></p>
          </div>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Пред.</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">След.</span>
    </button>
  </div>
  </div>

  <!-- ХИТЫ -->
  <div class="container d-flex flex-md-row flex-column cards m-5 center-block mx-auto">
<?php foreach ($data as $product) : ?>
  <div class="card align-self-center justify-content-center mx-auto m-2" style="height:600px;width:400px;" >
<div class="align-self-center justify-content-center mx-auto m-2" style="height:400px;width:200px;background-image: url(<?= $product['image'] ?>);background-size: contain;background-repeat:no-repeat;background-position: center;">
</div>
  <div class="card-body d-flex flex-column">
    <h5 class="card-title product-name flex-grow-1"><?= $product['name'] ?></h5>
    <p class="card-text product-price flex-grow-1"><?= $product['price'] . ' Р' ?></p>
    <a href="/catalogue" class="btn btn-primary modal-trigger ">В каталог</a>
  </div>
</div>
<?php endforeach; ?>
</div>


  <div class="container mb-4">

  <div class="row">
  <div class="col">
  <a href="/brand/yamaha" title="YAMAHA" class="home-brands__i">
  <img class="d-block w-100" src="https://www.muztorg.ru/files/6c0/i0y/85t/10c/8ok/8og/00s/koc/8/6c0i0y85t10c8ok8og00skoc8.jpg">
  </a>
  </div>

  <div class="col">
<a href="/brand/shure" title="SHURE" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/ao6/acg/umv/74s/8ws/0cc/40s/4ww/8/ao6acgumv74s8ws0cc40s4ww8.jpg">
</a>
</div>
<div class="col">
<a href="/brand/casio" title="CASIO" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/8k0/kwb/oyf/30g/go0/gkg/00o/ccg/4/8k0kwboyf30ggo0gkg00occg4.jpg">
</a>
</div>
<div class="col">
<a href="/brand/fender" title="FENDER" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/5u8/qke/o8g/44c/ks0/kso/4gg/csc/w/5u8qkeo8g44cks0kso4ggcscw.jpg">
</a>
</div>
<div class="col">
<a href="/brand/ibanez" title="IBANEZ" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/a7f/q2w/kpz/pc0/sc4/csg/wg8/k8o/k/a7fq2wkpzpc0sc4csgwg8k8ok.jpg">
</a>
</div>
<div class="col">
<a href="/brand/korg" title="KORG" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/523/eqr/u56/a88/w80/8w4/804/scw/c/523eqru56a88w808w4804scwc.jpg">
</a>
</div>
<div class="col">
<a href="/brand/gibson" title="GIBSON" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/53j/eep/v3p/log/kk4/4c0/0k4/c84/o/53jeepv3plogkk44c00k4c84o.jpg">
</a>
</div>
<div class="col">
<a href="/brand/pioneer" title="PIONEER" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/bpy/24n/b4l/28k/g84/cw8/8sw/8g8/bpy24nb4l28kg84cw88sw8g8.jpg">
</a>
</div>
<div class="col">
<a href="/brand/jbl" title="JBL" class="home-brands__i">
<img class="d-block w-100"  src="https://www.muztorg.ru/files/4iv/zgf/lc5/aio/s8g/c8o/ko0/g0g/c/4ivzgflc5aios8gc8oko0g0gc.png">
</a>
</div>
<div class="col">
<a href="/brand/roland" title="ROLAND" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/4c5/u3m/smq/2w4/gko/osg/cgg/0sc/g/4c5u3msmq2w4gkoosgcgg0scg.jpg">
</a>
</div>
<div class="col">
<a href="/promo/sennheiser" title="SENNHEISER" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/331/7kf/w5n/ekg/sg4/8sw/w48/0cw/w/3317kfw5nekgsg48sww480cww.jpg">
</a>
</div>
<div class="col">
<a href="/brand/epiphone" title="EPIPHONE" class="home-brands__i">
<img class="d-block w-100" src="https://www.muztorg.ru/files/9qc/ty2/sac/p44/ssw/40c/swo/8kg/s/9qcty2sacp44ssw40cswo8kgs.jpg">
</a>
</div>

</div>
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