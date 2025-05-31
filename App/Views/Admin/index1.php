<?php include __DIR__ . '/../layout/header.php'; ?>

<h1 class="mt-4">Trang quản trị</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng sản phẩm</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= $baseURL ?>product/index">Xem chi tiết</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Đơn hàng đang xử lý</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= $baseURL ?>admin/orderManagement">Xem chi tiết</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Biểu đồ đơn hàng 7 ngày gần nhất -->
<?php
$labels = [];
$data = [];
foreach ($ordersPerDay as $day) {
    $labels[] = $day['order_day'];
    $data[] = $day['order_count'];
}
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-chart-bar me-1"></i>
        Báo cáo số đơn hàng theo ngày (7 ngày gần nhất)
    </div>
    <div class="card-body">
        <<div style="height: 250px;">
            <canvas id="orderChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('orderChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Số đơn hàng',
                data: <?= json_encode($data) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: {
                    display: false,
                    text: 'Số đơn hàng mỗi ngày'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<?php include __DIR__ . '/../layout/footer.php'; ?>