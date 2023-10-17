const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            primary: "#FFC244",
            primary_hover: "#C79735",
            secondary: "#00A082",
            b_hover: "#00846B",
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
