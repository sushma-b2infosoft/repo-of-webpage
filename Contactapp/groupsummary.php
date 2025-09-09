<?php include 'db.php'; ?>

<h2>Contact Count per Group</h2>
<table border="1">
  <tr>
    <th>Group Name</th>
    <th>Total Contacts</th>
  </tr>

<?php
$sql = "SELECT groups.group_name, COUNT(contacts.id) as total_contacts
        FROM groups
        LEFT JOIN contacts ON contacts.group_id = groups.id
        GROUP BY groups.id";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()):
?>
  <tr>
    <td><?= htmlspecialchars($row['group_name']) ?></td>
    <td><?= $row['total_contacts'] ?></td>
  </tr>
<?php endwhile; ?>
</table>
