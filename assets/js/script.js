//TODO JavaScript for NavBar
$(function () {
    $(document).scroll(function () {
        var navbar = $(".navbar");
        navbar.toggleClass('scrolled', $(this).scrollTop() > navbar.height());
    });
});
//TODO End of JavaScript for NavBar

//TODO JavaScript for Show/Unshow Password      
// var userPassword = document.querySelector(".userPassword #userPassword");
// var upEyeIcon = document.querySelector(".userPassword i");
// var userCPassword = document.querySelector(".userCPassword #userCPassword");
// var ucpEyeIcon = document.querySelector(".userCPassword i");

// upEyeIcon.onclick = function() {
//     if (userPassword.type === "password") {
//         userPassword.type = "text";
//         upEyeIcon.classList.add("active");
//     } else {
//         userPassword.type = "password";
//         upEyeIcon.classList.remove("active");
//     }
// }

// ucpEyeIcon.onclick = function() {
//     if (userCPassword.type === "password") {
//         userCPassword.type = "text";
//         ucpEyeIcon.classList.add("active");
//     } else {
//         userCPassword.type = "password";
//         ucpEyeIcon.classList.remove("active");
//     }
// }
//TODO End of JavaScript for Show/Unshow Password

