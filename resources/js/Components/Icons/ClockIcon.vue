<script setup>
  defineProps(['color', 'iconSize']);
</script>

<template>
  <svg xmlns="http://www.w3.org/2000/svg" :width="iconSize ? iconSize : '32'" :height="iconSize ? iconSize : '32'" viewBox="0 0 32 32">
    <g id="그룹_49940" data-name="그룹 49940" transform="translate(-836 -968)">
      <g id="사각형_28402" data-name="사각형 28402" transform="translate(836 968)" fill="#fff" :stroke="color ? color : '#7B7B7B'" stroke-width="1" opacity="0">
        <rect width="32" height="32" stroke="none"/>
        <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
      </g>
      <path id="Icon_open-clock" data-name="Icon open-clock" d="M8.065,0a8.065,8.065,0,1,0,8.065,8.065A8.088,8.088,0,0,0,8.065,0Zm0,2.016A6.049,6.049,0,1,1,2.016,8.065,6.04,6.04,0,0,1,8.065,2.016ZM7.057,4.032V8.508l.323.262L8.387,9.778l.685.766,1.452-1.452-.766-.685-.686-.685V4.073H7.057Z" transform="translate(844 976)" fill="#7b7b7b"/>
    </g>
  </svg>
</template>