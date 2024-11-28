<div class="box-create-product">
    <h2 class="title">Thêm sản phẩm</h2>
    <form class="row g-3 needs-validation" accept="" method="post" enctype="multipart/form-data">
        <!--  -->
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
            <input
                type="text"
                class="form-control"
                id="validationCustom01"
                required
                name="name"
                value="<?= $dataPro['name'] ?>" />
            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm.</div>
        </div>
        <!--  -->
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Giá</label>
            <input
                type="number"
                class="form-control"
                id="validationCustom02"
                required
                value="<?= $dataPro['price'] ?>"
                name="price" />
            <div class="invalid-feedback">Vui lòng nhập giá sản phẩm.</div>
        </div>
        <!--  -->
        <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Số lượng</label>
            <input
                type="number"
                class="form-control"
                id="validationCustom04"
                required
                value="<?= $dataPro['quantity'] ?>"
                name="quantity" />
            <div class="invalid-feedback">Vui lòng nhập số lượng.</div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom06" class="form-label">Loại hàng</label>
            <select
                id="validationCustom06"
                class="form-select"
                required
                name="cate">
                <option selected disabled value="">Mời chọn loại hàng...</option>
                <?php
                foreach ($listCate as $cate) {
                ?>
                    <option value="<?= $cate['id'] ?>"
                        <?php
                        if ($dataPro['cate'] == $cate['id']) {
                            echo 'selected';
                        }
                        ?>>
                        <?= $cate['name'] ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <div class="invalid-feedback">Vui lòng chọn loại hàng.</div>
        </div>

        <div class="col-md-6">
            <label for="validationCustom09" class="form-label">Ảnh</label>
            <input
                type="file"
                name="image"
                id="validationCustom09"
                class="form-control" />
            <div class="box-form-image-img">
                <img src="./uploads/<?= $dataPro['image'] ?>" alt="" id="imageProduct" class="size-20 mt-1" />
            </div>
            <input type="text" name="imageOld" value="<?= $dataPro['image'] ?>" class="hidden">
        </div>

        <div class="col-md-6">
            <label for="validationCustom010" class="form-label">Mô tả</label>
            <textarea
                name="description"
                id="validationCustom010"
                class="form-control"
                required><?= $dataPro['description'] ?></textarea>

            <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit" id="btn-submit" name="btn-product-update">Lưu</button>
        </div>
    </form>
</div>

<script>
    const imgInput = document.querySelector("#validationCustom09");
    const imgShow = document.querySelector("#imageProduct");
    imgInput.addEventListener("change", (e) => {
        imgShow.src = URL.createObjectURL(e.target.files[0]);
    });
</script>