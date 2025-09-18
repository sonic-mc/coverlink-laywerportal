@extends('layouts.portal')

@section('title', 'My Cases')

@section('page-title', 'My Cases')

@section('content')
<div class="cases-container">
    <!-- Header Section -->
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="page-title mb-1">My Cases</h2>
                <p class="page-subtitle text-muted mb-0">Manage and track your assigned cases</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-outline-primary me-2">
                    <i class="fas fa-download me-1"></i>Export
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>New Case
                </button>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="filter-section mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body py-3">
                <form class="filter-form">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label small text-muted mb-1">Search Cases</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" 
                                       placeholder="Client name or reference...">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <label class="form-label small text-muted mb-1">Status</label>
                            <select class="form-select">
                                <option>All Statuses</option>
                                <option>Open</option>
                                <option>In Progress</option>
                                <option>Closed</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <label class="form-label small text-muted mb-1">From Date</label>
                            <input type="date" class="form-control">
                        </div>
                        
                        <div class="col-md-2">
                            <label class="form-label small text-muted mb-1">To Date</label>
                            <input type="date" class="form-control">
                        </div>
                        
                        <div class="col-md-3">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-fill">
                                    <i class="fas fa-filter me-1"></i>Apply Filters
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cases Table Section -->
    <div class="cases-table-section">
        <div class="card border-0 shadow-sm">
            <!-- Card Header -->
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">Assigned Cases</h5>
                        <p class="card-subtitle text-muted small mb-0">Showing 5 of 5 cases</p>
                    </div>
                    <div class="table-controls">
                        <div class="btn-group" role="group" aria-label="View options">
                            <button type="button" class="btn btn-outline-secondary btn-sm active">
                                <i class="fas fa-list"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-th-large"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3 border-0">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-2" type="checkbox" id="selectAll">
                                        Reference ID
                                    </div>
                                </th>
                                <th class="py-3 border-0">Client</th>
                                <th class="py-3 border-0">Status</th>
                                <th class="py-3 border-0">Referral Date</th>
                                <th class="py-3 border-0">Deadline</th>
                                <th class="py-3 border-0 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom">
                                <td class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox">
                                        <div>
                                            <strong class="text-primary">CLM-2025-001</strong>
                                            <div class="small text-muted mt-1">Priority: High</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary me-3">MR</div>
                                        <div>
                                            <div class="fw-medium">M.R.</div>
                                            <div class="small text-muted">Personal Injury</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="badge badge-open">Open</span>
                                </td>
                                <td class="py-4">
                                    <div>01 Sep 2025</div>
                                    <div class="small text-muted">14 days ago</div>
                                </td>
                                <td class="py-4">
                                    <div class="text-danger fw-medium">15 Sep 2025</div>
                                    <div class="small text-danger">Overdue</div>
                                </td>
                                <td class="py-4">
                                    <div class="action-buttons text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" title="View Case">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Add Note">
                                                <i class="fas fa-sticky-note"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Upload Document">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" title="Submit Charges">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox">
                                        <div>
                                            <strong class="text-primary">CLM-2025-002</strong>
                                            <div class="small text-muted mt-1">Priority: Medium</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-success me-3">DJ</div>
                                        <div>
                                            <div class="fw-medium">D.J.</div>
                                            <div class="small text-muted">Contract Dispute</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="badge badge-in-progress">In Progress</span>
                                </td>
                                <td class="py-4">
                                    <div>05 Sep 2025</div>
                                    <div class="small text-muted">10 days ago</div>
                                </td>
                                <td class="py-4">
                                    <div class="text-warning fw-medium">20 Sep 2025</div>
                                    <div class="small text-warning">2 days left</div>
                                </td>
                                <td class="py-4">
                                    <div class="action-buttons text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" title="View Case">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Add Note">
                                                <i class="fas fa-sticky-note"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Upload Document">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" title="Submit Charges">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox">
                                        <div>
                                            <strong class="text-primary">CLM-2025-003</strong>
                                            <div class="small text-muted mt-1">Priority: Low</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-info me-3">SK</div>
                                        <div>
                                            <div class="fw-medium">S.K.</div>
                                            <div class="small text-muted">Family Law</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="badge badge-closed">Closed</span>
                                </td>
                                <td class="py-4">
                                    <div>12 Aug 2025</div>
                                    <div class="small text-muted">1 month ago</div>
                                </td>
                                <td class="py-4">
                                    <div class="text-success fw-medium">30 Aug 2025</div>
                                    <div class="small text-success">Completed</div>
                                </td>
                                <td class="py-4">
                                    <div class="action-buttons text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" title="View Case">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" disabled title="Add Note">
                                                <i class="fas fa-sticky-note"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" disabled title="Upload Document">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" disabled title="Submit Charges">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox">
                                        <div>
                                            <strong class="text-primary">CLM-2025-004</strong>
                                            <div class="small text-muted mt-1">Priority: High</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-warning me-3">TN</div>
                                        <div>
                                            <div class="fw-medium">T.N.</div>
                                            <div class="small text-muted">Criminal Defense</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="badge badge-open">Open</span>
                                </td>
                                <td class="py-4">
                                    <div>10 Sep 2025</div>
                                    <div class="small text-muted">8 days ago</div>
                                </td>
                                <td class="py-4">
                                    <div class="text-success fw-medium">25 Sep 2025</div>
                                    <div class="small text-success">7 days left</div>
                                </td>
                                <td class="py-4">
                                    <div class="action-buttons text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" title="View Case">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Add Note">
                                                <i class="fas fa-sticky-note"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Upload Document">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" title="Submit Charges">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox">
                                        <div>
                                            <strong class="text-primary">CLM-2025-005</strong>
                                            <div class="small text-muted mt-1">Priority: Medium</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-danger me-3">LM</div>
                                        <div>
                                            <div class="fw-medium">L.M.</div>
                                            <div class="small text-muted">Corporate Law</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="badge badge-in-progress">In Progress</span>
                                </td>
                                <td class="py-4">
                                    <div>15 Sep 2025</div>
                                    <div class="small text-muted">3 days ago</div>
                                </td>
                                <td class="py-4">
                                    <div class="text-success fw-medium">30 Sep 2025</div>
                                    <div class="small text-success">12 days left</div>
                                </td>
                                <td class="py-4">
                                    <div class="action-buttons text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" title="View Case">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Add Note">
                                                <i class="fas fa-sticky-note"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Upload Document">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" title="Submit Charges">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Footer -->
            <div class="card-footer bg-white border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pagination-info">
                        <span class="text-muted small">Showing 1 to 5 of 5 entries</span>
                    </div>
                    <nav aria-label="Case navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
