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

<section class="p-10">
  <?php
    if(isset($data['currentWiki'])){
      $wiki = $data['currentWiki'];
      $tags = explode(',', $wiki->tagName);
      if(isset($_SESSION['userID']) && ($_SESSION['userID'] == $wiki->authorID)){
        echo '
        <!-- manage wiki toggle -->
        <div data-dial-init class="fixed top-32 end-6 group">
          <button type="button" data-dial-toggle="speed-dial-menu-dropdown" aria-controls="speed-dial-menu-dropdown" aria-expanded="false" class="flex items-center justify-center ml-auto text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
            <span class="sr-only">Open actions menu</span>
          </button>
          <div id="speed-dial-menu-dropdown" class="flex flex-col justify-end hidden py-1 mb-4 space-y-2 bg-white border border-gray-100 rounded-lg shadow-sm dark:border-gray-600 dark:bg-gray-700">
              <ul class="text-sm text-gray-500 dark:text-gray-300">
                <li>
                  <form action="'. URLROOT .'/pages/editWiki" method="post"> 
                    <input type="hidden" name="wikiID" value="'. $wiki->ID .'">
                    <button type="submit" class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                      <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                        <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
                      </svg>
                      <span class="text-sm font-medium">Edit</span>
                    </button>
                  </form>
                </li>
                <li>
                  <form action="'. URLROOT .'/wikiController/delete" method="post"> 
                    <input type="hidden" name="wikiID" value="'. $wiki->ID .'">
                    <button type="submit" class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                      <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                        <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                      </svg>
                      <span class="text-sm font-medium">delete</span>
                    </button>
                  </form>
                </li>
              </ul>
          </div>
      </div>';
      }
    ?>
  <div>
    <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span><?php echo $wiki->name ?></span>
    <h2 class="text-4xl font-extrabold dark:text-white mt-3"><?php echo $wiki->titre ?></h2>
  </div>
  <p class="mb-4 mt-2 text-sm italic text-gray-500">Published On <?php echo $wiki->date ?></p>
  <p class="my-4 text-lg text-gray-500"><?php echo $wiki->contenu ?></p>
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