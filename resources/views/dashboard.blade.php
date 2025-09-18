@extends('layouts.portal')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<!-- Dashboard Overview -->
<div class="stats-grid">
    <div class="stat-card active">
        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
        <div class="stat-content">
            <h3 class="stat-title">Active Cases</h3>
            <p class="stat-number">8</p>
            <div class="stat-change positive"><i class="fas fa-arrow-up"></i> +1 this month</div>
        </div>
    </div>

    <div class="stat-card pending">
        <div class="stat-icon"><i class="fas fa-clock"></i></div>
        <div class="stat-content">
            <h3 class="stat-title">Pending Approvals</h3>
            <p class="stat-number">3</p>
            <div class="stat-change neutral"><i class="fas fa-minus"></i> No change</div>
        </div>
    </div>

    <div class="stat-card completed">
        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="stat-content">
            <h3 class="stat-title">Closed Cases</h3>
            <p class="stat-number">24</p>
            <div class="stat-change positive"><i class="fas fa-arrow-up"></i> +4 this quarter</div>
        </div>
    </div>

    <div class="stat-card revenue">
        <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
        <div class="stat-content">
            <h3 class="stat-title">Total Charges Submitted</h3>
            <p class="stat-number">$58,200</p>
            <div class="stat-change positive"><i class="fas fa-arrow-up"></i> +12% this month</div>
        </div>
    </div>
</div>

<!-- Case Lifecycle + Quick Actions -->
<div class="grid-2-col">
    <!-- Case Lifecycle Chart -->
    <div class="card" style="height: 450px;">
        <div class="card-header">
            <div class="card-title">Case Lifecycle Overview</div>
            <div class="card-subtitle">Referral → Assignment → Outcome → Settlement</div>
        </div>
        <div class="card-body">
            <canvas id="caseStatusChart" height="80" width="300"></canvas>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions-grid">
        <div class="action-card">
            <div class="action-icon"><i class="fas fa-plus"></i></div>
            <div class="action-title">New Case</div>
        </div>
        <div class="action-card">
            <div class="action-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="action-title">Submit Invoice</div>
        </div>
        <div class="action-card">
            <div class="action-icon"><i class="fas fa-chart-line"></i></div>
            <div class="action-title">Generate Report</div>
        </div>
    </div>
</div>

<!-- Grid View for Dashboard Sections -->
<div class="dashboard-grid">
    <!-- Recent Notes -->
    <div class="card">
        <div class="card-header"><div class="card-title">Recent Notes</div></div>
        <div class="card-body">
            <ul class="compact-list">
                <li><strong>#130</strong> – “Initial review completed”</li>
                <li><strong>#128</strong> – “Awaiting client documents”</li>
            </ul>
        </div>
    </div>

    <!-- Document Upload Tracker -->
    <div class="card">
        <div class="card-header"><div class="card-title">Document Uploads</div></div>
        <div class="card-body">
            <ul class="compact-list">
                <li>#130 – Legal Opinion.pdf – Reviewed</li>
                <li>#128 – Evidence.zip – Pending</li>
            </ul>
        </div>
    </div>

    <!-- Financial Timeline -->
    <div class="card">
        <div class="card-header"><div class="card-title">Financial Timeline</div></div>
        <div class="card-body">
            <ul class="compact-list">
                <li>#202 – $4,500 – Approved</li>
                <li>#198 – $2,800 – Pending</li>
            </ul>
        </div>
    </div>

    <!-- Notification Center -->
    <div class="card">
        <div class="card-header"><div class="card-title">Notifications</div></div>
        <div class="card-body">
            <ul class="compact-list">
                <li>New case assigned: #130</li>
                <li>Message from client: #128</li>
            </ul>
        </div>
    </div>

    <!-- Compliance Snapshot -->
    <div class="card">
        <div class="card-header"><div class="card-title">Compliance Overview</div></div>
        <div class="card-body">
            <ul class="compact-list">
                <li>Last Login: Sep 17</li>
                <li>Inactive Accounts: 2</li>
                <li>Retention Alerts: 3 cases near 5-year limit</li>
            </ul>
        </div>
    </div>
</div>

<!-- Chart Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('caseStatusChart').getContext('2d');
    const caseStatusChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Referral', 'Assigned', 'In Progress', 'Outcome', 'Settlement'],
            datasets: [{
                label: 'Cases',
                data: [12, 10, 8, 6, 4],
                backgroundColor: ['#007bff', '#6f42c1', '#ffc107', '#28a745', '#17a2b8']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Case Lifecycle Breakdown' }
            }
        }
    });
</script>

<!-- Styles -->
<style>
    .grid-2-col {
        display: grid;
        grid-template-columns: 3fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .quick-actions-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .compact-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .compact-list li {
        padding: 6px 0;
        border-bottom: 1px solid #eee;
    }

    .action-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .action-icon {
        font-size: 24px;
        margin-bottom: 8px;
        color: #007bff;
    }

    .action-title {
        font-weight: bold;
        font-size: 16px;
    }
</style>
@endsection
