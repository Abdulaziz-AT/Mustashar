<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultant Profile</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }
      .profile {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .profile h1 {
        text-align: center;
        color: #333;
      }
      .status,
      .bio,
      .details {
        margin: 20px 0;
      }
      .status span {
        font-size: 1.2em;
      }
      .available {
        color: green;
      }
      .unavailable {
        color: red;
      }
      .details p {
        margin: 10px 0;
      }
      .details button,
      .bio button,
      .status button {
        margin-left: 10px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
      }
      .details button:hover,
      .bio button:hover,
      .status button:hover {
        background-color: #0056b3;
      }
      .profile-photo {
        display: block;
        margin: 0 auto 20px;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img src="mustasharlogo.png" height="50px"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="toggleAbout()"
                >About/Contact Us</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="profile">
      <h1>Consultant Profile</h1>
      <div class="text-center mb-3">
        <img
          id="profileImage"
          src="profile-icon.svg"
          alt="Profile Photo"
          class="img-fluid rounded-circle profile-photo"
          data-bs-toggle="modal"
          data-bs-target="#profileModal"
        />
      </div>

      <div class="status">
        Status: <span id="statusText" class="available">Available</span>
        <button onclick="toggleStatus()">Toggle Status</button>
      </div>
      <div class="bio">
        <h2>Bio</h2>
        <p id="bioText">This is the consultant's bio.</p>
        <button onclick="editBio()">Edit Bio</button>
      </div>
      <div class="details">
        <h2>Details</h2>
        <p>
          Email: <span id="emailText">example@example.com</span>
          <button onclick="editDetail('emailText')">Edit</button>
        </p>
        <p>
          Phone Number: <span id="phoneText">123-456-7890</span>
          <button onclick="editDetail('phoneText')">Edit</button>
        </p>
        <p>
          Birthdate: <span id="birthdateText">1990-01-01</span>
          <button onclick="editDetail('birthdateText')">Edit</button>
        </p>
      </div>
    </div>

    <!-- Requests Section -->
    <div class="col-md-8 mx-auto">
      <h4 class="mt-4">Requests Overview</h4>

      <!-- Search Bar -->
      <div class="input-group mb-3">
        <input
          type="text"
          id="searchRequests"
          class="form-control"
          placeholder="Search your requests..."
          aria-label="Search requests"
        />
        <button
          class="btn btn-primary"
          type="button"
          onclick="searchRequests()"
        >
          Search
        </button>
      </div>

      <!-- Active Requests -->
      <div class="list-group mb-3">
        <button
          class="btn btn-success"
          onclick="toggleCollapse('activeRequests')"
        >
          Active Requests
        </button>
        <div class="collapse show" id="activeRequests">
          <div class="list-group">
            <!-- Replace with dynamic PHP code to fetch active requests -->
            <div class="list-group-item">
              <p class="mb-1">
                Request 3: Working on quality assurance for project X.
              </p>
              <small class="text-muted">Started on: 2024-09-25</small>
            </div>
            <div class="list-group-item">
              <p class="mb-1">
                Request 4: Gathering requirements for project Y.
              </p>
              <small class="text-muted">Started on: 2024-09-24</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests -->
      <div class="list-group mb-3">
        <button
          class="btn btn-dark"
          onclick="toggleCollapse('pendingRequests')"
        >
          Pending Requests
        </button>
        <div class="collapse" id="pendingRequests">
          <div class="list-group">
            <!-- Replace with dynamic PHP code to fetch pending requests -->
            <div class="list-group-item">
              <p class="mb-1">Request 1: Need assistance with UX design.</p>
              <small class="text-muted">Submitted on: 2024-09-29</small>
            </div>
            <div class="list-group-item">
              <p class="mb-1">Request 2: Help with project management.</p>
              <small class="text-muted">Submitted on: 2024-09-28</small>
            </div>
          </div>
        </div>
      </div>

      <!-- History of Requests -->
      <div class="list-group mb-3">
        <button
          class="btn btn-secondary"
          onclick="toggleCollapse('historyRequests')"
        >
          History of Requests
        </button>
        <div class="collapse" id="historyRequests">
          <div class="list-group">
            <!-- Replace with dynamic PHP code to fetch completed requests -->
            <div class="list-group-item">
              <p class="mb-1">Request 5: Completed: UI design for project Z.</p>
              <small class="text-muted">Completed on: 2024-09-15</small>
            </div>
            <div class="list-group-item">
              <p class="mb-1">
                Request 6: Completed: Code review for project A.
              </p>
              <small class="text-muted">Completed on: 2024-09-10</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="profileModal"
      tabindex="-1"
      aria-labelledby="profileModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">
              Change Profile Photo
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body text-center">
            <img
              id="modalProfileImage"
              src="profile-icon.svg"
              alt="Profile Photo"
              class="img-fluid rounded-circle mb-3"
              style="width: 200px; height: 200px"
            />
            <input
              type="file"
              id="modalProfileInput"
              class="form-control-file"
              accept="image/*"
            />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="saveProfileImage">
              Save
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleStatus() {
        const statusText = document.getElementById("statusText");
        if (statusText.classList.contains("available")) {
          statusText.classList.remove("available");
          statusText.classList.add("unavailable");
          statusText.textContent = "Unavailable";
        } else {
          statusText.classList.remove("unavailable");
          statusText.classList.add("available");
          statusText.textContent = "Available";
        }
      }

      function editBio() {
        const bioText = document.getElementById("bioText");
        const newBio = prompt("Enter new bio:", bioText.textContent);
        if (newBio !== null) {
          bioText.textContent = newBio;
        }
      }

      function editDetail(elementId) {
        const element = document.getElementById(elementId);
        const newValue = prompt("Enter new value:", element.textContent);
        if (newValue !== null) {
          element.textContent = newValue;
        }
      }

      document
        .getElementById("profileInput")
        .addEventListener("change", function (event) {
          const file = event.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              document.getElementById("profileImage").src = e.target.result;
            };
            reader.readAsDataURL(file);
          }
        });

      document
        .getElementById("modalProfileInput")
        .addEventListener("change", function (event) {
          const file = event.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              document.getElementById("modalProfileImage").src =
                e.target.result;
            };
            reader.readAsDataURL(file);
          }
        });

      document
        .getElementById("saveProfileImage")
        .addEventListener("click", function () {
          const modalProfileImage =
            document.getElementById("modalProfileImage").src;
          document.getElementById("profileImage").src = modalProfileImage;
          const modal = bootstrap.Modal.getInstance(
            document.getElementById("profileModal")
          );
          modal.hide();
        });

      function toggleCollapse(id) {
        const element = document.getElementById(id);
        if (element.classList.contains("show")) {
          element.classList.remove("show");
        } else {
          element.classList.add("show");
        }
      }

      function searchRequests() {
        const searchInput = document.getElementById("searchRequests")
          .value.toLowerCase();
        const requests = document.querySelectorAll(".list-group-item");
        requests.forEach((request) => {
          const text = request.textContent.toLowerCase();
          if (text.includes(searchInput)) {
            request.style.display = "";
          } else {
            request.style.display = "none";
          }
        });
      }
    </script>

    <footer class="bg-secondary text-white mt-0">
      <div class="bg-dark text-center py-3">
        <p class="mb-0">© Mustashar 2024. All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
