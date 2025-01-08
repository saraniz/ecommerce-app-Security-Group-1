@extends('layouts.app')
@section('main')
<form action="{{route('seller.store')}}" method="post" class="max-w-md mx-auto">
	@csrf
	<header class="mb-5 flex flex-row items-center">

		<h2 class="text-4xl font-bold dark:text-white">Start your journey of <span class="text-primary">selling</span></h2>

	</header>

	@if ($errors->any())
		<x-alert title="Error !">Couldn't create the user</x-alert> 
	@endif
	<x-input-field type="email" name="email" label="Email" required={{false}}  />
	<x-input-field type="tel" name="phone" label="Phone" required="{{true}}" />
	<x-input-field type="text" name="full_name" label="Full name" required="{{true}}"/>
	<x-input-field type="text" name="store_name" label="Store name" required="{{true}}" />
	<x-input-field type="text" name="address" label="Address" required="{{true}}" />
	<x-input-field type="password" name="password" label="Password" required="{{true}}" />
	<x-input-field type="password" name="password_confirmation" label="Confirm password" required="{{true}}" />
	<x-button type="submit">Sign up</x-button>
</form>
@endsection