<?php 
require_once  APPROOT.'/views/includes/header.php';
?>


<body style="background-image: url('<?php echo URLROOT ?>/img/lysander-yuen-wk833OrQLJE-unsplash.jpg'); background-size: cover;">

<section class="w-full">
  <form id="form" class=" bg-transparent backdrop-filter backdrop-blur-lg mt-20 p-10 border-4 border-blue-600 rounded-lg max-w-md mx-auto" action="<?php echo URLROOT ?>/userController/register" method="post">
    <h1 class=" text-center mb-6 text-xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span class="text-transparent bg-clip-text text-gray-900">Sign Up</span></h1>
    <div class="mb-5">
      <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
      <input type="text" id="fullName" name="fullName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Username">
      <p class=" hidden mt-2 text-smfont-bold text-red-700" id="FullNameInputHelp">Your name must not contain any special characters or numbers!</p>
    </div>
    </div>
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
      <input type="text" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@gmail.com">
      <p class=" hidden mt-2 text-sm font-bold text-red-700" id="EmailInputHelp">Invalid email! (exp: name@gmail.com)</p>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
      <input type="password" id="password" name="pwd" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••">
      <p class=" hidden mt-2 text-sm font-bold text-red-700" id="PasswordInputHelp">Your password must be at least 8 characters & have at least one number!</p>
    </div>
    <div class="mb-5">
      <label for="repeatPassword" class="block mb-2 text-sm font-medium text-gray-900 ">Repeat password</label>
      <input type="password" id="repeatPassword" name="repeat-pwd" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••">
      <p class=" hidden mt-2 text-sm font-bold text-red-700" id="ReapeatPasswordInputHelp">Password doesn't match!</p>
    </div>
    <?php
    if(isset($data['err'])){
      echo '<p class="mt-2 text-center text-sm text-red-700"><span class="font-medium">Oops! </span>'. $data['err'] .'</p>';
    }
    ?>
    <div class="flex items-start mb-5">
      <p class="mx-auto text-sm font-medium text-gray-900 ">Already have an account?<a href="<?php echo URLROOT ?>/pages/login" class=" ms-3 text-blue-600 hover:underline ">Login</a></p>
    </div>
    <input type="hidden" name="role" value="2">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register new account</button>
  </form>
</section>
  <script src="<?php echo URLROOT?>/js/regex.js"></script>
<?php 
require_once APPROOT.'/views/includes/footer.php';
?>