@extends('layouts.guest')

@section('content')
    <div class="space-y-12 md:space-y-20">
        <!-- Hero Feature -->
        @include('guest.features.hero.index')

        <!-- About Narrative Feature -->
        @include('guest.features.about.index')

        <!-- Skills Engineering Arsenal Feature -->
        @include('guest.features.skills.index')

        <!-- Featured Projects Showcase Feature -->
        @include('guest.features.projects.index')

        <!-- Journey & Academic Milestones Feature -->
        @include('guest.features.journey.index')

        <!-- Verified Certificates Feature -->
        @include('guest.features.certificates.index')

        <!-- Contact & Discussion Feature -->
        @include('guest.features.contact.index')
    </div>
@endsection

