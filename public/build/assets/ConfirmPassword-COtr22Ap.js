import{C as l,i as n,o as d,w as t,a as r,b as e,u as a,m as p,d as u,k as f,j as c}from"./app-h3y1KXtR.js";import{_ as w}from"./GuestLayout-BGWaYfbJ.js";import{_}from"./InputError-BX9wsoEC.js";import{_ as b,a as x}from"./TextInput-D2Pa_NEm.js";import{P as g}from"./PrimaryButton-mM7Yihlb.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const y={class:"mt-4 flex justify-end"},j={__name:"ConfirmPassword",setup(C){const s=l({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return(P,o)=>(d(),n(w,null,{default:t(()=>[r(a(p),{title:"Confirm Password"}),o[2]||(o[2]=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1)),e("form",{onSubmit:u(i,["prevent"])},[e("div",null,[r(b,{for:"password",value:"Password"}),r(x,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:a(s).password,"onUpdate:modelValue":o[0]||(o[0]=m=>a(s).password=m),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),r(_,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",y,[r(g,{class:f(["ms-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:t(()=>o[1]||(o[1]=[c(" Confirm ")])),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{j as default};
