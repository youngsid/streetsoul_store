<div class="box-color">
    <h2 class="title">Quản lí người dùng</h2>
    <div class="box-color-body row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên </th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo</th>
                        <!-- <th scope="col">Lưu</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $colorRequestAll = get_all_pdo("color");
                    foreach ($listData as $index => $user) {
                    ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role'] === 0 ? "Admin" : "Khách hàng" ?></td>
                            <td><?= $user['createdAt'] ?></td>
                            <!-- <td>
                                <a href="index.php?layout=admin&page=user&method=update&id=<?= $user['id'] ?>">
                                    <button class="btn btn-outline-success">Sửa</button>
                                </a>
                            </td> -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>