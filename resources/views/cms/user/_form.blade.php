<div class="form-group">
    {!!Form::label('username', 'Username: ') !!}
    {!!Form::text('username', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('gender', 'Gender: ') !!}
    {!!Form::select('gender', array('M' => 'Male', 'F' => 'Female'),['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!!Form::label('title', 'Title: ') !!}
    {!!Form::select('title', array('Mr' => 'Mr', 'Mrs' => 'Mrs'
            , 'Ms' => 'Ms', 'Miss' => 'Miss'),['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('firstname', 'First name: ') !!}
    {!!Form::text('firstname', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('lastname', 'Last Name: ') !!}
    {!!Form::text('lastname', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('display_name', 'Display Name: ') !!}
    {!!Form::text('display_name', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('personal_photo', 'Personal Photo: ') !!}
    {!!Form::file('personal_photo', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('email', 'Email: ') !!}
    {!!Form::file('email', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('password', 'Password : ') !!}
    {!!Form::password('password', null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('confirm_password', 'Confirm Password : ') !!}
    {!!Form::password('confirm_password', null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!!Form::submit($buttonText, ['class'=> 'btn btn-primary form-control']) !!}
</div>