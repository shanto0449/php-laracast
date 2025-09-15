<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight ">Log In to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/sessions" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" required class="block w-full rounded-md border border-gray-600 bg-white/5 px-3 py-1.5 text-base text-black outline-1 outline-white/10 placeholder:text-gray-500 focus:border-indigo-500 focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    <?php if(isset($errors['email'])): ?>
                    <p class="mt-2 text-sm text-red-600"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required  class="block w-full rounded-md border border-gray-600 bg-white/5 px-3 py-1.5 text-base text-black outline-1 outline-white/10 placeholder:text-gray-500 focus:border-indigo-500 focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                   </div>
                   <?php if(isset($errors['password'])): ?>
                    <p class="mt-2 text-sm text-red-600"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="remember-me" class="font-medium text-indigo-600 hover:text-indigo-500"> Remember me </label>
                    </div>
                     <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                        </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Log In</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Not a member?
                <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Start a 14 day free trial</a>
            </p>
        </div>
    </div>


</main>
<?php

require base_path('views/partials/footer.php');
