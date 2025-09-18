<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lawyer Portal')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Variables for Theme */
        :root {
            --primary-green: #079c3d;
            --secondary-green: #22c55e;
            --dark-green: #16a34a;
            --light-green: #dcfce7;
            --accent-yellow: #eab308;
            --dark-gray: #1f2937;
            --medium-gray: #374151;
            --light-gray: #f9fafb;
            --white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-light: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-medium: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-large: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--light-green) 0%, var(--white) 100%);
            color: var(--dark-gray);
            line-height: 1.6;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

          /* Dashboard-specific styles */
          .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            padding: 24px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            transition: var(--transition);
        }

        .stat-card.pending::before {
            background: linear-gradient(180deg, #f59e0b, #d97706);
        }

        .stat-card.active::before {
            background: linear-gradient(180deg, var(--primary-green), var(--secondary-green));
        }

        .stat-card.completed::before {
            background: linear-gradient(180deg, #6b7280, #4b5563);
        }

        .stat-card.revenue::before {
            background: linear-gradient(180deg, #8b5cf6, #7c3aed);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-medium);
        }

        .stat-card:hover::before {
            width: 8px;
        }

        .stat-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--white);
            flex-shrink: 0;
        }

        .stat-card.pending .stat-icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .stat-card.active .stat-icon {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        }

        .stat-card.completed .stat-icon {
            background: linear-gradient(135deg, #6b7280, #4b5563);
        }

        .stat-card.revenue .stat-icon {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .stat-content {
            flex: 1;
        }

        .stat-title {
            font-size: 14px;
            color: var(--medium-gray);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-gray);
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .stat-change.positive {
            color: var(--secondary-green);
        }

        .stat-change.negative {
            color: #ef4444;
        }

        .stat-change.neutral {
            color: var(--medium-gray);
        }

        /* Activity List Styles */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 16px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .activity-item:hover {
            background: var(--light-gray);
        }

        .activity-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 18px;
            flex-shrink: 0;
        }

        .activity-icon.new {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .activity-icon.upload {
            background: linear-gradient(135deg, var(--secondary-green), var(--dark-green));
        }

        .activity-icon.message {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .activity-icon.court {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        .activity-icon.settlement {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 4px;
        }

        .activity-description {
            font-size: 14px;
            color: var(--medium-gray);
            margin-bottom: 8px;
        }

        .activity-meta {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .activity-time {
            font-size: 12px;
            color: var(--medium-gray);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 28px;
            }

            .activity-item {
                padding: 12px;
            }

            .activity-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary-green) 0%, var(--secondary-green) 100%);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: var(--shadow-large);
            z-index: 100;
            transition: var(--transition);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></svg>') repeat;
            opacity: 0.3;
            pointer-events: none;
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
        }

        .sidebar-header h2 {
            color: var(--white);
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-header .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--white);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-green);
            font-size: 20px;
        }

        .sidebar-nav {
            padding: 16px;
            flex: 1;
            position: relative;
            z-index: 2;
        }

        .nav-section {
            margin-bottom: 32px;
        }

        .nav-section-title {
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
            padding: 0 16px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: var(--border-radius);
            margin-bottom: 4px;
            transition: var(--transition);
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            border-radius: var(--border-radius);
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--white);
            transform: translateX(4px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            backdrop-filter: blur(10px);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .nav-link span {
            position: relative;
            z-index: 1;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header Styles */
        .header {
            background: var(--white);
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-light);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            z-index: 50;
        }

        .header-left h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-gray);
            margin-bottom: 4px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--medium-gray);
            font-size: 14px;
        }

        .breadcrumb a {
            color: var(--secondary-green);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Search Bar */
        .search-bar {
            position: relative;
        }

        .search-input {
            padding: 10px 16px 10px 44px;
            border: 2px solid var(--border-color);
            border-radius: 25px;
            width: 300px;
            font-size: 14px;
            transition: var(--transition);
            background: var(--light-gray);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--secondary-green);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--medium-gray);
        }

        /* Notification Button */
        .notification-btn {
            position: relative;
            background: var(--light-gray);
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            color: var(--medium-gray);
        }

        .notification-btn:hover {
            background: var(--secondary-green);
            color: var(--white);
            transform: scale(1.1);
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: var(--white);
            font-size: 11px;
            font-weight: 700;
            padding: 3px 7px;
            border-radius: 12px;
            border: 2px solid var(--white);
            min-width: 20px;
            text-align: center;
        }

        /* Profile Section */
        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: var(--border-radius);
            transition: var(--transition);
            cursor: pointer;
        }

        .profile:hover {
            background: var(--light-gray);
        }

        .profile-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 3px solid var(--primary-green);
            object-fit: cover;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-name {
            font-weight: 600;
            color: var(--dark-gray);
            font-size: 14px;
        }

        .profile-role {
            font-size: 12px;
            color: var(--medium-gray);
        }

        .profile-dropdown {
            margin-left: 8px;
            color: var(--medium-gray);
            font-size: 12px;
        }

        /* Main Content */
        .main-body {
            flex: 1;
            padding: 32px;
            overflow-y: auto;
            background: var(--light-gray);
        }

        /* Cards */
        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            margin-bottom: 24px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .card:hover {
            box-shadow: var(--shadow-medium);
            transform: translateY(-2px);
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(90deg, var(--light-green), var(--white));
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark-gray);
            margin-bottom: 4px;
        }

        .card-subtitle {
            font-size: 14px;
            color: var(--medium-gray);
        }

        .card-body {
            padding: 24px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .action-card {
            background: var(--white);
            padding: 24px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-medium);
            border-color: var(--secondary-green);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: var(--white);
            font-size: 24px;
        }

        .action-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 8px;
        }

        .action-description {
            font-size: 14px;
            color: var(--medium-gray);
        }

        /* Status Indicators */
        .status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-active {
            background: var(--light-green);
            color: var(--dark-green);
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-urgent {
            background: #fecaca;
            color: #b91c1c;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            
            .search-input {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -280px;
                z-index: 1000;
                transition: left 0.3s ease;
            }
            
            .sidebar.open {
                left: 0;
            }
            
            .header {
                padding: 16px 20px;
            }
            
            .main-body {
                padding: 20px;
            }
            
            .search-input {
                width: 150px;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--secondary-green);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--dark-green);
        }

        /* Loading Animation */
        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-top: 2px solid var(--secondary-green);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Notification Dot Animation */
        .notification-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <h2>
            <div class="logo-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            Lawyer Portal
        </h2>
    </div>
    
    <nav class="sidebar-nav">
        <!-- Main Section -->
        <div class="nav-section">
            <div class="nav-section-title">Main</div>
            <a href="{{ route('dashboard') }}" class="nav-link active">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('claims.index') }}" class="nav-link">
                <i class="fas fa-briefcase"></i>
                <span>My Cases</span>
            </a>
            <a href="{{ route('case-notes.index') }}" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                <span>Case Notes</span>
            </a>
            <a href="{{ route('deadlines.index') }}" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                <span>Deadlines</span>
            </a>
        </div>

        <!-- Management Section -->
        <div class="nav-section">
            <div class="nav-section-title">Management</div>
            <a href="{{ route('documents.index') }}" class="nav-link">
                <i class="fas fa-folder-open"></i>
                <span>Documents</span>
            </a>
            <a href="{{ route('financials.index') }}" class="nav-link">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Financials</span>
            </a>
            <a href="{{ route('messages.index') }}" class="nav-link">
                <i class="fas fa-comments"></i>
                <span>Messages</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </a>
        </div>

        <!-- Reports Section -->
        <div class="nav-section">
            <div class="nav-section-title">Reports</div>
            <a href="{{ route('case-summary.index') }}" class="nav-link">
                <i class="fas fa-list-alt"></i>
                <span>Case Summary</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-tasks"></i>
                <span>Activity Report</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-coins"></i>
                <span>Financial Report</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                <span>Performance Metrics</span>
            </a>
        </div>

        <!-- Account Section -->
        <div class="nav-section">
            <div class="nav-section-title">Account</div>
            <a href="{{ route('profile.index') }}" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('settings.index') }}" class="nav-link">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>
