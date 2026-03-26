function potvrda() {
    return confirm("Jeste li sigurni da želite obrisati zapis?");
}

function togglePassword() {
    const pass = document.getElementById("password");
    if (pass) {
        pass.type = pass.type === "password" ? "text" : "password";
    }
}


