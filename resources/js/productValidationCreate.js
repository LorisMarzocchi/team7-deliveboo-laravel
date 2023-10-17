const productCreateForm = document.getElementById("product_create_form"); // Seleziona il form

if (productCreateForm) {
    productCreateForm.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const name = document.getElementById("product_name_create").value;
        const ingredients = document.getElementById(
            "product_ingredients_create"
        ).value;
        const price = document.getElementById("product_price_create").value;
        const description = document.getElementById(
            "product_description_create"
        ).value;
        const inputImage = document.getElementById("url_image");

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.querySelector("#ProductNameError");
        const ingredientsError = document.querySelector(
            "#ProductIngredientsError"
        );
        const priceError = document.querySelector("#ProductPriceError");
        const descriptionError = document.querySelector(
            "#ProductDescriptionError"
        );
        const errorDiv = document.getElementById("url_imageError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        ingredientsError.textContent = "";
        priceError.textContent = "";
        descriptionError.textContent = "";
        errorDiv.textContent = "";

        // Esegui le validazioni
        let isValid = true;

        if (name.trim() === "") {
            nameError.textContent = "Il campo Nome è obbligatorio.";
            isValid = false;
        } else if (name.length < 2) {
            nameError.textContent =
                "Il campo 'Nome' deve contenere almeno 2 caratteri.";
            isValid = false;
        } else if (name.length > 50) {
            nameError.textContent =
                "Il campo 'Nome' può contenere al massimo 50 caratteri.";
            isValid = false;
        }

        if (ingredients.trim() === "") {
            ingredientsError.textContent =
                "Il campo 'Ingredienti' è obbligatorio.";
            isValid = false;
        } else if (ingredients.length < 10) {
            ingredientsError.textContent =
                "Il campo 'Ingredienti' deve contenere almeno 10 caratteri.";
            isValid = false;
        }

        if (price.trim() === "") {
            priceError.textContent = "Il campo 'Prezzo' è obbligatorio.";
            isValid = false;
        } else if (price <= 0) {
            priceError.textContent = "Il campo 'Prezzo' non può essere zero.";
            isValid = false;
        } else if (price > 254) {
            priceError.textContent =
                "Il campo 'Prezzo' può essere al massimo di 254.";
            isValid = false;
        } else if (!isNaN(price)) {
            var number = parseFloat(price);

            if (
                isFinite(number) &&
                Number((number * 100).toFixed(2)) % 1 === 0
            ) {
                // Il numero è valido con due decimali
            } else {
                priceError.textContent =
                    "Il campo 'Prezzo' deve essere decimale con due cifre decimali.";
                isValid = false;
            }
        } else {
            priceError.textContent =
                "Inserisci un valore numerico valido nel campo 'Prezzo'.";
            isValid = false;
        }

        if (description.trim() === "") {
            descriptionError.textContent =
                "Il campo 'Descrizione' è obbligatorio.";
            isValid = false;
        } else if (description.length < 10) {
            descriptionError.textContent =
                "Il campo 'Descrizione' deve contenere almeno 10 caratteri.";
            isValid = false;
        }

        if (inputImage.files[0]) {
            const file = inputImage.files[0];
            const maxSize = 1 * 1024 * 1024; // 1 MB in bytes
            const allowedExtensions = ["jpg", "jpeg", "png"];

            if (file.size > maxSize) {
                errorDiv.textContent = "L'immagine non deve superare 1 MB.";
                isValid = false;
            } else if (
                !allowedExtensions.includes(
                    file.name.split(".").pop().toLowerCase()
                )
            ) {
                errorDiv.textContent =
                    "Sono consentiti solo file con estensione .jpg, .jpeg o .png.";
                isValid = false;
            }
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            productCreateForm.submit();
        }
    });
}
