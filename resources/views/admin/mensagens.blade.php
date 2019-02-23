@if(\Session::has('msg-sucesso'))
    <div class="alert alert-primary" role="alert">
        {{\Session::get('msg-sucesso')}}
    </div>
@endif

@if(\Session::has('msg-erro'))
    <div class="alert alert-danger" role="alert">
        {{\Session::get('msg-erro')}}
    </div>
@endif