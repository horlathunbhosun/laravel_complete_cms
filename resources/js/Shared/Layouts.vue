<template>
   <Nav/>


    <slot />


</template>

<script>
import Nav from "./Nav";
export default {
    name: "Layouts",
    components: {Nav}
}
</script>

<style scoped>

</style>
