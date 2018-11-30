<template lang="html">
  <v-footer
   dark
   height="auto"
 >
   <v-card
     flat
     tile
     class="blue lighten-1 white--text text-xs-center"
   >
     <v-card-text>
       <v-btn
         v-for="icon in icons"
         :key="icon"
         class="mx-3 white--text"
         icon
       >
         <v-icon size="24px">{{ icon }}</v-icon>
       </v-btn>
     </v-card-text>

     <v-card-text class="white--text pt-0">
        elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
     </v-card-text>

     <v-divider></v-divider>

     <v-card-text class="white--text">
       &copy;2018 — <strong>Mottocare</strong>
     </v-card-text>
   </v-card>
 </v-footer>
</template>

<script>
export default {
  //components: 'Footer',
  data: () => ({
      icons: [
        'fab fa-facebook',
        'fab fa-twitter',
        'fab fa-google-plus',
        'fab fa-linkedin',
        'fab fa-instagram'
      ]
    })
}
</script>

<style lang="css">
</style>
