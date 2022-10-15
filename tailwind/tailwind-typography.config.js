module.exports = {
	theme: {
		extend: {
			typography: ({ theme }) => ( {
				/**
				 * Tailwind Typography’s default styles are opinionated, and
				 * you may need to override them if you have mockups to
				 * replicate. You can view the default modifiers here:
				 *
				 * https://github.com/tailwindlabs/tailwindcss-typography/blob/master/src/styles.js
				 */
				hexagone: {
					css: {
						'--tw-prose-body': theme("colors.foreground"),
						'--tw-prose-headings': theme("colors.primary"),
						'--tw-prose-lead': theme("colors.slate[600]"),
						'--tw-prose-links': theme("colors.primary"),
						'--tw-prose-bold': theme("colors.primary"),
						'--tw-prose-counters': theme("colors.primary"),
						'--tw-prose-bullets': theme("colors.primary"),
						'--tw-prose-hr': theme("colors.light-grey"),
						'--tw-prose-quotes': theme("colors.slate[900]"),
						'--tw-prose-quote-borders': theme("colors.slate[200]"),
						'--tw-prose-captions': theme("colors.slate[500]"),
						'--tw-prose-code': theme("colors.slate[900]"),
						'--tw-prose-pre-code': theme("colors.slate[200]"),
						'--tw-prose-pre-bg': theme("colors.slate[800]"),
						'--tw-prose-th-borders': theme("colors.slate[300]"),
						'--tw-prose-td-borders': theme("colors.slate[200]"),
						'--tw-prose-invert-body': theme("colors.background"),
						'--tw-prose-invert-headings': theme("colors.white"),
						'--tw-prose-invert-lead': theme("colors.slate[400]"),
						'--tw-prose-invert-links': theme("colors.accent"),
						'--tw-prose-invert-bold': theme("colors.accent"),
						'--tw-prose-invert-counters': theme("colors.accent"),
						'--tw-prose-invert-bullets': theme("colors.accent"),
						'--tw-prose-invert-hr': theme("colors.light-grey"),
						'--tw-prose-invert-quotes': theme("colors.slate[100]"),
						'--tw-prose-invert-quote-borders': theme("colors.slate[700]"),
						'--tw-prose-invert-captions': theme("colors.slate[400]"),
						'--tw-prose-invert-code': theme("colors.white"),
						'--tw-prose-invert-pre-code': theme("colors.slate[300]"),
						'--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
						'--tw-prose-invert-th-borders': theme("colors.slate[600]"),
						'--tw-prose-invert-td-borders': theme("colors.slate[700]"),
					},
				},
				DEFAULT: {
					css: {
						maxWidth: "80ch",
						textAlign: "justify",
						a: {
							textDecoration: "none",
						},
						strong: {
							fontWeight: "500",
						},
						h1: {
							fontWeight: '500',
						},
						'h1 strong': {
							fontWeight: '600',
						},
						h2: {
							fontWeight: '500',
						},
						'h2 strong': {
							fontWeight: '600',
						},
						h3: {
							fontWeight: '500',
						},
						'h3 strong': {
							fontWeight: '600',
						},
						h4: {
							fontWeight: '500',
						},
						'h4 strong': {
							fontWeight: '600',
						},
					},
				},
			} ),
		},
	},
};
