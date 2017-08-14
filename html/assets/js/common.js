// for henosis initialization -- start

henosisInit(2, "visibility");

// for henosis initialization -- end

function containersHeightWidthFix()
{
  var windowHeight = $(window).height();
  var windowWidth = $(window).width();
  document.getElementById("container1").style.height = windowHeight;
  document.getElementById("container1").style.width = windowWidth;
  document.getElementById("container2").style.height = windowHeight;
  document.getElementById("container2").style.width = windowWidth;
}

$( document ).ready(function()
{
  // fix for android -- start

  var isAndroid = ua.indexOf("android") > -1;

  if(isAndroid)
  {
    containersHeightWidthFix();
  }

  // fix for android -- end

  var windowWidth = $(window).width();
  var windowHeight = $(window).height();

  // for menu -- start

  var menuRowHeight = $('#menuRow').height();
  // console.log("menuRowHeight : "+menuRowHeight);
  var menuRowCalculatedTop = ((windowHeight/2) - (menuRowHeight/2));
  // console.log(menuRowCalculatedTop);
  document.getElementById("menuRow").style.top = menuRowCalculatedTop+"px";

  if(windowWidth >= 768)
  {
    var menuLeftColumnHeight = $('#menuLeftColumn').height();
    var menuLeftColumnCalculatedTop = ((menuRowHeight/2) - (menuLeftColumnHeight/2));
    document.getElementById("menuLeftColumn").style.top = menuLeftColumnCalculatedTop+"px";

    var menuLeftColumnULHeight = $('#menuLeftColumnUL').height();
    var menuLeftColumnULCalculatedTop = ((menuLeftColumnHeight/2) - (menuLeftColumnULHeight/2));
    document.getElementById("menuLeftColumnUL").style.top = menuLeftColumnULCalculatedTop+"px";

    var menuCenterColumnHeight = $('#menuCenterColumn').height();
    var menuCenterColumnCalculatedTop = ((menuRowHeight/2) - (menuCenterColumnHeight/2));
    document.getElementById("menuCenterColumn").style.top = menuCenterColumnCalculatedTop+"px";

    var menuCenterColumnULHeight = $('#menuCenterColumnUL').height();
    var menuCenterColumnULCalculatedTop = ((menuCenterColumnHeight/2) - (menuCenterColumnULHeight/2));
    document.getElementById("menuCenterColumnUL").style.top = menuCenterColumnULCalculatedTop+"px";

    var menuRightColumnHeight = $('#menuRightColumn').height();
    var menuRightColumnCalculatedTop = ((menuRowHeight/2) - (menuRightColumnHeight/2));
    document.getElementById("menuRightColumn").style.top = menuRightColumnCalculatedTop+"px";

    var menuRightColumnULHeight = $('#menuRightColumnUL').height();
    var menuRightColumnULCalculatedTop = ((menuRightColumnHeight/2) - (menuRightColumnULHeight/2));
    document.getElementById("menuRightColumnUL").style.top = menuRightColumnULCalculatedTop+"px";

    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = "#menuLeftColumn::after { top: -"+(menuLeftColumnULHeight/2)+"px; }";
    document.head.appendChild(css);

    // for menu -- end

  }
});
