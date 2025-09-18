@extends('layouts.portal')

@section('title', 'Case Summary')
@section('page-title', 'Case Summary')

@section('content')

<!-- Case Header -->
<div class="card mb-4">
    <div class="card-body">
        <h4 class="mb-2">Case Reference: <strong>CLM-2025-001</strong></h4>
        <p class="mb-1">Client: <strong>Maria Rodriguez</strong></p>
        <p class="mb-1">Status: <span class="badge bg-success">Active</span></p>
        <p class="mb-0">Opened: 01 Sep 2025 &nbsp; | &nbsp; Last Updated: 15 Sep 2025</p>
    </div>
</div>

<!-- Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted">Total Charges</h6>
                <h4 class="fw-bold">$4,500</h4>
                <small class="text-success"><i class="fas fa-arrow-up me-1"></i> Approved</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted">Documents Uploaded</h6>
                <h4 class="fw-bold">5 Files</h4>
                <small class="text-muted">Last: Evidence.zip</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted">Upcoming Deadline</h6>
                <h4 class="fw-bold">20 Sep 2025</h4>
                <small class="text-warning">Settlement Review</small>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="d-flex gap-2 mb-4">
    <button class="btn btn-outline-primary"><i class="fas fa-edit me-1"></i> Edit Case</button>
    <button class="btn btn-outline-secondary"><i class="fas fa-sticky-note me-1"></i> Add Note</button>
    <button class="btn btn-outline-success"><i class="fas fa-upload me-1"></i> Upload Document</button>
</div>

<!-- Activity Timeline -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Recent Activity</h5>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>15 Sep 2025</strong> – Note added: “Client confirmed settlement terms.”
            </li>
            <li class="list-group-item">
                <strong>12 Sep 2025</strong> – Document uploaded: Evidence.zip
            </li>
            <li class="list-group-item">
                <strong>10 Sep 2025</strong> – Charge submitted: $4,500
            </li>
            <li class="list-group-item">
                <strong>05 Sep 2025</strong> – Deadline set: Settlement Review – 20 Sep 2025
            </li>
        </ul>
    </div>
</div>

@endsection
