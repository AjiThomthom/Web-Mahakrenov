import React,{useState} from 'react';
import {api} from '../../services/api';
export default function Auth({mode}) {
 const [form,setForm]=useState({name:'',email:'',password:'',password_confirmation:''}); const [error,setError]=useState('');
 const register=mode==='register';
 async function submit(e){e.preventDefault();setError('');try{const result=await api(register?'/register':'/login',{method:'POST',body:JSON.stringify(form)});location.href=result.user?.role==='admin'?'/admin':'/dashboard';}catch(err){setError(err.message)}}
 return <div className="card" style={{maxWidth:480,margin:'30px auto'}}><h1>{register?'Register User':'Login'}</h1><form className="stack" onSubmit={submit}>
 {register&&<label>Nama<input required value={form.name} onChange={e=>setForm({...form,name:e.target.value})}/></label>}
 <label>Email<input type="email" required value={form.email} onChange={e=>setForm({...form,email:e.target.value})}/></label>
 <label>Password<input type="password" required value={form.password} onChange={e=>setForm({...form,password:e.target.value})}/></label>
 {register&&<label>Konfirmasi Password<input type="password" required value={form.password_confirmation} onChange={e=>setForm({...form,password_confirmation:e.target.value})}/></label>}
 {error&&<p className="error">{error}</p>}<button className="btn">{register?'Buat Akun':'Masuk'}</button>
 </form><p className="muted">{register?'Sudah punya akun? ':'Belum punya akun? '}<a href={register?'/login':'/register'}>{register?'Login':'Register'}</a></p></div>
}
