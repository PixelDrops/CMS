<div class="form-group">
    {!!Form::label('name', 'Name: ') !!}
    {!!Form::text('name', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('url_friendly', 'URL Friendly: ') !!}
    {!!Form::text('url_friendly', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('description', 'Description: ') !!}
    {!!Form::text('description', null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!!Form::submit($buttonText, ['class'=> 'btn btn-primary form-control']) !!}
</div>