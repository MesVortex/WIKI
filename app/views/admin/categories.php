<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

require_once  APPROOT.'/views/includes/header.php';
?>

<body>
  
  <?php 
  require_once  APPROOT.'/views/includes/dashboardHeader.php';
  ?>


  <section class="p-10 sm:ml-64 mt-14">
    <?php
    if(isset($data['err'])){
      echo 
      '<div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          '. $data['err'] .'
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>';
    }
    ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Wikis
                    </th>
                    <th scope="col" colspan="2" class=" px-16 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(isset($data['allCategories'])){
                foreach($data['allCategories'] as $category){

              ?>
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                  <th scope="row" class="px-6 py-4  ">
                      <?php echo $category->ID ?>
                  </th>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $category->name ?>
                  </td>
                  <td class="px-6 py-4">
                    <?php echo $category->ID ?>
                  </td>
                  <td class="px-6 py-4">
                    <!-- edit pop-up trigger -->
                    <a data-modal-target="authentication-modal<?php echo $category->ID ?>" data-modal-toggle="authentication-modal<?php echo $category->ID ?>" type="button" class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <!-- edit pop-up -->
                    <div id="authentication-modal<?php echo $category->ID ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                  Edit Category
                              </h3>
                              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal<?php echo $category->ID ?>">
                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                  </svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                          </div>
                          <div class="p-4 md:p-5">
                            <form class="space-y-4" action="<?php echo URLROOT ?>/categoryController/modify" method="post">
                              <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">New Category Name</label>
                                <input type="name" name="newCategoryName" id="newCategoryName" value="<?php echo $category->name ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <input type="hidden" name="categoryID" value="<?php echo $category->ID ?>">
                              </div>
                              <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </td>
                  <td class="px-6 py-4">
                      <!-- delete pop-up trigger -->
                      <a type="button" data-modal-target="popup-modal<?php echo $category->ID ?>" data-modal-toggle="popup-modal<?php echo $category->ID ?>" class=" cursor-pointer font-medium text-red-600 hover:underline">Remove</a>
                      <!-- delete pop-up -->
                      <div id="popup-modal<?php echo $category->ID ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal<?php echo $category->ID ?>">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <form class="p-4 md:p-5 text-center" method="post" action="<?php echo URLROOT ?>/categoryController/delete">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Category?</h3>
                                    <input type="hidden" name="categoryID" value="<?php echo $category->ID ?>">
                                    <button data-modal-hide="popup-modal<?php echo $category->ID ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="popup-modal<?php echo $category->ID ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                </form>
                            </div>
                        </div>
                      </div>
                  </td>
              </tr>
            <?php
                }
              }
            ?>
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th colspan="5" class="text-center px-6 py-3">
                  <!-- Modal toggle -->
                  <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="" type="button">
                    <i class="fa-solid fa-circle-plus fa-lg text-blue-500"></i>
                  </button>

                  <!-- Main modal -->
                  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add Category
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                          <form class="space-y-4" action="<?php echo URLROOT ?>/categoryController/add" method="post">
                            <div>
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Category Name</label>
                              <input type="name" name="categoryName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="exp: technologie" required>
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div> 
                </th>
              </tr>
            </tbody>
        </table>
    </div>
  </section>


<?php 
require_once APPROOT.'/views/includes/footer.php';
?>