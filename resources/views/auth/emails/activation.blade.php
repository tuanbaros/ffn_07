Hi, {{ $name }}

Please active your account : {{ route('users.activation', ['id' => $email, 'token' => $link]) }}
