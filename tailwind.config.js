/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Use 'class' to enable dark mode with the dark class

    content: [
        "./resources/**/*.{html,js,php}",
        "./node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("preline/plugin")],
};
module.exports = {
    darkMode: "selector",
    // ...
};
