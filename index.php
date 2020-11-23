<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
  </head>
  <style media="screen">
  body{
    background-color: #e6e6e6;
  }
  </style>
  <body>
          <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <h4 class="text-white">Anas's kitchen</h4>
            <span class="text-muted">Where taste meets the myth.</span>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>

      <div class="container">
        <!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" required>
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" id="email" name="email" class="form-control" required>
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                            <label for="phone" class="">Your phone</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                          <select class="browser-default custom-select" name="plate" required>
                            <option selected disabled>Menu of the day</option>
                            <?php
                                require('config.php');
                                $sql = "SELECT plate FROM plates ORDER BY RAND() LIMIT 3";
                                $result = $conn->query($sql);
                                while($plate = $result->fetch_assoc() ) {?>
                                <option value="<?php echo $plate['id'] ?>"><?php echo $plate['plate'] ?></option>
                            <?php }?>
                          </select>
                        </div>

                    </div>
                </div>

                <input class="btn btn-primary" type="submit" name="order" value="Order">

            </form>

        </div>
        <!--post-->

        <?php
        if (isset($_POST['order'])){

          echo "name : ".$_POST['name'].", email : ".$_POST['email'].", plate : ".$_POST['plate'].", message : ".$_POST['message'].".";

          require_once('phpmailer/PHPMailerAutoload.php');

          $mail = new PHPMailer;
          $mail->isSMTP();
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'ssl';
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = '465';
          $mail->isHTML();
          $mail->Username = 'anasbenziti@gmail.com';
          $mail->Password = '*********';
          $mail->SetFrom('no-reply@anas.com');
          $mail->Subject = 'Order';
          $mail->Body = '<h1 align=center>'.$_POST['name'].','.$_POST['email'].','.$_POST['phone'].', Just ordred '.$_POST['plate'].'and said'.$_POST['message'].'</h1>';
          $mail->AddAddress('benzitianas@gmail.com');

          $mail->Send();



        }




        ?>


    </div>

</section>
<!--Section: Contact v.2-->
      </div>
  </body>
</html>
