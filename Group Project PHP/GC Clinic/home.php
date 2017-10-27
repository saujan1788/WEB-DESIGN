<?php 
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();

//Share session_start on all pages
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Clinic</title>
</head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'php-modules/login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'php-modules/register.php';
        
    }
}
?>
<body>
    <section class="panel section-1">
        <div id="main-nav">
            <nav id="menu" role="navigation">
                <div class="brand">GC Clinic</div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="fee.php">Consultation Fees</a></li>
                    <li><a href="resource.php">Resources</a></li>
                    <li><a href="appointment.php">Appointments</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="page-wrap">
                <div id="menu-toggle">
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="nav-button button-toggle button-toggle2">
                <?php require 'php-modules/buttons.php'; ?>
                </div>
            </div>
        </div>
        <div class="main-bg">
            <h1 class="tagline">Providing You With Affordable Healthcare<br>
  Prioritising Prevention<br>
  Improving Your Quality of Life
  </h1>
        </div>
    </section>
    <section class="panel section-2">
        <div class="about-us">
            <h1 class="abouth1">About Us</h1>
            <div class="aboutp">
                <p>GC Clinic is the leading and longest established private hospital and clinic in Ireland.  Since it opened in the mid 1980s, the Clinic has consistently built an unparalleled reputation in new high-tech surgical procedures, medical treatments and ground-breaking diagnostics. This reputation means that some of the best international and national consultants work at GC Clinic.</p>
                <p>GC Clinic has been recognised for over ten years by the Joint Commission International (JCI) which accredits only hospitals that raise safety and quality of care standards to the highest levels.  We were one of the first hospitals in Ireland to attain this international recognition.</p>
                <p>GC Clinic is a progressive and pioneering hospital in which care for the patient is central to everything we do.</p>
            </div>
        </div>
    </section>
    <div id="flex-split">
        <div class="split-col">
            <section>
                <article class="split-1">
                </article>
                <aside class="split-one">
                    <div class="aside-text">
                        <h1>Best In Class Healthcare</h1>
                        <p>Patient outcomes at GC Clinic are very positive. We follow the progress of patients from the beginning of their journey with us and many of our outcomes outstrip international standards. We are also the first hospital to provide treatment in single-patient rooms, thus reducing the risk of hospital acquired infections.  This is something on which we are very proactive and there’s more information in the Infection Prevention and Control section on this site.</p>
                        <p>At GC Clinic we are constantly striving to enhance the patient experience. This means we monitor, measure and benchmark aspects of the hospital to ensure that in many instances our services and patient outcomes exceed standards set by European and international monitoring bodies. Achieving Joint commission International (JCI) accreditation is a strong validation that a hospital has taken the extra steps to meet a high level of safety and quality.  Retaining the accreditation means that we at GC Clinic constantly push our teams to ensure patient safety is central to our work and achieve the best possible outcomes for every patient in our care.</p>
                    </div>
                </aside>
            </section>
        </div>
        <section>
            <article class="split-2">
            </article>
            <aside class="split-two">
                <div class="aside-text">
                    <h1>Our Doctors are Qualified Professionals</h1>
                    <p>To ensure that proper health care is met, on admission an individualised Care Plan is prepared by our qualified team. We review each patient's care plan on a quarterly basis with our doctors, nurses and care staff to ensure our patients get the right care.

                    A large part of our emphasis in developing The GC Clinic has been on enhancing the range of services and quality of care available to patients of our established General Practice. The Doctors and Staff of GC Clinic invite you to experience our holistic approach to General Practice of which we are very proud. Our aim is to work with you to keep you as healthy as possible in mind and body by the early detection and prevention of disease. Our goal is to provide the highest quality medical care to you and your family from the point where you might think about becoming pregnant to your golden years.</p>
                    <p>GC Clinic started as a small, single handed general practice in 1990, providing the highest quality of care to the people of South Dublin and surrounding areas. Over the years we have grown into a multi-doctor, multi–disciplinary group practice, with a wide range of specialist and ancillary services, while maintaining our commitment to excellence in patient care.

                    The GC Clinic has been selected as a teaching practice by all three universities in Dublin and we help in training medical students from U.C.D., Trinity and the Royal College of Surgeons.
                     </p>
                </div>
            </aside>
        </section>
    </div>


    <?php require 'php-modules/modal.php' ?>
    

    <?php require 'php-modules/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/main-js.js"></script>
</body>

</html>
