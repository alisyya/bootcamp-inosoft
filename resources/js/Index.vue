<template>
    <div id="main">
        <header id="header">
            <Menu></Menu>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
import Menu from './components/Menu'

export default {
    name: 'Index',
    data() {
        return {
            //
        }
    },
    components: {
        Menu,
    }
}
</script>
