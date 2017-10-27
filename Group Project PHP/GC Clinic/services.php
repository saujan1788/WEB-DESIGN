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
    <meta name="viewport" content="initialscale=1.0, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style_consultation.css" />
    <link rel="stylesheet" href="style.css">

    <title>Practical 2</title>
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

        <div id="main-nav">
            <nav id="menu" role="navigation">
                <div class="brand">GC Clinic</div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#">Services</a></li>
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
                <span class="main-logo"></span>
                <div class="nav-button">
                <?php require 'php-modules/buttons.php'; ?>
                </div>
            </div>
        </div>



    <div class="heading">
        <h1>SERVICES</h1>
        <hr>
    </div>








    <section id="section-1" class="section">



        <a id="btn-sign" class="box" href="#"><i  class="fa fa-heartbeat" style="font-size:100px;color:#B22222;" aria-hidden="true"></i></a>
        <h2 class="hdg1">&nbsp;Cardic Care&nbsp;</h2>



    </section>

    <section id="section-2" class="section">

        <a id="btn-sign1" href="#" class="box"><i class="fa fa-eye" style="font-size:100px;color:#708090;" aria-hidden="true"></i></a>
        <h2 class="hdg1">&nbsp;Eye Care&nbsp;</h2>

    </section>


    <section id="section-3" class="section">

        <a id="btn-sign2" href="#" class="box"><i class="fa fa-wheelchair-alt" style="font-size:100px;color:#008B8B

;" aria-hidden="true"></i></a>
        <h2 class="hdg1">&nbsp;Orthopedics&nbsp;</h2>

    </section>

    <section id="section-4" class="section">

        <a id="btn-sign3" href="#" class="box"><i class="fa fa-stethoscope" style="font-size:100px;color:#008B8B;" aria-hidden="true"></i></a>
        <h2 class="hdg1">&nbsp;Regular Checkup&nbsp;</h2>


    </section>

<div class="modal-overlay1">
        <div class="modal1">
            <a class="close-modal1">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="modal-content1">
                        <h2 class="modalh2"> Cardiac Care</h2>
                        <p> At GC, not only consultations on cardiovascular disease prevention are available, we also take care of patients with cardiovascular disorders like:<br>

Refractory hypertension<br>
Lipid disorder<br>
Diabetic heart disease<br>
Pregnancy-related cardiovascular disease<br>
Adult & pediatric congenital heart disease<br>
Palpitation and arrhythmias<br>
Heart failure<br>
Valvular heart disease<br>
Coronary atherosclerotic disease<br>
Heart attack<br>
We also offer post-cardiac surgery and pacemaker/defibrillator care<br><p>

            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>




    <div class="modal-overlay2">
        <div class="modal2">
            <a class="close-modal2">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="modal-content2">
                        <h2 class="modalh2"> Eye Care</h2>
                        <p>The GC Clinic Ophthalmology Department has the expertise and the equipment to treat a wide range of patients with various types of vision impairment including short and long sightedness, astigmatism, Keratoconus, diabetic retinopathy and age-related macular degeneration. </p>
                        <p>These improvements are brought about through laser surgery, refractive surgery and the Kamra Inlay procedure. The Department has some of the best and most experienced Consultant Ophthalmologists and Consultant Ophthalmic surgeons in Ireland. This group of specialists has links with the The Royal Victoria Eye and Ear Hospital, St. Vincent’s University Hospital, The Royal College of Surgeons and Our Lady’s Hospital for Sick Children in Crumlin.</p>
                        <p>Each specialist focuses on international developments in treatment and equipment and the lasers in the Eye Department are the most up to date available on the global ophthalmic surgical market.</p>

            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>
    <!-- overlay -->

    <div class="modal-overlay3">
        <div class="modal3">
            <a class="close-modal3">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="modal-content3">
                        <h2 class="modalh2"> Orthopaedics</h2>
                        <p>BGC Clinic has an unrivalled reputation for its pioneering new Orthopaedic procedures and its Orthopaedic surgeons who are constantly researching and regularly bringing some of the newest Orthopaedic techniques to Ireland</p>
                        <p>The Orthopaedic department has 19 consultant Orthopaedic and Spinal surgeons who work as a cohesive group under the current chairmanship of Mr Fintan Doyle. The team has a crucial mix of seniority, public and private experience and highly regarded reputations, complemented by international research and experience, which is being put to use in GC Clinic.</p>
                        <p>Our services include:<br>
                        - Hip <br>
                        - Spine <br>
                        - Knee <br>
                        - Shoulder <br>
                        - Elbow, Hand & Wrist <br>
                        - Foot & Ankle <br>
                        - Trauma  
                        </p>

            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>
    <!-- overlay -->

    <div class="modal-overlay4">
        <div class="modal4">
            <a class="close-modal4">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="modal-content4">
        
                        <h2 class="modalh2">Regular Check-up</h2>
                        <p> Our regular health exams and tests can help find problems before they start. They also can help find problems early, when your chances for treatment and cure are better. By getting the right health services, screenings, and treatments, you are taking steps that help your chances for living a longer, healthier life. Your age, health and family history, lifestyle choices (i.e. what you eat, how active you are, whether you smoke), and other important factors impact what and how often you need healthcare.<p>


            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>
    <!-- overlay -->

    <?php require 'php-modules/modal.php' ?>



        <?php require 'php-modules/footer.php' ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/main-js.js"></script>




</body>


</html>