</aside>


    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
<header class="d-flex justify-content-between align-items-center py-3 px-4 bg-light border-bottom">
    <!-- Left Section -->
    <div class="d-flex flex-column">
        <h1 class="h4 mb-1">@yield('page-title', 'Dashboard')</h1>
        <nav class="breadcrumb mb-0">
            <a href="{{ route('dashboard') }}" class="breadcrumb-item text-decoration-none text-muted">
                <i class="fas fa-home me-1"></i> Home
            </a>
            <span class="breadcrumb-item active">@yield('page-title', 'Dashboard')</span>
        </nav>
    </div>

    <!-- Right Section -->
    <div class="d-flex align-items-center gap-3">
        <!-- Search Bar -->
        <div class="position-relative">
            <input type="text" class="form-control form-control-sm ps-4" placeholder="Search cases, clients, documents...">
            <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
        </div>

        <!-- Notifications -->
        <button class="btn btn-light position-relative">
            <i class="fas fa-bell fs-5 text-secondary"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                3
            </span>
        </button>

        <!-- Profile -->
        <div class="dropdown">
            <button class="btn btn-light d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                <img src="https://via.placeholder.com/44" alt="Profile" class="rounded-circle" width="36" height="36">
                <div class="text-start">
                    <div class="fw-semibold">John Lawyer</div>
                    <small class="text-muted">Senior Attorney</small>
                </div>
                <i class="fas fa-chevron-down text-muted"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>


        <!-- Page Content -->
        <main class="main-body">
            @yield('content')
            
        </main>
    </div>

    <script>
        // Add basic interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Handle mobile sidebar toggle
            const sidebarToggle = document.createElement('button');
            sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
            sidebarToggle.className = 'sidebar-toggle';
            
            // Add mobile functionality if needed
            if (window.innerWidth <= 768) {
                const header = document.querySelector('.header-left');
                header.prepend(sidebarToggle);
                
                sidebarToggle.addEventListener('click', function() {
                    document.querySelector('.sidebar').classList.toggle('open');
                });
            }
            
            // Smooth scrolling for nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Search functionality
            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>