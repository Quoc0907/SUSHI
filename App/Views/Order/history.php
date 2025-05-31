<?php
include_once __DIR__ . "/../Layout/homeheader.php";
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>
<style>
  .container {
    max-width: 900px; margin: 0 auto; padding: 0 15px;
  }
  h2 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #007bff; /* xanh dương nổi bật */
    font-weight: 700; font-size: 2rem; text-align: center;
    margin-bottom: 1.5rem;
  }
  .alert-info {
    background: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
    padding: 15px;
    border-radius: 5px;
    font-size: 1.1rem;
    text-align: center;
  }
  table {
    width: 100%; border-collapse: separate; border-spacing: 0 12px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  thead.table-dark {
    background: #0056b3; /* xanh đậm hơn */
    color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 86, 179, 0.6);
  }
  thead.table-dark th {
    padding: 14px 20px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 700;
  }
  tbody tr {
    background: #e9f0ff; /* nền sáng xanh nhạt */
    box-shadow: 0 3px 6px rgba(0, 123, 255, 0.15);
    border-radius: 8px;
    transition: background-color 0.3s ease;
  }
  tbody tr:hover {
    background: #c8dafc; /* hover nổi bật hơn */
  }
  tbody tr td {
    padding: 14px 20px;
    vertical-align: middle;
    border-bottom: none !important;
    color: #004085;
    font-weight: 600;
  }
  tbody tr + tr td {
    background: #f0f7ff;
    padding-left: 40px;
    text-align: left;
    font-size: 0.95rem;
    color: #002752;
    font-style: italic;
  }
  ul.list-unstyled {
    margin: 0;
    padding-left: 20px;
  }
  ul.list-unstyled li {
    margin-bottom: 6px;
  }

  /* Responsive */
  @media (max-width: 768px) {
    h2 { font-size: 1.8rem; color: #0056b3; }
    table, thead, tbody, th, td, tr { display: block; width: 100%; }
    thead tr { display: none; }
    tbody tr {
      margin-bottom: 20px;
      box-shadow: none;
      border-radius: 0;
      background: transparent;
    }
    tbody tr td {
      padding-left: 55%;
      position: relative;
      text-align: left;
      border-bottom: 1px solid #ddd;
      font-size: 0.9rem;
      color: #004085;
      font-weight: 600;
    }
    tbody tr td::before {
      position: absolute;
      top: 14px;
      left: 15px;
      width: 40%;
      white-space: nowrap;
      font-weight: 700;
      color: #002752;
    }
    tbody tr td:nth-of-type(1)::before { content: "Mã đơn hàng"; }
    tbody tr td:nth-of-type(2)::before { content: "Ngày đặt"; }
    tbody tr td:nth-of-type(3)::before { content: "Trạng thái"; }
    tbody tr td:nth-of-type(4)::before { content: "Tổng tiền"; }
  }
</style>

<div class="container mt-5 mb-5">
    <h2 class="mb-4 text-center">📜 Lịch sử đơn hàng</h2>

    <?php if (empty($orders)): ?>
        <div class="alert alert-info text-center">Bạn chưa có đơn hàng nào.</div>
    <?php else: ?>
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?= $order['id'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                        <td><?= $order['status'] ?></td>
                        <td><?= number_format($order['total_amount'], 0) ?> VNĐ</td>
                    </tr>
                    <?php if (!empty($order['items'])): ?>
                        <tr>
                            <td colspan="4">
                                <strong>Sản phẩm:</strong>
                                <ul class="list-unstyled text-start">
                                    <?php foreach ($order['items'] as $item): ?>
                                        <li><?= $item['product_name'] ?> - SL: <?= $item['quantity'] ?> - Giá: <?= number_format($item['price'], 0) ?> VNĐ</li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require __DIR__. "/../Layout/homefooter.php"; ?>
