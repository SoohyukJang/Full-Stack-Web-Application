<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Help ∙ Instakilogram</title>
      <link rel="stylesheet" href="cookie.css">
      <link rel="stylesheet" href="style/common.css">
      <link rel="stylesheet" href="style/header_footer.css">
      <link rel="stylesheet" href="style/footer_etc.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <?php if(isset($_SESSION['UserData']['Useremail'])){ 
            include_once'header_login.php';
          } else {
            include_once'header_notlogin.php';} ?>
    <main>

      <!-- This page is referenced
          How to report things | Instagram – accessed 15 May 2022. https://help.instagram.com/2922067214679225/?helpref=hc_fnav -->

      <div class="citation">
        <h3>Please notice that this is referenced</h3>
        <h3>How to report things | Instagram – accessed 15 May 2022. https://help.instagram.com/2922067214679225/?helpref=hc_fnav</h3>
      </div>

      <div class="container_etc">
        <h3>How to report things</h3>
        <p>The best way to report abusive content or spam on Instagram is by using the Report link near the content itself. Below are some examples of how you can report content to us. Learn more about reporting abuse.</p>
        <p>Bear in mind that your report is anonymous, except if you're reporting an intellectual property infringement. The account you reported won't see who reported them.</p>
      </div>

    </main>
    <?php include_once'footer.php';?>
  </body>
</html>