import React from 'react';
export default function SiteNav({user}) {
 return <header className="nav"><a href="/" style={{fontWeight:800,color:'#0f766e'}}>MAHAKRENOV <small className="muted">UPB</small></a>
 <nav className="navlinks"><a href="/">Beranda</a><a href="/#tentang">Tentang</a><a href="/gallery">Galeri</a><a href="/news">Berita</a>
 {user ? <><a href={user.role==='admin'?'/admin':'/dashboard'}>Dashboard</a><form action="/logout" method="post"><input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.content}/><button className="btn secondary">Keluar</button></form></> : <><a href="/login">Login</a><a className="btn" href="/register">Register</a></>}
 </nav></header>;
}
