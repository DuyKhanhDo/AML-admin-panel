<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
    }

    .sidebar {
      height: 100vh; /* Kéo dài sidebar hết chiều cao */
      background-color: #A9A9A9; /* Sidebar màu xám đậm */
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng cho sidebar */
    }

    .admin-avatar {
      width: 100px;
      height: 100px;
      background-color: lightgray; /* Placeholder cho ảnh */
      border-radius: 50%;
      margin: 20px auto;
      background-image: url('https://via.placeholder.com/100');
      background-size: cover;
      background-position: center;
    }

    .divider {
      width: 100%;
      height: 2px;
      background-color: #ccc;
      margin: 10px auto 20px;
    }

    .nav-link {
      border-radius: 5px; /* Làm bo góc cho các nút */
      margin: 5px 10px;
      transition: all 0.3s ease; /* Hiệu ứng hover và active */
      background-color:rgba(0,0,0,0.3);
      color: #343a40; /* Màu chữ đậm */
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng đen */
    }

    .nav-link:hover {
      background-color: #495057; /* Thay đổi màu nền khi hover */
      color: #fff; /* Màu chữ trắng khi hover */
      box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3); /* Bóng mạnh hơn khi hover */
    }

    .nav-link.active {
      
      
      color: #fff; /* Chữ màu trắng */
      background-color: #495057; /* Thay đổi màu nền khi hover */
    }

    .logout {
      position: absolute;
      bottom: 20px; /* Cố định nút Log Out dưới đáy */
      left: 10px;
      right: 10px;
    }

    .logout .btn {
      background-color: #fff; /* Nền trắng */
      color: #343a40; /* Màu chữ đậm */
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
      transition: all 0.3s ease; /* Hiệu ứng hover */
    }

    .logout .btn:hover {
      background-color:rgba(0,0,0,0.3);
      color: #fff; /* Màu chữ đậm */
      box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3); /* Bóng mạnh hơn khi hover */
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar position-fixed">
        <div class="d-flex flex-column h-100 position-relative">
          <!-- Admin Avatar -->
          <div class="text-center py-4">
            <div class="admin-avatar"></div>
            <div class="divider"></div> <!-- Gạch ngang -->
          </div>
          <!-- Navigation Menu -->
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user') }}" class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}" aria-current="page">
                Management User
              </a>
            </li>
            <li>
              <a href="{{ route('category') }}" class="nav-link {{ request()->routeIs('category') ? 'active' : '' }}">
                Management Categories
              </a>
            </li>
            <li>
              <a href="{{ route('media') }}" class="nav-link {{ request()->routeIs('media') ? 'active' : '' }}">
                Management Medias
              </a>
            </li>
          </ul>
          
          <!-- Log Out Button -->
          <div class="logout">
            <a href="#" class="btn  w-100">Log Out</a>
          </div>
        </div>
      </nav>
      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 offset-md-3 offset-lg-2 mt-5">
        @yield('main')
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
