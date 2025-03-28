<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// if(!isset($_SESSION['userID'])){
//   header('Location:'. URLROOT .'/pages/index');
// }elseif(isset($_SESSION['userID']) && $_SESSION['userRole'] == 2){
//   header('Location:'. URLROOT .'/pages/admin');
// }

require_once  APPROOT.'/views/includes/header.php';
?>
<body>

  <?php require_once  APPROOT.'/views/includes/indexNavbar.php'; ?>

  <section class=" w-screen flex justify-center">
    <!-- Main modal -->
    <?php
      if(isset($data['currentWiki'])){
        $wiki = $data['currentWiki'];
        $wikiTags = explode(',', $wiki->tagName);
    ?>
    <div id="crud"  aria-hidden="false" class="overflow-y-auto overflow-x-hidden justify-center items-center w-10/12 md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit New Wiki
                    </h3>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="<?php echo URLROOT ?>/WikiController/edit" method="post">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="newWikiName" id="name" value="<?php echo $wiki->titre ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your wiki's title">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Content</label>
                            <textarea id="description" name="newWikiContent" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your wiki's description here"><?php echo $wiki->contenu ?></textarea>                    
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>

                          <!-- tags dropdown trigger -->
                          <button id="dropdownTagsButton" data-dropdown-toggle="dropdownTags" class=" inline-flex items-center justify-between bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="button">
                            Select tags 
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                          </button>

                          <!-- tags dropdown menu -->
                          <div id="dropdownTags" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                              <ul class=" h-60 px-3 py-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTagsButton">
                                <?php
                                  if(isset($data['allTags'])){
                                    foreach($data['allTags'] as $tag){
                                      if(in_array($tag->name, $wikiTags)){
                                        echo
                                        '<li>
                                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-'.$tag->ID.'" type="checkbox" name="newTags[]" value="'.$tag->ID.'" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-'.$tag->ID.'" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">'.$tag->name.'</label>
                                          </div>
                                        </li>';
                                      }else{
                                        echo
                                        '<li>
                                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-'.$tag->ID.'" type="checkbox" name="newTags[]" value="'.$tag->ID.'" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-'.$tag->ID.'" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">'.$tag->name.'</label>
                                          </div>
                                        </li>';
                                      }
                                    }
                                  }
                                ?>
                              </ul>
                          </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="newCategoryID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected="">Select category</option>
                              <?php 
                                if(isset($data['allCategories'])){
                                  foreach($data['allCategories'] as $category){
                                    if($category->name == $wiki->name){
                                      echo '<option selected value="'. $category->ID .'">'. $category->name .'</option>';
                                    }else{
                                      echo '<option value="'. $category->ID .'">'. $category->name .'</option>';
                                    }
                                  }
                                }
                              ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="wikiID" value="<?php echo $wiki->ID ?>">
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Edit wiki
                    </button>
                </form>
            </div>
        </div>
    </div> 
    <?php
      }
    ?>
  </section>

<?php 
require_once APPROOT.'/views/includes/footer.php';
?>