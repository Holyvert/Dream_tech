//source: https://www.w3schools.com/js/js_cookies.asp

// check if the cookie exists or not and print out "Welcome, userEmail"
function checkCookie() {
  let username = getCookie("user_email");
  if (username != "") {
    document.getElementById("userLabel").innerHTML = "Welcome, " + username;
  }
}

// get the cookie
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
