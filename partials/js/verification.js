const verificationForm = document.querySelector(".verification-form");

setInterval(()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/verification", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Account verification sucess!', 'You can sign in your account now!', 'success', {
                        button: false,
                    }).then(setInterval(()=> {
                        window.location.href = "index.php?route=home";
                    }, 950));
                } 
                else if (data === "already") {
                    swal('Already verified!', 'You can sign in your account now!', 'warning', {
                        button: false,
                    }).then(setInterval(()=> {
                        window.location.href = "index.php?route=home";
                    }, 1000));
                } 
                else if (data === "failed") {
                    swal('Verification Failed!', 'You can sign in your account now!', 'danger', {
                        button: false,
                    }).then(setInterval(()=> {
                        window.location.href = "index.php?route=home";
                    }, 1000));
                }
            }
        }
    }
    let formData = new FormData(verificationForm);
    xhr.send(formData);
},  1100);