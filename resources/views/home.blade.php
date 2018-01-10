@extends ('layout')

@section ('content')

<div class="section">

    <div class="column">

        <transition name="expander">
            <div class="register" v-if="!$store.state.registered">
                <registration></registration>
            </div>
        </transition>

        <youtube-video video-id="Y0jdqYaEYlY" v-if="$store.state.registered"></youtube-video> 

    </div>

    <div class="column width-50">
        <youtube-video video-id="Y0jdqYaEYlY"></youtube-video> 
    </div>

</div>

@endsection
