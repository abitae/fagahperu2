@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', 'NO TIENE PERMISOS PARA ESTA ACCION' ?: 'Forbidden')
