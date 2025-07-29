<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $image = $student['profile_image'];

    if ($_FILES['profile_image']['name']) {
        $image = $_FILES['profile_image']['name'];
        move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/".$image);
    }

    $sql = "UPDATE students SET student_id='$student_id', full_name='$full_name', email='$email', class='$class', profile_image='$image' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>แก้ไข</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
<h2>แก้ไขนักเรียน</h2>
<form method="POST" enctype="multipart/form-data">
    <input name="student_id" value="<?= $student['student_id'] ?>" class="form-control mb-2" required>
    <input name="full_name" value="<?= $student['full_name'] ?>" class="form-control mb-2" required>
    <input name="email" value="<?= $student['email'] ?>" class="form-control mb-2" required>
    <input name="class" value="<?= $student['class'] ?>" class="form-control mb-2" required>
    <p>ปัจจุบัน: <img src="uploads<?= $student['profile_image'] ?>" width="60"></p>
    <input name="profile_image" type="file" class="form-control mb-3">
    <button class="btn btn-primary">อัปเดต</button>
    <a href="index.php" class="btn btn-secondary">ย้อนกลับ</a>
</form>
</body></html>