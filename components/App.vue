<template>
  <header-component></header-component>
  <container-component></container-component>
</template>

<script>

import HeaderComponent from './HeaderComponent.vue'
import ContainerComponent from './ContainerComponent.vue'

export default {
  components: {
  	HeaderComponent,
  	ContainerComponent
  }
}
</script>