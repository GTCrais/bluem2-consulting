<template>
	<div id="top" class="relative bg-white text-slate-600">
		<a
			href="#main-content"
			class="retain-text-color sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:rounded-full focus:bg-brand-ink focus:px-5 focus:py-2.5 focus:text-sm focus:font-semibold focus:text-white"
		>
			Skip to content
		</a>

		<header
			class="fixed inset-x-0 top-0 z-50 transition-[background-color,box-shadow] duration-300"
			:class="headerIsSolid ? 'bg-white/85 shadow-[0_1px_0_rgba(15,23,42,0.07)] backdrop-blur-xl' : 'bg-transparent'"
		>
			<container>
				<div class="flex items-center justify-between gap-6 transition-[height] duration-300" :class="scrolled ? 'h-16' : 'h-20'">
					<a href="#top" class="retain-text-color rounded-md" aria-label="BlueM2 Consulting, back to top" @click="scrollToSection($event, 'top')">
						<app-logo class="h-[26px] sm:h-[30px]"></app-logo>
					</a>

					<nav class="hidden items-center gap-1 rounded-full bg-slate-900/[0.035] p-1 ring-1 ring-slate-900/5 lg:flex" aria-label="Main navigation">
						<a
							v-for="item in navigation"
							:key="'nav-' + item.id"
							:href="'#' + item.id"
							class="retain-text-color rounded-full px-4 py-2 text-sm font-medium transition-all duration-200"
							:class="activeSection === item.id ? 'bg-white text-brand-ink shadow-sm ring-1 ring-slate-900/5' : 'text-slate-600 hover:text-brand-ink'"
							:aria-current="activeSection === item.id ? 'true' : null"
							@click="scrollToSection($event, item.id)"
						>
							{{ item.label }}
						</a>
					</nav>

					<div class="flex items-center gap-2">
						<a
							href="#contact"
							class="retain-text-color group hidden items-center gap-2 rounded-full bg-brand-ink px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-ink/10 transition-colors hover:bg-brand-teal sm:inline-flex"
							@click="scrollToSection($event, 'contact')"
						>
							Start a project
							<arrow-right class="size-4 transition-transform duration-200 group-hover:translate-x-0.5"></arrow-right>
						</a>

						<button
							type="button"
							class="inline-flex size-10 cursor-pointer items-center justify-center rounded-full text-brand-ink ring-1 ring-slate-900/10 transition-colors hover:bg-slate-900/5 lg:hidden"
							aria-controls="mobile-menu"
							:aria-expanded="mobileMenuOpen ? 'true' : 'false'"
							:aria-label="mobileMenuOpen ? 'Close menu' : 'Open menu'"
							@click="mobileMenuOpen = !mobileMenuOpen"
						>
							<x v-if="mobileMenuOpen" class="size-5"></x>
							<menu-icon v-else class="size-5"></menu-icon>
						</button>
					</div>
				</div>
			</container>

			<transition
				enter-active-class="transition duration-200 ease-out"
				enter-from-class="-translate-y-2 opacity-0"
				leave-active-class="transition duration-150 ease-in"
				leave-to-class="-translate-y-2 opacity-0"
			>
				<div v-if="mobileMenuOpen" id="mobile-menu" class="border-t border-slate-900/5 bg-white/95 shadow-xl shadow-slate-900/5 backdrop-blur-xl lg:hidden">
					<container class="flex flex-col pt-2 pb-6">
						<a
							v-for="item in navigation"
							:key="'mobile-nav-' + item.id"
							:href="'#' + item.id"
							class="retain-text-color flex items-center justify-between border-b border-slate-100 py-4 font-display text-lg font-medium text-brand-ink"
							@click="scrollToSection($event, item.id)"
						>
							{{ item.label }}
							<arrow-right class="size-4 text-slate-400"></arrow-right>
						</a>

						<a
							href="#contact"
							class="retain-text-color mt-6 inline-flex items-center justify-center gap-2 rounded-full bg-brand-ink px-5 py-3.5 text-sm font-semibold text-white"
							@click="scrollToSection($event, 'contact')"
						>
							Start a project
							<arrow-right class="size-4"></arrow-right>
						</a>
					</container>
				</div>
			</transition>
		</header>

		<main id="main-content">
			<section id="hero" class="relative isolate overflow-hidden pt-32 pb-20 sm:pt-40 sm:pb-28 lg:pt-44 lg:pb-36" aria-labelledby="hero-title">
				<div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
					<div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(15,23,42,0.045)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,0.045)_1px,transparent_1px)] bg-size-[64px_64px] [mask-image:radial-gradient(ellipse_75%_65%_at_50%_0%,black_45%,transparent_100%)]"></div>
					<div class="absolute -top-[28.25rem] right-[calc(-12%_-_16.25rem)] size-[76.5rem] bg-radial from-brand-cyan/20 via-brand-cyan/10 via-35% to-transparent to-70%"></div>
					<div class="absolute top-[calc(100%/3_-_15rem)] -left-[27rem] size-[62rem] bg-radial from-brand-teal/10 via-brand-teal/5 via-35% to-transparent to-70%"></div>
				</div>

				<container>
					<div class="grid items-center gap-20 lg:grid-cols-12 lg:gap-12">
						<div class="lg:col-span-6">
							<p class="inline-flex items-center gap-3 rounded-full bg-white/80 py-1.5 pr-4 pl-1.5 text-xs font-medium text-slate-600 shadow-sm ring-1 ring-slate-900/5 backdrop-blur motion-safe:animate-fade-up sm:text-sm">
								<span class="inline-flex items-center gap-2 rounded-full bg-brand-cyan/10 px-2.5 py-1 font-semibold text-brand-teal">
									<span class="relative flex size-1.5">
										<span class="absolute inline-flex size-full rounded-full bg-brand-cyan opacity-75 motion-safe:animate-ping"></span>
										<span class="relative inline-flex size-1.5 rounded-full bg-brand-cyan"></span>
									</span>
									From idea to launch
								</span>
								<span class="sm:hidden">Web agency</span>
								<span class="hidden sm:inline">Web development agency</span>
							</p>

							<h1 id="hero-title" class="mt-7 font-display text-[2.6rem] leading-[1.05] font-semibold tracking-[-0.045em] text-brand-ink motion-safe:animate-fade-up motion-safe:[animation-delay:80ms] sm:text-6xl lg:text-[4.1rem] xl:text-7xl">
								We develop websites with
								<span class="bg-linear-to-r from-brand-cyan to-brand-teal bg-clip-text text-transparent">passion.</span>
							</h1>

							<p class="mt-7 max-w-xl text-lg leading-relaxed text-slate-600 motion-safe:animate-fade-up motion-safe:[animation-delay:160ms] sm:text-xl sm:leading-relaxed">
								Turning your ideas into reality is our mission. From eCommerce webshops to fully custom business applications, we design, build and support software that moves your business forward.
							</p>

							<div class="mt-10 flex flex-col gap-3 motion-safe:animate-fade-up motion-safe:[animation-delay:240ms] sm:flex-row sm:items-center">
								<a
									href="#contact"
									class="retain-text-color group inline-flex items-center justify-center gap-2.5 rounded-full bg-brand-ink px-7 py-4 font-semibold text-white shadow-xl shadow-brand-ink/15 transition-colors hover:bg-brand-teal"
									@click="scrollToSection($event, 'contact')"
								>
									Start your project
									<arrow-right class="size-4 transition-transform duration-200 group-hover:translate-x-1"></arrow-right>
								</a>

								<a
									href="#services"
									class="retain-text-color inline-flex items-center justify-center gap-2 rounded-full bg-white/70 px-7 py-4 font-semibold text-brand-ink ring-1 ring-slate-900/10 backdrop-blur transition-colors hover:bg-white hover:ring-slate-900/20"
									@click="scrollToSection($event, 'services')"
								>
									Explore services
								</a>
							</div>

							<ul class="mt-10 flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium text-slate-500 motion-safe:animate-fade-up motion-safe:[animation-delay:320ms]">
								<li v-for="highlight in heroHighlights" :key="highlight" class="flex items-center gap-2">
									<span class="flex size-5 items-center justify-center rounded-full bg-brand-cyan/10 text-brand-teal">
										<check class="size-3" :stroke-width="3"></check>
									</span>
									{{ highlight }}
								</li>
							</ul>
						</div>

						<div aria-hidden="true" class="relative lg:col-span-6 motion-safe:animate-fade-up motion-safe:[animation-delay:200ms]">
							<div class="relative mx-auto w-full max-w-[34rem] lg:mr-0 lg:ml-auto">
								<div aria-hidden="true" class="absolute -inset-x-[10rem] -top-[6rem] -bottom-[10rem] bg-linear-to-tr from-brand-cyan/40 via-brand-teal/25 to-brand-cyan/10 [mask-image:linear-gradient(to_right,transparent,black_16rem,black_calc(100%_-_16rem),transparent),linear-gradient(to_bottom,transparent,black_16rem,black_calc(100%_-_16rem),transparent)] [mask-composite:intersect]"></div>

								<div class="relative rounded-[1.4rem] bg-white/80 p-1.5 shadow-2xl shadow-brand-ink/20 ring-1 ring-slate-900/10">
									<div class="overflow-hidden rounded-2xl bg-white ring-1 ring-slate-900/5">
										<div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50/80 px-4 py-3">
											<div class="flex gap-1.5">
												<span class="size-2.5 rounded-full bg-slate-300"></span>
												<span class="size-2.5 rounded-full bg-slate-300"></span>
												<span class="size-2.5 rounded-full bg-slate-300"></span>
											</div>

											<div class="flex flex-1 justify-center">
												<div class="flex w-full max-w-56 items-center justify-center gap-1.5 rounded-md bg-white px-3 py-1 text-[11px] text-slate-500 ring-1 ring-slate-900/5">
													<lock class="size-3"></lock>
													yourbusiness.com
												</div>
											</div>

											<div class="w-10"></div>
										</div>

										<div class="space-y-4 p-4 sm:p-5">
											<div class="flex items-center justify-between">
												<div class="flex items-center gap-2">
													<span class="size-5 -skew-x-[29deg] rounded-[4px] bg-linear-to-br from-brand-cyan to-brand-teal"></span>
													<span class="h-2 w-16 rounded-full bg-slate-200"></span>
												</div>

												<div class="flex items-center gap-3">
													<span class="hidden h-1.5 w-8 rounded-full bg-slate-200 sm:block"></span>
													<span class="hidden h-1.5 w-8 rounded-full bg-slate-200 sm:block"></span>
													<span class="h-1.5 w-8 rounded-full bg-slate-200"></span>
													<span class="flex h-6 items-center gap-1 rounded-full bg-brand-ink px-2.5 text-[10px] font-semibold text-white">
														<shopping-cart class="size-3"></shopping-cart>
														2
													</span>
												</div>
											</div>

											<div class="relative overflow-hidden rounded-xl bg-linear-to-br from-brand-teal to-brand-ink p-5 sm:p-6">
												<div aria-hidden="true" class="absolute -top-6 right-6 bottom-[-1.5rem] flex w-28 opacity-40 sm:w-36">
													<span class="flex-1 -skew-x-[29deg] bg-brand-cyan"></span>
													<span class="flex-1 -skew-x-[29deg] bg-brand-teal"></span>
													<span class="flex-1 -skew-x-[29deg] bg-brand-ink"></span>
												</div>

												<div class="relative">
													<p class="text-[10px] font-semibold tracking-[0.2em] text-brand-cyan uppercase">New collection</p>
													<div class="mt-3 h-2.5 w-3/5 rounded-full bg-white/90"></div>
													<div class="mt-2 h-2.5 w-2/5 rounded-full bg-white/50"></div>
													<div class="mt-5 inline-flex h-7 items-center rounded-full bg-white px-3.5 text-[10px] font-semibold text-brand-ink">Shop now</div>
												</div>
											</div>

											<div class="grid grid-cols-3 gap-3">
												<div v-for="(product, productIndex) in sampleProducts" :key="'hero-product-' + productIndex" class="rounded-xl p-2 ring-1 ring-slate-900/5">
													<div class="relative flex aspect-[4/3] items-center justify-center rounded-lg bg-linear-to-br" :class="product.tint">
														<span class="bg-white/85 shadow-sm" :class="product.shape"></span>
														<span v-if="product.isNew" class="absolute top-1.5 left-1.5 rounded-full bg-brand-cyan px-1.5 py-px text-[8px] font-bold tracking-wider text-white uppercase">New</span>
													</div>
													<div class="mt-2.5 h-1.5 w-3/4 rounded-full bg-slate-200"></div>
													<div class="mt-2 flex items-center justify-between">
														<div class="flex items-center gap-1">
															<span v-for="swatch in product.swatches" :key="swatch" class="size-2.5 rounded-full ring-1 ring-slate-900/10" :class="swatch"></span>
														</div>
														<span class="flex size-5 items-center justify-center rounded-md bg-brand-ink text-white">
															<plus class="size-3" :stroke-width="2.5"></plus>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="absolute top-[38%] -left-3 flex items-center gap-3 rounded-2xl bg-white/95 p-3 pr-5 shadow-xl shadow-brand-ink/10 ring-1 ring-slate-900/5 motion-safe:animate-float sm:-left-12">
									<span class="flex size-10 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
										<shopping-bag class="size-5"></shopping-bag>
									</span>

									<div>
										<p class="text-sm font-semibold text-brand-ink">New order received</p>
										<p class="text-xs text-slate-500">Confirmation sent &middot; just now</p>
									</div>
								</div>

								<div class="absolute -right-3 -bottom-7 flex items-center gap-3 rounded-2xl bg-white/95 p-3 pr-5 shadow-xl shadow-brand-ink/10 ring-1 ring-slate-900/5 motion-safe:animate-float motion-safe:[animation-delay:-3.5s] sm:-right-8">
									<span class="flex size-10 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-600">
										<database-backup class="size-5"></database-backup>
									</span>

									<div>
										<p class="text-sm font-semibold text-brand-ink">Backup completed</p>
										<p class="text-xs text-slate-500">Today at 03:00</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</container>
			</section>

			<section class="border-y border-slate-900/[0.06] bg-slate-50/70 py-8" aria-label="Technologies we work with">
				<container class="flex flex-col items-center gap-6 lg:flex-row lg:gap-8">
					<p class="shrink-0 text-center text-xs font-semibold tracking-[0.16em] text-balance text-slate-500 uppercase lg:text-left">
						Built with a modern,<br class="hidden lg:block">
						battle-tested stack
					</p>

					<div class="relative w-full overflow-hidden pl-[5%] [mask-image:linear-gradient(to_right,transparent,black_12%,black_88%,transparent)]">
						<div class="flex w-max motion-safe:animate-marquee hover:[animation-play-state:paused]">
							<ul v-for="copy in 2" :key="'technologies-' + copy" class="flex shrink-0 items-center" :aria-hidden="copy === 2 ? 'true' : null">
								<li
									v-for="technology in technologies"
									:key="copy + '-' + technology"
									class="flex items-center gap-10 pr-10 font-display text-xl font-semibold tracking-tight whitespace-nowrap text-slate-400"
								>
									{{ technology }}
									<span class="h-4 w-1.5 -skew-x-[29deg] bg-brand-cyan/40"></span>
								</li>
							</ul>
						</div>
					</div>
				</container>
			</section>

			<section id="services" class="scroll-mt-10 py-16 sm:py-32" aria-labelledby="services-title">
				<container>
					<div v-reveal class="mx-auto max-w-3xl text-center">
						<p class="inline-block text-[13px] leading-5 font-semibold tracking-[0.16em] text-balance text-brand-teal uppercase">
							<app-logo mark-only class="mt-[5px] mr-2.5 inline-block h-2.5 align-top"></app-logo>
							<span>What we do</span>
						</p>

						<h2 id="services-title" class="mt-5 font-display text-4xl leading-[1.1] font-semibold tracking-[-0.035em] text-balance text-brand-ink sm:text-5xl">
							Software tailored to the way your business works.
						</h2>

						<p class="mt-6 text-lg leading-relaxed text-slate-600">
							Whether you're launching a product or streamlining day-to-day operations, we turn your requirements into fast, reliable and beautifully crafted web solutions.
						</p>
					</div>

					<div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
						<div
							v-for="(service, index) in services"
							:key="service.title"
							v-reveal="index * 120"
							:class="{ 'md:col-span-2 md:mx-auto md:w-[calc(50%-0.75rem)] lg:col-span-1 lg:w-auto': index === services.length - 1 }"
						>
							<article
								class="group relative flex h-full flex-col overflow-hidden rounded-[1.75rem] bg-white p-2 shadow-sm ring-1 shadow-slate-900/[0.03] ring-slate-900/[0.07] transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-ink/[0.07] hover:ring-brand-cyan/30"
								@mousemove="trackPointer"
							>
								<div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(420px_circle_at_var(--pointer-x,50%)_var(--pointer-y,0%),rgba(0,170,227,0.09),transparent_45%)] opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>

								<div aria-hidden="true" class="relative h-52 overflow-hidden rounded-[1.35rem] bg-slate-50 ring-1 ring-slate-900/5">
									<div class="absolute inset-0 bg-[radial-gradient(rgba(15,23,42,0.09)_1px,transparent_1px)] bg-size-[16px_16px] [mask-image:linear-gradient(to_bottom,black,transparent_85%)]"></div>

									<template v-if="service.visual === 'webshop'">
										<div class="absolute inset-x-5 top-5 grid grid-cols-3 gap-2.5">
											<div
												v-for="(product, productIndex) in sampleProducts"
												:key="'webshop-product-' + productIndex"
												class="rounded-xl bg-white p-1.5 shadow-sm ring-1 ring-slate-900/5 transition-transform duration-500 group-hover:-translate-y-1"
												:style="{ transitionDelay: (productIndex * 75) + 'ms' }"
											>
												<div class="flex aspect-[4/3] items-center justify-center rounded-lg bg-linear-to-br" :class="product.tint">
													<span class="bg-white/85 shadow-sm" :class="product.shape"></span>
												</div>
												<div class="mt-2 h-1.5 w-3/4 rounded-full bg-slate-200"></div>
												<div class="mt-1.5 mb-0.5 flex gap-1">
													<span v-for="swatch in product.swatches" :key="swatch" class="size-2 rounded-full ring-1 ring-slate-900/10" :class="swatch"></span>
												</div>
											</div>
										</div>

										<div class="absolute inset-x-5 bottom-5 flex items-center justify-between rounded-xl bg-brand-ink py-2.5 pr-2.5 pl-3.5 text-white shadow-lg shadow-brand-ink/20">
											<span class="flex items-center gap-2 text-[11px] font-medium">
												<shopping-cart class="size-3.5 text-brand-cyan"></shopping-cart>
												3 items in your cart
											</span>
											<span class="rounded-lg bg-brand-cyan px-2.5 py-1.5 text-[10px] font-semibold">Checkout</span>
										</div>
									</template>

									<template v-else-if="service.visual === 'automation'">
										<div class="absolute inset-x-5 top-10 flex items-start">
											<template v-for="(step, stepIndex) in automationSteps" :key="'automation-step-' + stepIndex">
												<div class="flex w-14 shrink-0 flex-col items-center gap-2">
													<span
														class="flex size-11 items-center justify-center rounded-xl bg-white shadow-sm ring-1 ring-slate-900/5"
														:class="step.completed ? 'text-brand-teal' : 'text-slate-400 transition-colors delay-500 duration-300 group-hover:text-brand-teal'"
													>
														<component :is="step.icon" class="size-5"></component>
													</span>
													<span class="text-[10px] font-medium text-slate-500">{{ step.label }}</span>
												</div>

												<div v-if="stepIndex < automationSteps.length - 1" class="relative mt-[21px] h-0.5 flex-1 overflow-hidden rounded-full bg-slate-200">
													<span
														class="absolute inset-y-0 left-0 rounded-full bg-linear-to-r from-brand-cyan to-brand-teal transition-[width] duration-700 ease-out"
														:class="automationSteps[stepIndex + 1].completed ? 'w-full' : 'w-0 group-hover:w-full'"
													></span>
												</div>
											</template>
										</div>

										<div class="absolute inset-x-5 bottom-5 flex items-center justify-between rounded-xl bg-white px-3.5 py-2.5 shadow-sm ring-1 ring-slate-900/5">
											<span class="flex items-center gap-2 text-[11px] font-medium text-slate-600">
												<zap class="size-3.5 text-brand-cyan"></zap>
												Automated workflow
											</span>
											<span class="flex items-center gap-1.5 rounded-full bg-brand-cyan/10 px-2 py-0.5 text-[10px] font-semibold text-brand-teal">
												<span class="size-1.5 rounded-full bg-brand-cyan motion-safe:animate-pulse"></span>
												Running
											</span>
										</div>
									</template>

									<template v-else>
										<div class="absolute top-6 right-14 bottom-0 left-5 rounded-t-xl bg-white p-3 shadow-sm ring-1 ring-slate-900/5 transition-transform duration-500 group-hover:-translate-y-1">
											<div class="flex items-center gap-1">
												<span class="size-1.5 rounded-full bg-slate-300"></span>
												<span class="size-1.5 rounded-full bg-slate-300"></span>
												<span class="size-1.5 rounded-full bg-slate-300"></span>
											</div>
											<div class="mt-3 rounded-lg bg-linear-to-br from-brand-cyan/80 to-brand-teal p-3">
												<div class="h-1.5 w-1/2 rounded-full bg-white/90"></div>
												<div class="mt-1.5 h-1.5 w-1/3 rounded-full bg-white/50"></div>
											</div>
											<div class="mt-3 grid grid-cols-3 gap-2">
												<div class="h-10 rounded-md bg-slate-100"></div>
												<div class="h-10 rounded-md bg-slate-100"></div>
												<div class="h-10 rounded-md bg-slate-100"></div>
											</div>
										</div>

										<div class="absolute right-5 bottom-5 w-[4.75rem] rounded-[0.9rem] bg-white p-1.5 shadow-xl shadow-brand-ink/10 ring-1 ring-slate-900/10 transition-transform duration-500 group-hover:-translate-y-2">
											<div class="mx-auto h-1 w-5 rounded-full bg-slate-200"></div>
											<div class="mt-1.5 rounded-md bg-linear-to-br from-brand-cyan/80 to-brand-teal p-1.5">
												<div class="h-1 w-3/4 rounded-full bg-white/90"></div>
												<div class="mt-1 h-1 w-1/2 rounded-full bg-white/50"></div>
											</div>
											<div class="mt-1.5 space-y-1">
												<div class="h-5 rounded bg-slate-100"></div>
												<div class="h-5 rounded bg-slate-100"></div>
											</div>
										</div>
									</template>
								</div>

								<div class="relative flex flex-1 flex-col px-5 pt-7 pb-6 sm:px-6">
									<h3 class="font-display text-xl font-semibold tracking-tight text-brand-ink">{{ service.title }}</h3>
									<p class="mt-3 leading-relaxed text-slate-600">{{ service.description }}</p>

									<ul class="mt-auto space-y-2.5 pt-7 text-sm font-medium text-slate-700">
										<li v-for="feature in service.features" :key="feature" class="flex items-center gap-2.5">
											<check class="size-4 shrink-0 text-brand-cyan" :stroke-width="2.5"></check>
											{{ feature }}
										</li>
									</ul>
								</div>
							</article>
						</div>
					</div>
				</container>
			</section>

			<section id="why-us" class="scroll-mt-10 bg-slate-50 py-16 sm:py-32" aria-labelledby="why-us-title">
				<container>
					<div class="grid gap-14 lg:grid-cols-12 lg:gap-12">
						<div v-reveal class="mx-auto max-w-3xl text-center lg:col-span-5 lg:mx-0 lg:max-w-none lg:pt-4 lg:text-left">
							<p class="inline-block text-[13px] leading-5 font-semibold tracking-[0.16em] text-balance text-brand-teal uppercase">
								<app-logo mark-only class="mt-[5px] mr-2.5 inline-block h-2.5 align-top"></app-logo>
								<span>The solution for your business</span>
							</p>

							<h2 id="why-us-title" class="mt-5 font-display text-4xl leading-[1.1] font-semibold tracking-[-0.035em] text-balance text-brand-ink sm:text-5xl">
								<span class="block">Bring us an idea.</span> We'll deliver the solution.
							</h2>

							<p class="mt-6 text-lg leading-relaxed text-slate-600">
								Come to us with just an idea or a fully worked out project specification &mdash; we'll iron out the details and provide you with a professionally developed solution.
							</p>

							<a
								href="#contact"
								class="retain-text-color group mt-8 inline-flex items-center gap-2 font-semibold text-brand-teal transition-colors hover:text-brand-ink"
								@click="scrollToSection($event, 'contact')"
							>
								Tell us about your idea
								<arrow-right class="size-4 transition-transform duration-200 group-hover:translate-x-1"></arrow-right>
							</a>
						</div>

						<div class="grid gap-5 sm:grid-cols-2 lg:col-span-7">
							<div v-for="(feature, index) in features" :key="feature.title" v-reveal="index * 100">
								<div class="h-full rounded-[1.75rem] bg-white p-7 shadow-sm ring-1 shadow-slate-900/[0.03] ring-slate-900/[0.06] transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-ink/[0.06]">
									<span class="flex size-12 items-center justify-center rounded-2xl bg-linear-to-br from-brand-cyan to-brand-teal text-white shadow-lg shadow-brand-cyan/25">
										<component :is="feature.icon" class="size-6" :stroke-width="1.75"></component>
									</span>

									<h3 class="mt-6 font-display text-lg font-semibold tracking-tight text-brand-ink">{{ feature.title }}</h3>
									<p class="mt-2.5 leading-relaxed text-slate-600">{{ feature.description }}</p>
								</div>
							</div>
						</div>
					</div>
				</container>
			</section>

			<section id="process" class="relative isolate scroll-mt-10 overflow-hidden bg-brand-night py-16 text-slate-400 sm:py-32" aria-labelledby="process-title">
				<div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
					<div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.04)_1px,transparent_1px)] bg-size-[64px_64px] [mask-image:radial-gradient(ellipse_70%_60%_at_50%_0%,black,transparent)]"></div>
					<div class="absolute -top-[30.25rem] left-1/2 h-[60.5rem] w-[88.5rem] -translate-x-1/2 bg-radial from-brand-cyan/15 via-brand-cyan/8 via-35% to-transparent to-70%"></div>
				</div>

				<container>
					<div v-reveal class="mx-auto max-w-3xl text-center">
						<p class="inline-block text-[13px] leading-5 font-semibold tracking-[0.16em] text-balance text-brand-cyan uppercase">
							<app-logo mark-only class="mt-[5px] mr-2.5 inline-block h-2.5 align-top"></app-logo>
							<span>How we do business</span>
						</p>

						<h2 id="process-title" class="mt-5 font-display text-4xl leading-[1.1] font-semibold tracking-[-0.035em] text-balance text-white sm:text-5xl">
							A clear process, from the first idea to the final launch.
						</h2>

						<p class="mt-6 text-lg leading-relaxed">
							Every project follows four well-defined steps, so you always know where things stand and what comes next.
						</p>
					</div>

					<div class="relative mt-16 sm:mt-20">
						<div aria-hidden="true" class="absolute top-7 right-0 left-12 hidden h-px bg-linear-to-r from-brand-cyan/70 via-white/15 to-transparent lg:block"></div>

						<ol class="relative grid gap-12 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
							<li v-for="(step, index) in processSteps" :key="step.title" v-reveal="index * 120">
								<div class="relative ml-4 inline-flex h-14 w-20 items-center justify-center">
									<span class="absolute inset-0 -skew-x-[29deg] rounded-lg bg-linear-to-br from-brand-cyan to-brand-teal shadow-lg shadow-brand-cyan/20"></span>
									<span class="relative font-display text-lg font-semibold text-white">0{{ index + 1 }}</span>
								</div>

								<h3 class="mt-8 font-display text-xl font-semibold tracking-tight text-white">{{ step.title }}</h3>
								<p class="mt-3 leading-relaxed">{{ step.description }}</p>
							</li>
						</ol>
					</div>
				</container>
			</section>

			<section class="relative overflow-hidden py-16 sm:py-36" aria-labelledby="offer-title">
				<container>
					<div v-reveal class="mx-auto max-w-5xl text-center">
						<h2 id="offer-title" class="inline-block text-[13px] leading-5 font-semibold tracking-[0.16em] text-balance text-brand-teal uppercase">
							<app-logo mark-only class="mt-[5px] mr-2.5 inline-block h-2.5 align-top"></app-logo>
							<span>What we offer</span>
						</h2>

						<p class="mt-8 font-display text-[1.85rem] leading-[1.3] font-medium tracking-[-0.03em] text-slate-400 sm:text-4xl sm:leading-[1.25] lg:text-[3.1rem] lg:leading-[1.2]">
							Professional solutions, coded in accordance with the
							<mark class="bg-transparent bg-[linear-gradient(transparent_62%,rgba(0,170,227,0.2)_62%)] text-brand-ink">highest standards</mark>,
							using
							<mark class="bg-transparent bg-[linear-gradient(transparent_62%,rgba(0,170,227,0.2)_62%)] text-brand-ink">cutting-edge web technologies</mark>,
							delivered in a
							<mark class="bg-transparent bg-[linear-gradient(transparent_62%,rgba(0,170,227,0.2)_62%)] text-brand-ink">reasonable time frame</mark>
							and at
							<mark class="bg-transparent bg-[linear-gradient(transparent_62%,rgba(0,170,227,0.2)_62%)] text-brand-ink">fair prices</mark>.
						</p>
					</div>
				</container>
			</section>

			<section id="contact" class="scroll-mt-10 bg-slate-50 py-16 sm:py-32" aria-labelledby="contact-title">
				<container>
					<div v-reveal>
						<div class="grid overflow-hidden rounded-[2rem] bg-white shadow-2xl ring-1 shadow-brand-ink/[0.06] ring-slate-900/[0.06] lg:grid-cols-5">
							<div class="relative isolate overflow-hidden bg-brand-night px-6 py-12 sm:px-12 sm:py-14 lg:col-span-2">
								<div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
									<div class="absolute -top-[18.25rem] -right-[18.25rem] size-[42.5rem] bg-radial from-brand-cyan/25 via-brand-cyan/12 via-35% to-transparent to-70%"></div>
									<app-logo mark-only class="absolute -right-10 -bottom-6 h-44 opacity-[0.07]"></app-logo>
								</div>

								<p class="inline-block text-[13px] leading-5 font-semibold tracking-[0.16em] text-balance text-brand-cyan uppercase">
									<app-logo mark-only class="mt-[5px] mr-2.5 inline-block h-2.5 align-top"></app-logo>
									<span>Get in touch</span>
								</p>

								<h2 id="contact-title" class="mt-5 font-display text-3xl leading-[1.15] font-semibold tracking-[-0.035em] text-white sm:text-4xl">
									Let's get the ball rolling.
								</h2>

								<p class="mt-5 leading-relaxed text-slate-400">
									Tell us a bit about your project and we'll get back to you as soon as possible. Prefer to reach out directly? We're one email or phone call away.
								</p>

								<ul class="mt-10 space-y-6">
									<li v-for="detail in contactDetails" :key="detail.label" class="flex gap-4">
										<span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-white/5 text-brand-cyan ring-1 ring-white/10">
											<component :is="detail.icon" class="size-5"></component>
										</span>

										<div class="min-w-0">
											<p class="text-xs font-semibold tracking-[0.16em] text-slate-500 uppercase">{{ detail.label }}</p>
											<a
												:href="detail.href"
												class="retain-text-color mt-1 block font-medium break-words text-white transition-colors hover:text-brand-cyan"
												:target="detail.external ? '_blank' : null"
												:rel="detail.external ? 'noopener noreferrer' : null"
											>
												{{ detail.value }}
											</a>
										</div>
									</li>
								</ul>
							</div>

							<div class="px-6 py-12 sm:px-12 sm:py-14 lg:col-span-3">
								<form class="space-y-7" novalidate @submit.prevent="submitContactForm">
									<div class="grid gap-7 sm:grid-cols-2 sm:gap-5">
										<div>
											<app-label for="contact-name" class="mb-2 font-medium text-slate-700">Name</app-label>
											<app-input
												id="contact-name"
												v-model="form.name"
												type="text"
												name="name"
												autocomplete="name"
												placeholder="Jane Doe"
												:aria-invalid="form.errors.name ? 'true' : null"
												:class="fieldClasses(form.errors.name)"
											></app-input>

											<p v-if="form.errors.name" class="mt-2 text-sm text-red-600">{{ form.errors.name }}</p>
										</div>

										<div>
											<app-label for="contact-email" class="mb-2 font-medium text-slate-700">Email</app-label>
											<app-input
												id="contact-email"
												v-model="form.email"
												type="email"
												name="email"
												autocomplete="email"
												placeholder="jane@company.com"
												:aria-invalid="form.errors.email ? 'true' : null"
												:class="fieldClasses(form.errors.email)"
											></app-input>

											<p v-if="form.errors.email" class="mt-2 text-sm text-red-600">{{ form.errors.email }}</p>
										</div>
									</div>

									<fieldset>
										<legend class="mb-3 text-sm font-medium text-slate-700">
											What can we help you with?
											<span class="font-normal text-slate-400">(optional)</span>
										</legend>

										<div class="flex flex-wrap gap-2">
											<label v-for="projectType in projectTypes" :key="projectType" class="cursor-pointer">
												<input v-model="form.project_type" type="radio" name="project_type" :value="projectType" class="peer sr-only" @click="deselectProjectType(projectType)" @keydown.space="deselectProjectTypeWithKeyboard($event, projectType)">
												<span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-medium text-slate-600 ring-1 ring-slate-200 transition-colors ring-inset peer-checked:bg-brand-ink peer-checked:text-white peer-checked:ring-brand-ink peer-checked:hover:text-white peer-checked:hover:ring-brand-ink peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-cyan hover:text-brand-ink hover:ring-slate-300">
													{{ projectType }}
												</span>
											</label>
										</div>

										<p v-if="form.errors.project_type" class="mt-2 text-sm text-red-600">{{ form.errors.project_type }}</p>
									</fieldset>

									<div>
										<app-label for="contact-message" class="mb-2 font-medium text-slate-700">Message</app-label>
										<textarea
											id="contact-message"
											v-model="form.message"
											name="message"
											rows="5"
											placeholder="Tell us about your project, your goals and your timeline..."
											:aria-invalid="form.errors.message ? 'true' : null"
											ref="messageField"
											class="max-h-68 resize-none overflow-y-auto"
											:class="fieldClasses(form.errors.message)"
										></textarea>

										<p v-if="form.errors.message" class="mt-2 text-sm text-red-600">{{ form.errors.message }}</p>
									</div>

									<div class="hidden" aria-hidden="true">
										<label for="contact-website">Leave this field empty</label>
										<input id="contact-website" v-model="form.website" type="text" name="website" tabindex="-1" autocomplete="off">
									</div>

									<div class="flex flex-col-reverse gap-5 pt-1 sm:flex-row sm:items-center sm:justify-between">
										<p class="flex items-start gap-2 text-xs leading-relaxed text-slate-500 sm:max-w-64">
											<lock class="mt-0.5 size-3.5 shrink-0"></lock>
											We'll only use your details to respond to your inquiry.
										</p>

										<button
											type="submit"
											class="group inline-flex shrink-0 cursor-pointer items-center justify-center gap-2.5 rounded-full bg-brand-ink px-7 py-4 font-semibold text-white shadow-xl shadow-brand-ink/15 transition-colors hover:bg-brand-teal disabled:cursor-wait disabled:opacity-70"
											:disabled="form.processing"
										>
											<loader-circle v-if="form.processing" class="size-4 animate-spin"></loader-circle>
											<check v-else-if="form.recentlySuccessful" class="size-4" :stroke-width="2.5"></check>
											<send v-else class="size-4 transition-transform duration-200 will-change-transform group-hover:rotate-45"></send>
											{{ submitButtonLabel }}
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</container>
			</section>
		</main>

		<footer class="relative isolate overflow-hidden bg-brand-night text-slate-400">
			<div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
				<div class="absolute -bottom-[26.25rem] left-1/2 h-[52.5rem] w-[80.5rem] -translate-x-1/2 bg-radial from-brand-teal/20 via-brand-teal/10 via-35% to-transparent to-70%"></div>
			</div>

			<container class="pt-16 pb-10 sm:pt-20">
				<div class="grid gap-14 lg:grid-cols-12 lg:gap-8">
					<div class="lg:col-span-5">
						<app-logo inverse class="h-[30px]"></app-logo>

						<p class="mt-6 max-w-sm leading-relaxed">
							Your partner in developing professional solutions for growing your business and automating business processes.
						</p>

						<a
							href="#contact"
							class="retain-text-color group mt-8 inline-flex items-center gap-2 rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white ring-1 ring-white/10 transition-colors hover:bg-white/10"
							@click="scrollToSection($event, 'contact')"
						>
							Start a project
							<arrow-right class="size-4 transition-transform duration-200 group-hover:translate-x-0.5"></arrow-right>
						</a>
					</div>

					<div class="grid gap-10 sm:grid-cols-[repeat(3,auto)] sm:justify-between lg:col-span-7">
						<div>
							<h3 class="text-xs font-semibold tracking-[0.16em] text-white uppercase">Explore</h3>

							<ul class="mt-5 space-y-3 text-sm">
								<li v-for="item in navigation" :key="'footer-nav-' + item.id">
									<a :href="'#' + item.id" class="retain-text-color text-slate-400 transition-colors hover:text-white" @click="scrollToSection($event, item.id)">
										{{ item.label }}
									</a>
								</li>
							</ul>
						</div>

						<div>
							<h3 class="text-xs font-semibold tracking-[0.16em] text-white uppercase">Contact</h3>

							<ul class="mt-5 space-y-3 text-sm">
								<li>
									<a href="mailto:info@bluem2.consulting" class="retain-text-color text-slate-400 transition-colors hover:text-white">info@bluem2.consulting</a>
								</li>
								<li>
									<a href="tel:+385911638954" class="retain-text-color text-slate-400 transition-colors hover:text-white">+385 (91) 163 8954</a>
								</li>
							</ul>
						</div>

						<div>
							<h3 class="text-xs font-semibold tracking-[0.16em] text-white uppercase">Impressum</h3>

							<address class="mt-5 text-sm leading-relaxed not-italic">
								BlueM2 Consulting j.d.o.o.<br>
								Ulica grada Mainza 7A<br>
								10000 Zagreb, Croatia
							</address>
						</div>
					</div>
				</div>

				<div class="mt-16 flex flex-col gap-4 border-t border-white/10 pt-8 text-sm sm:flex-row sm:items-center sm:justify-between">
					<p>&copy; {{ currentYear }} BlueM2 Consulting. All rights reserved.</p>

					<a href="#top" class="retain-text-color group inline-flex items-center gap-2 text-slate-400 transition-colors hover:text-white" @click="scrollToSection($event, 'top')">
						Back to top
						<arrow-up class="size-4 transition-transform duration-200 group-hover:-translate-y-0.5"></arrow-up>
					</a>
				</div>
			</container>
		</footer>
	</div>
