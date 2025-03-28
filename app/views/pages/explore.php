<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if(isset($_SESSION['userID']) && $_SESSION['userRole'] == 1){
  header('Location:'. URLROOT .'/pages/admin');
}
require_once  APPROOT.'/views/includes/header.php';
?>
<body>

  <?php require_once  APPROOT.'/views/includes/indexNavbar.php'; ?>
  
  <?php
    if(isset($data['signOut'])){
      echo 
      '<div id="alert" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        '. $data['signOut'] .'
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
<section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')]">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
    <a href="<?php echo URLROOT ?>/pages/index" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
      <svg class="w-2.5 h-2.5 me-2 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="text-sm font-medium">Wanna see our latest and hottest?</span> <span class="text-xs bg-blue-600 rounded-full text-white font-bold px-4 py-1.5 ms-3">Trending</span>
    </a>
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Explore Wikis: Unveiling the Rich Tapestry of Knowledge</h1>
    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Immerse yourself in a diverse array of subjects, from the mysteries of the cosmos to the intricacies of human history.</p>
    <form class="w-full max-w-md mx-auto">   
      <label for="search" class=" mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search Bar</label>
      <div class="relative">
        <div class="absolute inset-y-0 rtl:inset-x-0 start-0 flex items-center ps-3.5 pointer-events-none">
          <i class="fa-brands fa-searchengin text-gray-500"></i>
        </div>
        <input type="search" id="searchWiki" class="block w-full py-4 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Searching for some knowledge today...">
      </div>
    </form>
  </div>
</section>

<section class="hidden gap-5 flex-wrap justify-around mb-10" id="searchResult">

</section>

<section class="flex gap-5 flex-wrap justify-around mb-10" id="allWikis">
  <?php
    if(isset($data['allWikis'])){
      foreach($data['allWikis'] as $wiki){
  ?>
    <div class="w-96 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a>
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

<script src="<?php echo URLROOT ?>/js/search.js">
</script>

<?php 
require_once APPROOT.'/views/includes/footer.php';
?>