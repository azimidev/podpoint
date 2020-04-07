<template>
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-2 is-center">
                <i class="fas fa-map-marker-alt fa-3x has-text-primary"></i>
            </div>
            <div class="column is-7">
                <p><strong>{{ unit.name }}</strong></p>
                <p class="has-text-grey">{{ unit.address }} - {{ unit.postcode }}</p>
            </div>
            <div class="column is-3 is-center is-center right-column">
                <div :class="[ {'has-text-primary': available, 'has-text-orange': charging}, 'is-uppercase']">
                    {{ status }}
                </div>
                <div>
                    <button @click="toggleStatus()"
                            :class="['button', {'is-primary': available, 'is-orange': charging}]">
                        {{ available ? 'Start' : 'Stop' }}
                    </button>
                </div>
            </div>
        </div>
        <div class="is-center has-text-grey">
            <span v-if="charges.length > 0">{{ charges.length }} charge(s)</span>
            <span v-else>No charges yet</span>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Unit',
        props: {
            unit: Object,
        },
        data() {
            return {
                status: this.unit.status,
                charges: this.unit.charges,
                charge: this.unit.charges[0] || {},
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
                if (this.available) {
                    this.start();
                } else if (this.charging) {
                    this.stop();
                }
            },
            start() {
                axios.post(`/api/units/${ this.unit.id }`).then(({data}) => {
                    this.status = 'charging';
                    this.charge = data;
                    this.charges.push(data);
                });
            },
            stop() {
                axios.patch(`/api/units/${ this.unit.id }/charges/${ this.charge.id }`).then(({data}) => {
                    this.status = 'available';
                    console.log(data);
                });
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
