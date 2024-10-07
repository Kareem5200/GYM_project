@props([
    'name',
    'alert_type'=>'alert-danger',
])

@if (session($name))
<div class="alert {{ $alert_type }}">{{ session($name)}}</div>
@endif
