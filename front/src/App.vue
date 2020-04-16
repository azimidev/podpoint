<template>
    <div id="app">
        <section class="hero is-green is-small has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-white">
                        Units
                    </h1>
                </div>
            </div>
        </section>

        <router-view />

        <nav class="box">
            <div class="columns is-mobile is-center">
                <div class="column is-center">
                    <img
                        src="@/assets/favorite.svg"
                        alt="favorite"
                        width="30"
                    />
                    <strong>Favorites</strong>
                </div>
                <div class="column is-center">
                    <img src="@/assets/unit.svg" alt="unit" width="30" />
                    <strong class="has-text-green">Units</strong>
                </div>
                <div class="column is-center">
                    <img src="@/assets/account.svg" alt="account" width="30" />
                    <strong>Account</strong>
                </div>
            </div>
        </nav>
    </div>
</template>

<style lang="scss">
.has-text-orange {
    color: #f47e1f;
}

.has-text-green {
    color: #3cb44a;
}

.is-orange {
    color: white;
    background-color: #f47e1f;
}

.is-green {
    background-color: #3cb44a;
    color: white;
}

.is-center {
    display: flex;
    justify-content: center;
    align-items: center;
    .column {
        flex-direction: column;
    }
}
.box {
    border-top: 2px solid #ededed;
    border-radius: 0;
}
</style>
