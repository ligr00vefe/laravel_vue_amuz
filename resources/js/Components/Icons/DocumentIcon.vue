<script setup>
  defineProps(['color', 'iconSize']);
</script>

<template>
  <svg xmlns="http://www.w3.org/2000/svg" :width="iconSize ? iconSize : '32'" :height="iconSize ? iconSize : '32'" viewBox="0 0 32 32">
    <g id="그룹_49938" data-name="그룹 49938" transform="translate(-633 -982)">
      <g id="사각형_28401" data-name="사각형 28401" transform="translate(633 982)" fill="#fff" :stroke="color ? color : '#7B7B7B'" stroke-width="1" opacity="0">
        <rect width="32" height="32" stroke="none"/>
        <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
      </g>
      <path id="Icon_awesome-file" data-name="Icon awesome-file" d="M6.348,3.854V0H.68A.679.679,0,0,0,0,.68v13.15a.679.679,0,0,0,.68.68H10.2a.679.679,0,0,0,.68-.68v-9.3H7.029A.682.682,0,0,1,6.348,3.854Zm4.535-.4v.173H7.255V0h.173A.68.68,0,0,1,7.91.2l2.775,2.777A.678.678,0,0,1,10.883,3.455Z" transform="translate(644 991)" fill="#868686"/>
    </g>
  </svg>
</template>