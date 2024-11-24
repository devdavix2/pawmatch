<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PawMatch User Dashboard</title>
<link rel="stylesheet" href="./css/styles.min.css" />
<link rel="stylesheet" href="../dashboard/css/dashboard.css" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* Dropdown menu styles */

.search-bar {
    display: block; /* Default: Visible */
}

@media (max-width: 768px) {
    .search-bar {
        display: none; /* Hide on screens smaller than 768px */
    }
}

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle {
        cursor: pointer;
        color: white;
        background-color: #ff4081;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        display: flex;
        align-items: center;
    }

    .dropdown-toggle i {
        margin-right: 5px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color:#ff4081;
        color: white;
        margin-left: -100px;
        min-width: 160px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        z-index: 1;
        overflow: hidden;
    }

    .dropdown-menu a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px 15px;
    }

    .dropdown-menu a:hover {
        background-color:#e897b2;;
        color:white;



    }

    .dropdown.active .dropdown-menu {
        display: block;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    table th {
        background-color: #ff4081;
        color: white;
    }
    .btn {
        background-color: #ff4081;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #e91e63;
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Sidebar content here -->

     <div class="toggle">
    <i class="fas fa-bars toggle-btn" id="toggle-btn"></i>

    </div>
    
    <div class="menu-item">
    <a href="home.php">
        <i class="fas fa-tachometer-alt"></i>
        <span class="menu-text"> Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a href="adopt.php">
        <i class="fas fa-paw"></i>
        <span class="menu-text">Adopt</span>
    </a>
</div>

<div class="menu-item">
    <a href="profile.php">
        <i class="fas fa-user"></i>
        <span class="menu-text"> Profile</span>
    </a> <!-- Correctly closed the anchor tag here -->
</div>

<div class="menu-item">
    <a href="settings.php">
        <i class="fas fa-cog"></i>
        <span class="menu-text">Settings</span>
    </a>
</div>

<div class="menu-item">
    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        <span class="menu-text">Logout</span>
    </a>
</div>
</div>

<!-- Main Content -->
<div class="content" id="content">
    <!-- Header Section -->
    <div class="header">
        <div class="header-left">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
        </div>
        <div class="header-right">
            <div>
                
                <div class="dropdown">
                    <button class="dropdown-toggle"><i class="fas fa-user"></i></button>
                    <div class="dropdown-menu">
                    <a href="profile.php"> Profile</a>
                        <a href="settings.php"> Settings</a>
                        <a href="logout.php"> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2><i class="fas fa-box"></i> Settings </h2>
    <br><br>
   


    <div class="settings-section">

    <!-- Notification Settings -->
    <div class="settings-category">
        <h3>Notification Settings</h3>
        <div class="settings-card">
            <form>
                <label>
                    <input type="checkbox" checked> Email Notifications
                </label>
                <label>
                    <input type="checkbox"> SMS Notifications
                </label>
                <label>
                    <input type="checkbox" checked> Push Notifications
                </label>

                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Language Preferences -->
    <div class="settings-category">
        <h3>Language Preferences</h3>
        <div class="settings-card">
            <form>
                <label for="language">Select Language:</label>
                <select id="language" name="language">
                    <option value="english" selected>English</option>
                    <option value="spanish">Spanish</option>
                    <option value="french">French</option>
                    <option value="german">German</option>
                    <option value="chinese">Chinese</option>
                </select>

                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="settings-category">
        <h3>Security Settings</h3>
        <div class="settings-card">
            <form>
                <label>
                    <input type="checkbox" checked> Two-Factor Authentication
                </label>
                <label>
                    <input type="checkbox"> Notify me on login activity
                </label>

                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Subscription Settings -->
    <div class="settings-category">
        <h3>Subscription Settings</h3>
        <div class="settings-card">
            <form>
                <label>
                    <input type="radio" name="subscription" value="monthly" checked> Monthly Subscription
                </label>
                <label>
                    <input type="radio" name="subscription" value="yearly"> Yearly Subscription
                </label>

                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>
</div>


   
<script>
    
    // JavaScript to handle the dropdown toggle
    document.addEventListener('DOMContentLoaded', () => {
        const dropdown = document.querySelector('.dropdown');
        const toggleBtn = dropdown.querySelector('.dropdown-toggle');

        toggleBtn.addEventListener('click', () => {
            dropdown.classList.toggle('active');
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    });
</script>

</body>
</html>
