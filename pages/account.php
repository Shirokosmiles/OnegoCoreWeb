<?php
$global->check_logged_in();
$account = new Account($_SESSION['username']);

if (isset($_POST['change_password'])) {
   header("Location: ?page=changepassword");
   exit();
}
?>
<div class="custom-container">
   <form method="POST">
      <button class="change-password-button" style="margin-bottom:20px;" name="change_password">Change Password</button>
   </form>
   <div class="custom-card-acc">
      <div class="title-container">
         <div class="title">Account Information</div>
         <div class="subtitle">In this section you'll find basic information about your account</div>
      </div>
      <div class="info-container">
         <div class="info-item">
            <span class="info-label">Username:</span>
            <span class="info-value"><?= $account->get_username(); ?></span>
         </div>
         <div class="info-item">
            <span class="info-label">Email:</span>
            <span class="info-value"><?= $account->get_email(); ?></span>
         </div>
         <div class="info-item">
            <span class="info-label">Last Login:</span>
            <span class="info-value"><?= $account->get_last_login(); ?></span>
         </div>
         <div class="info-item">
            <span class="info-label">Account Status:</span>
            <span class="info-value"><?= $account->is_banned(); ?></span>
         </div>
         <div class="info-item">
            <span class="info-label">Donation Points:</span>
            <span class="info-value"><?= $account->get_account_currency()['donor_points'] ?></span>
         </div>
         <div class="info-item">
            <span class="info-label">Vote Points:</span>
            <span class="info-value"><?= $account->get_account_currency()['vote_points'] ?></span>
         </div>
      </div>
   </div>
</div>
<div class="custom-container">
   <div class="custom-card-acc">
      <div class="title-container">
         <div class="title">Characters</div>
         <div class="subtitle">In this section, you'll find a list of your characters</div>
      </div>
      <div class="info-container">
         <?php
            $character = new Character();
            $characters = $character->get_characters($_SESSION['account_id']);
            foreach ($characters as $character) {
            ?>
         <div class="character-item">
            <div class="character-image">
               <img src="assets/images/race/<?= $character['race']; ?>.png" alt="<?= $character['race']; ?>">
               <img src="assets/images/class/<?= $character['class']; ?>.png" alt="<?= $character['class']; ?>">
            </div>
            <div class="character-info">
               <div class="character-name" data-class-id="<?= $character['class']; ?>">
                  <?= $character['name']; ?>
               </div>
               <div class="character-level">Level <?= $character['level']; ?></div>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
   </div>
</div>