@extends ('layout')

@section ('content')

<transition name="expander">
    <div class="register" v-if="!$store.state.registered">
        <registration></registration>
    </div>
</transition>

<youtube-video video-id="Y0jdqYaEYlY" v-if="$store.state.registered"></youtube-video> 

@endsection
