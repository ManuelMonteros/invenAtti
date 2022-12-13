@props(['disabled' => false,
     
   'placeholder'=>'selecciona',
   'options'=>[]])

    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
        <option value="">{{$placeholder}}</option>
        <option value="Operativo">Operativo</option>
        <option value="Inoperativo">Inoperativo</option>
           
   

    </select>
