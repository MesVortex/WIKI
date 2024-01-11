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
  
<?php 
require_once  APPROOT.'/views/includes/dashboardHeader.php';
?>

<section class="flex gap-20 flex-wrap p-4 sm:ml-80 mt-14">
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <i class="fa-solid fa-users fa-xl w-4 h-4 text-gray-500 mb-3"></i> 
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">this website looks lively!</h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 ">Wiki's audience accounted for over <span class=" font-bold text-blue-700"><?php echo $data['usersCount'] ?></span> monthly active users worldwide</p>
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
    <p class="mb-3 font-normal text-gray-500 ">Wiki's audience accounted for over <span class=" font-bold text-blue-700"><?php echo $data['categoriesCount'] ?></span> monthly active users worldwide</p>
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
    <p class="mb-3 font-normal text-gray-500 ">Wiki's audience accounted for over <span class=" font-bold text-blue-700"><?php echo $data['tagsCount'] ?></span> monthly active users worldwide</p>
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
    <p class="mb-3 font-normal text-gray-500 ">Wiki's audience accounted for over <span class=" font-bold text-blue-700"><?php echo $data['wikisCount'] ?></span> monthly active users worldwide</p>
    <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
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