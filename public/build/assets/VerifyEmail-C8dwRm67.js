import{C as c,h as g,c as p,o as a,w as o,a as i,b as n,f as y,g as v,u as t,m as b,d as x,n as h,e as r,P as k}from"./app-DnuXw6ee.js";import{_}from"./GuestLayout-DxKvzgp0.js";import{P as w}from"./PrimaryButton-CaFADSIx.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const V={key:0,class:"mb-4 text-sm font-medium text-green-600"},B={class:"mt-4 flex items-center justify-between"},S={__name:"VerifyEmail",props:{status:{type:String}},setup(d){const l=d,s=c({}),u=()=>{s.post(route("verification.send"))},m=g(()=>l.status==="verification-link-sent");return(f,e)=>(a(),p(_,null,{default:o(()=>[i(t(b),{title:"Email Verification"}),e[2]||(e[2]=n("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1)),m.value?(a(),y("div",V," A new verification link has been sent to the email address you provided during registration. ")):v("",!0),n("form",{onSubmit:x(u,["prevent"])},[n("div",B,[i(w,{class:h({"opacity-25":t(s).processing}),disabled:t(s).processing},{default:o(()=>e[0]||(e[0]=[r(" Resend Verification Email ")])),_:1},8,["class","disabled"]),i(t(k),{href:f.route("logout"),method:"post",as:"button",class:"rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"},{default:o(()=>e[1]||(e[1]=[r("Log Out")])),_:1},8,["href"])])],32)]),_:1}))}};export{S as default};
