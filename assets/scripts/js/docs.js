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

if (window.location.href.indexOf("docs") > -1) {
  $('.betterdocs-nested-category-wrapper').on('click', function () {
    setTimeout(() => {
      $('.masonry').masonry({
        itemSelector: ".betterdocs-single-category-wrapper",
        percentPosition: true,
        gutter: 15
      })
    }, 200);
  })
}