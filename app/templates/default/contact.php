<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>

  <h2>Contact</h2>

  <form method="post">
    <div>
      <label for="name">Votre nom</label>
      <input type="text" id="name" name="name" value="<?= $name ?>" />
    </div>
    <div>
      <label for="email">Votre email</label>
      <input type="email" id="email" name="email" value="<?= $email ?>" />
    </div>
    <div>
      <label for="message">Votre message</label>
      <textarea id="message" name="message" rows="8" cols="80"><?= $message ?></textarea>
    </div>
    <button type="submit">Envoyer</button>
  </form>

<?php $this->stop('main_content') ?>
