<template>
	<app-head :metadata="metadata"></app-head>

	<div class="main-container relative overflow-hidden flex flex-col min-h-screen text-17px text-gray-900">
		<div class="grow flex flex-col">
			<slot></slot>
		</div>
	</div>

	<Toaster position="bottom-right" :toast-options="toastOptions">
		<template #success-icon>
			<circle-check></circle-check>
		</template>

		<template #info-icon>
			<info></info>
		</template>

		<template #warning-icon>
			<triangle-alert></triangle-alert>
		</template>

		<template #error-icon>
			<circle-x></circle-x>
		</template>
	</Toaster>
</template>

<script>
	import AppHead from "@/js/components/AppHead.vue";
	import { router } from "@inertiajs/vue3";
	import { Toaster, toast } from "vue-sonner";
	import { CircleCheck, CircleX, Info, TriangleAlert } from "@lucide/vue";

	export default {
		components: {
			AppHead, Toaster, CircleCheck, CircleX, Info, TriangleAlert
		},

		props: {
			user: Object,
			metadata: Object
		},

		data() {
			return {
				removeFlashListener: null,

				// Toasts are styled like the notification cards in the home page hero
				toastOptions: {
					unstyled: true,
					classes: {
						toast: 'group flex w-full items-center gap-3 rounded-2xl bg-white/95 p-3 pr-5 font-inter shadow-xl shadow-brand-ink/10 ring-1 ring-slate-900/5 backdrop-blur',
						icon: 'flex size-10 shrink-0 items-center justify-center rounded-xl bg-brand-teal/10 text-brand-teal *:size-5 group-data-[type=error]:bg-red-500/10 group-data-[type=error]:text-red-600 group-data-[type=success]:bg-brand-cyan/10 group-data-[type=success]:text-brand-cyan group-data-[type=warning]:bg-amber-500/10 group-data-[type=warning]:text-amber-600',
						content: 'min-w-0',
						title: 'text-sm font-semibold text-brand-ink',
						description: 'mt-0.5 text-xs leading-relaxed text-slate-500'
					}
				}
			}
		},

		mounted() {
			// Fires on every response that carries flash data, including the initial page load
			this.removeFlashListener = router.on('flash', (event) => {
				const flash = event.detail.flash;

				if (flash.sessionExpired) {
					toast.warning('Session expired', {
						description: 'Please try again.'
					});
				}

				if (flash.tooManyRequests) {
					toast.warning('Too many attempts', {
						description: 'Please try again in a few minutes.'
					});
				}

				if (flash.verified) {
					toast.success('Email verified.');
				}

				if (flash.passwordReset) {
					toast.success('Your password has been reset.');
				}

				if (flash.contactMessageSent) {
					toast.success('Message sent', {
						description: 'Thanks for reaching out! We\'ll get back to you as soon as possible.'
					});
				}
			});
		},

		unmounted() {
			this.removeFlashListener?.();
		},

		methods: {

		},

		computed: {

		}
	}
</script>
