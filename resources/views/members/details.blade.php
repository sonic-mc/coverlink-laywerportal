@extends('layouts.portal')

@section('title', 'Member Details')
@section('page-title', 'Member Details')

@section('content')
<div class="member-details-container">
    <!-- Member Profile Header -->
    <div class="member-profile-header">
        <div class="profile-image-container">
            <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-image">
            <div class="profile-status-indicator active"></div>
            <button class="edit-photo-btn">
                <i class="fas fa-camera"></i>
            </button>
        </div>
        
        <div class="profile-info">
            <h2 class="profile-name">{{ $member['fullName'] ?? 'John Doe' }}</h2>
            <p class="profile-title">Client • Member ID: {{ $member['ID'] ?? '#12345' }}</p>
            <div class="profile-badges">
                <span class="badge active-badge">Active Member</span>
                <span class="badge verified-badge">
                    <i class="fas fa-check-circle"></i>
                    Verified
                </span>
            </div>
        </div>

        <div class="profile-actions">
            <button class="btn btn-primary">
                <i class="fas fa-envelope"></i>
                Send Message
            </button>
            <button class="btn btn-secondary">
                <i class="fas fa-file-contract"></i>
                View Claims
            </button>
            <div class="dropdown">
                <button class="btn btn-icon">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Member Information Cards -->
    <div class="member-info-grid">
        <!-- Personal Information -->
        <div class="info-card">
            <div class="info-card-header">
                <h3 class="info-card-title">
                    <i class="fas fa-user"></i>
                    Personal Information
                </h3>
                <button class="btn btn-ghost btn-sm">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </div>
            <div class="info-card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <label class="info-label">Full Name</label>
                        <span class="info-value">{{ $member['fullName'] ?? 'John Doe' }}</span>
                    </div>
                    <div class="info-item">
                        <label class="info-label">Gender</label>
                        <span class="info-value">
                            <i class="fas fa-{{ ($member['gender'] ?? 'male') == 'male' ? 'mars' : 'venus' }} gender-icon"></i>
                            {{ ucfirst($member['gender'] ?? 'Male') }}
                        </span>
                    </div>
                    <div class="info-item">
                        <label class="info-label">Date of Birth</label>
                        <span class="info-value">{{ $member['dob'] ?? 'January 15, 1985' }}</span>
                    </div>
                    <div class="info-item">
                        <label class="info-label">Age</label>
                        <span class="info-value">
                            {{ isset($member['dob']) ? \Carbon\Carbon::parse($member['dob'])->age : '38' }} years old
                        </span>
                    </div>
                    <div class="info-item">
                        <label class="info-label">Nationality</label>
                        <span class="info-value">
                            <i class="fas fa-flag nationality-icon"></i>
                            {{ $member['nationality'] ?? 'American' }}
                        </span>
                    </div>
                    <div class="info-item">
                        <label class="info-label">Member Since</label>
                        <span class="info-value">{{ $member['created_at'] ?? 'March 2020' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="info-card">
            <div class="info-card-header">
                <h3 class="info-card-title">
                    <i class="fas fa-address-book"></i>
                    Contact Information
                </h3>
                <button class="btn btn-ghost btn-sm">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </div>
            <div class="info-card-body">
                <div class="contact-item">
                    <div class="contact-icon email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <label class="contact-label">Email Address</label>
                        <span class="contact-value">{{ $member['email'] ?? 'john.doe@email.com' }}</span>
                        <button class="contact-action">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon phone">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <label class="contact-label">Phone Number</label>
                        <span class="contact-value">{{ $member['phone'] ?? '+1 (555) 123-4567' }}</span>
                        <button class="contact-action">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon address">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <label class="contact-label">Address</label>
                        <span class="contact-value">{{ $member['address'] ?? '123 Main Street, City, State 12345' }}</span>
                        <button class="contact-action">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Case Statistics -->
        <div class="info-card">
            <div class="info-card-header">
                <h3 class="info-card-title">
                    <i class="fas fa-chart-bar"></i>
                    Case Statistics
                </h3>
            </div>
            <div class="info-card-body">
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">{{ $member['total_cases'] ?? '5' }}</div>
                        <div class="stat-label">Total Cases</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number active">{{ $member['active_cases'] ?? '2' }}</div>
                        <div class="stat-label">Active Cases</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number completed">{{ $member['completed_cases'] ?? '3' }}</div>
                        <div class="stat-label">Completed</div>
                    </div>
                </div>
                
                <div class="case-progress">
                    <div class="progress-label">Case Completion Rate</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ isset($member['completion_rate']) ? $member['completion_rate'] : '60' }}%"></div>
                    </div>
                    <div class="progress-text">{{ isset($member['completion_rate']) ? $member['completion_rate'] : '60' }}%</div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="info-card activity-card">
            <div class="info-card-header">
                <h3 class="info-card-title">
                    <i class="fas fa-clock"></i>
                    Recent Activity
                </h3>
                <button class="btn btn-ghost btn-sm">View All</button>
            </div>
            <div class="info-card-body">
                <div class="activity-timeline">
                    <div class="activity-item">
                        <div class="activity-dot message"></div>
                        <div class="activity-content">
                            <div class="activity-title">Sent message regarding Case #124</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot document"></div>
                        <div class="activity-content">
                            <div class="activity-title">Uploaded medical records</div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot meeting"></div>
                        <div class="activity-content">
                            <div class="activity-title">Attended consultation meeting</div>
                            <div class="activity-time">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Member Details Container */
    .member-details-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    /* Profile Header */
    .member-profile-header {
        background: var(--white);
        padding: 32px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 24px;
        position: relative;
        overflow: hidden;
    }

    .member-profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
    }

    .profile-image-container {
        position: relative;
        flex-shrink: 0;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--white);
        box-shadow: var(--shadow-medium);
    }

    .profile-status-indicator {
        position: absolute;
        bottom: 8px;
        right: 8px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 3px solid var(--white);
    }

    .profile-status-indicator.active {
        background: var(--secondary-green);
        box-shadow: 0 0 0 2px var(--secondary-green);
    }

    .edit-photo-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--dark-gray);
        border: none;
        color: var(--white);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: var(--transition);
    }

    .profile-image-container:hover .edit-photo-btn {
        opacity: 1;
    }

    .profile-info {
        flex: 1;
    }

    .profile-name {
        font-size: 28px;
        font-weight: 700;
        color: var(--dark-gray);
        margin-bottom: 8px;
    }

    .profile-title {
        color: var(--medium-gray);
        font-size: 16px;
        margin-bottom: 16px;
    }

    .profile-badges {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .active-badge {
        background: var(--light-green);
        color: var(--dark-green);
    }

    .verified-badge {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .profile-actions {
        display: flex;
        gap: 12px;
        flex-shrink: 0;
    }

    /* Buttons */
    .btn {
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        color: var(--white);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .btn-secondary {
        background: var(--light-gray);
        color: var(--medium-gray);
        border: 1px solid var(--border-color);
    }

    .btn-secondary:hover {
        background: var(--border-color);
        color: var(--dark-gray);
    }

    .btn-ghost {
        background: transparent;
        color: var(--medium-gray);
        padding: 8px 12px;
    }

    .btn-ghost:hover {
        background: var(--light-gray);
        color: var(--dark-gray);
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-icon {
        width: 44px;
        height: 44px;
        padding: 0;
        border-radius: 50%;
        background: var(--light-gray);
        color: var(--medium-gray);
    }

    /* Info Grid */
    .member-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 24px;
    }

    .info-card {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: var(--transition);
    }

    .info-card:hover {
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .info-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, var(--light-green), var(--white));
    }

    .info-card-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--dark-gray);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-card-body {
        padding: 24px;
    }

    /* Info Grid Layout */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .info-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--medium-gray);
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .info-value {
        font-size: 16px;
        font-weight: 500;
        color: var(--dark-gray);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .gender-icon {
        color: var(--secondary-green);
    }

    .nationality-icon {
        color: var(--accent-yellow);
    }

    /* Contact Items */
    .contact-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 12px;
        transition: var(--transition);
    }

    .contact-item:hover {
        background: var(--light-gray);
    }

    .contact-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        flex-shrink: 0;
    }

    .contact-icon.email {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .contact-icon.phone {
        background: linear-gradient(135deg, var(--secondary-green), var(--dark-green));
    }

    .contact-icon.address {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .contact-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .contact-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--medium-gray);
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .contact-value {
        font-size: 14px;
        font-weight: 500;
        color: var(--dark-gray);
    }

    .contact-action {
        background: none;
        border: none;
        color: var(--medium-gray);
        cursor: pointer;
        padding: 8px;
        border-radius: 4px;
        transition: var(--transition);
    }

    .contact-action:hover {
        background: var(--border-color);
        color: var(--dark-gray);
    }

    /* Statistics */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-item {
        text-align: center;
        padding: 16px;
        border-radius: 8px;
        background: var(--light-gray);
    }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: var(--dark-gray);
        margin-bottom: 4px;
    }

    .stat-number.active {
        color: var(--secondary-green);
    }

    .stat-number.completed {
        color: var(--medium-gray);
    }

    .stat-label {
        font-size: 12px;
        color: var(--medium-gray);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    /* Progress Bar */
    .case-progress {
        margin-top: 20px;
    }

    .progress-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--medium-gray);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .progress-bar {
        height: 8px;
        background: var(--border-color);
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 4px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
        transition: var(--transition);
    }

    .progress-text {
        font-size: 12px;
        color: var(--medium-gray);
        text-align: right;
    }

    /* Activity Timeline */
    .activity-card {
        grid-column: 1 / -1;
    }

    .activity-timeline {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 12px;
        border-radius: 8px;
        transition: var(--transition);
    }

    .activity-item:hover {
        background: var(--light-gray);
    }

    .activity-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .activity-dot.message {
        background: var(--secondary-green);
    }

    .activity-dot.document {
        background: #3b82f6;
    }

    .activity-dot.meeting {
        background: #f59e0b;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-size: 14px;
        font-weight: 500;
        color: var(--dark-gray);
        margin-bottom: 2px;
    }

    .activity-time {
        font-size: 12px;
        color: var(--medium-gray);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .member-profile-header {
            flex-direction: column;
            text-align: center;
            padding: 24px;
        }

        .profile-actions {
            width: 100%;
            justify-content: center;
        }

        .member-info-grid {
            grid-template-columns: 1fr;
        }

        .stats-container {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
