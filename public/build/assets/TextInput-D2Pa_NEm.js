import{c as o,o as s,g as l,r as d,S as c,q as i,x as p,e as m,U as f}from"./app-h3y1KXtR.js";const _={class:"block text-sm font-medium text-gray-700"},v={key:0},g={key:1},b={__name:"InputLabel",props:{value:{type:String}},setup(e){return(a,u)=>(s(),o("label",_,[e.value?(s(),o("span",v,l(e.value),1)):(s(),o("span",g,[d(a.$slots,"default")]))]))}},h={__name:"TextInput",props:{modelValue:{type:String,required:!0},modelModifiers:{}},emits:["update:modelValue"],setup(e,{expose:a}){const u=c(e,"modelValue"),t=i(null);return p(()=>{t.value.hasAttribute("autofocus")&&t.value.focus()}),a({focus:()=>t.value.focus()}),(x,n)=>m((s(),o("input",{class:"rounded-md border-orange-300 shadow-sm focus:border-orange-500 focus:ring-orange-500","onUpdate:modelValue":n[0]||(n[0]=r=>u.value=r),ref_key:"input",ref:t},null,512)),[[f,u.value]])}};export{b as _,h as a};
