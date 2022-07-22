<template>
  <label for="">{{ msg }}</label>
</template>
<script>
export default {
  name: "LabelComp",
  props: {
    msg: String,
  },
};
</script>