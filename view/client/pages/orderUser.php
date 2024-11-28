<div class="box-purchase">
    <div class="box-purchase-left">
        <div class="box-purchase-left-user">

            <div class="box-purchase-left-user-info">
                <p><?= $_SESSION['user']['username'] ?></p>
                <!-- <a href="/duan1_Nike/index.php?act=userInfo"><i class="fa-solid fa-user-pen"></i> Hồ sơ</a> -->
            </div>
        </div>
        <div class="box-purchase-left-type">
            <a href="index.php?page=purchases">
                <button>
                    <i class="fa-solid fa-file-pen" style="--i: #eda500"></i>
                    Chờ xác nhận
                </button>
            </a>
            <a href="index.php?page=purchasesShip">
                <button>
                    <i class="fa-solid fa-truck-fast" style="--i: #0d7ff4"></i>
                    Đang vận chuyện
                </button>
            </a>
            <a href="index.php?page=purchasesSuccess">
                <button>
                    <i class="fa-regular fa-circle-check" style="--i: #04d811"></i>
                    Hoàn thành
                </button>
            </a>

        </div>
    </div>

    <div class="box-purchase-right">
        <?php
        ?>
        <div class="box-purchase-right-header">Chờ xác nhận</div>
        <div class="box-purchase-right-list">
            <?php
            foreach ($listOrder as $item) {
            ?>
                <div class="box-purchase-right-list-items">
                    <div class="box-purchase-right-list-items-header">
                        <div class="box-purchase-right-list-items-header-status">
                            <p style="--i: #eda500">
                                <?php
                                if ($item['status'] === 0) {
                                    echo 'Đang chờ xác nhận';
                                } else if ($item['status'] === 1) {

                                    echo 'Đang vận chuyển';
                                } else {
                                    echo 'Đã nhận hàng';
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-purchase-right-list-items-box">
                        <?php
                        $queryAllProToOrder = $this->model->getListOrderPro($item['id']);
                        foreach ($queryAllProToOrder as $pro) {
                        ?>
                            <div class="box-purchase-right-list-items-sp">
                                <div class="box-purchase-right-list-items-sp-img">
                                    <img src="./uploads/<?= $pro['image'] ?>" alt="" />
                                </div>
                                <div class="box-purchase-right-list-items-sp-text">
                                    <div class="box-purchase-right-list-items-sp-text-header">
                                        <p><?= $pro['name'] ?></p>
                                    </div>
                                    <div class="box-purchase-right-list-items-sp-text-content">
                                        <p>Màu: <?= $pro['colorName'] ?></p>
                                        <p class="quaition">
                                            <span>Số lượng:<?= $pro['quantity'] ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="box-purchase-right-list-items-sp-price">
                                    <span><?= formatCurrency($pro['quantity'] * $pro['price']) ?></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- các sản phẩm -->


                    </div>
                    <div class="box-purchase-right-list-items-footer">
                        <div class="box-purchase-right-list-items-footer-total">
                            <span>Thời gian đặt: <?php
                                                    $date = date_create($item['createdAt']);
                                                    echo date_format($date, "H:i:s - d/m/Y");; ?></span>
                            <table>
                                <tr>
                                    <td>Tổng :</td>
                                    <td><?= formatCurrency($item['totalMoney']); ?></td>
                                </tr>
                                <tr>
                                    <td>Thanh toán :</td>
                                    <td>- <?php
                                            if ($item['isPay'] == 1) {
                                                echo formatCurrency($item['totalMoney']);
                                            } else {
                                                echo '0đ';
                                            }
                                            ?></td>
                                </tr>
                                <tr>
                                    <td>Thành tiền :</td>
                                    <td><b>
                                            <?php
                                            if ($item['isPay'] == 1) {
                                                echo '0đ';
                                            } else {
                                                echo formatCurrency($item['totalMoney']);
                                            }
                                            ?>
                                        </b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-purchase-right-list-items-footer-button">
                            <p style="--i: #eda500">
                                <?php
                                if ($item['status'] === 0) {
                                    echo 'Đơn hàng đang chờ shop chấp nhận';
                                } else if ($item['status'] === 1) {

                                    echo 'Đơn hàng đang vận chuyển';
                                } else {
                                    echo 'Đơn hàng đã giao thành công';
                                }
                                ?>
                            </p>
                            <?php
                            if ($item['status'] === 1) {
                            ?>
                                <div>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-success" name="btn-success" value="<?= $item['id'] ?>">Đã nhận hàng</button>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>