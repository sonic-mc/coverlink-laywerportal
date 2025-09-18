@extends('layouts.portal')

@section('title', 'Case Notes')

@section('page-title', 'Case Notes')

@section('content')
<!-- Case Header -->
<div class="case-header mb-4">
    <h4>Case Reference: <strong>CLM-2025-001</strong></h4>
    <p>Client: <strong>Maria Rodriguez</strong></p>
    <p>Status: <span class="badge bg-success">Active</span></p>
</div>

<!-- Filter Bar -->
<div class="filter-bar mb-3">
    <form class="filter-form">
        <input type="text" class="form-control" placeholder="Search notes...">
        <select class="form-select">
            <option>All Types</option>
            <option>Update</option>
            <option>Reminder</option>
            <option>Legal Comment</option>
        </select>
        <input type="date" class="form-control">
        <input type="date" class="form-control">
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNoteModal">
        <i class="fas fa-plus me-1"></i> Add Note
    </button>
</div>

<!-- Notes List -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Notes History</h5>
        <small class="text-muted">Static preview</small>
    </div>
    <div class="card-body">
        <ul class="note-list">
            @foreach([1,2,3,4] as $i)
            @php
                $types = ['Update', 'Reminder', 'Legal Comment', 'Update'];
                $authors = ['Admin', 'Lawyer A', 'Lawyer B', 'Admin'];
                $content = [
                    'Initial case review completed.',
                    'Reminder: Submit documents by Friday.',
                    'Legal opinion uploaded and reviewed.',
                    'Client contacted for additional info.'
                ];
            @endphp
            <li class="note-item">
                <div class="note-header">
                    <span class="note-type badge note-badge {{ strtolower(str_replace(' ', '-', $types[$i-1])) }}">
                        {{ $types[$i-1] }}
                    </span>
                    <span class="note-author">{{ $authors[$i-1] }}</span>
                    <span class="note-date">{{ now()->subDays($i)->format('d M Y H:i') }}</span>
                </div>
                <div class="note-content">{{ $content[$i-1] }}</div>
                <div class="note-actions">
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Add Note Modal -->
<div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNoteModalLabel">Add New Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="noteType" class="form-label">Note Type</label>
                    <select class="form-select" id="noteType">
                        <option>Update</option>
                        <option>Reminder</option>
                        <option>Legal Comment</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="noteContent" class="form-label">Note Content</label>
                    <textarea class="form-control" id="noteContent" rows="4" placeholder="Enter note details..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Note</button>
            </div>
        </form>
    </div>
</div>

<!-- Styles -->
<style>
    .note-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .note-item {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .note-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        font-size: 0.9rem;
        color: #555;
    }

    .note-content {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .note-actions button {
        margin-right: 8px;
    }

    .note-badge {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .note-badge.update {
        background-color: #e6f4ea;
        color: #2e7d32;
    }

    .note-badge.reminder {
        background-color: #fff8e1;
        color: #f9a825;
    }

    .note-badge.legal-comment {
        background-color: #e3f2fd;
        color: #1565c0;
    }

    .filter-bar {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }

    .filter-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }
</style>
@endsection
