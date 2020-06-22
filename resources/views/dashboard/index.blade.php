@extends('admin::layout')

@section('content')

    <dashboard :widgets='@json($widgets)'></dashboard>

@endsection
