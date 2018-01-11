@extends ('layout')

@section ('content')

<div class="section">

    <transition name="column">
        <div class="column" v-if="!$store.state.registered">
            <div class="register">
                <registration></registration>
            </div>
        </div>
    </transition>

    <div class="column">

        <div class="content">

            <h2>Information Session Benifits</h2>

            <div class="grid-list">
                <div class="grid-list-item"><div>Get a head a start</div></div>
                <div class="grid-list-item"><div>find the right fit</div></div>
                <div class="grid-list-item"><div>Ask questions one on one</div></div>
                <div class="grid-list-item"><div>get to know us</div></div>
                <div class="grid-list-item"><div>Unique Scheduling</div></div>
                <div class="grid-list-item"><div>Univeristy Placement</div></div>
                <div class="grid-list-item"><div>Academic Opportunities</div></div>
                <div class="grid-list-item"><div>Financial Aid</div></div>
                <div class="grid-list-item"><div>Courses</div></div>
            </div>
            
            <div class="image">
                <img src="/images/waterfront.jpg" />
            </div>

        </div>
    </div>

    <transition name="column">
        <div class="column width-100" v-if="$store.state.registered">
            <youtube-video video-id="Y0jdqYaEYlY"></youtube-video> 
        </div>
    </transition>

</div>

<div class="footer">
    <div class="tag-line">Where Students Choose To Be</div>
</div>

@endsection
