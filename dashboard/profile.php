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
    <h2><i class="fas fa-box"></i> Profile Information</h2>
    <br><br>
    
    <div class="user-profile">
    <div class="profile-header">
        <div class="profile-pic">
            <img src="../img/image.png" alt="User Profile Picture">
            <button class="edit-pic-btn"><i class="fas fa-camera"></i></button>
        </div>
        <div class="profile-details">
            <h2>John Doe</h2>
            <p>Email: john.doe@example.com</p>
            <p>Phone: +123 456 7890</p>
            <p>Joined: January 15, 2023</p>
            <button class="edit-profile-btn">Edit Profile</button>
        </div>
    </div>

    <div class="profile-body">
        <!-- Account Statistics -->
        <div class="profile-stats">
            <h3>Account Statistics</h3>
            <div class="stat-item">
                <h4>Adopted Pets</h4>
                <p>5</p>
            </div>
            <div class="stat-item">
                <h4>Pending Requests</h4>
                <p>2</p>
            </div>
            <div class="stat-item">
                <h4>Wishlist Items</h4>
                <p>3</p>
            </div>
        </div>

        <!-- Additional Details -->
        <div class="additional-details">
            <h3>Additional Information</h3>
            <p><strong>Address:</strong> 1234 Elm Street, Springfield</p>
            <p><strong>Date of Birth:</strong> March 10, 1990</p>
            <p><strong>Membership:</strong> Premium</p>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h3>Recent Activity</h3>
            <ul>
                <li>Adopted a Labrador on November 10, 2024.</li>
                <li>Added a Persian Cat to Wishlist on October 15, 2024.</li>
                <li>Requested adoption of a Golden Retriever on October 10, 2024.</li>
            </ul>
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
