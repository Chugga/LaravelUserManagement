<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" placeholder="Email...">
    <input type="password" name="password" placeholder="Password...">
    <input type="password" name="password_confirmation" placeholder="Confirm Password...">
    <input type="submit" value="Reset Password">
</form>