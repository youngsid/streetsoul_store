<?php
session_start();

// Hàm cập nhật giỏ hàng trong session
function updateCart($id, $action) {
    if (!isset($_SESSION['cart'][$id])) return;
    
    if ($action === 'increase') {
        $_SESSION['cart'][$id]['quantity']++;
    } elseif ($action === 'decrease' && $_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    }
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function deleteFromCart($id) {
    unset($_SESSION['cart'][$id]);
}

// Tính tổng tiền
function getTotalMoney() {
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}

$listData = $_SESSION['cart'] ?? [];
$totalMoney = getTotalMoney();
?>

<!-- Container -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <?php if (!empty($listData)): ?>
                <?php foreach ($listData as $id => $data): ?>
                    <tr data-id="<?= $id ?>">
                        <td><img src="./uploads/<?= htmlspecialchars($data['image']) ?>" class="size-20 border" /></td>
                        <td><p class="font-medium"> <?= htmlspecialchars($data['name']) ?> </p></td>
                        <td><p class="text-red-500 font-semibold"> <?= formatCurrency($data['price']) ?> </p></td>
                        <td>
                            <div class="flex items-center">
                                <button class="text-gray-400 hover:text-gray-600 p-1 btn-decrease" data-id="<?= $id ?>">-</button>
                                <input class="text-lg font-semibold border size-5 text-sm text-center quantity" name="quantity" value="<?= $data['quantity'] ?>" readonly />
                                <button class="text-gray-400 hover:text-gray-600 p-1 btn-increase" data-id="<?= $id ?>">+</button>
                            </div>
                        </td>
                        <td><p class="text-red-500 font-semibold total-price"> <?= formatCurrency($data['price'] * $data['quantity']) ?> </p></td>
                        <td><button class="btn btn-outline-danger btn-delete" data-id="<?= $id ?>">Xóa</button></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><th colspan="6" class="text-center py-4">Không có sản phẩm nào trong giỏ hàng</th></tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <?php if (!empty($listData)): ?>
        <div class="mt-4">
            <p class="text-lg font-semibold text-gray-700 flex justify-between">Tổng tiền: <span id="totalMoney"> <?= formatCurrency($totalMoney) ?> </span></p>
            <div class="flex justify-end border-t mt-2 py-2">
                <a href="index.php?page=order"><button class="btn btn-primary">Thanh toán</button></a>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    $(document).ready(function() {
        $('.btn-increase, .btn-decrease').click(function() {
            let btn = $(this);
            let row = btn.closest('tr');
            let quantityInput = row.find('.quantity');
            let totalPrice = row.find('.total-price');
            let productId = btn.data('id');
            let action = btn.hasClass('btn-increase') ? 'increase' : 'decrease';
            
            $.post('cart_action.php', { id: productId, action: action }, function(response) {
                if (response.success) {
                    quantityInput.val(response.newQuantity);
                    totalPrice.text(response.newTotal);
                    $('#totalMoney').text(response.totalMoney);
                }
            }, 'json');
        });

        $('.btn-delete').click(function() {
            if (!confirm('Bạn có muốn xóa không?')) return;
            let btn = $(this);
            let row = btn.closest('tr');
            let productId = btn.data('id');
            
            $.post('cart_action.php', { id: productId, action: 'delete' }, function(response) {
                if (response.success) {
                    row.remove();
                    $('#totalMoney').text(response.totalMoney);
                }
            }, 'json');
        });
    });
</script>
