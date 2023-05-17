function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
function validateMobile(mobile) {
    const re = /^\d{10}$/;
    return re.test(mobile);
}

document.querySelector("#registration-form").addEventListener("submit", function(event) {
    event.preventDefault();
    const name = document.querySelector("#name").value;
    const email = document.querySelector("#email").value;
    const mobile = document.querySelector("#mobile").value;
    const photo = document.querySelector("#photo").files[0];
    const emailError = document.querySelector("#email-error");
    const mobileError = document.querySelector("#mobile-error");
    let isValid = true;

    if (!validateEmail(email)) {
        emailError.innerHTML = "Invalid email address";
        if (email === "") {
            emailError.innerHTML= "Email field is empty";
        }
        isValid = false;
    } else {
        emailError.innerHTML = "";
    }

    if (!validateMobile(mobile)) {
        mobileError.innerHTML = "Invalid mobile number";
        isValid = false;
    } else {
        mobileError.innerHTML = "";
    }
    if (isValid) {
        const formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("mobile", mobile);
        formData.append('photo', photo)

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "reg.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.querySelector("#name").value = "";
                document.querySelector("#email").value = "";
                document.querySelector("#mobile").value = "";
                document.querySelector("#photo").value = "";
                alert(xhr.responseText);
            }
        };
        xhr.send(formData);
    }
});
