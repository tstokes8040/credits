<?
include_once 'php/utils.php';
// $user['name'] and $user['id'] are now vars referencing logged in user
// $isLoggedIn and $isAdmin are now true/false
// getCredits($user['id']); returns number of credits or -1 if error
?>
<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700|Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/styles.css" />
  <script src="scripts/utils.js"></script>
  <script src="scripts/app.js"></script>
</head>
<body>
  <div class="site-wrap">
    <div class="flyout">
      <div class="constraint">
        <div class="logo">Bettr<span class="tagline"> the better better</span></div>
      </div>
    </div>
    <div class="main-wrap">
      <header>
        <div class="constraint">
          <div class="credit-count">
            <? if($isLoggedIn) : ?>
              <?= getCredits($user['id']) ?>
            <? endif; ?>
          </div>
          <div class="login">
            <? if($isLoggedIn) : ?>
              Welcome to Bettr, <strong><?= $user['name'] ?></strong>
            <? else : ?>
              Login
            <? endif; ?>
          </div>
        </div>
      </header>
      <div class="main-content">
        <div class="constraint">
          <div class="create">
            <h1>Welcome to Bettr</h1>
            <h2>Transfer Credits</h2>
            <form action="">
              <input class="transfer-username" type="text" placeholder="Payee's Username" name="payee" />
              <input class="transfer-amount" type="text" placeholder="Credits" name="transfer" />
            </form>
          </div>
        </div>
      </div>
      <footer>
        <div class="constraint">
          &copy; Best Enterprises <?= date("Y") ?>
        </div>
      </footer>
    </div>
  </div>
  <div class="overlay">
    <div class="popup">
      <div class="close">X</div>
      <h2>Popup Heading</h2>
      <p>This is where the description of a mini game or something would go. I don't know. Text. Put it here.</p>
    </div>
  </div>
</body>
<? $connection->close(); ?>
