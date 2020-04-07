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
                <div :class="[ available ? 'has-text-primary' : 'has-text-orange ', 'is-uppercase']">
                    {{ status }}
                </div>
                <div>
                    <button @click="toggleStatus()"
                            :class="['button', available ? 'is-primary' : 'is-orange']">
                        {{ available ? 'Start' : 'Stop' }}
                    </button>
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
        data() {
            return {
                status: this.unit.status,
            };
        },
        computed: {
            available() {
                return this.status === 'available';
            },
            charging() {
                return this.status === 'charging';
            },
        },
        methods: {
            toggleStatus() {
                this.available
                    ? this.status = 'charging'
                    : this.status = 'available';
            },
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

    .has-text-orange {
        color: orange;
    }

    .is-orange {
        color: white;
        background-color: orange;
    }
</style>
