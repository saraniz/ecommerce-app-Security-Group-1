@extends('layouts.app')
@section('main')
<form action="{{route('seller.store')}}" method="post" class="max-w-md mx-auto">
	@csrf
	<header class="mb-5 flex flex-row items-center">

		<h2 class="text-4xl font-bold dark:text-white">Start your journey of <span class="text-primary">selling</span></h2>

	</header>
	<x-input-field type="email" name="email" label="Email" />
	<x-input-field type="tel" name="phone" label="Phone" />
	<x-input-field type="text" name="full_name" label="Full name" />
	<x-input-field type="text" name="store_name" label="Store name" />
	<x-input-field type="password" name="password" label="Password" />
	<x-input-field type="password" name="password_confirmation" label="Confirm password" />
	<x-button type="submit">Sign up</x-button>
</form>
@endsection