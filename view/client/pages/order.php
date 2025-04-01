<form action="" method="post">
    <div class="box-cart">
        <div class="box-cart-left">
            <div class="box-cart-left-adress">
                <div class="box-cart-left-title">Thông tin</div>
                <form>
                    <div class="flex gap-3">
                        <div class="col">
                            <label class="form-label">Tên người nhận</label>
                            <input type="text" class="form-control" name="username" required />
                        </div>
                        <div class="col">
                            <label class="form-label">SĐT</label>
                            <input type="text" class="form-control" name="phone" required />
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label">Địa chỉ</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                </form>
            </div>
            <div class="box-cart-left-box">
                <div class="box-cart-left-title">Giỏ hàng</div>
                <div class="box-cart-left-list">
                    <!-- <?php
                            $totalMoney = 0;
                            foreach ($listData as $key => $value) {
                                $totalMoney += (int)$value['price'] * $value['quantity'];
                                
                            ?> -->
                    <div class="box-cart-left-item">
                        <div class="box-cart-left-item-img size-20">
                            <img src="./uploads/<?= $value['image'] ?>" alt="" />
                        </div>
                        <div class="box-cart-left-item-text">
                            <div class="box-cart-left-item-text-header">
                                <p class="font-medium"><?= $value['name'] ?></p>
                                <p class="text-sm text-red-500"><?= formatCurrency($value['price']) ?></p>
                            </div>
                            <div class="text-gray-400 text-sm ">
                                <div class="flex items-center gap-2"><span>Màu:</span>
                                    <div class="size-4 rounded-full bg-[<?= $value['code'] ?>]"></div>
                                </div>
                                <p class="quaition">
                                    <span>Số lượng: <?= $value['quantity'] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <?php
                            }
                            ?> -->
                </div>
            </div>
        </div>
        <div class="box-cart-right order">
            <div class="box-cart-right-title">Đơn hàng</div>
            <div class="box-cart-right-box">
            <div class="box-cart-right-text">
                    <p>Giá tiền</p>
                    <span id="box-cart-right-text-price"><?= formatCurrency($totalMoney) ?></span>
                </div>
                <div class="box-cart-right-text">
                    <p>Phí ship</p>
                    <span>10.000d</span>
                </div>
                <div class="box-pay-select">
                    <p>Phương thức thanh toán</p>
                    <label for="pay-select-home">
                        <input type="radio" name="pay-buy" id="pay-select-home" checked value="0" />
                        Thanh toán khi nhận hàng
                    </label>
                    <!-- <label for="pay-select-bank">
                        <input type="radio" name="pay-buy" id="pay-select-bank" value="1" />
                        Thanh toán tài khoản
                    </label> -->
                </div>
                <div class="box-cart-right-total">
                    <p>Tổng tiền:</p>
                    <span id="box-cart-right-text-total"><?= formatCurrency($totalMoney + 10000) ?></span>
                </div>
                <button class="box-cart-btn-buy" type="submit" name="btn-buy-order">Mua hàng</button>
            </div>
        </div>
    </div>
</form>


<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm địa chỉ mới</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="box-create-adress-form">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Tên người nhận</label>
                            <input
                                type="text"
                                class="form-control"
                                id="validationCustom01"
                                value=""
                                name="name"
                                required />
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Số diện thoại</label>
                            <input
                                type="number"
                                class="form-control"
                                id="validationCustom02"
                                value=""
                                name="phone"
                                minlength="10"
                                required
                                style="appearance: none;" />
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Thành phố</label>
                            <select
                                class="form-select"
                                id="validationCustom03"
                                required></select>
                            <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Huyện</label>
                            <select class="form-select" id="validationCustom04" required>
                                <option selected disabled value="">Huyện</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom05" class="form-label">Xã</label>
                            <select class="form-select" id="validationCustom05" required>
                                <option selected disabled value="">Xã</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Địa chỉ cụ thể</label>
                            <textarea
                                class="form-control"
                                id="validationTextarea"
                                placeholder="Mời nhập"
                                required
                                name="details"></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>