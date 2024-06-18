import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "node_modules/preline/dist/*.js",
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
                "bg-custom-faded-primary ": "#1d5d72",
            },
            backgroundImage: {
                "custom-gradient-x":
                    "linear-gradient(to right, #1d5d72, rgba(29, 93, 114, 0.5) 50%, #1d5d72)",
                "custom-gradient-y":
                    "linear-gradient(to top, #1d5d72, transparent 70%, transparent)",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: 0 },
                    "100%": { opacity: 1 },
                },
            },
            animation: {
                "fade-in": "fadeIn 0.3s ease",
            },
            boxShadow: {
                custom: "rgba(99, 99, 99, 0.2) 0px 2px 8px 0px",
            },
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                md: "3rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
    },

    plugins: [
        forms,
        require("preline/plugin"),
        function ({ addUtilities }) {
            const newUtilities = {
                ".scrollbar-thin": {
                    "scrollbar-width": "thin",
                },
                ".scrollbar-thumb-gray": {
                    "&::-webkit-scrollbar-thumb": {
                        "background-color": "#a0aec0",
                    },
                },
                ".scrollbar-thumb-rounded": {
                    "&::-webkit-scrollbar-thumb": {
                        "border-radius": "0.375rem",
                    },
                },
                ".scrollbar-thin::-webkit-scrollbar": {
                    width: "8px",
                },
                ".scrollbar-thin::-webkit-scrollbar-track": {
                    background: "#f1f1f1",
                },
            };

            addUtilities(newUtilities, ["responsive", "hover"]);
        },
    ],
};
