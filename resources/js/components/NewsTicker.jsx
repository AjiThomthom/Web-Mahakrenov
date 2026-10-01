import React from 'react'
import { Rss } from 'lucide-react'

const newsItems = [
  'Pendaftaran Anggota Baru Batch 3 Tahun 2026 Telah Dibuka!',
  'Webinar "Prompting AI" — 04 Oktober 2026',
]

const NewsTicker = () => {
  return (
    <div className="bg-teal-500 text-white overflow-hidden border-y border-teal-600">
      <div className="flex items-center">
        <div className="flex items-center gap-2 bg-teal-600 px-5 py-3 flex-shrink-0 z-10 shadow-lg">
          <Rss size={16} />
          <span className="text-xs font-bold uppercase tracking-wider">Info Terbaru</span>
        </div>
        <div className="relative flex-1 overflow-hidden py-3">
          <div className="whitespace-nowrap animate-marquee flex gap-16">
            {[...newsItems, ...newsItems].map((item, idx) => (
              <span key={idx} className="text-sm font-medium">
                • {item}
              </span>
            ))}
          </div>
        </div>
      </div>
    </div>
  )
}

export default NewsTicker