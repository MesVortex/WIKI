<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if(!isset($_SESSION['userID']) OR $_SESSION['userRole'] == 2){
  header('Location:'. URLROOT .'/pages/index');
}

require_once  APPROOT.'/views/includes/header.php';
?>

<body>
  
<?php 
require_once  APPROOT.'/views/includes/dashboardHeader.php';
?>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
        <ul class="space-y-2 font-medium">
          <li>
              <a href="<?php echo URLROOT?>/pages/admin" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                <span class="inline-flex items-center justify-center px-2 ms-3"><i class="fa-solid fa-lightbulb text-gray-500"></i></span>
              </a>
          </li>
          <!-- <li>
              <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                <span class="inline-flex items-center justify-center px-2 ms-3"><i class="fa-regular fa-lightbulb text-gray-500"></i></span>
              </a>
          </li> -->
          <li>
              <a href="<?php echo URLROOT?>/pages/categoriesDash" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <i class="fa-solid fa-layer-group fa-lg w-5 text-gray-500"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                <span class="inline-flex items-center justify-center px-2 ms-3"><i class="fa-regular fa-lightbulb text-gray-500"></i></span>
              </a>
          </li>
          <li>
              <a href="<?php echo URLROOT?>/pages/tagsDash" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <i class="fa-solid fa-tag fa-lg w-5 text-gray-500"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Tags</span>
                <span class="inline-flex items-center justify-center px-2 ms-3"><i class="fa-regular fa-lightbulb text-gray-500"></i></span>
              </a>
          </li>
          <li>
              <a href="<?php echo URLROOT?>/pages/wikisDash" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <i class="fa-solid fa-newspaper fa-lg w-5 text-gray-500"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Wikis</span>
                <span class="inline-flex items-center justify-center px-2 ms-3"><i class="fa-regular fa-lightbulb text-gray-500"></i></span>
              </a>
          </li>
          <li>
              <a href="<?php echo URLROOT?>/userController/signOut" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 ">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
              </a>
          </li>
        </ul>
    </div>
  </aside>
</header>

<section class="flex gap-20 flex-wrap p-4 sm:ml-80 mt-14">
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <i class="fa-solid fa-users fa-xl w-4 h-4 text-gray-500 mb-3"></i> 
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">this website looks lively!</h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 ">Wiki's audience accounted for over <span class=" font-bold text-blue-700"><?php echo $data['usersCount'] ?></span> monthly active users worldwide.</p>
    <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
      See our guideline
      <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
      </svg>
    </a>
  </div>
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <i class="fa-solid fa-layer-group fa-xl w-4 h-4 text-gray-500 mb-3"></i>
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Categories!</h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 ">Over <span class=" font-bold text-blue-700"><?php echo $data['categoriesCount'] ?></span> website categories attract a monthly audience of active users worldwide.</p>
    <a href="<?php echo URLROOT?>/pages/categoriesDash" class="inline-flex items-center text-blue-600 hover:underline">
      Manage Categories
      <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
      </svg>
    </a>
  </div>
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <i class="fa-solid fa-tag fa-xl w-4 h-4 text-gray-500 mb-3"></i>
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">tags!</h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 ">More than <span class=" font-bold text-blue-700"><?php echo $data['tagsCount'] ?></span> tags cater to a global audience of active users on a monthly basis.</p>
    <a href="<?php echo URLROOT?>/pages/tagsDash" class="inline-flex items-center text-blue-600 hover:underline">
      Manage Tags
      <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
      </svg>
    </a>
  </div>
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <i class="fa-solid fa-newspaper fa-xl w-4 h-4 text-gray-500 mb-3"></i>
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Wikis!</h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 ">Wiki hosts an extensive collection of wikis. including <span class=" font-bold text-blue-700"><?php echo $data['UnarchivedWikisCount'] ?></span> unarchived and <span class=" font-bold text-red-700"><?php echo $data['ArchivedWikisCount'] ?></span> archived wikis</p>
    <a href="<?php echo URLROOT?>/pages/wikisDash" class="inline-flex items-center text-blue-600 hover:underline">
      Manage Wikis
      <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
      </svg>
    </a>
  </div>
</section>


<?php 
require_once APPROOT.'/views/includes/footer.php';
?>