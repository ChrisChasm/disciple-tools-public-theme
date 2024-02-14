function openNav() {
  if ( document.getElementById("mySidenav").style.width === "250px" ) {
    closeNav();
    return;
  }
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("post-main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("post-main").style.marginLeft= "0";
}