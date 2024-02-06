<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
    }
    .container-fluid {
      padding: 20px;
    }
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <!-- Navigation -->

  <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid text-center">
      <span class="navbar-brand mb-0 h1 text-center">Admin Dashboard</span>
    </div>
  </nav>

  <!-- Content -->
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link active" href="../View/admin.php">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="https://d2908q01vomqb2.cloudfront.net/c5b76da3e608d34edb07244cd9b875ee86906328/2020/02/13/Screen-Shot-2020-02-13-at-3.54.08-PM.png">
                Analaytics & Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://img.freepik.com/free-vector/horizontal-format-digital-restaurant-menu_52683-45248.jpg?w=2000">
                Menu Management
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://cdn.dribbble.com/users/1192538/screenshots/15188503/media/5a58687671fa825cf5f080cb3130fdee.png?resize=400x0">
                Users
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <!-- Cards -->
        <div class="row">
          <div class="col-md-4">
            <div class="card  bg-danger">
              <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <b><p class="card-text">250</p></b>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <b><p class="card-text ">$1,000</p></b>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-warning">
              <div class="card-body">
                <h5 class="card-title">Users</h5>
                <b><p class="card-text">50</p></b>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <div style="text-align: center;">
  <img class="img-fluid"  src="../Model/analaytics.png">
  </div>

  

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
