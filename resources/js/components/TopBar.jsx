import React from 'react'
import { Megaphone, HelpCircle, Globe } from 'lucide-react'

const TopBar = () => {
  return (
    <div className="hidden md:block bg-teal-800 text-teal-50 text-xs">
      <div className="container-custom flex items-center justify-between py-2">
        <div className="flex items-center gap-2">
          <Megaphone size={14} className="text-teal-300" />
          <span className="tracking-wide font-medium">
            Mahakrenov - Universitas Pelita Bangsa
          </span>
        </div>
        <div className="flex items-center gap-6">
          <a href="#recruitment" className="flex items-center gap-1 hover:text-white transition-colors">
            Open Recruitment
          </a>
          <a href="#faq" className="flex items-center gap-1 hover:text-white transition-colors">
            <HelpCircle size={13} />
            FAQ
          </a>
          <a href="#language" className="flex items-center gap-1 hover:text-white transition-colors border-l border-teal-600 pl-6">
            <Globe size={13} />
            ID / EN
          </a>
        </div>
      </div>
    </div>
  )
}

export default TopBar