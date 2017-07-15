@extends('layouts.master')
@section('title', 'Crear partido')
@section('content')
@include('cabecera',array('section'=>'Inicio'))



<div class="contenedor row">
      @include('config/configuracion')
      <div class="col-md-10 col-md-offset-1">
            <h2>Añadir un partido</h2>
            <br>
            {{-- Muestra errores --}}
                  @if (count($errors) > 0)
                        <ul>
                        @foreach ($errors->all() as $error)
                              <div class="alert alert-danger">
                                    <a href="#" class="alert-link">{{ $error }}</a>
                              </div>
                        @endforeach
                        </ul>
                  @endif
            <div class="col-md-4">
                  <fieldset>
                  <legend>
                        Basic
                  </legend>
                  <p>
                  Supports bootstrap brand colors: <code>.checkbox-primary</code>, <code>.checkbox-info</code> etc.
                  </p>
                  <div class="checkbox">
                  <input id="checkbox1" type="checkbox">
                  <label for="checkbox1">
                  Default
                  </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                  <input id="checkbox2" type="checkbox" checked="">
                  <label for="checkbox2">
                  Primary
                  </label>
            </div>
      </div>
</div>
@endsection