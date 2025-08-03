<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input name="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
        <input name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
        <input name="username" placeholder="Username" required value="{{ old('username') }}">
        <input name="email" type="email" placeholder="Email" required value="{{ old('email') }}">
        <input name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
        <input name="password" type="password" placeholder="Password" required>
        <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</x-guest-layout>
