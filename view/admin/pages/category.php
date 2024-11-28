<div class="box-category">
    <h2 class="title">Danh mục</h2>
    <div class="box-category-body row">
        <div class="col-md-7">
            <div class="box-category-left">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Stt</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col" style="width: 100px">Sửa</th>
                            <th scope="col" style="width: 100px">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listData as $index => $cate) {
                        ?>
                            <tr>
                                <th scope="row"><?= $index ?></th>
                                <td><?= $cate['name'] ?></td>
                                <td><?= $cate['createdAt'] ?></td>
                                <td>
                                    <a href="index.php?layout=admin&page=category&method=update&id=<?= $cate['id'] ?>">
                                        <button class="btn btn-outline-success">Sửa</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <button class="btn btn-outline-danger" name="btn-delete-cate" value="<?= $cate['id'] ?>" onclick="return confirm('Bạn có muốn xóa không ?')">Xóa</button>
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
        <div class="col-md-5">
            <?php
            if (isset($_GET['method'])) {
                if (isset($_GET['id'])) {

            ?>
                    <form action="" method="post">
                        <div class="box-category-create">
                            <p>Thêm danh mục</p>
                            <input type="text" class="form-control" name="nameUpdate" value="<?= $cateUpdate['name'] ?>" spellcheck="false" />
                            <button class="btn btn-primary" name="btn-update-cate">Cập nhập</button>
                        </div>
                    </form>
                <?php
                }
            } else {
                ?>
                <form action="" method="post">
                    <div class="box-category-create">
                        <p>Thêm danh mục</p>
                        <input type="text" class="form-control" name="name" />
                        <button class="btn btn-primary" name="btn-post-cate">Thêm danh mục</button>
                    </div>
                </form>
            <?php
            }
            ?>


        </div>
    </div>
</div>


<?php
// if (isset($_POST['btn-post-cate'])) {
//     $name = $_POST['name'];
//     $result = postCate($name);
//     if ($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
// }

// if (isset($_POST['btn-update-cate'])) {
//     $name = $_POST['nameUpdate'];
//     $id = $_GET['id'];
//     $result = updateCate($name, $id);
//     if ($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
// }

// if (isset($_POST['btn-delete-cate'])) {
//     $id = $_POST['btn-delete-cate'];
//     $result = delete_one_pdo("category", $id);
//     if ($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
// }
// 
?>