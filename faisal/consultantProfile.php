<?php
session_start();
require 'database.php'; // Include your database connection

// Assuming you store the consultant's id in the session after login
$consultant_id = $_SESSION['consultant_id'];

// Query to fetch consultant's data
$sql = "SELECT first_name, last_name, email, phone_number, field, experience, bio FROM consultants WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $consultant_id);
$stmt->execute();
$result = $stmt->get_result();
$consultant = $result->fetch_assoc();

// Handle profile update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $bio = $_POST['bio'];
    $phone_number = $_POST['phone_number'];
    $field = $_POST['field'];
    $experience = $_POST['experience'];

    // Update the consultant's profile in the database
    $sql_update = "UPDATE consultants SET first_name = ?, last_name = ?, bio = ?, phone_number = ?, field = ?, experience = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssssi", $first_name, $last_name, $bio, $phone_number, $field, $experience, $consultant_id);

    if ($stmt_update->execute()) {
        header('Location: consultantProfile.php?success=1');
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-photo:hover {
            border: 3px solid #007bff;
        }

        .profile-upload-box {
            border: 2px dashed #007bff;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .profile-upload-box.drag-over {
            background-color: #f8f9fa;
        }

        .profile-info-label {
            font-weight: bold;
            color: #007bff;
        }

        .status-btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .status-btn.available {
            background-color: #28a745;
        }

        .status-btn.unavailable {
            background-color: #dc3545;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #007bff;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .nav-tabs .nav-link {
            color: #007bff;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background-color: #f8f9fa;
            width: 100%;
            position: relative ;
            bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="mustasharlogo.png" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Profile Dropdown Icon -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <div class="dropdown-item-text">
                                    <img src="profile-icon.svg" class="rounded-circle" width="50" height="50" alt="Profile Icon">
                                    <strong>Consultant Name</strong>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#viewProfileModal">View Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Requests Section (Left) -->
            <div class="col-md-8">
                <h4 class="mt-4">Requests Overview</h4>
                <ul class="nav nav-tabs" id="requestTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-requests"
                            type="button" role="tab" aria-controls="active-requests" aria-selected="true">Active Requests</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-requests"
                            type="button" role="tab" aria-controls="pending-requests" aria-selected="false">Pending Requests</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-requests"
                            type="button" role="tab" aria-controls="history-requests" aria-selected="false">History</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="requestTabsContent">
                    <!-- Active Requests -->
                    <div class="tab-pane fade show active" id="active-requests" role="tabpanel" aria-labelledby="active-tab">
                        <div class="card">
                            <div class="card-header text-white bg-info">
                                Request 3: Quality assurance for Project X
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Started on:</strong> 2024-09-25</p>
                                <button class="btn btn-primary view-details-btn"
                                 data-title="Request 3: Quality assurance for Project X"
                                 data-description="This is the detailed description for the quality assurance project."
                               data-date="2024-09-25">
                                View Details
                                </button>

                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests -->
                    <div class="tab-pane fade" id="pending-requests" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="card">
                            <div class="card-header text-white bg-warning">
                                Request 1: UX design assistance
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Submitted on:</strong> 2024-09-29</p>
                                <button class="btn btn-primary view-details-btn" onclick="showRequestDetails({
                                    title: 'Request 1: UX design assistance',
                                    description: 'This is the detailed description for the UX design assistance project.',
                                    date: '2024-09-29'
                                })">View Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- History Requests -->
                    <div class="tab-pane fade" id="history-requests" role="tabpanel" aria-labelledby="history-tab">
                        <div class="card">
                            <div class="card-header text-white bg-success">
                                Request 5: UI design for Project Z
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Completed on:</strong> 2024-09-15</p>
                                <button class="btn btn-primary view-details-btn" onclick="showRequestDetails({
                                    title: 'Request 5: UI design for Project Z',
                                    description: 'This project involved completing the UI design for Project Z.',
                                    date: '2024-09-15'
                                })">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Management Section (Right) -->
            <div class="col-md-4">
                <div class="status-section mt-4">
                    <h4>Manage Status</h4>
                    <button id="statusButton" class="status-btn available" onclick="toggleStatus()">
                        <i id="statusIcon" class="bi bi-check-circle"></i> Available
                    </button>
                    <label class="switch" style="margin-left: 10px;">
                        <input type="checkbox" id="statusToggle" checked onchange="toggleStatus()">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Profile -->
    <div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="viewProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProfileModalLabel">Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Profile Image Section -->
                    <div class="text-center">
                        <img id="profileImage" src="profile-icon.svg" alt="Profile Photo" class="img-fluid rounded-circle profile-photo">
                        <div class="profile-upload-box" id="profileUploadBox">
                            <p>Drag & drop or click to upload your profile photo</p>
                            <input type="file" id="profileUploadInput" class="d-none" accept="image/*" />
                        </div>
                    </div>

                    <!-- Profile Info Section -->
    <form action="consultantProfile.php" method="POST">
    <div class="profile-section">
        <label class="profile-info-label">First Name:</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $consultant['first_name']; ?>" disabled>
    </div>
    <div class="profile-section">
        <label class="profile-info-label">Last Name:</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $consultant['last_name']; ?>" disabled>
    </div>
    <div class="profile-section">
        <label class="profile-info-label">Bio:</label>
        <textarea name="bio" class="form-control" rows="3" disabled><?php echo $consultant['bio']; ?></textarea>
    </div>
    <div class="profile-section">
        <label class="profile-info-label">Phone Number:</label>
        <input type="text" name="phone_number" class="form-control" value="<?php echo $consultant['phone_number']; ?>" disabled>
    </div>
    <div class="profile-section">
        <label class="profile-info-label">Field of Expertise:</label>
        <input type="text" name="field" class="form-control" value="<?php echo $consultant['field']; ?>" disabled>
    </div>
    <div class="profile-section">
        <label class="profile-info-label">Years of Experience:</label>
        <input type="number" name="experience" class="form-control" value="<?php echo $consultant['experience']; ?>" disabled>
    </div>
    <button id="saveProfileBtn" style="display:none;" type="submit">Save Profile</button>
    </form>


    <!-- Modal for Request Details -->
    <div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-labelledby="requestDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestDetailsModalLabel">Request Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 id="requestTitle">Request Title</h6>
                    <p id="requestDescription">Request description will be shown here...</p>
                    <p><strong>Started on:</strong> <span id="requestDate">Date will be shown here</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white mt-5">
        <div class="container text-center py-3">
            <p class="mb-0">© Mustashar 2024. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Profile image drag-and-drop and click-to-upload
        const uploadBox = document.getElementById('profileUploadBox');
        uploadBox.addEventListener('click', () => document.getElementById('profileUploadInput').click());
        uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.classList.add('drag-over');
        });
        uploadBox.addEventListener('dragleave', () => uploadBox.classList.remove('drag-over'));
        uploadBox.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadBox.classList.remove('drag-over');
            const file = e.dataTransfer.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById("profileImage").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById("profileUploadInput").addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("profileImage").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Toggle status functionality
        function toggleStatus() {
            const statusButton = document.getElementById("statusButton");
            const statusIcon = document.getElementById("statusIcon");
            const statusToggle = document.getElementById("statusToggle");

            if (statusButton.classList.contains("available")) {
                statusButton.classList.remove("available");
                statusButton.classList.add("unavailable");
                statusButton.innerHTML = '<i id="statusIcon" class="bi bi-x-circle"></i> Unavailable';
                statusToggle.checked = false;
            } else {
                statusButton.classList.remove("unavailable");
                statusButton.classList.add("available");
                statusButton.innerHTML = '<i id="statusIcon" class="bi bi-check-circle"></i> Available';
                statusToggle.checked = true;
            }
        }

        // Show request details in modal
        function showRequestDetails(request) {
        // Ensure the modal elements exist and are being targeted correctly
        document.getElementById('requestTitle').textContent = request.title;
        document.getElementById('requestDescription').textContent = request.description;
        document.getElementById('requestDate').textContent = request.date;

            // Ensure the modal is properly initialized before showing
         var requestDetailsModal = new bootstrap.Modal(document.getElementById('requestDetailsModal'), {
        keyboard: true,
        backdrop: 'static'
        });
        document.querySelectorAll('.view-details-btn').forEach((button) => {
         button.addEventListener('click', function() {
        // Ensure correct request data is passed into the function
        const request = {
            title: button.getAttribute('data-title'),
            description: button.getAttribute('data-description'),
            date: button.getAttribute('data-date')
        };
        showRequestDetails(request);
         });
        });

        requestDetailsModal.show();
        }
        function enableProfileEdit() {
         document.querySelectorAll('.profile-section input, .profile-section textarea').forEach(function(input) {
        input.disabled = false;
         });
         document.getElementById('editProfileBtn').style.display = 'none';
         document.getElementById('saveProfileBtn').style.display = 'inline-block';
        }

    </script>
</body>

</html>
