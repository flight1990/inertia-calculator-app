/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
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

			},
			keyframes: {
				backdropIn: {
					from: { opacity: 0 },
					to: { opacity: 1 },
				},
				dialogIn: {
					from: { transform: 'translate(-50%, -70%) scale(.98)' },
					to: { transform: 'translate(-50%, -50%) scale(1)' },
				},
				ofcanvasInRight: {
					from: { transform: 'translate(100%, 0%)' },
					to: { transform: 'translate(0%, 0%)' },
				},
				ofcanvasOutRight: {
					from: { transform: 'translate(0%, 0%)' },
					to: { transform: 'translate(100%, 0%)' },
				},
				ofcanvasInLeft: {
					from: { transform: 'translate(-100%, 0%)' },
					to: { transform: 'translate(0%, 0%)' },
				},
				ofcanvasOutLeft: {
					from: { transform: 'translate(0%, 0%)' },
					to: { transform: 'translate(-100%, 0%)' },
				},
				slideDown: {
					from: { height: 0 },
					to: { height: 'var(--radix-accordion-content-height)' },
				},
				slideUp: {
					from: { height: 'var(--radix-accordion-content-height)' },
					to: { height: 0 },
				},
				slideDownAndFade: {
					from: { opacity: 0, transform: 'translateY(-2px)' },
					to: { opacity: 1, transform: 'translateY(0)' },
				},
				slideLeftAndFade: {
					from: { opacity: 0, transform: 'translateX(2px)' },
					to: { opacity: 1, transform: 'translateX(0)' },
				},
				slideUpAndFade: {
					from: { opacity: 0, transform: 'translateY(2px)' },
					to: { opacity: 1, transform: 'translateY(0)' },
				},
				slideRightAndFade: {
					from: { opacity: 0, transform: 'translateX(-2px)' },
					to: { opacity: 1, transform: 'translateX(0)' },
				},
				overlayShow: {
					from: { opacity: 0 },
					to: { opacity: 1 },
				},
				overlayHide: {
					from: { opacity: 1 },
					to: { opacity: 0 },
				},
				contentShow: {
					from: { opacity: 0, transform: 'translate(-50%, -48%) scale(0.96)' },
					to: { opacity: 1, transform: 'translate(-50%, -50%) scale(1)' },
				},
			},
			animation: {
				backdropIn: 'backdropIn 500ms cubic-bezier(0.16, 1, 0.3, 1)',
				dialogIn: 'dialogIn 500ms cubic-bezier(0, 0, 0.2, 1)',
				ofcanvasInRight: 'ofcanvasInRight 300ms cubic-bezier(0, 0, 0.2, 1)',
				ofcanvasOutRight: 'ofcanvasOutRight 300ms cubic-bezier(0, 0, 0.2, 1)',
				ofcanvasInLeft: 'ofcanvasInLeft 300ms cubic-bezier(0, 0, 0.2, 1)',
				ofcanvasOutLeft: 'ofcanvasOutLeft 300ms cubic-bezier(0, 0, 0.2, 1)',
				slideDown: 'slideDown 300ms cubic-bezier(0.4, 0, 1, 1)',
        		slideUp: 'slideUp 300ms cubic-bezier(0.4, 0, 1, 1)',
				slideDownAndFade: 'slideDownAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
				slideLeftAndFade: 'slideLeftAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
				slideUpAndFade: 'slideUpAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
				slideRightAndFade: 'slideRightAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
				overlayShow: 'overlayShow 300ms cubic-bezier(0.16, 1, 0.3, 1)',
				overlayHide: 'overlayHide 300ms cubic-bezier(0.16, 1, 0.3, 1)',
       			contentShow: 'contentShow 150ms cubic-bezier(0.16, 1, 0.3, 1)',
			},
		},
  	},
    plugins: [
         require("@tailwindcss/forms")({
			strategy: 'class', // only generate classes
		}),
		require('@tailwindcss/typography'),
    ],
};
