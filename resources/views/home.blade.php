@extends('layouts.app')

@section('title', \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') . ' - ' . \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi'))

@section('content')
    @include('partials.hero')
    @include('partials.divisions')
    @include('partials.workflow')
    @include('partials.services')
    @include('partials.video')
    @include('partials.advantages')
    @include('partials.portfolio')
    @include('partials.testimonials')
    @include('partials.articles')
    @include('partials.contact')
@endsection
