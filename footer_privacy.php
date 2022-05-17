<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Privacy ∙ Instakilogram</title>
      <link rel="stylesheet" href="cookie.css">
      <link rel="stylesheet" href="style/common.css">
      <link rel="stylesheet" href="style/header_footer.css">
      <link rel="stylesheet" href="style/footer_privacy.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <?php if(isset($_SESSION['UserData']['Useremail'])){ 
            include_once'header_login.php';
          } else {
            include_once'header_notlogin.php';} ?>
    <main>

      <!-- This page is referenced
          Data Policy | Instagram – accessed 15 May 2022. https://help.instagram.com/519522125107875 -->

      <div class="citation">
        <h3>Please notice that this is referenced</h3>
        <h3>Data Policy | Instagram – accessed 15 May 2022. https://help.instagram.com/519522125107875</h3>
      </div>

      <div class="container_etc">
        <h3>Data Policy</h3>
        <p>This policy describes the information that we process to support Facebook, Instagram, Messenger and other products and features offered by Meta Platforms, Inc. (Meta Products or Products). You can find additional tools and information in the Facebook settings and Instagram settings.</p>

        <p>To provide the Meta Products, we must process information about you. The type of information that we collect depends on how you use our Products. You can learn how to access and delete information that we collect by visiting the Facebook settings and Instagram settings.</p>
        <p>Things that you and others do and provide.</p>

        <ul>
          <li>Information and content you provide. We collect the content, communications and other information you provide when you use our Products, including when you sign up for an account, create or share content and message or communicate with others. This can include information in or about the content that you provide (e.g. metadata), such as the location of a photo or the date a file was created. It can also include what you see through features that we provide, such as our camera, so we can do things such as suggest masks and filters that you might like, or give you tips on using camera formats. Our systems automatically process content and communications that you and others provide to analyse context and what's in them for the purposes described below. Learn more about how you can control who can see the things you share.</li>
          <li>Data with special protections: You can choose to provide information in your Facebook profile fields or life events about your religious views, political views, who you are "interested in" or your health. This and other information (such as racial or ethnic origin, philosophical beliefs or trade union membership) could be subject to special protections under the laws of your country.</li>
          <li>Networks and connections. We collect information about the people, accounts, hashtags, Facebook groups and Pages that you are connected to and how you interact with them across our Products, such as people you communicate with the most or groups that you are part of. We also collect contact information if you choose to upload, sync or import it from a device (such as an address book or call log or SMS log history), which we use for things such as helping you and others find people you may know and for the other purposes listed below.</li>
          <li>Your usage. We collect information about how you use our Products, such as the types of content that you view or engage with, the features you use, the actions you take, the people or accounts you interact with and the time, frequency and duration of your activities. For example, we log when you're using and have last used our Products, and what posts, videos and other content you view on our Products. We also collect information about how you use features such as our camera.</li>
          <li>Information about transactions made on our Products. If you use our Products for purchases or other financial transactions (such as when you make a purchase in a game or make a donation), we collect information about the purchase or transaction. This includes payment information, such as your credit or debit card number and other card information, other account and authentication information, and billing, delivery and contact details.</li>
          <li>Things others do and information they provide about you. We also receive and analyse content, communications and information that other people provide when they use our Products. This can include information about you, such as when others share or comment on a photo of you, send a message to you or upload, sync or import your contact information.</li>
        </ul>
      </div>

    </main>
    <?php include_once'footer.php';?>
  </body>
</html>