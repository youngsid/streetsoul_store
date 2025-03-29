<div class="w-full min-h-screen">
  <!-- Banner -->
  <section class="w-full px-4">
    <div id="carouselExampleCaptions" class="carousel slide h-[270px] w-full">
      <div class="carousel-inner">
        <?php $banners = ['./img/bannerTrang3.png', './img/bannerTrang4.png', './img/bestseller.png']; ?>
        <?php foreach ($banners as $index => $banner) : ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <img src="<?= $banner ?>" alt="Banner" class="w-full object-cover" />
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
  </section>

  <!-- Sản phẩm -->
  <div class="p-4">
    <h3 class="text-center border-b text-2xl font-bold">Sản phẩm</h3>
    <div class="grid grid-cols-4 w-full gap-4 mt-3">
      <?php foreach ($dataPro as $product) : ?>
        <a href="index.php?page=productDetail&id=<?= $product['id'] ?>" class="group">
          <img src="./uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full rounded-lg object-cover group-hover:opacity-75">
          <h3 class="mt-4 text-sm text-gray-700"> <?= $product['name'] ?> </h3>
          <p class="mt-1 text-lg font-medium text-gray-900"> <?= formatCurrency($product['price']) ?> </p>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Thương hiệu -->
  <div class="p-4">
    <h3 class="text-center font-bold text-2xl">Thương hiệu</h3>
    <div class="flex justify-center gap-4">
      <?php $brands = ['./img/thuonghieu1.webp', './img/thuonghieu2.webp', './img/thuonghieu3.webp', './img/thuonghieu4.webp']; ?>
      <?php foreach ($brands as $brand) : ?>
        <div class="w-40">
          <img src="<?= $brand ?>" alt="Thương hiệu">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
