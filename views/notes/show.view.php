<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-blue-500 hover:underline ">Go Back..</a>
    </p>
    <P>
      <?= htmlspecialchars($note['body']) ?>
    </P>
   
    <footer >
    <div class="px-4 py-3 flex gap-x-4 ">
      <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700">
        Edit
      </a>

      <form method="POST" class="inline">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white hover:bg-red-700">
          Delete
        </button>
      </form>
    </div>
    </footer>
  </div>
</main>
<?php
require base_path('views/partials/footer.php');
