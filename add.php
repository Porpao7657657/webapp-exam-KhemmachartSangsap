<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $image = $_FILES['profile_image']['name'];
    move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/".$image);

    $sql = "INSERT INTO students (student_id, full_name, email, class, profile_image)
            VALUES ('$student_id', '$full_name', '$email', '$class', '$image')";
    $conn->query($sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มนักเรียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-4">
<h2>เพิ่มนักเรียน</h2>
<form method="POST" enctype="multipart/form-data">
    <input name="student_id" placeholder="รหัสนักเรียน" class="form-control mb-2" required>
    <input name="full_name" placeholder="ชื่อ-นามสกุล" class="form-control mb-2" required>
    <input name="email" type="email" placeholder="Email" class="form-control mb-2" required>
    <input name="class" placeholder="ห้องเรียน" class="form-control mb-2" required>
    <input name="profile_image" type="file" class="form-control mb-3">
    <button class="btn btn-success">บันทึก</button>
    <a href="index.php" class="btn btn-secondary">ย้อนกลับ</a>
</form>
</body>
</html>