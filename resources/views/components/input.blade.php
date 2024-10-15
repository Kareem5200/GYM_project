@props([
    'type'=>'text',
    'name',
])

<div class="mb-3">
    <label class="form-label">{{ $slot }}</label>
    <input type="{{ $type }}" name="{{ $name }}" {{ $attributes->class(['form-control']) }}>
</div>
  @error($name)
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
