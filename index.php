<?php

require "mail.php";

function validate($name, $email, $subject, $message)
{
  return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
};

$status = "";

if (isset($_POST["form"])) {

  if (validate($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {

    // Sanitizando los datos
    $name = htmlentities($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $body = "La persona $name con el correo $email te envía un mensaje: <br><br>
      $message
    ";

    sendMail($email, $name, $subject, $body, true);

    $status = "success";
  } else {
    $status = "error";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="./css/style.css" />
  <script
    src="https://kit.fontawesome.com/0dc147bb84.js"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php if ($status === "error") : ?>
    <div class="alert danger">
      <span>Error sending email!</span>
    </div>
  <?php endif; ?>

  <?php if ($status === "success") : ?>
    <div class="alert success">
      <span>Email sent success!</span>
    </div>
  <?php endif; ?>

  <div class="form-container">
    <h1>Contact Me!</h1>
    <form action="./" method="post">
      <div class="input-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
      </div>

      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" />
      </div>

      <div class="input-group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" />
      </div>

      <div class="input-group">
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="5"></textarea>
      </div>

      <div class="button-container">
        <button name="form" type="submit">Send Email</button>
      </div>
    </form>


    <div class="contact-info">
      <div class="info">
        <i class="fa-solid fa-location-dot"></i>
        <span>Col. Salsburgo</span>
      </div>
      <div class="info">
        <i class="fa-solid fa-phone"></i>
        <span>+### 3322-1100</span>
      </div>
    </div>
  </div>
</body>

</html>