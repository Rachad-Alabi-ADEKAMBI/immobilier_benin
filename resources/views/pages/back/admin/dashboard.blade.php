<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ImmobilierBenin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --purple-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --orange-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --blue-gradient: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            --green-gradient: linear-gradient(135deg, #00b894 0%, #00cec9 100%);

            --text-dark: #2d3436;
            --text-light: #636e72;
            --text-white: #ffffff;
            --bg-light: #ffffff;
            --bg-gray: #f8f9fa;
            --bg-dark: #2d3436;
            --sidebar-width: 280px;
            --header-height: 70px;
            --shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 20px 60px rgba(0, 0, 0, 0.15);
            --border-radius: 15px;
        }

        [data-theme="dark"] {
            --text-dark: #ffffff;
            --text-light: #b2bec3;
            --text-white: #2d3436;
            --bg-light: #2d3436;
            --bg-gray: #636e72;
            --bg-dark: #ffffff;
            --shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            --shadow-hover: 0 20px 60px rgba(0, 0, 0, 0.4);
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-gray);
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            z-index: 1001;
            background: var(--primary-gradient);
            color: var(--text-white);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--bg-light);
            box-shadow: var(--shadow);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .sidebar-logo i {
            font-size: 2rem;
            background: var(--secondary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--text-light);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-left: auto;
        }

        .sidebar-toggle:hover {
            background: var(--bg-gray);
            color: var(--text-dark);
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            padding: 0 1.5rem 0.5rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-item {
            margin: 0.25rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1rem;
            color: var(--text-light);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            font-weight: 500;
            cursor: pointer;
        }

        .nav-link:hover {
            background: var(--bg-gray);
            color: var(--text-dark);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            color: var(--text-white);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
        }

        .nav-text {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .nav-text,
        .sidebar.collapsed .nav-section-title,
        .sidebar.collapsed .sidebar-logo span {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed+.main-content {
            margin-left: 80px;
        }

        /* Header */
        .dashboard-header {
            background: var(--bg-light);
            height: var(--header-height);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .header-title i {
            color: #667eea;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-btn {
            background: var(--primary-gradient);
            color: var(--text-white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .header-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background: var(--bg-gray);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: #e9ecef;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-white);
            font-weight: 600;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 2rem;
        }

        .page-section {
            display: none;
        }

        .page-section.active {
            display: block;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-light);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--text-white);
        }

        .stat-card:nth-child(1) .stat-icon {
            background: var(--success-gradient);
        }

        .stat-card:nth-child(2) .stat-icon {
            background: var(--warning-gradient);
        }

        .stat-card:nth-child(3) .stat-icon {
            background: var(--danger-gradient);
        }

        .stat-card:nth-child(4) .stat-icon {
            background: var(--purple-gradient);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        .stat-change {
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .stat-change.positive {
            color: #00b894;
        }

        .stat-change.negative {
            color: #e17055;
        }

        /* Content Cards */
        .content-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title i {
            color: #667eea;
        }

        .card-actions {
            display: flex;
            gap: 0.5rem;
        }

        .card-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .card-btn-primary {
            background: var(--primary-gradient);
            color: var(--text-white);
        }

        .card-btn-secondary {
            background: var(--bg-gray);
            color: var(--text-dark);
        }

        .card-btn:hover {
            transform: translateY(-2px);
        }

        .card-content {
            padding: 2rem;
        }

        /* Filters Row */
        .filters-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            align-items: end;
        }

        .filters-row .form-group {
            flex: 1;
            min-width: 200px;
        }

        .filters-row .card-btn {
            height: fit-content;
            padding: 0.75rem 1.5rem;
        }

        /* Responsive Table */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        .table th {
            background: var(--bg-gray);
            font-weight: 600;
            color: var(--text-dark);
        }

        .table td {
            color: var(--text-light);
        }

        .table tr:hover {
            background: var(--bg-gray);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-active {
            background: rgba(0, 184, 148, 0.1);
            color: #00b894;
        }

        .status-pending {
            background: rgba(253, 203, 110, 0.1);
            color: #fdcb6e;
        }

        .status-inactive {
            background: rgba(225, 112, 85, 0.1);
            color: #e17055;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination-btn {
            padding: 0.5rem 1rem;
            border: 2px solid #e9ecef;
            background: var(--bg-light);
            color: var(--text-dark);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination-btn:hover:not(:disabled) {
            border-color: #667eea;
            color: #667eea;
        }

        .pagination-btn.active {
            background: var(--primary-gradient);
            color: var(--text-white);
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-info {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Forms */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: #667eea;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--bg-light);
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-hover);
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-light);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: var(--bg-gray);
            color: var(--text-dark);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid #e9ecef;
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        /* Mobile Responsive */
        .mobile-header {
            display: none;
            background: var(--bg-light);
            padding: 1rem;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1001;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-menu-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        .mobile-close-btn {
            display: none;
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--bg-gray);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--text-dark);
            z-index: 1001;
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .mobile-close-btn {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-header {
                display: flex;
            }

            .mobile-overlay.active {
                display: block;
            }

            .dashboard-header {
                display: none;
            }

            .dashboard-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .card-content {
                padding: 1rem;
            }

            .table-container {
                font-size: 0.9rem;
            }

            .user-info {
                display: none;
            }

            .filters-row {
                flex-direction: column;
            }

            .filters-row .form-group {
                min-width: auto;
            }

            .theme-toggle {
                right: 10px;
                width: 45px;
                height: 45px;
            }

            /* Mobile Table with Data Labels */
            .table thead {
                display: none;
            }

            .table tbody tr {
                display: block;
                margin-bottom: 1rem;
                background: var(--bg-light);
                border-radius: 10px;
                padding: 1rem;
                box-shadow: var(--shadow);
            }

            .table tbody td {
                display: block;
                text-align: right;
                border: none;
                padding: 0.5rem 0;
                position: relative;
                padding-left: 50%;
            }

            .table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                text-align: left;
                font-weight: 600;
                color: var(--text-dark);
            }
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quick-action {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--text-dark);
        }

        .quick-action:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .quick-action i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #667eea;
        }

        .quick-action h4 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .quick-action p {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Charts Placeholder */
        .chart-container {
            height: 300px;
            background: var(--bg-gray);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <!-- Theme Toggle -->
    <button class="theme-toggle" onclick="toggleTheme()" title="Changer de thème">
        <i class="fas fa-moon" id="themeIcon"></i>
    </button>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="sidebar-logo">
            <i class="fas fa-home"></i>
            <span>ImmobilierBenin</span>
        </div>
        <div class="user-avatar">JK</div>
    </div>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay" onclick="closeMobileSidebar()"></div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        @include('pages.back.admin.sidebar')


        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-title">
                    <i class="fas fa-tachometer-alt"></i>
                    <span id="pageTitle">Vue d'ensemble</span>
                </div>
                <div class="header-actions">
                    <a href="#" class="header-btn">
                        <i class="fas fa-plus"></i>
                        Nouvelle propriété
                    </a>
                    <div class="user-profile">
                        <div class="user-avatar">JK</div>
                        <div class="user-info">
                            <div class="user-name">Jean Kouassi</div>
                            <div class="user-role">Administrateur</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Overview Section -->
                <section class="page-section active" id="section-overview">
                    <!-- Stats Grid -->
                    <div class="stats-grid fade-in">
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="stat-number">127</div>
                            <div class="stat-label">Propriétés actives</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +12% ce mois
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="stat-number">1,234</div>
                            <div class="stat-label">Utilisateurs inscrits</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +8% ce mois
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="stat-number">45,678</div>
                            <div class="stat-label">Vues ce mois</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +23% ce mois
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="stat-number">89</div>
                            <div class="stat-label">Transactions</div>
                            <div class="stat-change negative">
                                <i class="fas fa-arrow-down"></i> -3% ce mois
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions fade-in">
                        <a href="#" class="quick-action" onclick="showSection('properties')">
                            <i class="fas fa-plus"></i>
                            <h4>Ajouter une propriété</h4>
                            <p>Publier une nouvelle annonce</p>
                        </a>
                        <a href="#" class="quick-action" onclick="showSection('users')">
                            <i class="fas fa-user-plus"></i>
                            <h4>Nouvel utilisateur</h4>
                            <p>Créer un compte utilisateur</p>
                        </a>
                        <a href="#" class="quick-action" onclick="showSection('messages')">
                            <i class="fas fa-envelope"></i>
                            <h4>Messages</h4>
                            <p>Consulter les messages</p>
                        </a>
                        <a href="#" class="quick-action" onclick="showSection('analytics')">
                            <i class="fas fa-chart-bar"></i>
                            <h4>Rapports</h4>
                            <p>Voir les statistiques</p>
                        </a>
                    </div>

                    <!-- Recent Activity -->
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-clock"></i>
                                Activité récente
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-secondary">
                                    <i class="fas fa-filter"></i>
                                    Filtrer
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Propriété</th>
                                            <th>Type</th>
                                            <th>Prix</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Propriété">Villa moderne à Cotonou</td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">85,000,000 FCFA</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Date">Il y a 2 jours</td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">Appartement de luxe</td>
                                            <td data-label="Type">Location</td>
                                            <td data-label="Prix">450,000 FCFA/mois</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Date">Il y a 1 jour</td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">Terrain constructible</td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">15,000,000 FCFA</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">En
                                                    attente</span></td>
                                            <td data-label="Date">Il y a 3 jours</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Properties Section -->
                <section class="page-section" id="section-properties">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-building"></i>
                                Gestion des propriétés
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary" onclick="openModal('addPropertyModal')">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                                <button class="card-btn card-btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Exporter
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <!-- Filters Row -->
                            <div class="filters-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-search"></i>
                                        Rechercher
                                    </label>
                                    <input type="text" class="form-control" placeholder="Titre, description...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-filter"></i>
                                        Type
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les types</option>
                                        <option>Vente</option>
                                        <option>Location</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Ville
                                    </label>
                                    <select class="form-control">
                                        <option>Toutes les villes</option>
                                        <option>Cotonou</option>
                                        <option>Porto-Novo</option>
                                        <option>Parakou</option>
                                    </select>
                                </div>
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-search"></i>
                                    Filtrer
                                </button>
                            </div>

                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Propriété</th>
                                            <th>Type</th>
                                            <th>Prix</th>
                                            <th>Ville</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Propriété">Villa moderne à Cotonou</td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">85,000,000 FCFA</td>
                                            <td data-label="Ville">Cotonou</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewPropertyModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editPropertyModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('deletePropertyModal')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">Appartement de luxe</td>
                                            <td data-label="Type">Location</td>
                                            <td data-label="Prix">450,000 FCFA/mois</td>
                                            <td data-label="Ville">Porto-Novo</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewPropertyModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editPropertyModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('deletePropertyModal')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">Terrain constructible</td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">15,000,000 FCFA</td>
                                            <td data-label="Ville">Abomey-Calavi</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">En
                                                    attente</span></td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewPropertyModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editPropertyModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('deletePropertyModal')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="pagination">
                                <button class="pagination-btn" disabled>
                                    <i class="fas fa-chevron-left"></i> Précédent
                                </button>
                                <div class="pagination-info">Page 1 sur 10 (127 éléments)</div>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <span>...</span>
                                <button class="pagination-btn">10</button>
                                <button class="pagination-btn">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Users Section -->
                <section class="page-section" id="section-users">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-users"></i>
                                Gestion des utilisateurs
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary" onclick="openModal('addUserModal')">
                                    <i class="fas fa-user-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <!-- Filters Row -->
                            <div class="filters-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-search"></i>
                                        Rechercher
                                    </label>
                                    <input type="text" class="form-control" placeholder="Nom, email...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user-tag"></i>
                                        Rôle
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les rôles</option>
                                        <option>Administrateur</option>
                                        <option>Agent</option>
                                        <option>Utilisateur</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-toggle-on"></i>
                                        Statut
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les statuts</option>
                                        <option>Actif</option>
                                        <option>Inactif</option>
                                        <option>Banni</option>
                                    </select>
                                </div>
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-search"></i>
                                    Filtrer
                                </button>
                            </div>

                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                            <th>Statut</th>
                                            <th>Inscription</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Utilisateur">Jean Kouassi</td>
                                            <td data-label="Email">jean.kouassi@email.com</td>
                                            <td data-label="Rôle">Administrateur</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Inscription">15 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Utilisateur">Marie Adjovi</td>
                                            <td data-label="Email">marie.adjovi@email.com</td>
                                            <td data-label="Rôle">Agent</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Actif</span></td>
                                            <td data-label="Inscription">12 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Utilisateur">Paul Dossou</td>
                                            <td data-label="Email">paul.dossou@email.com</td>
                                            <td data-label="Rôle">Utilisateur</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-inactive">Banni</span></td>
                                            <td data-label="Inscription">10 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="pagination">
                                <button class="pagination-btn" disabled>
                                    <i class="fas fa-chevron-left"></i> Précédent
                                </button>
                                <div class="pagination-info">Page 1 sur 25 (1,234 éléments)</div>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <span>...</span>
                                <button class="pagination-btn">25</button>
                                <button class="pagination-btn">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Transactions Section -->
                <section class="page-section" id="section-transactions">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-handshake"></i>
                                Gestion des transactions
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Exporter
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <!-- Filters Row -->
                            <div class="filters-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-calendar"></i>
                                        Période
                                    </label>
                                    <select class="form-control">
                                        <option>Ce mois</option>
                                        <option>Mois dernier</option>
                                        <option>3 derniers mois</option>
                                        <option>Cette année</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-tag"></i>
                                        Type
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les types</option>
                                        <option>Vente</option>
                                        <option>Location</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-toggle-on"></i>
                                        Statut
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les statuts</option>
                                        <option>Complétée</option>
                                        <option>En cours</option>
                                        <option>Annulée</option>
                                    </select>
                                </div>
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-search"></i>
                                    Filtrer
                                </button>
                            </div>

                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Propriété</th>
                                            <th>Client</th>
                                            <th>Agent</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Référence">#TXN001</td>
                                            <td data-label="Propriété">Villa moderne à Cotonou</td>
                                            <td data-label="Client">Koffi Mensah</td>
                                            <td data-label="Agent">Jean Kouassi</td>
                                            <td data-label="Montant">85,000,000 FCFA</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Complétée</span></td>
                                            <td data-label="Date">20 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewTransactionModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Référence">#TXN002</td>
                                            <td data-label="Propriété">Appartement de luxe</td>
                                            <td data-label="Client">Awa Diallo</td>
                                            <td data-label="Agent">Marie Adjovi</td>
                                            <td data-label="Montant">450,000 FCFA/mois</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">En
                                                    cours</span></td>
                                            <td data-label="Date">18 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewTransactionModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="pagination">
                                <button class="pagination-btn" disabled>
                                    <i class="fas fa-chevron-left"></i> Précédent
                                </button>
                                <div class="pagination-info">Page 1 sur 9 (89 éléments)</div>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <span>...</span>
                                <button class="pagination-btn">9</button>
                                <button class="pagination-btn">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Analytics Section -->
                <section class="page-section" id="section-analytics">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-chart-line"></i>
                                Analytiques et rapports
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Exporter
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="chart-container">
                                <i class="fas fa-chart-bar" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                                <p>Graphiques et analyses détaillées à venir</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Messages Section -->
                <section class="page-section" id="section-messages">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-envelope"></i>
                                Messages et notifications
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Expéditeur</th>
                                            <th>Sujet</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Expéditeur">client@email.com</td>
                                            <td data-label="Sujet">Demande d'information - Villa Cotonou</td>
                                            <td data-label="Date">Il y a 2h</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">Non
                                                    lu</span></td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-primary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewMessageModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Expéditeur">agent@email.com</td>
                                            <td data-label="Sujet">Rapport mensuel</td>
                                            <td data-label="Date">Il y a 1 jour</td>
                                            <td data-label="Statut"><span class="status-badge status-active">Lu</span>
                                            </td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-primary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewMessageModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Settings Section -->
                <section class="page-section" id="section-settings">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-cog"></i>
                                Paramètres du site
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-save"></i>
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-globe"></i>
                                        Nom du site
                                    </label>
                                    <input type="text" class="form-control" value="ImmobilierBenin">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        Email de contact
                                    </label>
                                    <input type="email" class="form-control" value="contact@immobilierbenin.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </label>
                                    <input type="tel" class="form-control" value="+229 XX XX XX XX">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Adresse
                                    </label>
                                    <input type="text" class="form-control" value="Cotonou, Bénin">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Profile Section -->
                <section class="page-section" id="section-profile">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-user"></i>
                                Mon profil
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-save"></i>
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Prénom
                                    </label>
                                    <input type="text" class="form-control" value="Jean">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Nom
                                    </label>
                                    <input type="text" class="form-control" value="Kouassi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        Email
                                    </label>
                                    <input type="email" class="form-control" value="jean.kouassi@email.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </label>
                                    <input type="tel" class="form-control" value="+229 XX XX XX XX">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-lock"></i>
                                        Nouveau mot de passe
                                    </label>
                                    <input type="password" class="form-control"
                                        placeholder="Laisser vide pour ne pas changer">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-lock"></i>
                                        Confirmer le mot de passe
                                    </label>
                                    <input type="password" class="form-control"
                                        placeholder="Confirmer le nouveau mot de passe">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <!-- Add Property Modal -->
    <div class="modal" id="addPropertyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-plus"></i> Ajouter une propriété
                </div>
                <button class="modal-close" onclick="closeModal('addPropertyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-home"></i> Titre
                        </label>
                        <input type="text" class="form-control" placeholder="Titre de la propriété">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tag"></i> Type
                        </label>
                        <select class="form-control">
                            <option>Vente</option>
                            <option>Location</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-dollar-sign"></i> Prix
                        </label>
                        <input type="number" class="form-control" placeholder="Prix en FCFA">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Ville
                        </label>
                        <select class="form-control">
                            <option>Cotonou</option>
                            <option>Porto-Novo</option>
                            <option>Parakou</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i> Description
                    </label>
                    <textarea class="form-control" rows="4" placeholder="Description de la propriété"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('addPropertyModal')">
                    Annuler
                </button>
                <button class="card-btn card-btn-primary">
                    <i class="fas fa-save"></i> Sauvegarder
                </button>
            </div>
        </div>
    </div>

    <!-- View Property Modal -->
    <div class="modal" id="viewPropertyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-eye"></i> Détails de la propriété
                </div>
                <button class="modal-close" onclick="closeModal('viewPropertyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>Villa moderne à Cotonou</h3>
                <p><strong>Type:</strong> Vente</p>
                <p><strong>Prix:</strong> 85,000,000 FCFA</p>
                <p><strong>Ville:</strong> Cotonou</p>
                <p><strong>Statut:</strong> <span class="status-badge status-active">Actif</span></p>
                <p><strong>Description:</strong> Magnifique villa moderne située dans un quartier résidentiel calme...
                </p>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('viewPropertyModal')">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Property Modal -->
    <div class="modal" id="editPropertyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-edit"></i> Modifier la propriété
                </div>
                <button class="modal-close" onclick="closeModal('editPropertyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-home"></i> Titre
                        </label>
                        <input type="text" class="form-control" value="Villa moderne à Cotonou">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tag"></i> Type
                        </label>
                        <select class="form-control">
                            <option selected>Vente</option>
                            <option>Location</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-dollar-sign"></i> Prix
                        </label>
                        <input type="number" class="form-control" value="85000000">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Ville
                        </label>
                        <select class="form-control">
                            <option selected>Cotonou</option>
                            <option>Porto-Novo</option>
                            <option>Parakou</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('editPropertyModal')">
                    Annuler
                </button>
                <button class="card-btn card-btn-primary">
                    <i class="fas fa-save"></i> Sauvegarder
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Property Modal -->
    <div class="modal" id="deletePropertyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-trash"></i> Supprimer la propriété
                </div>
                <button class="modal-close" onclick="closeModal('deletePropertyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette propriété ? Cette action est irréversible.</p>
                <div style="background: var(--bg-gray); padding: 1rem; border-radius: 10px; margin-top: 1rem;">
                    <strong>Villa moderne à Cotonou</strong><br>
                    Prix: 85,000,000 FCFA
                </div>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('deletePropertyModal')">
                    Annuler
                </button>
                <button class="card-btn" style="background: var(--danger-gradient); color: white;">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal" id="addUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-user-plus"></i> Ajouter un utilisateur
                </div>
                <button class="modal-close" onclick="closeModal('addUserModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i> Nom complet
                        </label>
                        <input type="text" class="form-control" placeholder="Nom complet">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-tag"></i> Rôle
                        </label>
                        <select class="form-control">
                            <option>Utilisateur</option>
                            <option>Agent</option>
                            <option>Administrateur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i> Mot de passe
                        </label>
                        <input type="password" class="form-control" placeholder="Mot de passe">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('addUserModal')">
                    Annuler
                </button>
                <button class="card-btn card-btn-primary">
                    <i class="fas fa-save"></i> Créer
                </button>
            </div>
        </div>
    </div>

    <!-- View User Modal -->
    <div class="modal" id="viewUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-eye"></i> Détails de l'utilisateur
                </div>
                <button class="modal-close" onclick="closeModal('viewUserModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>Jean Kouassi</h3>
                <p><strong>Email:</strong> jean.kouassi@email.com</p>
                <p><strong>Rôle:</strong> Administrateur</p>
                <p><strong>Statut:</strong> <span class="status-badge status-active">Actif</span></p>
                <p><strong>Date d'inscription:</strong> 15 Jan 2024</p>
                <p><strong>Dernière connexion:</strong> Il y a 2 heures</p>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('viewUserModal')">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal" id="editUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-edit"></i> Modifier l'utilisateur
                </div>
                <button class="modal-close" onclick="closeModal('editUserModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i> Nom complet
                        </label>
                        <input type="text" class="form-control" value="Jean Kouassi">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control" value="jean.kouassi@email.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-tag"></i> Rôle
                        </label>
                        <select class="form-control">
                            <option>Utilisateur</option>
                            <option selected>Agent</option>
                            <option>Administrateur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i> Nouveau mot de passe
                        </label>
                        <input type="password" class="form-control" placeholder="Laisser vide pour ne pas changer">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('editUserModal')">
                    Annuler
                </button>
                <button class="card-btn card-btn-primary">
                    <i class="fas fa-save"></i> Sauvegarder
                </button>
            </div>
        </div>
    </div>

    <!-- View Transaction Modal -->
    <div class="modal" id="viewTransactionModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-eye"></i> Détails de la transaction
                </div>
                <button class="modal-close" onclick="closeModal('viewTransactionModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>Transaction #TXN001</h3>
                <p><strong>Propriété:</strong> Villa moderne à Cotonou</p>
                <p><strong>Client:</strong> Koffi Mensah</p>
                <p><strong>Agent:</strong> Jean Kouassi</p>
                <p><strong>Montant:</strong> 85,000,000 FCFA</p>
                <p><strong>Statut:</strong> <span class="status-badge status-active">Complétée</span></p>
                <p><strong>Date:</strong> 20 Jan 2024</p>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('viewTransactionModal')">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal" id="viewMessageModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-envelope"></i> Message
                </div>
                <button class="modal-close" onclick="closeModal('viewMessageModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>Demande d'information - Villa Cotonou</h3>
                <p><strong>Expéditeur:</strong> client@email.com</p>
                <p><strong>Date:</strong> Il y a 2h</p>
                <p><strong>Message:</strong> Bonjour, je suis intéressé par la villa moderne à Cotonou...</p>
            </div>
            <div class="modal-footer">
                <button class="card-btn card-btn-secondary" onclick="closeModal('viewMessageModal')">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <script>
        // Theme Management
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');

            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                themeIcon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const themeIcon = document.getElementById('themeIcon');

            if (savedTheme === 'dark') {
                document.body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
            }
        });

        // Sidebar functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = sidebar.querySelector('.sidebar-toggle i');

            sidebar.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                toggleBtn.className = 'fas fa-chevron-right';
            } else {
                toggleBtn.className = 'fas fa-chevron-left';
            }
        }

        // Mobile sidebar functionality
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.add('mobile-open');
            overlay.classList.add('active');
        }

        function closeMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
        }

        // Section navigation
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.page-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            const targetSection = document.getElementById(`section-${sectionName}`);
            if (targetSection) {
                targetSection.classList.add('active');
            }

            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Find and activate the correct nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(sectionName)) {
                    link.classList.add('active');
                }
            });

            // Update page title
            const titles = {
                'overview': 'Vue d\'ensemble',
                'properties': 'Propriétés',
                'users': 'Utilisateurs',
                'transactions': 'Transactions',
                'analytics': 'Analytiques',
                'messages': 'Messages',
                'settings': 'Paramètres',
                'profile': 'Mon profil'
            };

            const pageTitle = document.getElementById('pageTitle');
            if (pageTitle && titles[sectionName]) {
                pageTitle.textContent = titles[sectionName];
            }

            // Close mobile sidebar if open
            closeMobileSidebar();

            // Trigger fade-in animations
            setTimeout(() => {
                const elements = targetSection.querySelectorAll('.fade-in');
                elements.forEach(el => {
                    el.classList.add('visible');
                });
            }, 100);
        }

        // Logout functionality
        function logout() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = 'index.html';
            }
        }

        // Modal functionality
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
        }

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger initial animations
            setTimeout(() => {
                document.querySelectorAll('.fade-in').forEach(el => {
                    el.classList.add('visible');
                });
            }, 100);

            // Add click handlers for form interactions
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 15px rgba(102, 126, 234, 0.2)';
                });

                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '';
                });
            });

            // Add hover effects to cards
            document.querySelectorAll('.stat-card, .content-card, .quick-action').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Simulate real-time updates
            setInterval(() => {
                const statNumbers = document.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const currentValue = parseInt(stat.textContent.replace(/\D/g, ''));
                    const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                    if (change !== 0) {
                        stat.textContent = (currentValue + change).toLocaleString();
                    }
                });
            }, 30000); // Update every 30 seconds
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeMobileSidebar();
            }
        });
    </script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
