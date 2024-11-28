<div class="box-color">
    <div class="title d-flex w-full justify-content-lg-between">
        <span class="">Kho xóa sản phẩm</span>
        <a href="index.php?layout=admin">
            <button class="btn btn-outline-primary">Danh sách</button>
        </a>
    </div>
    <div class="box-color-body row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên màu</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col" style="width: 80px">Khôi phục</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listData as $index => $data) {
                    ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= $data['name'] ?></td>
                            <td>
                                <?= $data['price'] ?>
                            </td>
                            <td><?= $data['quantity'] ?></td>
                            <td><img src="./uploads/<?= $data['image'] ?>" alt="" class="size-20"></td>
                            <td><?= $data['cateName'] ?></td>
                            <td><?= $data['description'] ?></td>

                            <td>
                                <form action="" method="post">
                                    <button class="btn btn-outline-success" name="btn-product-delete" value="<?= $data['id'] ?>" onclick="return confirm('Bạn có muốn khôi phục không ?')">Khôi phục</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>