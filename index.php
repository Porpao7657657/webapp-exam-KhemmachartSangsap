<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>รายชื่อนักเรียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-4">
<h2>รายชื่อนักเรียน</h2>
<a href="add.php" class="btn btn-success mb-3">เพิ่มนักเรียน</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th><th>รหัสนักเรียน</th><th>ชื่อ-นามสกุล</th><th>Email</th><th>ห้อง</th><th>โปรไฟล์</th><th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM students");
    while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><img src="uploads/<?= htmlspecialchars($row['profile_image']) ?>" width="100"></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ลบจริงหรือไม่?')">ลบ</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>