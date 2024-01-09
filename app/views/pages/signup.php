<?php 
require_once  APPROOT.'/views/includes/header.php';
?>


<body class=" bg-slate-600">
  <form id="form" class="max-w-sm mx-auto" action="<?php echo URLROOT ?>/userController/register" method="post">
    <div class="mb-5">
      <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
      <input type="text" id="fullName" name="fullName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Full Name">
      <p class=" hidden mt-2 text-sm text-red-600 dark:text-red-500" id="FullNameInputHelp">Your name must not contain any special characters or numbers!</p>
  </div>
    </div>
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="text" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@gmail.com">
      <p class=" hidden mt-2 text-sm text-red-600 dark:text-red-500" id="EmailInputHelp">Invalid email! (exp: name@gmail.com)</p>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input type="password" id="password" name="pwd" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
      <p class=" hidden mt-2 text-sm text-red-600 dark:text-red-500" id="PasswordInputHelp">Your password must be at least 8 characters & have at least one number!</p>
    </div>
    <div class="mb-5">
      <label for="repeatPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
      <input type="password" id="repeatPassword" name="repeat-pwd" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
      <p class=" hidden mt-2 text-sm text-red-600 dark:text-red-500" id="ReapeatPasswordInputHelp">Password doesn't match!</p>
    </div>
    <?php
    if(isset($data['err'])){
      echo '<p class="mt-2 text-center text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops! </span>'. $data['err'] .'</p>';
    }
    ?>
    <div class="flex items-start mb-5">
      <p class="mx-auto text-sm font-medium text-gray-900 dark:text-gray-300">Already have an account?<a href="#" class=" ms-3 text-blue-600 hover:underline dark:text-blue-500">Login</a></p>
    </div>
    <input type="hidden" name="role" value="2">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
  </form>

  <script src="<?php echo URLROOT?>/js/regex.js"></script>
<?php 
require_once APPROOT.'/views/includes/footer.php';
?>