@extends ('layout')

@section ('content')

    <div class="content-select">

        <div v-for="content in pageContent"
            :key="content.id"
            class="content-select-item"
            v-if="content.label"
            >
                <button @click="showContent(content)"> @{{ content.label }}</button>
        </div>

    </div>

    <transition-group name="grid" tag="div" class="section">

        <div class="column"
            v-for="(content, index) in pageItems"
            :key="content.id"
        >
            <div class="component">
                <component :is="content.component" :options="content.options"></component>
            </div>

        </div>

    </transition-group>

        

@endsection
