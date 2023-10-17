// validation restaurants per create

const formCreate = document.getElementById("form-create"); // Seleziona il form
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

if (formCreate) {
    formCreate.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const name = document.getElementById("name-create").value;
        const description = document.getElementById("description-create").value;
        const city = document.getElementById("city-create").value;
        const address = document.getElementById("address-create").value;
        const vat = document.getElementById("vat-create").value;
        const priceRange = document.getElementById("priceRange-create").value;
        const inputImage = document.getElementById("url_image");

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.getElementById("nameError");
        const descriptionError = document.getElementById("descriptionError");
        const cityError = document.getElementById("cityError");
        const addressError = document.getElementById("addressError");
        const vatError = document.getElementById("vatError");
        const priceRangeError = document.getElementById("priceRangeError");
        const categoryError = document.getElementById("categoryError");
        const errorDiv = document.getElementById("url_imageError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        descriptionError.textContent = "";
        cityError.textContent = "";
        addressError.textContent = "";
        vatError.textContent = "";
        errorDiv.textContent = "";
        priceRangeError.textContent = "";

        // Esegui le validazioni
        let isValid = true;
        let isAnyCheckboxChecked = false;

        if (name.trim() === "") {
            nameError.textContent = "Il campo 'Nome' è obbligatorio.";
            isValid = false;
        } else if (name.length > 50) {
            nameError.textContent =
                "Il campo 'Nome' può contenere al massimo 50 caratteri.";
            isValid = false;
        }

        if (description.trim() === "") {
            descriptionError.textContent =
                "Il campo 'Descrizione' è obbligatorio.";
            isValid = false;
        }

        if (city.trim() === "") {
            cityError.textContent =
                "Il campo 'Città' è obbligatorio.";
            isValid = false;
        } else if (city.length > 30) {
            cityError.textContent =
                "Il campo 'Città' può contenere al massimo 30 caratteri.";
            isValid = false;
        }

        if (address.trim() === "") {
            addressError.textContent =
                "Il campo 'Indirizzo' è obbligatorio.";
            isValid = false;
        } else if (address.length > 30) {
            addressError.textContent =
                "Il campo 'Indirizzo' può contenere al massimo 30 caratteri.";
            isValid = false;
        }

        if (vat.trim() === "") {
            vatError.textContent = "Il campo 'P.IVA' è obbligatorio.";
            isValid = false;
        } else if (!/^\d{10}$/.test(vat)) {
            vatError.textContent =
                "Inserisci una 'P.IVA' valida composta da 10 cifre.";
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

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                isAnyCheckboxChecked = true;
            }
        });

        if (!isAnyCheckboxChecked) {
            event.preventDefault();
            categoryError.textContent = "Seleziona almeno una categoria.";
            isValid = false;
        } else {
            categoryError.textContent = ""; // Rimuovi il messaggio di errore se almeno un checkbox è selezionato
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            formCreate.submit();
        }
    });
}

// validation restaurants per edit

const formEdit = document.getElementById("form-edit"); // Seleziona il form
const checkboxesEdit = document.querySelectorAll('input[type="checkbox"]'); //seleziona le checkbox

if (formEdit) {
    formEdit.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const nameEdit = document.getElementById("name-edit").value;
        const descriptionEdit =
            document.getElementById("description-edit").value;
        const cityEdit = document.getElementById("city-edit").value;
        const addressEdit = document.getElementById("address-edit").value;
        const vatEdit = document.getElementById("vat-edit").value;
        const priceRangeEdit = document.getElementById("priceRange-edit").value;
        const inputImageEdit = document.getElementById("url_image-edit");

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameErrorEdit = document.getElementById("nameErrorEdit");
        const descriptionErrorEdit = document.getElementById(
            "descriptionErrorEdit"
        );
        const cityErrorEdit = document.getElementById("cityErrorEdit");
        const addressErrorEdit = document.getElementById("addressErrorEdit");
        const vatErrorEdit = document.getElementById("vatErrorEdit");
        // const url_imageErrorEdit =
        const priceRangeErrorEdit = document.getElementById(
            "priceRangeErrorEdit"
        );
        const categoryErrorEdit = document.getElementById("categoryErrorEdit");
        const errorDivEdit = document.getElementById("url_imageErrorEdit");

        // Resetta i messaggi di errore
        nameErrorEdit.textContent = "";
        descriptionErrorEdit.textContent = "";
        cityErrorEdit.textContent = "";
        addressErrorEdit.textContent = "";
        vatErrorEdit.textContent = "";
        errorDivEdit.textContent = "";
        priceRangeErrorEdit.textContent = "";

        // Esegui le validazioni
        let isValidEdit = true;
        let isAnyCheckboxCheckedEdit = false;

        if (nameEdit.trim() === "") {
            nameErrorEdit.textContent =
                "Il campo 'Nome' è obbligatorio.";
            isValidEdit = false;
        } else if (nameEdit.length > 50) {
            nameErrorEdit.textContent =
                "Il campo 'Nome' può contenere al massimo 50 caratteri.";
            isValidEdit = false;
        }

        if (descriptionEdit.trim() === "") {
            descriptionErrorEdit.textContent =
                "Il campo 'Descrizione' è obbligatorio.";
            isValidEdit = false;
        }

        if (cityEdit.trim() === "") {
            cityErrorEdit.textContent =
                "Il campo 'Città' è obbligatorio.";
            isValidEdit = false;
        } else if (cityEdit.length > 30) {
            cityErrorEdit.textContent =
                "Il campo 'Città' può contenere al massimo 30 caratteri.";
            isValidEdit = false;
        }

        if (addressEdit.trim() === "") {
            addressErrorEdit.textContent =
                "Il campo 'Indirizzo' è obbligatorio.";
            isValidEdit = false;
        } else if (addressEdit.length > 30) {
            addressErrorEdit.textContent =
                "Il campo 'Indirizzo' può contenere al massimo 30 caratteri.";
            isValidEdit = false;
        }

        if (vatEdit.trim() === "") {
            vatErrorEdit.textContent =
                "Il campo 'P.IVA' è obbligatorio.";
            isValidEdit = false;
        } else if (!/^\d{10}$/.test(vatEdit)) {
            vatErrorEdit.textContent =
                "Inserisci una 'P.IVA' valida composta da 10 cifre.";
            isValidEdit = false;
        }

        if (inputImageEdit.files[0]) {
            const file = inputImageEdit.files[0];
            const maxSize = 1 * 1024 * 1024; // 1 MB in bytes
            const allowedExtensions = ["jpg", "jpeg", "png"];

            if (file.size > maxSize) {
                errorDivEdit.textContent = "L'immagine non deve superare 1 MB.";
                isValidEdit = false;
            } else if (
                !allowedExtensions.includes(
                    file.name.split(".").pop().toLowerCase()
                )
            ) {
                errorDivEdit.textContent =
                    "Sono consentiti solo file con estensione .jpg, .jpeg o .png.";
                isValidEdit = false;
            }
        }

        checkboxesEdit.forEach((checkboxEdit) => {
            if (checkboxEdit.checked) {
                isAnyCheckboxCheckedEdit = true;
            }
        });

        if (!isAnyCheckboxCheckedEdit) {
            event.preventDefault();
            categoryErrorEdit.textContent = "Seleziona almeno una categoria.";
            isValidEdit = false;
        } else {
            categoryErrorEdit.textContent = "";
        }

        // Se tutto è valido, sottometti il form
        if (isValidEdit) {
            formEdit.submit();
        }
    });
}
