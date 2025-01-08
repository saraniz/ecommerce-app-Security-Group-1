@extends('layouts.app')
@section('main')
<form action="{{route('buyer.store')}}" method="post" class="max-w-md mx-auto">
	@csrf
	<header class="mb-5">

		<h2 class="text-4xl font-bold dark:text-white">Join <span class="text-primary">now</span></h2>

	</header>
	@if ($errors->any())
		<x-alert title="Error !">Couldn't create the user</x-alert> 
	@endif
	<x-input-field type="email" name="email" label="Email" />
	<x-input-field type="tel" name="phone" label="Phone" />
	<x-input-field type="text" name="full_name" label="Full name" />
	<x-input-field type="text" name="address" label="Address" />
	<x-input-field type="password" name="password" label="Password" />
	<x-input-field type="password" name="password_confirmation" label="Confirm password" />
	<x-button type="submit">Sign up</x-button>
</form>
@endsection