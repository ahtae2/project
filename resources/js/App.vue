<template>
    <div class="wrapper">
        <app-header v-if="isAuth" />
        <app-sidebar v-if="isAuth" />

        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <app-footer v-if="isAuth" />
    </div>
</template>
<script>
    import { mapState, mapGetters } from 'vuex'
    import Header from './components/Header.vue'
    import Sidebar from './components/Sidebar.vue'
    import Footer from './components/Footer.vue'
    export default {
        computed: {
            ...mapState(['token']),
            ...mapGetters(['isAuth'])
        },
        components: {
            'app-header': Header,
            'app-sidebar': Sidebar,
            'app-footer': Footer
        }
    }
</script>