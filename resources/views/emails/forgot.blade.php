@component('mail::message')
Hello {{ $user->name }},
<p>We understand it happens</p>
@component('mail::button',['url'=> url('reset/'.$user->remember_token)])
  Reset Your Password  
@endcomponent
 <p>In case any issu recovering your password. please contact s</p>
 Thanks
 <br>
 {{ config('app.name') }}
@endcomponent

