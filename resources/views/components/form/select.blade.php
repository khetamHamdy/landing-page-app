@props([
'id' => '','label','name','selected' => '','options' => []
])
@if(isset($label) )
<label for="{{ $id }}"> {{ $label }}</label>
@endif
<br>
<select {{ $attributes->class(['form-control' , 'is-invalid' => $errors->has($name)]) }}
     name="{{ $name }}"
    id="{{ $id }}">
    @foreach ($options as $value => $text)
    <option value="{{ $value }}" @if( $value==old($name , $selected)) selected @endif>{{ $text }}</option>
    @endforeach
</select>
@error($name)
<p class="invalid-feedback"> {{ $message }}</p>
@enderror
