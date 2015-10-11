<div class="form-group">
    {!!Form::label('language', 'Language: ') !!}
    {!!Form::select('language', $languages,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('status', 'Status: ') !!}
    {!!Form::select('status', $pageStatus,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('visibility', 'Visibility: ') !!}
    {!!Form::select('visibility', $pageVisibility,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('slug', 'Slug: ') !!}
    {!!Form::text('slug', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('title', 'Title: ') !!}
    {!!Form::text('title', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('content', 'content: ') !!}
    {!!Form::textarea('content', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('description', 'description: ') !!}
    {!!Form::textarea('description', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('keyword', 'keyword: ') !!}
    {!!Form::textarea('keyword', null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!!Form::label('published_at', 'Published On: ') !!}
    {!!Form::input('date', 'published_at', date('Y-m-d'),['class'=> 'form-control'] ) !!}
    {!!Form::input('time', 'published_at_time', date('h:m'),['class'=> 'form-control'] ) !!}
</div>

<div class="form-group">
    {!!Form::submit($buttonText, ['class'=> 'btn btn-primary form-control']) !!}
</div>