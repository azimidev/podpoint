<template>
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-2 is-center">
                <i class="fas fa-map-marker-alt fa-3x has-text-primary"></i>
            </div>
            <div class="column is-7">
                <p><strong>{{ unit.name }} charges</strong></p>
                <p class="has-text-grey">{{ unit.address }} - {{ unit.postcode }}</p>
            </div>
            <div class="column is-3 is-center is-center right-column">
                <div class="has-text-primary is-uppercase">Available</div>
                <div>
                    <button class="button is-primary">Start</button>
                </div>
            </div>
        </div>
        <div class="is-center has-text-grey">
            <span v-if="unit.charges.length > 0">{{ unit.charges.length }} charges</span>
            <span v-else>No charges yet</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Unit',
        props: {
            unit: Object,
        },
    };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .is-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right-column {
        display: flex;
        flex-direction: column;
        font-weight: 600;
    }
</style>
