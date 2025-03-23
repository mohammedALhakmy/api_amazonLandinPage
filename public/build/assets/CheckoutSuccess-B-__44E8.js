import{u as m,_ as f}from"./AuthenticatedLayout-OxjHRTln.js";import{c as a,o as i,b as s,f as x,g as _,h as g,s as h,x as b,a as l,u as c,m as C,w as d,P as p,F as k}from"./app-h3y1KXtR.js";import{_ as v}from"./_plugin-vue_export-helper-DlAUqK2U.js";const w={name:"CheckIcon",emits:["click"],props:{title:{type:String},fillColor:{type:String,default:"currentColor"},size:{type:Number,default:24}}},y=["aria-hidden","aria-label"],S=["fill","width","height"],L={d:"M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"},$={key:0};function z(r,o,e,n,t,I){return i(),a("span",g(r.$attrs,{"aria-hidden":e.title?null:"true","aria-label":e.title,class:"material-design-icon check-icon",role:"img",onClick:o[0]||(o[0]=u=>r.$emit("click",u))}),[(i(),a("svg",{fill:e.fillColor,class:"material-design-icon__svg",width:e.size,height:e.size,viewBox:"0 0 24 24"},[s("path",L,[e.title?(i(),a("title",$,_(e.title),1)):x("",!0)])],8,S))],16,y)}const B=v(w,[["render",z]]),N={class:"max-w-xl mx-auto"},F={class:"flex flex-col p-5 rounded-lg shadow bg-white"},P={class:"flex flex-col items-center text-center"},V={class:"inline-block p-4 bg-green-100 rounded-full"},H={__name:"CheckoutSuccess",setup(r){const o=m(),{cart:e}=h(o);return b(()=>{e.value=[]}),(n,t)=>(i(),a(k,null,[l(c(C),{title:"Checkout Success"}),l(f,null,{default:d(()=>[t[3]||(t[3]=s("div",{class:"mt-10 mb-6 max-w-xl mx-auto text-3xl font-extrabold"},"Checkout Success",-1)),s("div",N,[s("div",F,[s("div",P,[s("div",V,[l(B,{size:100,fillColor:"#7CFC00"})]),t[0]||(t[0]=s("div",{class:"mt-2 font-extrabold text-2xl text-gray-800"},"Success",-1)),t[1]||(t[1]=s("p",{class:"mt-2 text-lg font-bold text-gray-600 leading-relaxed"},"Your order has been placed",-1))]),l(c(p),{href:n.route("dashboard"),class:"flex items-center mt-3"},{default:d(()=>t[2]||(t[2]=[s("button",{class:"flex-1 px-4 py-2 ml-2 bg-yellow-500 hover:bg-yellow-500 text-gray-900 font-bold rounded-md"},"Home",-1)])),_:1},8,["href"])])])]),_:1})],64))}};export{H as default};
