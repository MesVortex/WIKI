var searchInput = document.getElementById("searchWiki");
var searchResult = document.getElementById("searchResult");
var wikisSection = document.getElementById("allWikis");

searchInput.addEventListener("input", function () {
  var input = searchInput.value;
  
  if (input) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/WIKI/ajaxController/search");
    xhr.setRequestHeader("Content-type", "application/json");
    
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var wikiCards = show(JSON.parse(xhr.responseText));
        var allCards = '';

        wikiCards.forEach(wikiCard => {
          allCards += wikiCard;
        });
        searchResult.innerHTML = allCards;


      
        // searchResult.innerHTML = xhr.responseText;
        searchResult.className = "flex gap-5 flex-wrap justify-around mb-10";            
        wikisSection.className = "hidden gap-5 flex-wrap justify-around mb-10";            
      }
    };


    var requestData = {
      input: input
    };
    xhr.send(JSON.stringify(requestData));
  } else {
    searchResult.className= "hidden gap-5 flex-wrap justify-around mb-10";
    wikisSection.className = "flex gap-5 flex-wrap justify-around mb-10";
  }
});

function show(wikis){
  var wikiCards = [];
  var i = 0;
  wikis.forEach(wiki => {
    wikiCards[i] = 
      `<div class="w-96 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a>
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${wiki.titre}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${wiki.contenu.substring(0, 100)}...</p>
        <div class=" flex justify-between">
          <div class="flex items-center justify-center">
            <img class="rounded-full w-9 h-9" src="http://localhost/WIKI/public/img/blue-user-icon-of-profile-and-account-vector-42404464.jpg" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
              <div>${wiki.username}</div>
              <div class="text-sm text-gray-500 dark:text-gray-400 ">Author</div>
            </div>
          </div> 
          <form action="http://localhost/WIKI/pages/wikiPage" method="post">
            <input type="hidden" name="wikiID" value="${wiki.ID}">
            <button type="submit" class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
          </form>
        </div> 
      </div>`;
    i++;
  });
  return wikiCards;
}