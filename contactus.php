<?php
session_start();
include("includes/config.php"); // Database connection

$success = "";
$error = "";

// Check if form is submitted
if(isset($_POST['send_message'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert message into contact_messages table
    $sql = "INSERT INTO contact_messages (name, email, message, created_at) 
            VALUES ('$name','$email','$message',NOW())";

    if(mysqli_query($conn, $sql)){
        $success = "Your message has been sent successfully!";
    } else {
        $error = "Failed to send message: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Library Management System</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
  .buttonn
{
    color: black;
    background-color: aqua;
    border: none;
    border-radius:30px;
    height: 40px;
    width: 200px;
}
.card-body
{
background: linear-gradient(135deg, rgba(152, 163, 166, 1), rgba(174, 215, 210, 1));
border:none;

}
</style>
</head>
<body>
<?php include("includes/header.php");?>
<!-- Contact Section -->
<div class="container my-5">
  <div class="row">
    <!-- Contact Info -->
    <div class="col-lg-5 mb-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h3 class="card-title mb-3"><i class="bi bi-telephone-fill me-2"></i> <b>Contact Information</b></h3>
          <p><i class="bi bi-geo-alt-fill text-danger me-2"></i> Government Polytechnic Collage Mirzapur (UP)</p>
          <p><i class="bi bi-envelope-fill text-primary me-2"></i> supportgpm321@library.com</p>
          <p><i class="bi bi-telephone-fill text-success me-2"></i> +91 7753892225</p>
          <div class="mt-3">
            <a href="#" class="me-3"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="me-3"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="col-lg-7 mb-4">
      <div class="card  ">
        <div class="card-body">
          <h3 class="card-title mb-3"><i class="bi bi-chat-dots-fill me-2"></i> Contact To Library Head.</h3>
          <form method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Write your message here..." required></textarea>
            </div>
            <button type="submit" name="send_massage" class="buttonn">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
<hr>
<?php include("includes/footer.php");?>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
