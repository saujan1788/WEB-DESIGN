<?php 
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();

//Share session_start on all pages
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Resources</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
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
                <nav id="menu" role="navigation">
                <div class="brand">GC Clinic</div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="fee.php">Consultation Fees</a></li>
                    <li><a href="#">Resources</a></li>
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
                <span class="main-logo"></span>
                <div class="nav-button">
                <?php require 'php-modules/buttons.php'; ?>
                </div>
            </div>
        </div>
    <div class="heading">
        <h1>RESOURCES</h1>
        <hr>
    </div>

    <section class="panel section-2">
        <div class="about-us">
            <h1 class="abouth1">Cardiac Care</h1>
            <div class="aboutp">
                <p>Cardic care is really important as it is the thing that can't wait.
                As the center focus of cardiology, the heart has numerous anatomical features (e.g., atria, ventricles, heart valves) and numerous physiological features (e.g., systole, heart sounds, afterload) that have been encyclopedically documented for many centuries. Disorders of the heart lead to heart disease and cardiovascular disease and can lead to a significant number of deaths: cardiovascular disease is the leading cause of death.The heart is a muscle that squeezes blood and functions like a pump. Each part of the heart is susceptible to failure or dysfunction and the heart can be divided into the mechanical and the electrical parts.</p>
                <img src="images/cardiac.jpg" alt="">
                <p>The electrical part of the heart is centered on the periodic contraction (squeezing) of the muscle cells that is caused by the cardiac pacemaker located in the sinoatrial node. The study of the electrical aspects is a sub-field of electrophysiology called cardiac electrophysiology and is epitomized with the electrocardiogram (ECG/EKG). The action potentials generated in the pacemaker propagate throughout the heart in a specific pattern. The system that carries this potential is called the electrical conduction system. Dysfunction of the electrical system manifests in many ways and may include Wolff–Parkinson–White syndrome, ventricular fibrillation, and heart block.</p>
                <p>The mechanical part of the heart is centered on the fluidic movement of blood and the functionality of the heart as a pump. The mechanical part is ultimately the purpose of the heart and many of the disorders of the heart disrupt the ability to move blood. Failure to move sufficient blood can result in failure in other organs and may result in death if severe. Heart failure is one condition in which the mechanical properties of the heart have failed or are failing, which means insufficient blood is being circulated.</p>
                <a href="#" class="resource-links">Learn more<span class="resource-links-span"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
            </div>
        </div>
    </section>


    <section class="panel section-2">
        <div class="about-us">
            <h1 class="abouth1">Oral Health</h1>
            <div class="aboutp">
                <p>Taking good care of your mouth, teeth and gums is a worthy goal in and of itself. Good oral and dental hygiene can help prevent bad breath, tooth decay and gum disease—and can help you keep your teeth as you get older.</p>
                                <img src="images/oral.jpg" alt="">

                <p>Researchers are also discovering new reasons to brush and floss. A healthy mouth may help you ward off medical disorders. The flip side? An unhealthy mouth, especially if you have gum disease, may increase your risk of serious health problems such as heart attack, stroke, poorly controlled diabetes and preterm labor.</p>
                <p>The case for good oral hygiene keeps getting stronger. Understand the importance of oral health — and its connection to your overall health.
</p>
                <a href="#" class="resource-links">Learn more<span class="resource-links-span"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
            </div>
        </div>
    </section>

        
    <section class="panel section-2">
        <div class="about-us">
            <h1 class="abouth1">Eye Care</h1>
            <div class="aboutp">
                <p>Low vision and blindness have dire effects on individuals, families, and communities. These effects range from a decrease in quality of life and increased mortality to large-scale economic consequences. Culturally, there is often a stigma associated with blindness, further alienating the afflicted from their communities.(1) Social disadvantages are also enormous: 50% of the blind in impoverished countries report a loss of social standing and decision-making authority, and 80% of blind women note a loss of authority within their families.(2) Fortunately, there is hope that we can reverse these devastating impacts, as long as the medical community continues to increase access to surgery and care.</p>
                <img src="images/eye.jpg" alt="">

                <p>Routine eye exams are important — regardless of your age or your physical health.

During a comprehensive eye exam, your eye doctor does much more than just determine your prescription for eyeglasses or contact lenses. He or she will also check your eyes for common eye diseases, assess how your eyes work together as a team and evaluate your eyes as an indicator of your overall health.

Also, eye doctors often are the first health care professionals to detect chronic systemic diseases such as high blood pressure and diabetes.</p>
                <a href="#" class="resource-links">Learn more<span class="resource-links-span"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
            </div>
        </div>
    </section>


    <?php require 'php-modules/modal.php' ?>

        <?php require 'php-modules/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/main-js.js"></script>
</body>

</html>
