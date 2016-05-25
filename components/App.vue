<template>
  <header-component></header-component>
	<router-view
      keep-alive
      transition
      transition-mode="out-in">
    </router-view>
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