const signupForm = document.querySelector(".signup-form");
const signupBtn = document.querySelector(".signupBtn");
const signUpAlertMsg = document.querySelector(".alert-messages");
const userPassword = document.querySelector(".userPassword #userPassword");
const upEyeIcon = document.querySelector(".userPassword i");
const userCPassword = document.querySelector(".userCPassword #userCPassword");
const ucpEyeIcon = document.querySelector(".userCPassword i");
const userTypeLink = document.querySelector("#userTypeLink").value;

signupForm.onsubmit = (e)=> {
    e.preventDefault();
}

signupBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/signup", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Registration Success!', 'Please check your email to verify your account!', 'success').then(function() {
                        // window.location = document.referrer;
                        // window.location.href = window.location.href;
                        // window.location.href = "index.php?route=home&uuid="+userTypeLink;
                        window.location.href = "index.php?route=home";
                    });
                } else {
                    signUpAlertMsg.style.display = "block";
                    signUpAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(signupForm);
    xhr.send(formData);
}

upEyeIcon.onclick = ()=> {
    if (userPassword.type === "password") {
        userPassword.type = "text";
        upEyeIcon.classList.add("active");
    } else {
        userPassword.type = "password";
        upEyeIcon.classList.remove("active");
    }
}

ucpEyeIcon.onclick = ()=> {
    if (userCPassword.type === "password") {
        userCPassword.type = "text";
        ucpEyeIcon.classList.add("active");
    } else {
        userCPassword.type = "password";
        ucpEyeIcon.classList.remove("active");
    }
}

//    for (var pair of formData.entries())
//     {
//     console.log(pair[0]+ ', '+ pair[1]); 
//     }