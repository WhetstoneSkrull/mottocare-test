<template lang="html">
  <v-container grid-list-xs,sm,md,lg,xl>
    <v-layout row wrap>
      <v-flex xs12 sm11>

        <button class="btn btn-primary spacer" v-for="slot in slots" v-bind:key="slot.id">{{slot.slot_name}}</button>


      <!--  <button class="btn btn-primary spacer">(08:21-08:40)am</button>
        <button class="btn btn-primary spacer">(08:41-09:00)am</button>
        <button class="btn btn-primary spacer">(09:01-09:20)am</button>
        <button class="btn btn-primary spacer">(09:21-09:40)am</button>
        <button class="btn btn-primary spacer">(09:41-10:00)am</button>
        <button class="btn btn-primary spacer">(10:01-10:20)am</button>
        <button class="btn btn-primary spacer">(10:21-10:40)am</button>
        <button class="btn btn-primary spacer">(10:41-11:00)am</button>
        <button class="btn btn-primary spacer">(11:01-11:20)am</button>
        <button class="btn btn-primary spacer">(11:21-11:40)am</button>
        <button class="btn btn-primary spacer">(11:41-12:00)pm</button>
        <button class="btn btn-primary spacer">(12:01-12:20)pm</button>
        <button class="btn btn-primary spacer">(12:21-12:40)pm</button>
        <button class="btn btn-primary spacer">(12:41-01:00)pm</button>
        <button class="btn btn-primary spacer">(01:01-01:20)pm</button>  -->


      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
}
</script>

<style lang="css">
.spacer{
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>
