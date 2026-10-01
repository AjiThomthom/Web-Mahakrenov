import React from 'react'
import TopBar from './components/TopBar'
import Navbar from './components/Navbar'
import Hero from './components/Hero'
import NewsTicker from './components/NewsTicker'
import Divisions from './components/Divisions'
import Philosophy from './components/Philosophy'
import Footer from './components/Footer'


function Main() {
  return (
    <div className="min-h-screen bg-white">
      <TopBar />
      <Navbar />
      <Hero />
      <NewsTicker />
      <Divisions />
      <Philosophy />
      <Footer />
    </div>
  )
}

export default Main