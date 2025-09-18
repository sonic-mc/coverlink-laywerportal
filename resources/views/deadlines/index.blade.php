@extends('layouts.portal')

@section('title', 'Deadlines')

@section('page-title', 'Case Deadlines')

@section('content')
<!-- Filter Bar -->
<div class="filter-bar">
    <form class="filter-form">
        <input type="text" class="form-control" placeholder="Search by case or client...">
        <select class="form-select">
            <option>All Statuses</option>
            <option>Upcoming</option>
            <option>Overdue</option>
            <option>Completed</option>
        </select>
        <input type="date" class="form-control">
        <input type="date" class="form-control">
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#setDeadlineModal">
        <i class="fas fa-calendar-plus me-1"></i> Set New Deadline
    </button>
</div>

<!-- Deadlines Table -->
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title mb-0">Manage Deadlines</h5>
        <small class="text-muted">Static data preview</small>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Case Ref</th>
                    <th>Client</th>
                    <th>Deadline Type</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach([1,2,3,4,5] as $i)
                @php
                    $types = ['Court Hearing', 'Document Submission', 'Settlement Review', 'Client Meeting', 'Final Report'];
                    $statuses = ['upcoming', 'overdue', 'completed', 'upcoming', 'overdue'];
                    $status = $statuses[$i-1];
                @endphp
                <tr>
                    <td>CLM-2025-00{{ $i }}</td>
                    <td>{{ ['M.R.', 'D.J.', 'S.K.', 'T.N.', 'L.M.'][$i-1] }}</td>
                    <td>{{ $types[$i-1] }}</td>
                    <td>{{ now()->addDays($i * 2)->format('d M Y') }}</td>
                    <td>
                        <span class="badge deadline-badge {{ $status }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Edit Deadline</a></li>
                                <li><a class="dropdown-item text-danger" href="#">Remove Deadline</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Set Deadline Modal -->
<div class="modal fade" id="setDeadlineModal" tabindex="-1" aria-labelledby="setDeadlineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="setDeadlineModalLabel">Set New Deadline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="caseRef" class="form-label">Case Reference</label>
                    <input type="text" class="form-control" id="caseRef" placeholder="e.g. CLM-2025-006">
                </div>
                <div class="mb-3">
                    <label for="clientInitials" class="form-label">Client Initials</label>
                    <input type="text" class="form-control" id="clientInitials" placeholder="e.g. J.D.">
                </div>
                <div class="mb-3">
                    <label for="deadlineType" class="form-label">Deadline Type</label>
                    <select class="form-select" id="deadlineType">
                        <option>Court Hearing</option>
                        <option>Document Submission</option>
                        <option>Settlement Review</option>
                        <option>Client Meeting</option>
                        <option>Final Report</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deadlineDate" class="form-label">Deadline Date</label>
                    <input type="date" class="form-control" id="deadlineDate">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Deadline</button>
            </div>
        </form>
    </div>
</div>

<!-- Styles -->
<style>
    .filter-bar {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        margin-bottom: 20px;
    }

    .filter-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .deadline-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: capitalize;
    }

    .deadline-badge.upcoming {
        background-color: #e6f4ea;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }

    .deadline-badge.overdue {
        background-color: #ffebee;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }

    .deadline-badge.completed {
        background-color: #e3f2fd;
        color: #1565c0;
        border: 1px solid #90caf9;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .dropdown-menu {
        min-width: 160px;
    }
</style>
@endsection
