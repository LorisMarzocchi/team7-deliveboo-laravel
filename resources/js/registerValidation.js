const registerForm = document.getElementById("registerForm");

if (registerForm) {
    registerForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // valori dai campi di input
        const name = document.getElementById("reg_name").value;
        const email = document.getElementById("reg_email").value;
        const password = document.getElementById("reg_password").value;
        const passwordConfirmation = document.getElementById(
            "reg_password_confirmation"
        ).value;

        // div dove mostrare gli errori
        const nameError = document.getElementById("NameError");
        const emailError = document.getElementById("EmailError");
        const passwordError = document.getElementById("PasswordError");
        const passwordConfirmationError = document.getElementById(
            "PasswordConfirmationError"
        );

        // Reset messaggi di errore
        nameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        passwordConfirmationError.textContent = "";

        // Eseguo le validazioni
        let isValid = true;

        // Validazione del nome
        if (name.trim() === "") {
            nameError.textContent = "Il campo 'Nome' è obbligatorio.";
            isValid = false;
        } else if (name.length < 3) {
            nameError.textContent =
                "Il campo 'Nome' deve contenere almeno 3 caratteri.";
            isValid = false;
        }

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
            passwordError.textContent =
                "La password deve contenere almeno 8 caratteri.";
            isValid = false;
        }

        // Validazione della conferma della password
        if (password !== passwordConfirmation) {
            passwordConfirmationError.textContent =
                "Le password non coincidono.";
            isValid = false;
        }

        // Se tutto è valido, invio il form
        if (isValid) {
            registerForm.submit();
        }
    });
}
