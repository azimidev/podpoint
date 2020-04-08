<template>
    <div class="home">
        <nav class="panel">
            <div class="panel-block" v-for="(unit, index) in units">
                <Unit :unit="unit" :key="unit.id"/>
            </div>
        </nav>
    </div>
</template>

<script>
    import axios from 'axios';
    // @ is an alias to /src
    import Unit from '@/components/Unit';

    export default {
        name: 'Home',
        components: { Unit },
        data() {
            return {
                units: [],
            };
        },
        mounted() {
            axios('/api/units').then(({ data }) => this.units = data);
        },
    };
</script>

<style lang="scss" scoped>
    .home {
        .panel-block {
            padding-top: 1.5em;
        }

        .panel-tabs:not(:last-child), .panel-block:not(:last-child) {
            border-bottom: 2px solid #EDEDED;
        }
    }
</style>
