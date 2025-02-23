const defaultTheme = require('tailwindcss/defaultTheme');
const { addDynamicIconSelectors } = require('@iconify/tailwind')

module.exports = {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('daisyui'),
        addDynamicIconSelectors(),
    ],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    "primary":          "#981915",  // Color de Fondo de la sidebar
                    "primary-content":  "#F1F5FB",  // Color del contenido de la Sidebar

                    "neutral":          "#FFFFFF",  // Color del Fondo Completo de la página

                    "base-100":         "#EFEFEF",  // Color de fondo de elementos varios por encima del fondo general

                    "base-200":         "#EDDDDD",

                    "base-300":         "#EEEEEE",

                    "base-content":     "#2A2222",  // Color de los textos e íconos de los elementos en el fondo general

                    "accent":           "#D3CACA",  // Color del encabezado de tablas, bordes y elementos de formulario especiales
                    "accent-content":   "#2A2222",  // Color del cuerpo de las tablas y elementos de formulario comunes

                    "error-content":    "#F6EFEF", // Color de alertas de validacion de formularios

                    "success":          "#18A811",
                    "success-content":  "#F1F5FB",
                    // "success-content":  "D0FDE1",

                    "error":            "#AA1A1A",
                    "error-content":    "#EEE",

                    "warning":          "#C48200",
                    "warning-content":  "#FFF",

                    "info":             "#4868CF",
                    "info-content":     "#EEE",

                },
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],

                    "primary":          "#981915",  // Color de Fondo de la sidebar
                    "primary-content":  "#D1D5DB",  // Color del contenido de la Sidebar

                    "neutral":          "#2E3745",  // Color del Fondo Completo de la página

                    "base-100":         "#1F2937",  // Color de fondo de elementos varios por encima del fondo general
                    "base-content":     "#FAFAFA",  // Color de los textos e íconos de los elementos en el fondo general


                    "base-300":         "#1F2937",

                    "accent":           "#536074",
                    "accent-content":   "#FAFAFA",

                    // Sin usar por el momento
                    "secondary":        "#AAAAAA",
                    "secondary-content":"#AAAAAA",

                    "base-200":         "#1F2937",

                    "info":             "#4868CF",
                    "info-content":     "#EEE",

                    "success":          "#1A8241",
                    "success-content":  "#FAFAFA",
                    // "success-content":  "16a34a",
                    "warning":          "#C48200",
                    "warning-content":  "#FFFFFF",
                    "error":            "#F98585",
                    "error-content":    "#EEE",
                },
            },
        ],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        prefix: "",
        logs: true,
        themeRoot: ":root",


    },
    darkMode: ['class', '[data-theme="dark"]']


};
