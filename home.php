<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Initialize $success_msg to an empty string
$success_msg = '';
if (isset($_SESSION['success_msg'])) {
    $success_msg = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-based Website for Workout and Diet Planner</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Scribble&display=swap">
    <script
src="https://www.chatbase.co/embed.min.js"
chatbotId="3c1RJzQAWNbIf4RxEdf4y"
domain="www.chatbase.co"
defer>
</script>

   
</head>
<body>

    <!-- Alert Message -->
    <?php if ($success_msg): ?>
        <div class="alert-msg" id="alert-msg"><?php echo htmlspecialchars($success_msg, ENT_QUOTES, 'UTF-8'); ?></div>
        <script>
            document.getElementById('alert-msg').style.display = 'block';
            setTimeout(function() {
                document.getElementById('alert-msg').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>

    <!-- Navigation Bar -->
    <header id="topmain">
        <div id="logo">
            <img src="logofit.png" alt="Logo">
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="plan.html">Planner</a>
            <a href="calci.html">Calculators</a>
            <a href="profile.php">Profile</a>
            <a href="dashboard.html">Dashboard</a>
        </nav>
        <form action="logout.php" method="POST">
            <button class="logout-btn">Logout</button>
        </form>
    </header>

    <!-- Header Section -->
    <div id="hc">
        <div>
            <h2 id="haed">Welcome To Fitness Planner</h2>
            <h2 id="haed">Create Your Own </h2>
            <h3 id="head2">Workout And Diet Planner</h3>
           <!-- <a href="plan.html"> <h3 id="head3">Start Your Fitness Journey Today!</h3></a> -->
         <a href="plan.html"> <button style="background-color: #673ab7; border: none; color: white; padding: 15px 32px; font-size: 16px; cursor: pointer; border-radius: 8px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
  Start Your Fitness Journey Today!
  <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.3); transform: skewX(-45deg); transition: 0.5s;"></span>
</button></a>

<style>
button:hover {
  box-shadow: 0 6px 0 #217a36;
  transform: translateY(-2px);
}
</style>


        </div>
        <div class="image-container">
            <img src="p1.png" alt="Fitness Image">
        </div>
    </div>

    <hr>


<!-- MID CONTENT -->
 <div id="mid-content">
    <H3>What is Customized Workout And Diet Planner?</H3>
    <P text-align="left">
The workout planner is a web-based app that allows you to create a custom workout plan based on the Your own PReferences. <br> If you think creating your own workout plan is too hard, we’re here to tell you it’s not.<br> We’ll help you create a custom workout plan step-by-step!</P>
 </div>

 <hr>


    <!-- Main Content -->
    <section class="container">
        <H1></H1>
        <div class="text-content">
            <h1>Features of Our Planner</h1>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-dumbbell"></i>
                    <div>
                        <h3>Custom Workout Plans</h3>
                        <p>Create your exercise and diet routines customised to you</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-apple-alt"></i>
                    <div>
                        <h3>Personalized Diet Plans</h3>
                        <p>Get meal suggestions based on your dietary needs and fitness goals.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-calendar-alt"></i>
                    <div>
                        <h3>Optional Workouts</h3>
                        <p>Options for different types of fitness goals and requirements.</p>
                    </div>
                </div>
                 
                <div class="feature">
                <i class="fas fa-download"></i>
                      
                    <div>
                        <h3>Downloadable Plans:</h3>
                      p>Users can download their customized plans in a non-editable format.</p>
                    </div>
            </div>
        </div>
        </div>
        <div class="image-container">
            <img src="p2_prev_ui.png" alt="Fitness Image">
        </div>
    </section>
    <hr>
   <h2> Choice Based Gym Workouts </h2><hr>
    <!-- cards section -->
    <div id="cards">
        <div class="div_card">
        <a href="absbeginer.html">Abs Beginner</a>
            <img  class="div_image" src="abs1.jpg" alt="Abs Beginner">
           
        </div>
        <div class="div_card">
            <a href="chestbeginer.html">Chest Beginner</a>
            <img src="chest.png.jpg" alt="" class="div_image">
        </div>
        <div class="div_card">
            <a href="armbeginer.html">Arm Beginner</a>
            <img src="fullbody.jpg" alt="" class="div_image">
        </div>
        <div class="div_card">
            <a href="legbeginer.html">Leg Beginner</a>
            <img src="leg.jpg" alt="" class="div_image">
        </div>
        <div class="div_card">
            <a href="shoulderandbackbeginer.html">Shoulder & Back</a>
            <img class="div_image" src= "sholderback.jpg" alt="">
        </div>
        <div class="div_card">
            <a href="fullbodychallenge.html">Full Body Challenge</a>
            <img src="fullbody2.jpg" alt="" class="div_image">
        </div>
    </div>

    <!-- Footer Section -->
    <footer id="footer">
        <div class="footer__container">
            <div id="logo">
                <img src="logofit.png" alt="Logo of Fitness Planner Website">
            </div><div>
            <div class="footer__links">
                <h3>Quick Links</h3>
                <a href="home.php">Home</a>
                <a href="plan.html">Planner</a>
                <a href="calci.html">Calculators</a>
                <a href="profile.php">Profile</a>
                <a href="view_content.php">News And Articles</a>
               
            </div>
            </div>
            <div class="footer__about">
                <h3>About the Website</h3>
                <p>"We provide personalized workout plans and nutrition guidance to make fitness enjoyable and effective. Your journey to a healthier, active lifestyle starts here with us."</p>
            </div>
            <div class="footer__useful-links">
                <h3>Useful Links</h3>
                <a href="#">Blog</a>
                <a href="pp.html">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
            <div class="footer__contacts">
                <h3>Contact Us</h3>
                <a href="mailto:fitnessplanner9@gmail.com"><i class="fas fa-envelope"></i> mail@fitnessplanner9@gmail.com</a>
               <br> <a href="contactus.html">Contact Us</a>
            </div>
            <div class="footer__up"></div>
                <a href="#" class="up-button">
                    <i class="fas fa-arrow-up"></i>
                </a>
            </div>
           
            
        </div>
        <div class="footer__copyright">
            <hr>
            <p>&copy; 2024 Fitness Planner. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Smooth Scroll to Top
        document.querySelector('.up-button').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

</body>
</html>
