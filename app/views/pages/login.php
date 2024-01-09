<?php 
require_once  APPROOT.'/views/includes/header.php';
?>

<body>

  <form id="form" class="max-w-sm mx-auto" action="<?php echo URLROOT ?>/userController/signIn" method="post">
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
      <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@gmail.com">
      <p class=" hidden mt-2 text-sm text-red-600" id="EmailInputHelp">Please enter a valid email! (exp: name@gmail.com)</p>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
      <input type="password" id="password" name="pwd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
      <p class=" hidden mt-2 text-sm text-red-600" id="PasswordInputHelp">Your password must be at least 8 characters!</p>
    </div>
    <?php
    if(isset($data['err'])){
      echo '<p class="mt-2 text-center text-sm text-red-600"><span class="font-medium">Oops! </span>'. $data['err'] .'</p>';
    }
    ?>
    <div class="flex items-start mb-5">
      <p class="mx-auto text-sm font-medium text-gray-900 ">New To Wiki?<a href="<?php echo URLROOT ?>/pages/signUp" class=" ms-3 text-blue-600 hover:underline ">Sign Up</a></p>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Login</button>
  </form>

  <script src="<?php echo URLROOT ?>/js/loginRegex.js"></script>


<?php 
require_once APPROOT.'/views/includes/footer.php';
?>