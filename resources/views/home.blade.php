@extends ('layout')

@section ('content')

<div class="logo">
    <img src="images/bcs_logo_white.png" class="logo"/>
</div>

<transition name="expander">
    <registration v-if="!$store.state.registered"></registration>
</transition>

@endsection
