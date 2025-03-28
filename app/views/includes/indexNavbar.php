<header class="">
    <nav class="bg-white border-gray-200">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex ms-2">
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
                <a href="'. URLROOT .'/pages/account" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Account</a>
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
      <div class="items-center justify-between hidden w-full md:flex md:w-96  md:justify-around md:order-1" id="navbar-cta">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="<?php echo URLROOT ?>/pages/index" class="block py-2 px-3 md:p-0 text-gray-900 hover:bg-gray-100 rounded md:bg-transparent md:hover:bg-transparent hover:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="<?php echo URLROOT ?>/pages/explore" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-700 ">Explore</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  </header>
