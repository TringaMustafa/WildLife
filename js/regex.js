function validimiLogIn() {
    let idLF = document.LoginForm.id;
    let passwordLF = document.LoginForm.passwordLF;

    if (idLF.value == "") {
        alert("ID nuk mund te jete e zbrazet!");
        idLF.focus();
        return false;
    }
    if (passwordLF.value == "") {
        alert("Fjalekalimi nuk mund te jete i zbrazet!");
        passwordLF.focus();
        return false;
    }
    alert('Mire se vini!');
    return true;
}

function validimiSignUp(event) {
    event.preventDefault();
    let form = document.SignUpForm;
    let password = form.passwordi.value;
    let id = form.nrleternjoftimit.value;

    // Password validation
    if (password.length < 6) {
        alert("Fjalëkalimi duhet të ketë të paktën 6 karaktere!");
        form.passwordi.focus();
        return false;
    }

    if (!/\d/.test(password)) {
        alert("Fjalëkalimi duhet të përmbajë të paktën një numër!");
        form.passwordi.focus();
        return false;
    }

    // Other validations remain the same
    if (form.emri.value.trim() === '') {
        alert("Emri nuk mund të jetë i zbrazët!");
        form.emri.focus();
        return false;
    }

    if (form.mbiemri.value.trim() === '') {
        alert("Mbiemri nuk mund të jetë i zbrazët!");
        form.mbiemri.focus();
        return false;
    }

    form.submit();
    return true;
}
