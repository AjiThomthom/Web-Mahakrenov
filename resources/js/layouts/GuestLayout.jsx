import React from 'react';
import SiteNav from '../components/common/SiteNav';
export default function GuestLayout({user,children}) { return <><SiteNav user={user}/><main className="container">{children}</main></>; }
