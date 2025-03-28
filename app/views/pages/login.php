<?php 
require_once  APPROOT.'/views/includes/header.php';
?>

<body style="background-image: url('<?php echo URLROOT ?>/img/lysander-yuen-wk833OrQLJE-unsplash.jpg'); background-size: cover;">
  <?php
    if(isset($data['success'])){
      echo 
      '<div id="alert" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        '. $data['success'] .'
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>';
    }
  ?>
  <section class="w-screen">
    <form id="form" class=" bg-transparent backdrop-filter backdrop-blur-lg mt-20 p-10 border-4 border-blue-600 rounded-lg max-w-md mx-auto" action="<?php echo URLROOT ?>/userController/signIn" method="post">
      <h1 class=" text-center mb-6 text-xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span class="text-transparent bg-clip-text text-gray-900">Login</span></h1>
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@gmail.com">
        <p class=" hidden mt-2 text-sm font-bold text-red-700" id="EmailInputHelp">Please enter a valid email! (exp: name@gmail.com)</p>
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
        <input type="password" id="password" name="pwd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="•••••••••">
        <p class=" hidden mt-2 text-sm font-bold text-red-700" id="PasswordInputHelp">Your password must be at least 8 characters!</p>
      </div>
      <?php
      if(isset($data['err'])){
        echo '<p class="mt-2 text-center text-sm text-red-700"><span class="font-medium">Oops! </span>'. $data['err'] .'</p>';
      }
      ?>
      <div class="flex items-start mb-5">
        <p class="mx-auto text-sm font-medium text-gray-900 ">New To Wiki?<a href="<?php echo URLROOT ?>/pages/signUp" class="font-bold ms-3 text-blue-600 hover:underline ">Sign Up</a></p>
      </div>
      <div class="flex justify-between">
        <a href="<?php echo URLROOT ?>/pages/index" class=" self-center font-bold ms-3 text-blue-600 hover:underline "><i class="fa-solid fa-arrow-left me-3"></i>Go Back</a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Login</button>
      </div>
    </form>
  </section>

  <script src="<?php echo URLROOT ?>/js/loginRegex.js"></script>


<?php 
require_once APPROOT.'/views/includes/footer.php';
?>