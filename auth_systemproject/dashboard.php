<?php
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/config.php'; // DB connection
require_login(); // Protect the page

// Pagination settings
$limit = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Search filter
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$searchParam = "%$search%";

// Count total records with search
if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name LIKE :search OR email LIKE :search");
    $stmt->execute(['search' => $searchParam]);
} else {
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
}
$total_records = $stmt->fetchColumn();
$total_pages = ceil($total_records / $limit);

// Fetch paginated results with search
if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE name LIKE :search OR email LIKE :search ORDER BY id DESC LIMIT :offset, :limit");
    $stmt->bindValue(':search', $searchParam, PDO::PARAM_STR);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
} else {
    $stmt = $pdo->prepare("SELECT id, name, email FROM users ORDER BY id DESC LIMIT :offset, :limit");
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
}
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
<style>
  .pagination a {
    padding: 5px 10px;
    border: 1px solid #ccc;
    margin: 0 2px;
    text-decoration: none;
}
.pagination a.active {
    font-weight: bold;
    background: #eee;
}
</style>
</head>
<body>
<header class="topbar">
  <div class="brand">My App</div>
  <nav>
    <span class="user">Hello, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
    <a class="btn" href="logout.php">Logout</a>
  </nav>
</header>

<main class="container">
  <?php render_flashes(); ?>
  <section class="grid">
    <div class="panel">
      <h2>Welcome 🎉</h2>
      <p>You are logged in as <strong><?= htmlspecialchars($_SESSION['user_email']) ?></strong>.</p>
      <p class="muted">This page is protected. Session auto-expires after <?= (int)(SESSION_TIMEOUT/60) ?> minutes of inactivity.</p>
    </div>

    <!-- Search Box -->
    <div class="panel">
      <h3>User List</h3>
      <form method="get" action="dashboard.php">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search name or email">
        <button type="submit">Search</button>
      </form>

      <!-- User Table -->
      <table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
        <?php if ($users): ?>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['id']) ?></td>
              <td><?= htmlspecialchars($user['name']) ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">No users found</td></tr>
        <?php endif; ?>
      </table>

      <!-- Pagination Links -->
      <div style="margin-top:10px;">
        <?php if ($page > 1): ?>
          <a href="?page=<?= $page-1 ?>&search=<?= urlencode($search) ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" <?= ($i == $page) ? 'style="font-weight:bold;"' : '' ?>>
            <?= $i ?>
          </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <a href="?page=<?= $page+1 ?>&search=<?= urlencode($search) ?>">Next</a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
</body>
</html>

