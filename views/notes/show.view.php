<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav.php';
require __DIR__ . '/../partials/banner.php';
?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-blue-500 hover:underline ">Go Back..</a>
    </p>
    <P>
      <?= htmlspecialchars($note['body']) ?>
    </P>

  </div>
</main>
<?php
require __DIR__ . '/../partials/footer.php';
