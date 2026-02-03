@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div style="color: #d30c0c"><b>- {{ $error }}</b></div>
        <br>
    @endforeach
@endif
