<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="submit" value="Send Reminder">
</form>