import React from 'react';
import SiteNav from '../components/common/SiteNav';
export default function UserLayout({user,children}) { return <><SiteNav user={user}/><main className="container"><p className="muted">Area User · {user?.name}</p>{children}</main></>; }
