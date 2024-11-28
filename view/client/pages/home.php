<div class="w-full min-h-screen">
  <!-- banner -->
  <section class="w-full px-4 ">

    <div id="carouselExampleCaptions" class="carousel slide h-[270px] w-full">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="./img/bannerTrang3.png"
            alt=""
            class="w-full object-fit" />
        </div>
        <div class="carousel-item ">
          <img
            src="./img/bannerTrang4.png"
            alt=""
            class="w-full object-fit" />
        </div>
        <div class="carousel-item ">
          <img
            src="./img/bestseller.png"
            alt=""
            class="w-full object-fit" />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </section>



  <div class="p-4">
    <h3 class="text-center border-b text-2xl font-bold">Sản phẩm</h3>

    <div class="grid grid-cols-4 w-full gap-4 mt-3">
      <?php
      foreach ($dataPro as $index => $data) {
      ?>
        
        <a href="index.php?page=productDetail&id=<?= $data['id'] ?>" class="group">
          <img src="./uploads/<?= $data['image'] ?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
          <h3 class="mt-4 text-sm text-gray-700"><?= $data['name'] ?></h3>
          <p class="mt-1 text-lg font-medium text-gray-900"><?= formatCurrency($data['price']) ?></p>
        </a>
      <?php
      }
      ?>
    </div>
  </div>

  <div class="p-4">
    <h3 class="text-center font-bold text-2xl">Thương hiệu</h3>
    <div class="w-full flex justify-center">
      <div class="w-40">
        <img src="./img/thuonghieu1.webp" alt="" />
      </div>
      <div class="w-40">
        <img src="./img/thuonghieu2.webp" alt="" />
      </div>
      <div class="w-40">
        <img src="./img/thuonghieu3.webp" alt="" />
      </div>
      <div class="w-40">
        <img src="./img/thuonghieu4.webp" alt="" />
      </div>
    </div>
  </div>
</div>