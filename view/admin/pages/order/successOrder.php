<div class="box-order-news">
  <h2 class="title">Đơn hàng thành công</h2>
  <div class="box-order-news-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Người đặt</th>
          <th scope="col" style="width: 120px">Tổng tiền</th>
          <th scope="col" style="width: 120px">Thanh toán</th>
          <th scope="col">Điện thoại</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col" style="width: 120px">Ngày đặt</th>
          <th scope="col" style="width: 100px">Chi tiết</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($listData as $index => $item) {
        ?>
          <tr>
            <th scope="row"><?= $index ?></th>
            <td><?= $item['name'] ?></td>
            <td><?= formatCurrency($item['totalMoney']) ?></td>
            <td><?= $item['isPay'] == 0 ? formatCurrency($item['totalMoney']) : '0đ' ?></td>
            <td><?= $item['phone'] ?></td>
            <td><?= $item['address'] ?></td>
            <td><?= $item['createdAt'] ?></td>
            <td>
              <a href="index.php?layout=admin&page=orderDetail&id=<?= $item['id'] ?>">

                <button class="btn btn-outline-primary btn-sm">
                  Chi tiết
                </button>
              </a>
            </td>

          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>
  </div>
</div>