<style>
    /* Main Container */
    .cases-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }

    .page-subtitle {
        font-size: 1rem;
        color: #6c757d;
    }

    /* Filter Section */
    .filter-section .card {
        border-radius: 12px;
    }

    .filter-form .form-control,
    .filter-form .form-select {
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        transition: all 0.2s ease;
    }

    .filter-form .form-control:focus,
    .filter-form .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.1);
    }

    .filter-form .input-group-text {
        border-radius: 8px 0 0 8px;
        border-right: none;
    }

    .filter-form .form-control.border-start-0 {
        border-radius: 0 8px 8px 0;
    }

    /* Table Enhancements */
    .cases-table-section .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #6c757d;
    }

    .table td {
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f4;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Avatar Circles */
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
    }

    /* Status Badges */
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.5rem 0.875rem;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-open {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge-in-progress {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge-closed {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f1b0b7;
    }

    /* Action Buttons */
    .action-buttons .btn-group .btn {
        border-radius: 6px;
        margin-right: 0.25rem;
        padding: 0.375rem 0.5rem;
        border: 1px solid #dee2e6;
        background: white;
        transition: all 0.2s ease;
    }

    .action-buttons .btn-group .btn:hover:not(:disabled) {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .action-buttons .btn-outline-primary:hover {
        background-color: #4f46e5;
        border-color: #4f46e5;
    }

    .action-buttons .btn-outline-secondary:hover {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .action-buttons .btn-outline-warning:hover {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .action-buttons .btn-outline-success:hover {
        background-color: #198754;
        border-color: #198754;
    }

    /* Header Actions */
    .header-actions .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.625rem 1.25rem;
        transition: all 0.2s ease;
    }

    .header-actions .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    /* Pagination */
    .pagination-sm .page-link {
        border-radius: 6px;
        margin: 0 2px;
        border: 1px solid #dee2e6;
        color: #6c757d;
        transition: all 0.2s ease;
    }

    .pagination-sm .page-link:hover {
        background-color: #4f46e5;
        border-color: #4f46e5;
        color: white;
    }

    .pagination-sm .page-item.active .page-link {
        background-color: #4f46e5;
        border-color: #4f46e5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .page-header .d-flex {
            flex-direction: column;
            gap: 1rem;
        }
        
        .filter-form .row > div {
            margin-bottom: 1rem;
        }
        
        .action-buttons .btn-group {
            flex-wrap: wrap;
        }
        
        .action-buttons .btn {
            margin-bottom: 0.25rem;
        }
    }

    /* Loading States */
    .btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Focus Styles for Accessibility */
    .btn:focus,
    .form-control:focus,
    .form-select:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }
</style>
@endsection