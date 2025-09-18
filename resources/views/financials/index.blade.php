@extends('layouts.portal')

@section('title', 'Financials')
@section('page-title', 'Financial Overview')

@section('content')

<!-- Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-file-invoice-dollar text-primary fs-4 me-2"></i>
                    <h6 class="mb-0">Total Charges Submitted</h6>
                </div>
                <h4 class="fw-bold">$58,200</h4>
                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>+12% this month</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-check-circle text-success fs-4 me-2"></i>
                    <h6 class="mb-0">Approved Charges</h6>
                </div>
                <h4 class="fw-bold">$42,000</h4>
                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>+8% this month</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-dollar-sign text-warning fs-4 me-2"></i>
                    <h6 class="mb-0">Payments Received</h6>
                </div>
                <h4 class="fw-bold">$36,500</h4>
                <small class="text-muted"><i class="fas fa-minus me-1"></i>No change</small>
            </div>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <form class="d-flex flex-wrap gap-2">
        <input type="text" class="form-control" placeholder="Search by case or invoice">
        <select class="form-select">
            <option>All Statuses</option>
            <option>Submitted</option>
            <option>Approved</option>
            <option>Paid</option>
            <option>Rejected</option>
        </select>
        <input type="date" class="form-control">
        <input type="date" class="form-control">
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submitChargeModal">
        <i class="fas fa-plus me-1"></i> Submit New Charge
    </button>
</div>

<!-- Financial Table -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Charge History</h5>
        <small class="text-muted">Static preview</small>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Invoice #</th>
                    <th>Case Ref</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Paid On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach([1,2,3,4] as $i)
                @php
                    $statuses = ['Submitted', 'Approved', 'Paid', 'Rejected'];
                    $dates = ['2025-09-10', '2025-09-12', '2025-08-30', '2025-09-01'];
                    $paid = ['—', '—', '2025-09-05', '—'];
                    $badgeClass = [
                        'Submitted' => 'bg-primary',
                        'Approved' => 'bg-success',
                        'Paid' => 'bg-warning text-dark',
                        'Rejected' => 'bg-danger'
                    ];
                @endphp
                <tr>
                    <td>INV-20{{ $i }}</td>
                    <td>CLM-2025-00{{ $i }}</td>
                    <td>${{ number_format(3000 + $i * 500) }}</td>
                    <td><span class="badge {{ $badgeClass[$statuses[$i-1]] }}">{{ $statuses[$i-1] }}</span></td>
                    <td>{{ $dates[$i-1] }}</td>
                    <td>{{ $paid[$i-1] }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Options
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">View Invoice</a></li>
                                <li><a class="dropdown-item" href="#">Download</a></li>
                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Submit Charge Modal -->
<div class="modal fade" id="submitChargeModal" tabindex="-1" aria-labelledby="submitChargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitChargeModalLabel">Submit New Charge</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="caseRef" class="form-label">Case Reference</label>
                    <input type="text" class="form-control" id="caseRef" placeholder="e.g. CLM-2025-006">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Charge Amount</label>
                    <input type="number" class="form-control" id="amount" placeholder="e.g. 4500">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Brief description of the charge..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Submit Charge</button>
            </div>
        </form>
    </div>
</div>
@endsection
