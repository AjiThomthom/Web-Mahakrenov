import React from 'react';
import SiteNav from '../components/common/SiteNav';
import AdminSidebar from '../components/admin/AdminSidebar';
export default function AdminLayout({user,children}) { return <><SiteNav user={user}/><main className="container"><h2>Panel Admin</h2><div className="grid" style={{gridTemplateColumns:'220px 1fr'}}><AdminSidebar/><section>{children}</section></div></main></>; }
