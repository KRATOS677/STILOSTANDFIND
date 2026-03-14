<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STlerFinds - Lost & Found Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ===== GLOBAL VARIABLES (FORCED DARK MODE) ===== */
        :root {
            --bg-dark: #111827;       /* Very dark blue/gray */
            --bg-card: #1f2937;       /* Lighter gray for cards */
            --bg-input: #374151;      /* Inputs */
            --primary-blue: #3b82f6;  /* Primary Action */
            --primary-dark: #1d4ed8;  /* Hover state */
            --sti-yellow: #fbbf24;    /* Accent */
            --text-main: #f9fafb;     /* White text */
            --text-muted: #9ca3af;    /* Gray text */
            --border-color: #374151;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
        }
        
.lightmode{

    --bg-dark: #f9fafb;        
    --bg-card: #ffffff;        
    --bg-input: #f3f4f6;      
    --primary-blue: #2067f4; 
    --primary-dark: #1044ef;  
    --sti-yellow: #fbbf24;      
    --text-main: #627397;       
    --text-muted: #bbc8e0;      
    --border-color: #d1d5db;    
    --success: #059669;         
    --danger: #dc2626;          
    --warning: #d97706;
}

#theme-switch{
    height: 30px;
    width: 30px;
    padding-left: 10;
    border-radius: 50%;
    background-color: var(--base-variant);
    display: flex;
    justify-content: left;
    align-items: center;
    position: fixed;
    top: 30px;
    right: 8px;
}
#theme-switch img{
    fill: var(--primary-color);
}
#theme-switch img:last-child{
    display: none;
}
.lightmode #theme-switch img:first-child{
    display: none;
}
.lightmode #theme-switch img:last-child{
    display: block;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Roboto', Helvetica, Arial, sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            line-height: 1.6;
        }

        /* ===== HEADER ===== */
        header {
            background-color: var(--bg-card);
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .logo span {
            color: var(--text-main);
        }

        .header-right {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        /* Notifications */
        .notif-wrapper {
            position: relative;
            cursor: pointer;
        }

        .notif-icon {
            font-size: 1.2rem;
            color: var(--text-muted);
            transition: color 0.3s;
        }

        .notif-icon:hover {
            color: var(--primary-blue);
        }

        .notif-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .notif-dropdown {
            position: absolute;
            top: 150%;
            right: -10px;
            width: 300px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            display: none;
            z-index: 200;
        }

        .notif-dropdown.active {
            display: block;
        }

        .notif-header {
            padding: 0.8rem;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
        }

        .notif-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .notif-item {
            padding: 0.8rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            display: flex;
            gap: 0.8rem;
            align-items: start;
        }

        .notif-item:hover {
            background-color: var(--bg-input);
        }

        /* Profile */
        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            padding: 0.4rem 0.8rem;
            padding-right: 30px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .profile-trigger:hover {
            background-color: var(--bg-input);
        }

        .avatar {
            width: 35px;
            height: 35px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
        }

        /* ===== LAYOUT ===== */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .content {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: 12px;
            height: fit-content;
            position: sticky;
            top: 5rem;
            border: 1px solid var(--border-color);
        }

        .filter-group {
            margin-bottom: 1.5rem;
        }

        .filter-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.7rem;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-main);
            font-family: inherit;
        }

        input[type="file"] {
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
        }

        .category-filter {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .category-btn {
            padding: 0.6rem;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .category-btn:hover {
            background: var(--bg-dark);
            color: var(--text-main);
        }

        .category-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        /* ===== METRICS (UPDATED: Added Hover Depth) ===== */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1rem;
            /* Added transition for depth */
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            cursor: default;
        }

        /* New Hover Effect for Metrics */
        .metric-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            border-color: var(--primary-blue);
        }

        .metric-icon {
            width: 50px;
            height: 50px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 1.2rem;
        }

        .metric-info h4 {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.2rem;
        }

        .metric-info span {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* ===== UPLOAD SECTION ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-upload-toggle {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s;
        }

        .btn-upload-toggle:hover {
            background: var(--primary-dark);
        }

        .upload-panel {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
            display: none; /* Hidden by default, toggled */
        }

        .upload-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        /* ===== ITEM GRID ===== */
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .item-card {
            background: var(--bg-card);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            position: relative;
        }

        .item-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            border-color: var(--primary-blue);
        }

        .item-image {
            height: 180px;
            background: #2d3748;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 3rem;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-content {
            padding: 1.2rem;
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 0.8rem;
        }

        .status-lost {
        background: rgba(239, 68, 68, 0.15);
        color: var(--danger);
        }

        .status-unclaimed { background: rgba(251, 191, 36, 0.15); color: var(--sti-yellow); }
        .status-pending { background: rgba(59, 130, 246, 0.15); color: var(--primary-blue); }
        .status-returned { background: rgba(16, 185, 129, 0.15); color: var(--success); }
        
        .item-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-main);
        }

        .item-meta {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.3rem;
        }

        /* ===== MODAL (UPDATED: Smaller Size) ===== */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem; /* Reduced padding */
            width: 90%;
            max-width: 500px; /* Reduced max-width (was 600px) */
            border: 1px solid var(--border-color);
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
            padding: 0.6rem 0; /* Reduced padding */
            font-size: 0.95rem;
        }

        .detail-label {
            color: var(--text-muted);
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            text-align: right;
        }

        /* UPLOADER PROFILE HOVER EFFECT */
        .uploader-tooltip-container {
            position: relative;
            cursor: pointer;
            color: var(--primary-blue);
            text-decoration: underline;
            text-decoration-style: dotted;
        }

        .report-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 1rem;
        }

        .report-buttons .btn-upload-toggle {
        justify-content: center;
        min-width: 180px;
        }

        .uploader-popover {
            display: none;
            position: absolute;
            bottom: 100%;
            right: 0; /* Align right since labels are right-aligned */
            width: 200px;
            background: var(--bg-dark);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            z-index: 2000;
            margin-bottom: 10px;
            text-align: center;
        }

        .uploader-tooltip-container:hover .uploader-popover {
            display: block;
        }

        .popover-avatar {
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            border-radius: 50%;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            font-weight: bold;
        }

        .modal-actions {
            margin-top: 1.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary { background: var(--primary-blue); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        
        .btn-secondary { background: var(--bg-input); color: var(--text-main); }
        .btn-secondary:hover { background: #4b5563; }

        .btn-danger { background: var(--danger); color: white; }

        .btn-icon-danger {
            background: none;
            border: none;
            color: var(--danger);
            cursor: pointer;
            padding: 5px;
            font-size: 1rem;
        }
        .btn-icon-danger:hover { color: #ff6b6b; }

        /* Notification Toast */
        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 2000;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .toast.show { transform: translateY(0); opacity: 1; }
        .toast-success { background: var(--success); }
        .toast-error { background: var(--danger); }

        /* Profile Modal Specifics */
        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .profile-header .avatar {
            width: 80px;
            height: 80px;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }
        .my-items-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 6px;
        }
        .my-item-row {
            padding: 0.8rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }
        .my-item-info {
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .content { grid-template-columns: 1fr; }
            .sidebar { position: static; margin-bottom: 2rem; }
            .header-right span { display: none; }
            .upload-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-box-open"></i>
            <div>STlerFinds <span>Manager</span></div>
            <button id="theme-switch">
                <img src="dark_mode_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.png">
                <img src="light_mode_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.png">
            </button>
        </div>
        
        <div class="header-right">
            <div class="notif-wrapper" onclick="toggleNotifications()">
                <i class="fa-solid fa-bell notif-icon"></i>
                <div class="notif-badge" id="notifBadge" style="display: none;">0</div>
                
                <div class="notif-dropdown" id="notifDropdown">
                    <div class="notif-header">Notifications</div>
                    <div class="notif-list" id="notifList">
                        <div style="padding:1rem; text-align:center; color: var(--text-muted);">No new notifications</div>
                    </div>
                </div>
            </div>

            <div class="profile-trigger" onclick="openProfileModal()">
                <div class="avatar" id="headerAvatar">S</div>
                <div class="user-info">
                    <div style="font-weight: 600; font-size: 0.9rem;" id="headerName">Student User</div>
                    <div style="font-size: 0.75rem; color: var(--text-muted);" id="headerRole">Student</div>
                </div>
                <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 0.5rem;"></i>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-icon"><i class="fa-solid fa-calendar-day"></i></div>
                <div class="metric-info">
                    <h4 id="metric-month">0</h4>
                    <span>Reports this Month</span>
                </div>
            </div>
            <div class="metric-card">
                <div class="metric-icon"><i class="fa-solid fa-check-circle"></i></div>
                <div class="metric-info">
                    <h4 id="metric-returned">0</h4>
                    <span>Items Returned</span>
                </div>
            </div>
            <div class="metric-card">
                <div class="metric-icon"><i class="fa-solid fa-clock"></i></div>
                <div class="metric-info">
                    <h4 id="metric-unclaimed">0</h4>
                    <span>Unclaimed (30+ Days)</span>
                </div>
            </div>
        </div>

        <div class="content">
            <aside class="sidebar">
                <div class="filter-group">
                    <label>Search</label>
                    <input type="text" id="searchInput" placeholder="Keyword..." onkeyup="filterItems()">
                </div>

                <div class="filter-group">
                    <label>Category</label>
                    <div class="category-filter">
                        <button class="category-btn active" onclick="setCategory('All', this)">All</button>
                        <button class="category-btn" onclick="setCategory('Electronics', this)">Electronics</button>
                        <button class="category-btn" onclick="setCategory('IDs', this)">IDs</button>
                        <button class="category-btn" onclick="setCategory('Clothing', this)">Clothing</button>
                        <button class="category-btn" onclick="setCategory('Bags', this)">Bags</button>
                        <button class="category-btn" onclick="setCategory('Accessories', this)">Accessories</button>
                    </div>
                </div>

                <div class="filter-group">
                    <label>Location</label>
                    <select id="locationFilter" onchange="filterItems()">
                        <option value="">All Locations</option>
                        <option value="Hallways">Hallways</option>
                        <option value="Classrooms">Classrooms</option>
                        <option value="Library">Library</option>
                        <option value="Comfort Rooms">Comfort Rooms</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <button class="btn btn-secondary" style="width: 100%;" onclick="resetFilters()">Reset Filters</button>
            </aside>

            <main>
                <div class="report-buttons">
                    <h2 style="font-size: 1.5rem;">Found Items</h2>
                    <button class="btn-upload-toggle" onclick="toggleUploadPanel()">
                        <i class="fa-solid fa-plus"></i> Report Found Item
                    </button>

                    <button class="btn-upload-toggle" style="background:#f59e0b;" onclick="toggleLostPanel()">
                    <i class="fa-solid fa-magnifying-glass"></i> Report Lost Item
                    </button>
                </div>

                <div class="upload-panel" id="uploadPanel">
                    <h3 style="margin-bottom: 1rem;">Item Details</h3>
                    <form onsubmit="handleUpload(event)">
                        <div class="upload-grid">
                            <div class="filter-group">
                                <label>Item Name</label>
                                <input type="text" id="upName" required placeholder="e.g. Blue Hydroflask">
                            </div>

                            <div class="filter-group">
                                <label>Category</label>
                                <select id="upCat" required>
                                    <option value="Electronics">Electronics</option>
                                    <option value="IDs">IDs</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Bags">Bags</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label>Location Found</label>
                                <select id="upLoc" required>
                                    <option value="Hallways">Hallways</option>
                                    <option value="Classrooms">Classrooms</option>
                                    <option value="Library">Library</option>
                                    <option value="Comfort Rooms">Comfort Rooms</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label>Date Found</label>
                                <input type="date" id="upDate" required>
                            </div>
                            <div class="filter-group full-width">
                                <label>Upload Image</label>
                                <input type="file" id="upImage" accept="image/*">
                            </div>
                            <div class="filter-group full-width">
                                <label>Description</label>
                                <textarea id="upDesc" rows="3" required placeholder="Detailed description..."></textarea>
                            </div>
                            <div class="full-width">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Report</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="upload-panel" id="lostPanel">
                <h3 style="margin-bottom: 1rem;">Lost Item Details</h3>
                <form onsubmit="handleLostUpload(event)">
                    <div class="upload-grid">
                        <div class="filter-group">
                            <label>Item Name</label>
                            <input type="text" id="lostName" required placeholder="e.g. Black Wallet">
                        </div>

                        <div class="filter-group">
                            <label>Category</label>
                            <select id="lostCat" required>
                                <option value="Electronics">Electronics</option>
                                <option value="IDs">IDs</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Bags">Bags</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>Last Seen Location</label>
                            <select id="lostLoc" required>
                                <option value="Hallways">Hallways</option>
                                <option value="Classrooms">Classrooms</option>
                                <option value="Library">Library</option>
                                <option value="Comfort Rooms">Comfort Rooms</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>Date Lost</label>
                            <input type="date" id="lostDate" required>
                        </div>

                        <div class="filter-group full-width">
                        <label>Upload Image</label>
                        <input type="file" id="lostImage" accept="image/*">
                        </div>

                        <div class="filter-group full-width">
                            <label>Description</label>
                            <textarea id="lostDesc" rows="3" required></textarea>
                        </div>  

                        <div class="full-width">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Submit Lost Report
                            </button>
                        </div>
                    </div>
                </form>
            </div>

                <div class="items-grid" id="itemsGrid">
                    </div>
            </main>
        </div>
    </div>

    <div class="modal" id="itemModal">
        <div class="modal-content">
            <button class="close-modal" onclick="closeModal('itemModal')">×</button>
            <h2 id="mTitle" style="margin-bottom: 1rem; font-size: 1.3rem;">Item Name</h2>
            
            <div class="item-image" id="mImageContainer" style="border-radius: 8px; margin-bottom: 1rem; height: 200px;">
                <i id="mIcon" class="fa-solid fa-box" style="font-size: 3rem;"></i>
            </div>

            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value" id="mStatus">Unclaimed</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Location</span>
                <span class="detail-value" id="mLoc">Library</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Date Found</span>
                <span class="detail-value" id="mDate">Oct 24, 2023</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Uploaded By</span>
                <div class="uploader-tooltip-container">
                    <span id="mUploaderName">John Doe</span>
                    <div class="uploader-popover">
                        <div class="popover-avatar" id="mPopAvatar">J</div>
                        <div style="font-weight: bold; color: white;" id="mPopName">John Doe</div>
                        <div style="font-size: 0.8rem; color: #9ca3af;" id="mPopRole">Student</div>
                        <div style="font-size: 0.7rem; color: #6b7280; margin-top:5px;">ID: 2023-00XX</div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 1rem;">
                <span class="detail-label" style="font-size: 0.9rem;">Description</span>
                <p id="mDesc" style="margin-top: 0.3rem; color: var(--text-main); background: var(--bg-input); padding: 0.6rem; border-radius: 6px; font-size: 0.9rem; line-height: 1.4;">
                    Description text here...
                </p>
            </div>

            <div class="modal-actions" id="modalActions">
                <button class="btn btn-primary" onclick="submitClaim()">Claim This Item</button>
                <button class="btn btn-secondary" onclick="closeModal('itemModal')">Close</button>
            </div>
        </div>
    </div>

    <div class="modal" id="profileModal">
        <div class="modal-content" style="max-width: 400px;">
            <button class="close-modal" onclick="closeModal('profileModal')">×</button>
            
            <div class="profile-header">
                <div class="avatar" id="pAvatar">S</div>
                <h3 id="pName">Student Name</h3>
                <p style="color: var(--text-muted);" id="pRole">Student ID: 2023-0001</p>
            </div>

            <h4 style="margin-bottom: 0.5rem;">Switch Account (Demo)</h4>
            <select id="accountSwitcher" onchange="switchAccount(this.value)" style="margin-bottom: 1.5rem;">
                <option value="1">Student A (John)</option>
                <option value="2">Teacher B (Ms. Santos)</option>
                <option value="3">Staff C (Admin)</option>
            </select>

            <h4 style="margin-bottom: 0.5rem;">My Reported Items</h4>
            <div class="my-items-list" id="myItemsList">
                </div>
        </div>
    </div>

    <?php
$conn = new mysqli("localhost", "root", "", "projecttest");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch all users
$result = $conn->query("SELECT id, name, email FROM registration");
$users = [];
while($row = $result->fetch_assoc()) {
    $users[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'role' => 'Student', // default role
        'initials' => strtoupper(substr($row['name'], 0, 2)) // first 2 letters
    ];
}
?>








    <script>
        // theme switch 
let lightmode = localStorage.getItem('lightmode')
const themeSwitch = document.getElementById('theme-switch')

const enableLightmode = () => {
    document.body.classList.add('lightmode')
    localStorage.setItem('lightmode', 'active')
}

const disableLight = () => {
    document.body.classList.remove('lightmode')
    localStorage.setItem('lightmode', null)
}

if(lightmode == "active") enableLightmode()

themeSwitch.addEventListener("click", () => {
    lightmode = localStorage.getItem('lightmode')
    lightmode !== "active" ? enableLightmode() : disableLight()
})

        // ===== DATA SIMULATION =====
       const users = <?php echo json_encode($users); ?>;
let currentUser = users[users.length - 1]; // last registered user

        let currentUser = users[0]; // Default to Student

        let items = [
            { id: 101, name: "Scientific Calculator", cat: "Electronics", loc: "Library", date: "2023-11-28", status: "Unclaimed", uploaderId: 2, desc: "Casio fx-991EX Classwiz, has a sticker on the back.",


imageSrc: null },
            { id: 102, name: "Beige Tote Bag", cat: "Bags", loc: "Comfort Rooms", date: "2023-11-29", status: "Unclaimed", uploaderId: 1, desc: "Canvas tote bag containing notebooks and a tumbler.", imageSrc: null },
            { id: 103, name: "ID Lace (IT)", cat: "IDs", loc: "Hallways", date: "2023-11-25", status: "Returned", uploaderId: 3, desc: "BSIT lanyard found near Room 301.", imageSrc: null },
        ];

        let notifications = []; 
        let currentCategory = 'All';
        let selectedItem = null;

        // ===== INITIALIZATION =====
        window.onload = function() {
            renderHeader();
            renderItems();
            updateMetrics();
        };

        // ===== AUTH / PROFILE LOGIC =====
        function renderHeader() {
            document.getElementById('headerAvatar').textContent = currentUser.initials;
            document.getElementById('headerName').textContent = currentUser.name;
            document.getElementById('headerRole').textContent = currentUser.role;
            document.getElementById('pAvatar').textContent = currentUser.initials;
            document.getElementById('pName').textContent = currentUser.name;
            document.getElementById('pRole').textContent = currentUser.role;
            
            checkNotifications();
        }

        function switchAccount(id) {
            currentUser = users.find(u => u.id == id);
            renderHeader();
            closeModal('profileModal');
            showToast(`Switched to ${currentUser.name}`, 'success');
        }

        function openProfileModal() {
            // Render My Items with DELETE option
            const myList = items.filter(i => i.uploaderId === currentUser.id);
            const container = document.getElementById('myItemsList');
            
            if(myList.length === 0) {
                container.innerHTML = '<div style="padding:1rem; text-align:center; color:var(--text-muted)">No items reported yet.</div>';
            } else {
                container.innerHTML = myList.map(item => `
                    <div class="my-item-row">
                        <div class="my-item-info">
                            <strong>${item.name}</strong>
                            <span class="status-badge status-${item.status.toLowerCase().replace(' ', '-')}">${item.status}</span>
                        </div>
                        <button class="btn-icon-danger" onclick="deleteMyItem(${item.id})" title="Delete Item">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                `).join('');
            }
            
            document.getElementById('profileModal').classList.add('active');
        }

        function deleteMyItem(id) {
            if(confirm("Are you sure you want to delete this reported item?")) {
                items = items.filter(i => i.id !== id);
                renderItems();
                updateMetrics();
                openProfileModal(); // Re-render the list
                showToast('Item deleted successfully', 'success');
            }
        }

        // ===== NOTIFICATION LOGIC =====
        function checkNotifications() {
            const myNotifs = notifications.filter(n => n.toUserId === currentUser.id);
            const badge = document.getElementById('notifBadge');
            const list = document.getElementById('notifList');

            if (myNotifs.length > 0) {
                badge.style.display = 'flex';
                badge.textContent = myNotifs.length;
                
                list.innerHTML = myNotifs.map(n => `
                    <div class="notif-item">
                        <i class="fa-solid fa-circle-exclamation" style="color: var(--primary-blue); margin-top: 3px;"></i>
                        <div>
                            <strong>Claim Request</strong><br>
                            ${n.fromUserName} wants to claim "<b>${n.itemName}</b>".
                        </div>
                    </div>
                `).join('');
            } else {
                badge.style.display = 'none';
                list.innerHTML = '<div style="padding:1rem; text-align:center; color: var(--text-muted);">No new notifications</div>';
            }
        }

        function toggleNotifications() {
            document.getElementById('notifDropdown').classList.toggle('active');
        }

        // ===== ITEMS DISPLAY & FILTERING =====
        function getIcon(category) {
            const icons = {
                'Electronics': 'fa-mobile-screen',
                'Bags': 'fa-bag-shopping',
                'IDs': 'fa-id-card',
                'Clothing': 'fa-shirt',
                'Accessories': 'fa-glasses',
                'Others': 'fa-box'
            };
            return icons[category] || 'fa-box';
        }

        function renderItems() {
            const grid = document.getElementById('itemsGrid');
            const search = document.getElementById('searchInput').value.toLowerCase();
            const locFilter = document.getElementById('locationFilter').value;

            const filtered = items.filter(item => {
                const matchSearch = item.name.toLowerCase().includes(search) || item.desc.toLowerCase().includes(search);
                const matchCat = currentCategory === 'All' || item.cat === currentCategory;
                const matchLoc = locFilter === '' || item.loc === locFilter;
                return matchSearch && matchCat && matchLoc;
            });

            if (filtered.length === 0) {
                grid.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 2rem; color: var(--text-muted);">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 2rem; margin-bottom: 1rem;"></i><br>
                    No items found matching your filters.
                </div>`;
                return;
            }

            // If item has imageSrc, show image, else show icon
            grid.innerHTML = filtered.map(item => {
                const visual = item.imageSrc 
                    ? `<img src="${item.imageSrc}" alt="${item.name}">` 
                    : `<i class="fa-solid ${getIcon(item.cat)}"></i>`;

                const statusClass = item.status.toLowerCase().replace(' ', '-'); // Handles 'Pending Claim'
                
                return `
                <div class="item-card" onclick="openItemModal(${item.id})">
                    <div class="item-image">
                        ${visual}
                    </div>
                    <div class="item-content">
                        <span class="status-badge status-${statusClass}">${item.status}</span>
                        <div class="item-name">${item.name}</div>
                        <div class="item-meta"><i class="fa-solid fa-location-dot"></i> ${item.loc}</div>
                        <div class="item-meta"><i class="fa-regular fa-calendar"></i> ${item.date}</div>
                    </div>
                </div>
            `}).join('');
        }

        function setCategory(cat, btn) {
            currentCategory = cat;
            document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderItems();
        }

        function filterItems() {
            renderItems();
        }

        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('locationFilter').value = '';
            setCategory('All', document.querySelector('.category-btn'));
        }

        // ===== UPLOAD LOGIC WITH IMAGE HANDLING =====
        function toggleUploadPanel() {
        const foundPanel = document.getElementById('uploadPanel');
        const lostPanel = document.getElementById('lostPanel');

        if (foundPanel.style.display === 'block') {
        foundPanel.style.display = 'none';
        } else {
        foundPanel.style.display = 'block';
        lostPanel.style.display = 'none'; // close lost panel
        }
        }

        function toggleLostPanel() {
        const foundPanel = document.getElementById('uploadPanel');
        const lostPanel = document.getElementById('lostPanel');

        if (lostPanel.style.display === 'block') {
        lostPanel.style.display = 'none';
        } else {
        lostPanel.style.display = 'block';
        foundPanel.style.display = 'none'; // close found panel
        }
        }   

        function handleLostUpload(e) {
    e.preventDefault();

    const fileInput = document.getElementById('lostImage');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            saveLostItem(event.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        saveLostItem(null);
    }
}

function saveLostItem(imageSrc) {
    const newItem = {
        id: Date.now(),
        name: document.getElementById('lostName').value,
        cat: document.getElementById('lostCat').value,
        loc: document.getElementById('lostLoc').value,
        date: document.getElementById('lostDate').value,
        desc: document.getElementById('lostDesc').value,
        status: 'Lost',
        uploaderId: currentUser.id,
        imageSrc: imageSrc
    };

    items.unshift(newItem);
    renderItems();
    updateMetrics();
    toggleLostPanel();
    document.getElementById('lostPanel').querySelector('form').reset();
    showToast('Lost item reported successfully', 'success');
}

        function handleUpload(e) {
            e.preventDefault();
            
            // Handle Image File
            const fileInput = document.getElementById('upImage');
            const file = fileInput.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    saveItem(e.target.result); // Pass Base64 image
                };
                reader.readAsDataURL(file);
            } else {
                saveItem(null); // No image
            }
        }

        function saveItem(imageSrc) {
        const newItem = {
        id: Date.now(),
        name: document.getElementById('upName').value,
        cat: document.getElementById('upCat').value,
        loc: document.getElementById('upLoc').value,
        date: document.getElementById('upDate').value,
        desc: document.getElementById('upDesc').value,
        status: 'Unclaimed',
        uploaderId: currentUser.id,
        imageSrc: imageSrc
        };

        items.unshift(newItem); 
        renderItems();
        updateMetrics();
        toggleUploadPanel();
        document.getElementById('uploadPanel').querySelector('form').reset();
        showToast('Item reported successfully', 'success');
        }

        // ===== MODAL & CLAIM LOGIC =====
        function openItemModal(id) {
            selectedItem = items.find(i => i.id === id);
            const uploader = users.find(u => u.id === selectedItem.uploaderId);
            const container = document.getElementById('mImageContainer');

            document.getElementById('mTitle').textContent = selectedItem.name;
            
            // Show Image or Icon in Modal
            if(selectedItem.imageSrc) {
                container.innerHTML = `<img src="${selectedItem.imageSrc}" style="width:100%; height:100%; object-fit:contain;">`;
                container.style.backgroundColor = 'transparent';
            } else {
                container.innerHTML = `<i class="fa-solid ${getIcon(selectedItem.cat)}" style="font-size: 3rem;"></i>`;
                container.style.backgroundColor = '#2d3748';
            }
            container.style.display = "flex";
            container.style.alignItems = "center";
            container.style.justifyContent = "center";


            document.getElementById('mStatus').textContent = selectedItem.status;
            document.getElementById('mLoc').textContent = selectedItem.loc;
            document.getElementById('mDate').textContent = selectedItem.date;
            document.getElementById('mDesc').textContent = selectedItem.desc;
            
            // Populate Uploader Hover Card
            document.getElementById('mUploaderName').textContent = uploader ? uploader.name : "Unknown";
            if (uploader) {
                document.getElementById('mPopName').textContent = uploader.name;
                document.getElementById('mPopRole').textContent = uploader.role;
                document.getElementById('mPopAvatar').textContent = uploader.initials;
            }
            // Add CCTV detail row (only if available)

            if(selectedItem.cctv) {
                const cctvRow = document.createElement('div');
                cctvRow.className = 'detail-row';
                cctvRow.innerHTML = `<span class="detail-label">CCTV Location</span><span class="detail-value">${selectedItem.cctv}</span>`;
                document.getElementById('itemModal').querySelector('.modal-content').insertBefore(cctvRow, document.getElementById('modalActions'));
            }


            // Configure Buttons
            const btnArea = document.getElementById('modalActions');
            if (currentUser.id === selectedItem.uploaderId) {
                btnArea.innerHTML = `
                    <button class="btn btn-primary" onclick="markReturned()">Mark as Returned</button>
                    <button class="btn btn-danger" onclick="deleteItem()">Delete</button>
                `;
            } else if (selectedItem.status === 'Returned') {
                btnArea.innerHTML = `<button class="btn btn-secondary" onclick="closeModal('itemModal')" style="grid-column: 1 / -1;">Close</button>`;
            } else {
                btnArea.innerHTML = `
                    <button class="btn btn-primary" onclick="submitClaim()">Claim This Item</button>
                    <button class="btn btn-secondary" onclick="closeModal('itemModal')">Close</button>
                `;
            }

            document.getElementById('itemModal').classList.add('active');
        }

        function submitClaim() {
            if (!selectedItem) return;
            notifications.push({
                id: Date.now(),
                toUserId: selectedItem.uploaderId,
                fromUserName: currentUser.name,
                itemName: selectedItem.name,
                read: false
            });
            selectedItem.status = 'Pending Claim';
            renderItems();
            checkNotifications();
            closeModal('itemModal');
            showToast('Claim request sent to uploader!', 'success');
        }

        function markReturned() {
            selectedItem.status = 'Returned';
            renderItems();
            updateMetrics();
            closeModal('itemModal');
            showToast('Item marked as returned', 'success');
        }

        function deleteItem() {
            items = items.filter(i => i.id !== selectedItem.id);
            renderItems();
            updateMetrics();
            closeModal('itemModal');
            showToast('Item deleted', 'success');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }

        // ===== METRICS =====
        function updateMetrics() {
            document.getElementById('metric-month').textContent = items.length;
            document.getElementById('metric-returned').textContent = items.filter(i => i.status === 'Returned').length;
            document.getElementById('metric-unclaimed').textContent = items.filter(i => i.status === 'Unclaimed').length;
        }

        // ===== TOAST =====
        function showToast(msg, type) {
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.textContent = msg;
            document.body.appendChild(toast);
            
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        window.onclick = function(event) {
            if (!event.target.closest('.notif-wrapper')) {
                document.getElementById('notifDropdown').classList.remove('active');
            }
        }
        
    </script>
</body>
</html>