<?php
require('views/partials/head.php');
require('views/partials/nav.php');
require('views/partials/banner.php');
?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-blue-500 hover:underline ">Go Back..</a>
    </p>
    <P>
      <?= $note['body'] ?>
    </P>

  </div>
</main>
<?php
require('views/partials/footer.php');
