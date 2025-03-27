<div class="box-color">
    <div class="title d-flex justify-content-between">
        <span>Kho sản phẩm</span>
        <a href="index.php?layout=admin&page=deleteProduct" class="btn btn-outline-danger">Kho xóa</a>
    </div>

    <div class="box-color-body row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên màu</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th style="width: 80px">Sửa</th>
                        <th style="width: 80px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listData as $index => $data): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= number_format($data['price']) ?>đ</td>
                            <td><?= $data['quantity'] ?></td>
                            <td><img src="./uploads/<?= $data['image'] ?>" class="size-20"></td>
                            <td><?= $data['cateName'] ?></td>
                            <td><?= $data['description'] ?></td>
                            <td>
                                <a href="index.php?layout=admin&page=updateProduct&id=<?= $data['id'] ?>" class="btn btn-outline-success">Sửa</a>
                            </td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn btn-outline-danger" name="btn-product-delete" value="<?= $data['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
