<?php // about.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Library System</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
   body {
        font-family: 'Inter', 'Poppins', sans-serif;
        background: #9ca7b8ff;
        color: #333;
        
    }

    /* Hero Section */
    .hero {
 
      color: #010101ff;
      padding: 80px 20px;
      text-align: center;
      border-radius: 0 0 30px 30px;
    }
    .hero h1 {
      font-weight: 700;
      font-size: 40px;
    }
    .hero p {
      font-size: 18px;
      opacity: 0.9;
    }

    /* About Section */
    .about-section img {
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .about-section p {
      font-size: 17px;
      line-height: 1.7;
      color: #333;
    }

    /* Director Section */
    .director-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 25px rgba(0,0,0,0.1);
      padding: 30px;
      transition: transform 0.3s ease-in-out;
    }
    .director-card:hover {
      transform: translateY(-8px);
    }
    .director-card img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 5px solid #d0ddebff;
    }
    .director-card h5 {
      font-weight: 700;
      margin-top: 10px;
    }
    .director-card p {
      font-size: 15px;
      color: #555;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<?php include("includes/header.php");?>

<!-- Hero Section -->
<section class="hero">
  <div class="container">
    <h1><b>About Our Library</b></h1>
    <p>Empowering Students and Faculty with Knowledge & Digital Resources</p>
  </div>
</section>

<!-- About Section -->
<section class="py-5 about-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="images/photo7.jpg" alt="Library" class="img-fluid">
      </div>
      <div class="col-md-6">
        <p class="lead">
          Our library is one of the finest digital and physical knowledge centers designed to support 
          students and faculty. We provide thousands of books, important question banks, and exam papers 
          to help students excel in their academics. The library system also enables online access to 
          PDFs and digital resources for remote learning.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Director Section -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5"><b>Meet Our Director</b></h2>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="director-card text-center">
          <img src="uploads/director.jpg" alt="Library Director">
          <h5>Mr. Dharam Sir</h5>
          <p class="text-muted">Library Director</p>
          <p>
            Dr. Rajesh Kumar has been leading the library for over 15 years. With a passion for books and 
            education, he has modernized the library system, ensuring that students and faculty have 
            seamless access to resources both online and offline.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br><hr>
<?php include("includes/footer.php");?>

<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
