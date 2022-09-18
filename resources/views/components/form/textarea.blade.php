@props([
'id' => '','label','value'=>'' ,'name',
])
@if(isset($label) )
<label for="{{ $id }}"> {{ $label }}</label>
@endif
<br>
<textarea name=" {{ $name }}" id="{{ $id }}"
    {{ $attributes->class(['form-control' , 'is-invalid' => $errors->has($name)]) }}>
{{ old($name , $value) }}
</textarea>
@error($name)
<p class="invalid-feedback"> {{ $message }}</p>
@enderror


<!--inside input enter $attributes  -->