
<form action="/token" method="POST">
    @csrf
    Search term: <input type="text" name="term" value=""/>
    <button type="submit">Go</button>
</form>