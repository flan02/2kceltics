let btn_more = document.getElementById("more");
const $div_more = document.getElementById("more_ajax");
$div_more.style.display = "none";

btn_more.addEventListener("click", function (e) {
  $div_more.style.display = "block";
  btn_more.style.visibility = "hidden";
});

function ejecutarAJAX() {
  let ajaxRequest;
  ajaxRequest = new XMLHttpRequest();
  ajaxRequest.onreadystatechange = function () {
    if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
      document.getElementById("info").innerHTML = ajaxRequest.responseText;
    }
  };

  ajaxRequest.open(
    "GET",
    "articles.php?controller=Content&action=articles",
    true
  );
  ajaxRequest.send();
}
