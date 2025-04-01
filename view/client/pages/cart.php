<!-- Container -->

<div class="w-[1000px] mx-auto min-h-[calc(100vh-60px)] py-4">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Giỏ hàng của bạn</h1>

    <table class="table w-full">
        <thead>
            <tr>
                <th scope="col" width="100">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (count($listData) > 0) {
                foreach ($listData as $index => $data) {
            ?>
                    <tr>
                        <td>
                            <img src="./uploads/<?= $data['image'] ?>" alt="" class="size-20 border" />
                        </td>
                        <td>
                            <div class="flex flex-col justify-center">
                                <p class="text-base mb-1 font-medium"><?= $data['name'] ?></p>
                                <div class="text-sm flex items-center gap-2">
                                    <span>Màu: </span>
                                    <p class="p-2 rounded-full bg-[<?= $data['code'] ?>] size-4 "></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-red-500 font-semibold"><?= formatCurrency($data['price']) ?></p>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <div class="flex items-center">
                                    <button class="text-gray-400 hover:text-gray-600 p-1" name="btn-update-down" value="<?= $data['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <input class="text-lg font-semibold border size-5 text-sm text-center" name="quantity" value="<?= $data['quantity'] ?>" readonly />
                                    <button class="text-gray-400 hover:text-gray-600 p-1" name="btn-update-up" value="<?= $data['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" transform="rotate(180 10 10)" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <p class="text-red-500 font-semibold"><?= formatCurrency($data['price'] * $data['quantity']) ?></p>
                        </td>
                        <td>
                            <form action="" method="post">
                                <button class="btn btn-outline-danger" name="btn-delete-cate" value="<?= $data['id'] ?>" onclick="return confirm('Bạn có muốn xóa không ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <th colspan="6">
                        <div class="h-20 flex items-center justify-center">
                            Không có sản phẩm nào giỏ hàng
                        </div>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    if (count($listData) > 0) {


    ?>
        <div class="mt-4">
            <p class="text-lg font-semibold text-gray-700 flex justify-between">
                Tổng tiền: <span><?= formatCurrency($totalMoney) ?></span>
            </p>
            <div class="flex justify-end border-t mt-2 py-2">

                <a href="index.php?page=order">
                    <button class="btn btn-primary">
                        Thanh toán
                    </button>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
<!-- hadksadaskdjkldjajksajdaskjldkjlasdjsakjsakdkjlskljskdljaksjlsklajdlasjkdlsd -->