<?php include __DIR__ . '/../Layout/adminheader.php'; ?>
<?php include __DIR__ . '/../Layout/sidebar.php'; ?>

<?php
$labels = [];
$data = [];
foreach ($ordersPerDay as $day) {
    $labels[] = $day['order_day'];
    $data[] = $day['order_count'];
}
?>

<h2 class="mb-4">Báo cáo đơn hàng theo ngày</h2>
<div class="card" style="height: 200px;">
    <div class="card-header">
        <i class="fas fa-chart-bar me-1"></i>
        Báo cáo số đơn hàng theo ngày (7 ngày gần nhất)
    </div>
    <div class="card-body">
        <<div >
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

<?php include __DIR__ . '/../Layout/adminfooter.php'; ?>
