@extends ('layout')

@section ('content')

<transition name="expander">
    <registration v-if="!$store.state.registered"></registration>
</transition>

<youtube-video video-id="Y0jdqYaEYlY" v-if="$store.state.registered"></youtube-video> 

@endsection
