// Seleziono il form di login
const loginForm = document.getElementById("loginForm");

// Verifico se il form esiste
if (loginForm) {
    // Aggiungo un event listener per l'evento "submit" al form
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("log_email").value;
        const password = document.getElementById("log_password").value;

        const emailError = document.getElementById("EmailError");
        const passwordError = document.getElementById("PasswordError");

        // Reset messaggi di errore
        emailError.textContent = "";
        passwordError.textContent = "";

        // Eseguo le validazioni
        let isValid = true;

        // Validazione dell'email
        if (!email.includes("@") || !email.includes(".")) {
            emailError.textContent = "Inserisci un'email valida.";
            isValid = false;
        } else if (!(email.endsWith(".com") || email.endsWith(".it"))) {
            emailError.textContent = "L'email deve terminare con .com o .it.";
            isValid = false;
        }

        // Validazione della password
        if (password.length < 8) {
            passwordError.textContent = "La password deve contenere almeno 8 caratteri.";
            isValid = false;
        }

        // Se tutto è valido, invio il form
        if (isValid) {
            loginForm.submit();
        }
    });
}
