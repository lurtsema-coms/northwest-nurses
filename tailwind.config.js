import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                roboto: ["Roboto", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#1d5d72",
                dark: "#0d0d0d",
            },
            backgroundImage: {
                "custom-gradient-x":
                    "linear-gradient(to right, #1d5d72, rgba(29, 93, 114, 0.5) 50%, #1d5d72)",
                "custom-gradient-y":
                    "linear-gradient(to top, #1d5d72, transparent 70%, transparent)",
                "faded-primary": "#1d5d72e3",
            },
        },
    },

    plugins: [forms],
};
