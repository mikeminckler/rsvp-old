@extends ('layout')

@section ('content')

    <transition-group name="grid" tag="div" class="section">
        <div class="column"
            v-for="(content, index) in pageContent"
            :key="content.id"
            v-if="!content.hide"
        >
            <component :is="content.component" :options="content.options"></component>
        </div>
    </transition-group>

    <button @click="shuffle()">Shuffle</button>

@endsection
