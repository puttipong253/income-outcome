<template>
  <div>
    <h1>{{count}}</h1>
    <h1>{{number}}</h1>
    <button @click="increment">increment</button>
    <button @click="decrement">decrement</button>
    <button @click="reset">reset</button>
    <button @click="setCount">setCount</button>
  </div>
</template>

<script>
export default {
  data() {
    return { 
      count: 0,
      number: 0
    }
  },
  methods: {
    increment(){
      this.count++
    },
    decrement(){
      this.count--
    },
    reset(){
      this.count = 0
    },
    setCount(){
      this.number = this.count
    }
  },
}
</script>
