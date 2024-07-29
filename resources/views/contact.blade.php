@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-2xl text-gray-500 font-semibold mb-2">Contáctanos</h2>
    <div class="text-sm text-gray-600 mb-6">¿Tienes algún comentario para nosotros? ¿Alguna duda que tengas? ¡Estamos para escucharte y asesorarte!<br/> 
    Por favor, envía tu mensaje a continuación. ¡Estamos constantemente buscando formas de mejorar!<br/>
    <br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    });
</script>
@endsection
