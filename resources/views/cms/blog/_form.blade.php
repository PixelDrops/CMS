<div class="form-group">
    {!!Form::label('title', 'Title: ') !!}
    {!!Form::text('title', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('slug', 'Slug: ') !!}
    {!!Form::text('slug', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('layout', 'Layout: ') !!}
    {!!Form::select('layout', $layout,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('content', 'Body: ') !!}
    {!!Form::textarea('content', null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!!Form::label('published_at', 'Published On: ') !!}
    {!!Form::input('date', 'published_at', date('Y-m-d'),['class'=> 'form-control'] ) !!}
    {!!Form::input('time', 'published_at_time', date('h:m'),['class'=> 'form-control'] ) !!}
</div>

<div class="form-group">
    {!!Form::submit($buttonText, ['class'=> 'btn btn-primary form-control']) !!}
</div>