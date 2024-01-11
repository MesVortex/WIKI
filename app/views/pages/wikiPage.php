<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// if(isset($data['username']) && isset($data['userID']) && isset($data['userEmail'])){
//   $_SESSION['username'] = $data['username'];
//   $_SESSION['userID'] = $data['userID'];
//   $_SESSION['email'] = $data['userEmail'];
// }
require_once  APPROOT.'/views/includes/header.php';
?>
<body>

  <header class="">
    <nav class="bg-white border-gray-200">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com" class="flex ms-2">
          <img src="<?php echo URLROOT ?>/img/logo.png" class="h-8" alt="Wiki Logo" />
          <span class="self-center text-gray-500 text-xl font-bold sm:text-2xl whitespace-nowrap">iki</span>
        </a>
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['userID']) && isset($_SESSION['email'])){
          echo 
          '<button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="'.URLROOT.'/img/blue-user-icon-of-profile-and-account-vector-42404464.jpg" alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">'. $_SESSION['username'] .'</span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">'. $_SESSION['email'] .'</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="'. URLROOT .'/pages/addWiki" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Add Wiki</a>
              </li>
              <li>
                <a href="'. URLROOT .'/pages/account" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
              </li>
              <li>
                <a href="'.URLROOT.'/userController/signOut" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
          </div>';
        }else{
          echo 
          '<a href="'.URLROOT.'/pages/signUp" type="button" class="cursor-pointer me-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Signup</a>
          <a href="'.URLROOT.'/pages/login" type="button" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>';
        }
        ?>
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-cta" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-96 md:justify-around md:order-1" id="navbar-cta">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="<?php echo URLROOT ?>/pages/index" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 ">About</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Services</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 ">Contact</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  </header>

<section class=" p-10">
  <?php
    if(isset($data['currentWiki'])){
      $wiki = $data['currentWiki'];
      $tags = explode(',', $wiki->tagName);
  ?>
  <div>
    <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span><?php echo $wiki->name ?></span>
    <h2 class="text-4xl font-extrabold dark:text-white mt-3"><?php echo $wiki->titre ?></h2>
  </div>
  <p class="my-4 text-lg text-gray-500"><?php echo $wiki->contenu ?></p>
  <!-- <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Deliver great service experiences fast - without the complexity of traditional ITSM solutions. Accelerate critical development work, eliminate toil, and deploy changes with ease.</p> -->
  <?php
    foreach($tags as $t){
  ?>
  <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"><?php echo $t ?></span>
  <?php
    }
  ?>
  <div class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
    <img class="w-6 h-6 rounded-full" src="<?php echo URLROOT ?>/img/blue-user-icon-of-profile-and-account-vector-42404464.jpg" alt="profile picture">
    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
      <cite class="pe-3 font-medium text-gray-900 dark:text-white"><?php echo $wiki->username ?></cite>
      <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">Author</cite>
    </div>
  </div>
  <?php
    }
  ?>
</section>

<?php 
require_once APPROOT.'/views/includes/footer.php';
?>