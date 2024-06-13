import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js"
    ],
    darkMode: 'selector',
    theme: {
		extend: {
			colors: {
				'primary': {
					'50': '#ecfcff',
					'100': '#cff7fe',
					'200': '#a5effc',
					'300': '#67e4f9',
					'400': '#22d0ee',
					'500': '#06b6d4',
					'600': '#0899b2',
					'700': '#0e7d90',
					'800': '#156775',
					'900': '#165863',
					'950': '#083b44',
				},
				'gray': {
					'50': '#fafafa',
					'100': '#f5f5f5',
					'200': '#e5e5e5',
					'300': '#d4d4d4',
					'400': '#a3a3a3',
					'500': '#737373',
					'600': '#525252',
					'700': '#404040',
					'800': '#262626',
					'900': '#171717',
					'950': '#0a0a0a',
				},

			}
		},
  	},
    plugins: [
        forms,
        require('preline/plugin'),
    ],
};
