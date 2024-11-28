<div class="box-order-detail">
    <h2 class="title">Chi tiết đơn hàng</h2>
    <div class="box-order-detail-body row">
        <div class="col-8">
            <div class="box-order-detail-body-left">
                <?php
                foreach ($listOrderPro as $pro) {
                ?>
                    <div class="box-order-detail-body-left-item">
                        <div class="box-order-detail-body-left-item-content">
                            <div class="box-order-detail-body-left-image">
                                <img src="./uploads/<?= $pro['image'] ?>" alt="">
                            </div>
                            <div class="box-order-detail-body-left-item-text">
                                <h4><?= $pro['name'] ?></h4>
                                <span>Màu : <?= $pro['colorName'] ?></span>
                                <div class="flex items-center gap-2">
                                    Mã màu: <div class="size-4 rounded-full bg-[<?= $pro['colorCode'] ?>]"></div>
                                </div>
                                <span>Số lượng: <?= $pro['quantity'] ?></span>
                            </div>

                        </div>
                        <div class="box-order-detail-body-left-price">
                            Tổng: <?= formatCurrency($pro['totalMoney']) ?>
                        </div>
                    </div>
                <?php
                }
                ?>



            </div>
        </div>
        <div class="col-4">
            <div class="box-order-detail-body-right">
                <div class="box-order-detail-body-right-user">
                    <div class="box-order-detail-body-right-user-name">
                        <p><strong>Tài khoản :</strong> <?= $orderDetail['username'] ?></p>
                        <!-- <p><?= $orderDetail['email'] ?></p> -->
                    </div>
                </div>

                <div class="box-order-detail-body-right-text">
                    <p><span>Người nhận</span>:<?= $orderDetail['name'] ?></p>
                    <p><span>SĐT</span>: <?= $orderDetail['phone'] ?></p>
                    <p><span>Địa chỉ</span>: <?= $orderDetail['address'] ?></p>
                    <p><span>Trạng thái</span>: <?php
                                                if ($orderDetail['status'] == '0') {
                                                    echo 'Chưa giao';
                                                } else if ($orderDetail['status'] == '1') {
                                                    echo 'Đang giao';
                                                } else {
                                                    echo 'Đã giao';
                                                }
                                                ?></p>
                    <p><span>Thanh toán</span> : <?= $orderDetail['isPay'] == 0 ? 'Tiền mặt' : 'Tài khoản' ?></p>
                    <p><span>Tổng tiền</span> : <?= formatCurrency($orderDetail['totalMoney']) ?></p>
                    <p><span>Ngày đặt</span> : <?= $orderDetail['createdAt'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>