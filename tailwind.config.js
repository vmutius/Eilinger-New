import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./resources/js/**/*.js',
	],

	theme: {
		extend: {
			colors: {
				primary: {
					DEFAULT: '#37517e',
					50: '#f4f6fb',
					100: '#e9edf5',
					200: '#ced8e9',
					300: '#a3b8d6',
					400: '#7191bf',
					500: '#4f73a8',
					600: '#3c5a8d',
					700: '#37517e',
					800: '#2c3f60',
					900: '#293751',
					950: '#1b2336',
				},
				accent: {
					DEFAULT: '#47b2e4',
					hover: '#31a9e1',
				},
				gray: {
					50: '#f9fafb',
					100: '#f3f4f6',
					200: '#e5e7eb',
					300: '#d1d5db',
					400: '#9ca3af',
					500: '#6b7280',
					600: '#4b5563',
					700: '#374151',
					800: '#1f2937',
					900: '#111827',
					950: '#030712',
				},
				bodyBg: '#f3f5fa',
				footerBg: '#283a5a',
				footerText: '#777777',
				sidebarDark: '#283a5a',
				ghostWhite: '#f8fafc',
				// Essential colors
				white: '#fff',
				black: '#000',
				body: '#E6E9ED',
				text: '#1b2356',
				// Status colors
				success: '#15803d',
				successHover: '#166534',
				warning: '#FFA726',
				danger: '#EF5350',
				info: '#29B6F6'
			},
			fontFamily: {
				'primary': ['Roboto', 'sans-serif'],
				'ubuntu': ['Ubuntu', 'sans-serif'],
				'decorative': ['TheSalvadorCondensed', 'sans-serif'],
			},
		},
	},

	plugins: [forms],
};
