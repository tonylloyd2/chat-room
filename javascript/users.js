const searchBar = document.querySelector(".main-left .search .header-left .search input"),
// postvar = document.querySelector(".main-left .search .header-left input"),
searchIcon = document.querySelector(".main-left .search button"),
usersList = document.querySelector(".chat-list");

  searchIcon.onclick = ()=>{
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if(searchBar.classList.contains("active")){
      searchBar.value = "";
      searchBar.classList.remove("active");
    }
  }

  searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    // let post_var_session = postvar.value;
    if(searchTerm != ""){
      searchBar.classList.add("active");
    }else{
      searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../action/search.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersList.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
    // xhr.send("post_var_session=" + searchTerm);
  }

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../action/users.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            if(!searchBar.classList.contains("active")){
              usersList.innerHTML = data;
            }
           
          }
      }
    }
    xhr.send();
  }, 500);