</template>

<script>
	import Container from "@/js/components/Container.vue";
	import AppLogo from "@/js/components/AppLogo.vue";
	import AppInput from "@/js/components/AppInput.vue";
	import AppLabel from "@/js/components/AppLabel.vue";
	import {
		ArrowRight, ArrowUp, Check, CircleCheck, ClipboardList, DatabaseBackup, LayoutDashboard, LifeBuoy, LoaderCircle,
		Lock, Mail, MapPin, Menu, MonitorSmartphone, Phone, Plus, Receipt, Send, ShoppingBag, ShoppingCart, X, Zap
	} from "@lucide/vue";
	import { useForm } from "@inertiajs/vue3";
	import { markRaw } from "vue";

	export default {
		components: {
			Container, AppLogo, AppInput, AppLabel, ArrowRight, ArrowUp, Check, DatabaseBackup, LoaderCircle, Lock,
			MenuIcon: Menu, Plus, Send, ShoppingBag, ShoppingCart, X, Zap
		},

		/**
		 * v-reveal fades an element in once it scrolls into view. Elements that are already
		 * on screen when the page hydrates are left alone, so server-rendered content never flashes.
		 */
		directives: {
			reveal: {
				mounted(element, binding) {
					const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

					if (prefersReducedMotion || !('IntersectionObserver' in window)) {
						return;
					}

					if (element.getBoundingClientRect().top < window.innerHeight) {
						return;
					}

					element.dataset.reveal = 'pending';
					element.style.transitionDelay = (binding.value || 0) + 'ms';

					element.revealObserver = new IntersectionObserver(([entry]) => {
						if (!entry.isIntersecting) {
							return;
						}

						element.dataset.reveal = 'visible';
						element.revealObserver.disconnect();
					}, { rootMargin: '0px 0px -10% 0px' });

					element.revealObserver.observe(element);
				},

				unmounted(element) {
					element.revealObserver?.disconnect();
				}
			}
		},

		props: {
			projectTypes: {
				type: Array,
				default: () => []
			}
		},

		data() {
			return {
				scrolled: false,
				mobileMenuOpen: false,
				activeSection: null,
				sectionObserver: null,

				navigation: [
					{ id: 'services', label: 'Services' },
					{ id: 'why-us', label: 'Why us' },
					{ id: 'process', label: 'Process' },
					{ id: 'contact', label: 'Contact' }
				],

				heroHighlights: [
					'Tailored CMS',
					'Fully responsive',
					'Long-term support'
				],

				sampleProducts: [
					{
						tint: 'from-sky-100 to-cyan-50',
						shape: 'aspect-square w-2/5 rounded-full',
						swatches: ['bg-brand-cyan', 'bg-sky-200', 'bg-white'],
						isNew: true
					},
					{
						tint: 'from-slate-200 to-slate-100',
						shape: 'aspect-square w-1/3 rotate-12 rounded-lg',
						swatches: ['bg-brand-ink', 'bg-slate-400', 'bg-slate-200'],
						isNew: false
					},
					{
						tint: 'from-brand-cyan/25 to-brand-teal/10',
						shape: 'h-1/4 w-1/2 rounded-full',
						swatches: ['bg-brand-teal', 'bg-brand-cyan', 'bg-sky-100'],
						isNew: false
					}
				],

				technologies: [
					'Laravel',
					'Vue.js',
					'Inertia.js',
					'Tailwind CSS',
					'PHP',
					'MySQL',
					'Redis',
					'Vite'
				],

				services: [
					{
						visual: 'webshop',
						title: 'eCommerce & webshops',
						description: 'Have a product and looking to commercialize it? Look no further. We build fast, secure online stores that make buying easy for your customers and selling easy for you.',
						features: ['Product catalog & inventory', 'Secure checkout & payments', 'Order management']
					},
					{
						visual: 'automation',
						title: 'Custom business applications',
						description: 'Need a fully custom business application? No problem. Automate your business processes with a professionally built application, designed around the way you work.',
						features: ['Process automation', 'Dashboards & reporting', 'Third-party integrations']
					},
					{
						visual: 'website',
						title: 'Company websites',
						description: 'Modern, responsive websites that make a great first impression, with a content management system tailored to your needs so you can keep everything up to date.',
						features: ['Tailored CMS', 'Optimized for every device', 'Built for speed & SEO']
					}
				],

				automationSteps: [
					{ label: 'Request', icon: markRaw(ClipboardList), completed: true },
					{ label: 'Approval', icon: markRaw(CircleCheck), completed: true },
					{ label: 'Invoice', icon: markRaw(Receipt), completed: false }
				],

				features: [
					{
						icon: markRaw(MonitorSmartphone),
						title: 'Fully responsive',
						description: 'Your website will automatically scale to all screen sizes and devices.'
					},
					{
						icon: markRaw(LayoutDashboard),
						title: 'Tailored CMS',
						description: 'All of our products come with a custom built Content Management System.'
					},
					{
						icon: markRaw(DatabaseBackup),
						title: 'Data backup',
						description: 'We\'ll make sure your data is always safe with automatic database backups.'
					},
					{
						icon: markRaw(LifeBuoy),
						title: 'Long-term support',
						description: 'We\'re always here for you in case you want new features, or old ones upgraded.'
					}
				],

				processSteps: [
					{
						title: 'Project details',
						description: 'First things first: a full project specification is the foundation of a successful project.'
					},
					{
						title: 'Timeline',
						description: 'Next, we define an optimal development timeline for wireframes, design, development and integration.'
					},
					{
						title: 'Development',
						description: 'Once we have the project specification and timeline, it\'s time to code your idea into reality.'
					},
					{
						title: 'Finalization',
						description: 'With everything in place, we test the solution thoroughly and make sure it works smoothly before delivering the final product.'
					}
				],

				contactDetails: [
					{
						icon: markRaw(Mail),
						label: 'Email',
						value: 'info@bluem2.consulting',
						href: 'mailto:info@bluem2.consulting',
						external: false
					},
					{
						icon: markRaw(Phone),
						label: 'Phone',
						value: '+385 (91) 163 8954',
						href: 'tel:+385911638954',
						external: false
					},
					{
						icon: markRaw(MapPin),
						label: 'Office',
						value: 'Ulica grada Mainza 7A, 10000 Zagreb, Croatia',
						href: 'https://www.google.com/maps/search/?api=1&query=Ulica+grada+Mainza+7A,+10000+Zagreb',
						external: true
					}
				],

				form: useForm({
					name: null,
					email: null,
					project_type: null,
					message: null,
					website: null
				})
			}
		},

		watch: {
			'form.message'() {
				this.$nextTick(() => this.fitMessageFieldToContent());
			}
		},

		mounted() {
			window.addEventListener('scroll', this.handleScroll, { passive: true });
			window.addEventListener('keydown', this.handleKeydown);

			this.handleScroll();
			this.observeSections();
		},

		beforeUnmount() {
			window.removeEventListener('scroll', this.handleScroll);
			window.removeEventListener('keydown', this.handleKeydown);

			this.sectionObserver?.disconnect();
		},

		methods: {
			handleScroll() {
				this.scrolled = window.scrollY > 16;
			},

			handleKeydown(event) {
				if (event.key === 'Escape') {
					this.mobileMenuOpen = false;
				}
			},

			/**
			 * Highlights the navigation item of the section that crosses the middle of the viewport.
			 */
			observeSections() {
				this.sectionObserver = new IntersectionObserver((entries) => {
					entries.forEach((entry) => {
						if (entry.isIntersecting) {
							this.activeSection = (entry.target.id === 'hero') ? null : entry.target.id;
						}
					});
				}, { rootMargin: '-45% 0px -50% 0px' });

				['hero', ...this.navigation.map((item) => item.id)].forEach((sectionId) => {
					const section = document.getElementById(sectionId);

					if (section) {
						this.sectionObserver.observe(section);
					}
				});
			},

			scrollToSection(event, sectionId) {
				const section = document.getElementById(sectionId);

				if (!section) {
					return;
				}

				event.preventDefault();
				this.mobileMenuOpen = false;

				const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

				if (sectionId === 'top') {
					window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });

					return;
				}

				section.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'start' });
			},

			/**
			 * Feeds the pointer position to the card's spotlight gradient.
			 */
			trackPointer(event) {
				const card = event.currentTarget;
				const bounds = card.getBoundingClientRect();

				card.style.setProperty('--pointer-x', (event.clientX - bounds.left) + 'px');
				card.style.setProperty('--pointer-y', (event.clientY - bounds.top) + 'px');
			},

			/**
			 * Clicking the selected project type again clears it, since the field is optional.
			 */
			deselectProjectType(projectType) {
				if (this.form.project_type === projectType) {
					this.form.project_type = null;
				}
			},

			/**
			 * Browsers fire no click when space is pressed on a checked radio, so this gives keyboard
			 * users the same toggle. Cancelling the keydown stops the keyup from selecting it again.
			 */
			deselectProjectTypeWithKeyboard(event, projectType) {
				if (this.form.project_type === projectType) {
					event.preventDefault();
					this.form.project_type = null;
				}
			},

			/**
			 * Grows the message field with its content. The rows attribute sets the minimum
			 * height and max-h-68 caps it, after which the field scrolls.
			 */
			fitMessageFieldToContent() {
				const messageField = this.$refs.messageField;

				if (!messageField) {
					return;
				}

				messageField.style.height = 'auto';
				messageField.style.height = messageField.scrollHeight + 'px';
			},

			fieldClasses(error) {
				return [
					'block w-full rounded-xl border-0 bg-white px-4 py-3 text-[15px] text-brand-ink shadow-xs outline-none ring-1 ring-inset placeholder:text-slate-400 transition-shadow focus:ring-2 focus:ring-inset',
					error ? 'ring-red-300 focus:ring-red-400' : 'ring-slate-200 focus:ring-brand-cyan'
				];
			},

			submitContactForm() {
				if (this.form.processing) {
					return;
				}

				this.form.clearErrors();
				this.form.post('/contact', {
					preserveScroll: true,
					onSuccess: () => this.form.reset()
				});
			}
		},

		computed: {
			headerIsSolid() {
				return this.scrolled || this.mobileMenuOpen;
			},

			currentYear() {
				return new Date().getFullYear();
			},

			submitButtonLabel() {
				if (this.form.processing) {
					return 'Sending...';
				}

				if (this.form.recentlySuccessful) {
					return 'Message sent';
				}

				return 'Send message';
			}
		}
	}
</script>
