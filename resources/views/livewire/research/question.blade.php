<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      background-color: #f8fafc;
      color: #334155;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 280px;
      background: #ffffff;
      border-right: 1px solid #e2e8f0;
      height: 100vh;
      padding: 25px 15px;
      position: fixed;
      overflow-y: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .sidebar-header {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 1px solid #e2e8f0;
    }

    .sidebar-header i {
      font-size: 24px;
      color: #3b82f6;
      margin-right: 10px;
    }

    .sidebar-header h2 {
      font-size: 20px;
      color: #1e293b;
      font-weight: 600;
    }

    .menu {
      list-style: none;
    }

    .menu li {
      padding: 12px 15px;
      color: #475569;
      cursor: pointer;
      border-radius: 8px;
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      transition: all 0.2s ease;
    }

    .menu li i {
      margin-right: 12px;
      width: 20px;
      text-align: center;
      font-size: 18px;
    }

    .menu li:hover {
      background: #f1f5f9;
      color: #2563eb;
    }

    .menu li.active {
      background: #eff6ff;
      font-weight: 600;
      color: #2563eb;
    }

    /* Main content */
    .content {
      flex: 1;
      padding: 40px;
      margin-left: 280px;
      width: calc(100% - 280px);
    }

    .card {
      border: 2px dashed #dbeafe;
      /* background: #f8fafc; */
      padding: 50px 40px;
      text-align: center;
      border-radius: 16px;
      max-width: 700px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }

    .card:hover {
      border-color: #93c5fd;
      /* background: #f0f7ff; */
    }

    .card img {
      /* width: 70px;
      margin-bottom: 20px;
      margin-left:280px;
      opacity: 0.8; */
      display: block;
      margin: 0 auto 20px;
    }

    .card h3 {
      font-size: 24px;
      margin-bottom: 15px;
      color: #1e293b;
    }

    .card p {
      color: #64748b;
      font-size: 16px;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .btn {
      padding: 12px 28px;
      width: 200px;
      height: 50px;
      border: none;
      background: #032163;
      color: #fff;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      margin-left:200px;
      align-items: center;
      box-shadow: 0 4px 6px rgba(59, 130, 246, 0.2);
    }

    .btn i {
      margin-right: 3px;
    }

    .btn:hover {
      color: #fff;
      background: #2456bf;
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(59, 130, 246, 0.3);
    }

    /* Responsive design */
    @media (max-width: 900px) {
      .sidebar {
        width: 220px;
      }
      
      .content {
        margin-left: 220px;
        width: calc(100% - 220px);
      }
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }
      
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        border-right: none;
        border-bottom: 1px solid #e2e8f0;
      }
      
      .content {
        margin-left: 0;
        width: 100%;
      }
    }
  </style>
</head>

<body >
    <!-- Sidebar -->
    <div class="dashboard-wrapper">
       <!-- main content Add publication file -->
      <main class="content">
        <div class="card">
          <img src="https://img.icons8.com/ios/100/1e40af/document--v1.png" alt="document">
          <h3>Add your publication</h3>
          <p>Add your publication to increase the visibility of your research. Once you've added them, your publications will be listed here.</p>
          <a href="/addresearch" class="btn">
            <i class="fas fa-plus"></i>
            <span>Add a publication</span>
          </a>
        </div>
      </main>
    </div>
    <script>
        // Sidebar active link toggle
    const menuItems = document.querySelectorAll('.menu li');

    menuItems.forEach(item => {
      item.addEventListener('click', () => {
        document.querySelector('.menu li.active')?.classList.remove('active');
        item.classList.add('active');
      });
    });

    function addPublication() {
      alert("Add publication functionality will go here.");
    }
    </script>
</body>
</html>