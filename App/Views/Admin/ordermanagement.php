<?php include __DIR__ . '/../Layout/adminheader.php'; ?>
<?php include __DIR__ . '/../Layout/sidebar.php'; ?>

<h2 class="mb-4 text-center mt-2">Quản lý đơn hàng </h2>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
   <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['fullname']) ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td><?= number_format($order['total_amount'], 0) ?> đ</td>
                    <td><?= ucwords(strtolower($order['status'])) ?></td>
                    <td>
                        
                        <form method="post" action="<?= $baseURL ?>order/updateStatus" class="d-flex gap-1">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <select name="status" class="form-select form-select-sm">
                                        <option value="" selected></option>                            
                                        <option value="Đặt hàng" >Đặt hàng</option>
                                        <option value="Đang xử lý" >Đang xử lý"</option>
                                        <option value="Đã giao hàng" >Đã giao hàng</option>
                                        <option value="Đã hủy" >Đã hủy</option>
                            </select>
                            <button class="btn btn-sm btn-primary mt-1">Cập nhật</button>
                        </form>
</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    
    
    </div>
</div>

<?php include __DIR__ . '/../Layout/adminfooter.php'; ?>