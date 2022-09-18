@props([
'id' => '','label','value' =>'','type' =>'' , 'text' ,'name'
])
@if(isset($label) )
<label for="{{ $id }}"> {{ $label }}</label>
@endif
<br>
<input type="{{ $type  }}" name="{{ $name }}" value="{{ old($name , $value) }}" id="{{ $id }}"
    {{ $attributes->class(['form-control' , 'is-invalid' => $errors->has($name)]) }} />
@error($name)
<p class="invalid-feedback"> {{ $message }}</p>
@enderror


<!--inside input enter $attributes  -->