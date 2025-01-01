@extends('layouts.app')
@section('main')
<article class="flex flex-col items-center gap-10">
	<header class="mb-5">

		<h2 class="text-4xl font-bold dark:text-white">Join <span class="text-primary">now</span></h2>

	</header>
	<div class="flex flex-row justify-center space-x-5">
		<section class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
			<a href="#">
				<img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
			</a>
			<div class="p-5">
				<a href="#">
					<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Join as a seller</h5>
				</a>
				<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Become a sellter and start selling your products</p>
				<a href="{{route('seller.signup')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-primaryDark focus:ring-4 focus:outline-none focus:ring-primaryLight">
					Sign up as a seller
					<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
					</svg>
				</a>
			</div>

		</section>
		<section class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
			<div class="p-5">
				<a href="#">
					<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Join as a buyer</h5>
				</a>
				<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Start exploring thousands of products and buy them</p>
				<a href="{{route('buyer.signup')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-primaryDark focus:ring-4 focus:outline-none focus:ring-primaryLight">
					Sign up as a buyer
					<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
					</svg>
				</a>
			</div>
		</section>


	</div>

</article>

@endsection