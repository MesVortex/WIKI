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


<div>
<section id="popover-user-profile" class="inline-block w-screen text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
    <div class="p-3">
        <div class="flex items-center justify-between mb-2">
            <a href="#">
                <img class="w-10 h-10 rounded-full" src="<?php echo URLROOT ?>/img/blue-user-icon-of-profile-and-account-vector-42404464.jpg" alt="user photo">
            </a>
            <div>
              <a href="<?php echo URLROOT ?>/userController/signOut" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Logout</a>
            </div>
        </div>
        <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
            <a href="#"><?php echo $_SESSION['username'] ?></a>
        </p>
        <p class="mb-3 text-sm font-normal">
            <a href="#" class="hover:underline"><?php echo  $_SESSION['email'] ?></a>
        </p>
        <p class="mb-4 text-sm">Author at <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Wiki.com</a></p>
        <ul class="flex text-sm">
            <li class="me-2">
                <a href="#" class="hover:underline">
                    <span class="font-semibold text-gray-900 dark:text-white">799</span>
                    <span>Wikis</span>
                </a>
            </li>
            <li>
                <a href="#" class="hover:underline">
                    <span class="font-semibold text-gray-900 dark:text-white">3,758</span>
                    <span>Followers</span>
                </a>
            </li>
        </ul>
    </div>
</section>
<h1 class=" my-7 text-2xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Your Own <span class="underline underline-offset-3 decoration-8 text-blue-600 ">Wikis</span></h1>
<section class="flex gap-5 flex-wrap justify-around mb-10">
  <?php
    if(isset($data['authorWikis'])){
      foreach($data['authorWikis'] as $wiki){
  ?>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $wiki->titre ?></h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo substr($wiki->contenu, 0, 100) ?>...</p>
        <div class=" flex justify-between">
          <div class="flex items-center justify-center">
            <img class="rounded-full w-9 h-9" src="<?php echo URLROOT ?>/img/blue-user-icon-of-profile-and-account-vector-42404464.jpg" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
              <div><?php echo $wiki->username ?></div>
              <div class="text-sm text-gray-500 dark:text-gray-400 ">Author</div>
            </div>
          </div> 
          <form action="<?php echo URLROOT ?>/pages/wikiPage" method="post">
            <input type="hidden" name="wikiID" value="<?php echo $wiki->ID ?>">
            <button type="submit" class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
          </form>
        </div> 
    </div>
  <?php
      }
    }
  ?>
</section>


</div>

<?php 
require_once APPROOT.'/views/includes/footer.php';
?>