<template>
  <input
    class="block w-full p-2 border-slate-300 border-2 rounded-lg"
    :value="value"
    :type="type"
    @input="$emit('input', $event.target.value)"
  />
</template>

<script>
export default {
  props: ["value", "type"],
};
</script>