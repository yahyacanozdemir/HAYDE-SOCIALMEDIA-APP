
let kaydolLink = document.getElementById('flipToSignUp');
let theText = document.querySelectorAll('.flip-box-inner');
//Flip Animasyonu
kaydolLink.onclick = function () {
    for (let x of theText) {
        x.classList.toggle('showUrAss');
    }
    document.getElementById("flip-box-back").style.display = "block";
    document.getElementById("flip-box-front").style.display = "none";


};

//Flip Animasyonu
let girisLink = document.getElementById('flipToSignIn');
theText = document.querySelectorAll('.flip-box-inner');
girisLink.onclick = function () {
    for (let x of theText) {
        x.classList.toggle('showUrAss');
    }
    document.getElementById("flip-box-front").style.display = "block";
    document.getElementById("flip-box-back").style.display = "none";


};

//SignUp Tanımlamaları
userName = document.getElementById("SıgnUpName");
surname = document.getElementById("SıgnUpSurname");
signUpMail = document.getElementById("SıgnUpMail");
signUpPassword = document.getElementById("SıgnUpPassword");
signUpPasswordAgain = document.getElementById("SıgnUpPasswordAgain");
signUpButton = document.getElementById("SignUpButton");

//PopUp Tanımlamaları
popUpTitle = document.getElementById("modalTitle");
popUpContent = document.getElementById("modalContent");
popUpDismissButton = document.getElementById("modalDismissButton");
popUpConfirmButton = document.getElementById("modalConfirmButton");

//Forget Password Tanımlamaları
forgetPasswordButton = document.getElementById("ForgotPasswordButton");
forgetPasswordPopUpEmailInput = document.getElementById("forgetPasswordMailValue");



forgetPasswordButton.onclick = function () {

    popUpTitle.innerHTML = "Şifreni Sıfırla";
    popUpContent.innerHTML = ""
    popUpDismissButton.innerHTML = "Geri Dön";
    popUpConfirmButton.style.display = "block";
    popUpConfirmButton.innerHTML = "Gönder";

    forgetPasswordPopUpEmailInput.style.display = "inline";
    forgetPasswordPopUpEmailInput.style.marginTop = "5px";
    popUpContent.style.marginTop = "15px";

    forgetPasswordLabel = document.getElementById("ForgotPasswordButton");
    forgetPasswordLabel.setAttribute("href", "#popup1");
    forgetPasswordLabel.setAttribute("data-toggle", "modal");
    forgetPasswordLabel.setAttribute("data-target", "#exampleModalCenter");

}


function signUpControl() {
    document.getElementById("forgetPasswordMailValue").style.display = "none";

    if (userName.value.length > 1) {
        if (surname.value.length > 1) {
            if (signUpMail.value.length > 4 /*BACKEND*/) {
                if (signUpPassword.value.length > 5 /*BACKEND*/) {
                    if (signUpPassword.value == signUpPasswordAgain.value) {
                        //PopUp'ı Gösterme
                        popUpTitle.innerHTML = "Mail Kutunu Kontrol Et"
                        popUpContent.innerHTML = " Hayde'ye kayıt işlemini tamamlamak için e-posta adresine bir doğrulama maili gönderildi."
                        popUpDismissButton.innerHTML = "Kapat"
                        popUpConfirmButton.style.display = "block"
                        popUpConfirmButton.innerHTML = "Mail Giriş"
                        showPopUp();
                    }
                    else {
                        popUpTitle.innerHTML = "Şifreler Uyuşmuyor !"
                        popUpContent.innerHTML = "Lütfen Girdiğiniz Bilgileri Kontrol Edin."
                        popUpDismissButton.innerHTML = "Geri Dön"
                        popUpConfirmButton.style.display = "none"
                        showPopUp();
                    }
                }
                else {
                    popUpTitle.innerHTML = "Şifre 6 Karakterden Az Olamaz !"
                    popUpContent.innerHTML = "Lütfen Girdiğiniz Bilgileri Kontrol Edin."
                    popUpDismissButton.innerHTML = "Geri Dön"
                    popUpConfirmButton.style.display = "none"
                    showPopUp();
                }
            }
            else {
                popUpTitle.innerHTML = "Geçersiz Mail !"
                popUpContent.innerHTML = "Lütfen Girdiğiniz Bilgileri Kontrol Edin."
                popUpDismissButton.innerHTML = "Geri Dön"
                popUpConfirmButton.style.display = "none"
                showPopUp();
            }
        }
        else {
            popUpTitle.innerHTML = "Soyisim 2 Karakterden Az Olamaz !"
            popUpContent.innerHTML = "Lütfen Girdiğiniz Bilgileri Kontrol Edin."
            popUpDismissButton.innerHTML = "Geri Dön"
            popUpConfirmButton.style.display = "none"
            showPopUp();
        }
    }
    else {
        popUpTitle.innerHTML = "İsim 2 Karakterden Az Olamaz !"
        popUpContent.innerHTML = "Lütfen Girdiğiniz Bilgileri Kontrol Edin."
        popUpDismissButton.innerHTML = "Geri Dön"
        popUpConfirmButton.style.display = "none"
        showPopUp();
    }

}

function showPopUp() {
    signUpButton = document.getElementById("SignUpButton");
    signUpButton.setAttribute("href", "#popup1");
    signUpButton.setAttribute("data-toggle", "modal");
    signUpButton.setAttribute("data-target", "#exampleModalCenter");
}

function popUpConfirmButtonFunc() {
    //Şifre Sıfırlama
    if (document.getElementById("modalConfirmButton").innerText == "Gönder") {
        /*BACKEND BUSINESS*/
        if (document.getElementById("forgetPasswordMailValue").value == "yahyacanozdemir@gmail.com") {
            popUpTitle.innerHTML = "Mailini Kontrol Et";
            popUpContent.innerHTML = "E-posta adresine bir doğrulama maili gönderildi. Şifreni sıfırlamak için mailde gönderilen linki kullan."
        }
        else{
            popUpTitle.innerHTML = "Üzgünüz";
            popUpContent.innerHTML = "Hayde'ye tanımlı böyle bir e-posta adresi bulunamadı."
        }
    }
    if (document.getElementById("modalConfirmButton").innerText == "Mail Giriş") {
        window.open("https://onedrive.live.com/about/tr-tr/signin/")
    }
}





