<div class="box-content ">
    <div class="box-product-deltail row">
        <!-- product img -->
        <div class="col-7 box-product-deltail-img">
            <img src="./uploads/<?= $product['image'] ?>" alt="" />
        </div>
        <!-- product detail  -->
        <div class="col-4 box-product-deltail-body">
            <div class="box-product-deltail-body-title">
                <h3 class="text-2xl font-semibold"><?= $product['name'] ?></h3>
            </div>
            <br />
            <div class="box-product-deltail-body-price">
                <p class="text-red-500 text-xl font-semibold  mb-2">Giá : <?= formatCurrency($product['price']) ?></p>
                <span>Áo được sản xuất tại Việt nam</span>
            </div>
            <!-- form xử lí color và size -->
            <form action="" method="post" class="needs-validation" novalidate>
                <br />
                <div class="box-product-deltail-body-color">
                    <p>Color :</p>
                    <div class="box-product-deltail-body-color-list">
                        <?php
                        foreach ($listColor as $color) {
                        ?>
                            <div>
                                <input
                                    type="radio"
                                    name="color"
                                    id="product-color-<?= $color['id'] ?>"
                                    class="form-check-input"
                                    required
                                    value="<?= $color['id'] ?>" />
                                <label for="product-color-<?= $color['id'] ?>" style="background-color: <?= $color['code'] ?>;"> </label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <br />
                <br />
                <div class="box-product-deltail-body-submit">
                    <button class="btn-cart" type="submit" name="btn-to-cart">Thêm giỏ hàng</button>
                </div>
                <br />
                <div class="box-product-deltail-body-description">
                    <h6>Mô tả :</h6>
                    <p>
                        <?= $product['description'] ?>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <br />
    <div class="box-comment row border-t py-2">
        <div class="col-12">
            <div class="box-product-category-other">
                <h5 class="text-center py-4">Các sản phẩm khác</h5>
                <div class=" grid grid-cols-5 gap-4">
                    <?php
                    foreach ($listOther as $index => $data) {
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
        </div>
    </div>
    <!-- dấdassadasdsdsasasadsadsasda -->