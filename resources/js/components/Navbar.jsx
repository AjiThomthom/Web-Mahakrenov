import React, { useState, useEffect } from 'react'
import { Menu, X, ChevronDown, PhoneCall } from 'lucide-react'

const menuItems = [
  { label: 'Beranda', href: '#beranda' },
  { label: 'Tentang Kami', href: '#tentang' },
  {
    label: 'Divisi',
    href: '#divisi',
    dropdown: [
      'RnD',
      'HR',
      'QC',
      'PR',
    ],
  },
  { label: 'Galeri', href: '#galeri' },
  { label: 'Berita', href: '#berita' },
]

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false)
  const [scrolled, setScrolled] = useState(false)
  const [openDropdown, setOpenDropdown] = useState(null)

  useEffect(() => {
    const handleScroll = () => setScrolled(window.scrollY > 10)
    window.addEventListener('scroll', handleScroll)
    return () => window.removeEventListener('scroll', handleScroll)
  }, [])

  useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth >= 1024) {
        setIsOpen(false)
      } else {
        setOpenDropdown(null)
      }
    }
    window.addEventListener('resize', handleResize)
    return () => window.removeEventListener('resize', handleResize)
  }, [])

  const closeAll = () => {
    setIsOpen(false)
    setOpenDropdown(null)
  }

  const headerClass = scrolled
    ? 'sticky top-0 z-50 bg-white transition-shadow duration-300 shadow-md'
    : 'sticky top-0 z-50 bg-white transition-shadow duration-300 shadow-sm'

  return (
    <header className={headerClass}>
      <div className="container-custom">
        <div className="flex items-center justify-between h-20">
          <a href="#beranda" className="flex items-center gap-2 group" onClick={closeAll}>
            <div className="bg-teal-500 p-2 rounded-lg group-hover:bg-teal-600 transition-colors w-12 h-12 object-contain">
              <img src="/images/img2.png"
              alt="Logo Mahakrenov"
              className="w-full h-full object-contain"
    />
            </div>
            <div className="flex flex-col leading-tight">
              <span className="text-xl font-extrabold text-teal-600 tracking-tight">
                MAHAKRENOV
              </span>
              <span className="text-[10px] text-gray-500 font-medium tracking-wide">
                MAHASISWA KREATIF INOVATIF
              </span>
            </div>
          </a>

          <nav className="hidden lg:flex items-center gap-1">
            {menuItems.map((item) => {
              const isDropdownOpen = openDropdown === item.label
              const chevronClass = isDropdownOpen
                ? 'transition-transform duration-200 rotate-180'
                : 'transition-transform duration-200'
              const panelClass = isDropdownOpen
                ? 'absolute top-full left-0 w-64 bg-white rounded-lg shadow-xl border border-teal-100 py-2 origin-top transition-all duration-200 opacity-100 scale-100 visible'
                : 'absolute top-full left-0 w-64 bg-white rounded-lg shadow-xl border border-teal-100 py-2 origin-top transition-all duration-200 opacity-0 scale-95 invisible pointer-events-none'

              return (
                <div
                  key={item.label}
                  className="relative"
                  onMouseEnter={() => item.dropdown && setOpenDropdown(item.label)}
                  onMouseLeave={() => item.dropdown && setOpenDropdown(null)}
                >
                  <a
                    href={item.href}
                    className="flex items-center gap-1 px-4 py-2 rounded-md text-sm font-semibold text-gray-700 hover:text-teal-600 hover:bg-teal-50 transition-colors"
                  >
                    {item.label}
                    {item.dropdown && <ChevronDown size={14} className={chevronClass} />}
                  </a>

                  {item.dropdown && (
                    <div className={panelClass}>
                      {item.dropdown.map((sub) => (
                        <a
                          key={sub}
                          href="#divisi"
                          className="block px-4 py-2.5 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-600 transition-colors"
                        >
                          {sub}
                        </a>
                      ))}
                    </div>
                  )}
                </div>
              )
            })}
          </nav>

          <div className="hidden lg:flex items-center">
            <a
              href="#footer"
              className="flex items-center gap-2 bg-teal-500 hover:bg-teal-600 text-white font-semibold text-sm px-5 py-2.5 rounded-md transition-colors shadow-sm"
            >
              <PhoneCall size={16} />
              Hubungi Kami
            </a>
          </div>

          <button
            type="button"
            aria-label="Toggle menu"
            aria-expanded={isOpen}
            className="lg:hidden text-teal-700"
            onClick={() => setIsOpen(!isOpen)}
          >
            {isOpen ? <X size={28} /> : <Menu size={28} />}
          </button>
        </div>
      </div>

      {isOpen && (
        <div className="lg:hidden bg-white border-t border-teal-100 px-4 pb-4">
          {menuItems.map((item) => (
            <div key={item.label} className="border-b border-teal-50 last:border-none">
              <a
                href={item.href}
                className="block py-3 text-sm font-semibold text-gray-700 hover:text-teal-600"
                onClick={closeAll}
              >
                {item.label}
              </a>
              {item.dropdown && (
                <div className="pl-4 pb-2 flex flex-col gap-2">
                  {item.dropdown.map((sub) => (
                    <a
                      key={sub}
                      href="#divisi"
                      className="text-xs text-gray-500 hover:text-teal-600"
                      onClick={closeAll}
                    >
                      {sub}
                    </a>
                  ))}
                </div>
              )}
            </div>
          ))}
          <a
            href="#footer"
            className="mt-4 flex items-center justify-center gap-2 bg-teal-500 hover:bg-teal-600 text-white font-semibold text-sm px-5 py-3 rounded-md transition-colors"
            onClick={closeAll}
          >
            <PhoneCall size={16} />
            Hubungi Kami
          </a>
        </div>
      )}
    </header>
  )
}

export default Navbar
