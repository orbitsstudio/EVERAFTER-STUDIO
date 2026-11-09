import React, { useState } from 'react';
import {
  Download,
  Menu,
  X,
  Maximize2
} from 'lucide-react';

export default function App() {
  const [activePage, setActivePage] = useState<'home' | 'about' | 'portfolio' | 'stories' | 'services' | 'destination' | 'contact'>('home');
  const [selectedCategory, setSelectedCategory] = useState<string>('all');
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [activeTestimonial, setActiveTestimonial] = useState(0);
  const [lightboxImg, setLightboxImg] = useState<{ src: string; title: string } | null>(null);

  // Customizer styling tokens
  const [heroHeading] = useState('Your Story. Beautifully Remembered.');
  const [heroKicker] = useState('International Luxury Wedding Photography');
  const [heroDesc] = useState('Editorial wedding imagery and cinematic films for couples celebrating love in the world’s most breathtaking destinations. Crafted with timeless fine-art sensibility.');
  const [colorIvory] = useState('#F7F4EF');
  const [colorCharcoal] = useState('#242321');

  // Contact form submission state
  const [formSubmitted, setFormSubmitted] = useState(false);
  const [formSending, setFormSending] = useState(false);
  const [formData, setFormData] = useState({
    names: '',
    email: '',
    phone: '',
    date: '',
    location: '',
    eventType: 'Multi-Day Destination Wedding',
    guestCount: '',
    message: ''
  });

  const navigateTo = (page: typeof activePage, anchorId?: string) => {
    setActivePage(page);
    setMobileMenuOpen(false);
    if (page === 'home' && anchorId) {
      setTimeout(() => {
        const el = document.getElementById(anchorId);
        if (el) {
          el.scrollIntoView({ behavior: 'smooth' });
        } else {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
      }, 50);
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  };

  const testimonials = [
    {
      quote: "“Everafter Studio captured our Lake Como celebration with a breathtaking poetry that surpassed every expectation. Looking through our heirloom gallery feels like reliving our wedding inside a high-fashion editorial film.”",
      couple: "Victoria & Alexander",
      location: "Villa Balbiano, Lake Como (Sample Client Review)"
    },
    {
      quote: "“Their presence during our Provence celebration was calm, discreet, and deeply intuitive. They caught glances and stolen tears we never knew occurred. Truly world-class visual artists.”",
      couple: "Sophia & Christian",
      location: "Château Saint-Martin, French Riviera (Sample Client Review)"
    },
    {
      quote: "“Our wedding film is a masterpiece of cinema. The color grading, the soundtrack choices, and the rhythm of the edit brought our families to tears. Worth every single investment.”",
      couple: "Genevieve & Liam",
      location: "Amalfi Coast, Italy (Sample Client Review)"
    }
  ];

  const portfolioCards = [
    {
      id: 1,
      title: "Elena & Matteo — Villa Balbiano",
      location: "Lake Como, Italy",
      category: "destination cinema",
      img: "/hero.jpg",
      span: "col-span-12 lg:col-span-8"
    },
    {
      id: 2,
      title: "Bridal Couture in Neoclassical Light",
      location: "Florence, Italy",
      category: "editorial",
      img: "/portfolio-1.jpg",
      span: "col-span-12 lg:col-span-4"
    },
    {
      id: 3,
      title: "Camille & Alexandre — Château Romance",
      location: "Provence, France",
      category: "destination",
      img: "/destination.jpg",
      span: "col-span-12 lg:col-span-4"
    },
    {
      id: 4,
      title: "Cinematic Nuptial Film — Positano Road",
      location: "Amalfi Coast, Italy",
      category: "cinema destination",
      img: "/film.jpg",
      span: "col-span-12 lg:col-span-8"
    }
  ];

  const filteredPortfolio = selectedCategory === 'all'
    ? portfolioCards
    : portfolioCards.filter(c => c.category.includes(selectedCategory));

  const handleFormSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setFormSending(true);
    setTimeout(() => {
      setFormSending(false);
      setFormSubmitted(true);
    }, 900);
  };

  return (
    <div className="min-h-screen flex flex-col bg-[#1A1918] text-[#F7F4EF] selection:bg-[#B49A70] selection:text-white font-sans antialiased">
      <div className="flex-1 flex flex-col" style={{ backgroundColor: colorIvory, color: colorCharcoal }}>
        {/* Luxury Theme Header */}
        <header className="sticky top-0 z-40 bg-[#F7F4EF]/95 backdrop-blur-md border-b border-[#242321]/10 px-6 sm:px-12 py-5 flex items-center justify-between">
          <div className="flex items-center">
            <button
              onClick={() => navigateTo('home')}
              className="font-serif text-2xl tracking-[0.2em] uppercase font-normal text-[#242321] hover:text-[#B49A70] transition-colors cursor-pointer"
            >
              Everafter Studio
            </button>
          </div>

          <nav className="hidden md:flex items-center gap-8 text-xs tracking-[0.16em] uppercase text-[#242321]">
            <button onClick={() => navigateTo('home', 'stories')} className="hover:text-[#B49A70] transition-colors cursor-pointer">Stories</button>
            <button onClick={() => navigateTo('home', 'portfolio')} className="hover:text-[#B49A70] transition-colors cursor-pointer">Portfolio</button>
            <button onClick={() => navigateTo('home', 'services')} className="hover:text-[#B49A70] transition-colors cursor-pointer">Services</button>
            <button onClick={() => navigateTo('destination')} className="hover:text-[#B49A70] transition-colors cursor-pointer">Destination</button>
            <button onClick={() => navigateTo('about')} className="hover:text-[#B49A70] transition-colors cursor-pointer">About</button>
            <button onClick={() => navigateTo('home', 'inquire')} className="hover:text-[#B49A70] transition-colors cursor-pointer">Contact</button>
          </nav>

          <div className="flex items-center gap-4">
            <button
              onClick={() => navigateTo('home', 'inquire')}
              className="hidden sm:inline-flex items-center px-5 py-2.5 bg-[#B49A70] hover:bg-[#242321] text-white text-[11px] tracking-[0.18em] uppercase font-medium transition-all cursor-pointer"
            >
              Book a Consultation
            </button>
            <button
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="md:hidden text-[#242321] p-1 cursor-pointer"
              aria-label="Toggle mobile menu"
            >
              {mobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </header>

          {/* Mobile Navigation Drawer */}
          {mobileMenuOpen && (
            <div className="md:hidden fixed inset-0 top-[73px] z-50 bg-[#242321] text-[#F7F4EF] p-8 flex flex-col gap-6 text-lg font-serif">
              <button onClick={() => { setActivePage('home'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Home</button>
              <button onClick={() => { setActivePage('stories'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Wedding Stories</button>
              <button onClick={() => { setActivePage('portfolio'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Portfolio Gallery</button>
              <button onClick={() => { setActivePage('services'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Services & Cinema</button>
              <button onClick={() => { setActivePage('destination'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Destination Weddings</button>
              <button onClick={() => { setActivePage('about'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">About the Studio</button>
              <button onClick={() => { setActivePage('contact'); setMobileMenuOpen(false); }} className="text-left py-2 border-b border-white/10">Inquire & Reserve Date</button>
            </div>
          )}

          {/* CONTENT ROUTING BASED ON SELECTED PAGE */}
          {activePage === 'home' && (
            <div>
              {/* HERO SECTION */}
              <section className="relative min-h-[90vh] flex items-center justify-center text-center px-4 py-24 overflow-hidden bg-[#242321]">
                <img
                  src="/hero.jpg"
                  alt="Lake Como Balustrade Wedding"
                  className="absolute inset-0 w-full h-full object-cover brightness-[0.72] contrast-[1.05] scale-105 transition-transform duration-1000 ease-out"
                />
                <div className="absolute inset-0 bg-gradient-to-b from-[#181614]/60 via-[#181614]/30 to-[#181614]/80" />

                <div className="relative z-10 max-w-4xl mx-auto text-[#F7F4EF] px-4">
                  <span className="inline-block text-xs uppercase tracking-[0.28em] text-[#D8C6AE] font-medium mb-4">
                    {heroKicker}
                  </span>
                  <h1 className="font-serif text-4xl sm:text-6xl lg:text-7xl font-light leading-[1.08] tracking-tight mb-6 text-balance">
                    {heroHeading}
                  </h1>
                  <p className="font-sans text-sm sm:text-base text-white/90 font-light max-w-2xl mx-auto mb-10 leading-relaxed">
                    {heroDesc}
                  </p>
                  <div className="flex flex-wrap items-center justify-center gap-4">
                    <button
                      onClick={() => setActivePage('stories')}
                      className="px-6 py-3 bg-[#B49A70] hover:bg-white text-black text-xs tracking-[0.2em] uppercase font-medium transition-all"
                    >
                      Explore Our Stories
                    </button>
                    <button
                      onClick={() => setActivePage('contact')}
                      className="px-6 py-3 border border-white/50 hover:bg-white hover:text-black text-white text-xs tracking-[0.2em] uppercase font-medium transition-all"
                    >
                      Book Your Date
                    </button>
                  </div>
                </div>

                <div className="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/60 text-[10px] tracking-[0.25em] uppercase flex flex-col items-center gap-2">
                  <span>Scroll</span>
                  <div className="w-[1px] h-8 bg-white/40 animate-pulse" />
                </div>
              </section>

              {/* INTRODUCTION & PHILOSOPHY */}
              <section className="py-24 sm:py-32 px-6 sm:px-12 max-w-7xl mx-auto">
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                  <div className="lg:col-span-7">
                    <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#B49A70] font-medium mb-4">
                      Our Philosophy
                    </span>
                    <h2 className="font-serif text-3xl sm:text-5xl font-normal leading-tight text-[#242321] mb-6">
                      Poetic imagery rooted in candid emotion and enduring beauty.
                    </h2>
                    <p className="font-serif italic text-xl sm:text-2xl text-[#242321] mb-6 leading-relaxed">
                      At Everafter Studio, we view weddings not merely as sequences of scheduled events, but as deeply emotional tapestries of human connection.
                    </p>
                    <p className="text-[#34322F] text-base leading-relaxed font-light mb-6">
                      Our approach blends editorial high-fashion aesthetics with quiet, unobtrusive documentary storytelling. Every frame is composed with intentionality, honoring authentic light, intimate glances, and the rare elegance of your celebration.
                    </p>
                    <button
                      onClick={() => setActivePage('about')}
                      className="inline-flex items-center gap-2 border border-[#242321] px-5 py-2.5 text-xs tracking-[0.18em] uppercase hover:bg-[#242321] hover:text-[#F7F4EF] transition-all"
                    >
                      <span>Read Studio Story &rarr;</span>
                    </button>
                  </div>
                  <div className="lg:col-span-5 relative">
                    <img
                      src="/destination.jpg"
                      alt="Everafter Studio Wedding Philosophy"
                      className="w-full h-[480px] object-cover shadow-2xl"
                    />
                    <div className="absolute -bottom-6 -left-6 bg-[#242321] text-[#D8C6AE] p-6 border border-[#D8C6AE]/20 hidden sm:block">
                      <span className="font-serif text-lg tracking-wide">Editorial · Analog · Timeless</span>
                    </div>
                  </div>
                </div>
              </section>

              {/* FEATURED PORTFOLIO */}
              <section className="py-24 bg-[#F1ECE3] px-6 sm:px-12">
                <div className="max-w-7xl mx-auto">
                  <div className="text-center max-w-2xl mx-auto mb-12">
                    <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#B49A70] font-medium mb-3">
                      Selected Works
                    </span>
                    <h2 className="font-serif text-3xl sm:text-5xl font-normal text-[#242321] mb-4">
                      A Curated Portfolio of Love & Light
                    </h2>
                    <p className="text-[#7E7972] text-sm sm:text-base font-light">
                      Captured across private villas, historic estates, and coastal sanctuaries worldwide.
                    </p>
                  </div>

                  {/* Filter Tabs */}
                  <div className="flex flex-wrap items-center justify-center gap-6 mb-12">
                    {[
                      { key: 'all', label: 'All Works' },
                      { key: 'destination', label: 'Destination' },
                      { key: 'editorial', label: 'Editorial Bridal' },
                      { key: 'cinema', label: 'Cinematic Films' }
                    ].map((tab) => (
                      <button
                        key={tab.key}
                        onClick={() => setSelectedCategory(tab.key)}
                        className={`text-xs tracking-[0.18em] uppercase pb-1 transition-all ${
                          selectedCategory === tab.key
                            ? 'text-[#242321] font-semibold border-b border-[#B49A70]'
                            : 'text-[#7E7972] hover:text-[#242321]'
                        }`}
                      >
                        {tab.label}
                      </button>
                    ))}
                  </div>

                  {/* Masonry / Bento Grid */}
                  <div className="grid grid-cols-12 gap-6">
                    {filteredPortfolio.map((card) => (
                      <div
                        key={card.id}
                        onClick={() => setLightboxImg({ src: card.img, title: card.title })}
                        className={`${card.span} group relative h-[420px] overflow-hidden bg-black cursor-pointer shadow-lg`}
                      >
                        <img
                          src={card.img}
                          alt={card.title}
                          className="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 group-hover:brightness-90"
                        />
                        <div className="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent flex flex-col justify-end p-8 text-white">
                          <span className="text-[11px] uppercase tracking-[0.2em] text-[#D8C6AE] mb-1">
                            {card.location}
                          </span>
                          <h3 className="font-serif text-2xl font-light group-hover:text-[#D8C6AE] transition-colors">
                            {card.title}
                          </h3>
                        </div>
                        <div className="absolute top-4 right-4 bg-black/40 backdrop-blur-sm p-2 text-white/70 group-hover:text-white transition-colors">
                          <Maximize2 className="w-4 h-4" />
                        </div>
                      </div>
                    ))}
                  </div>
                </div>
              </section>

              {/* WEDDING STORIES SECTION */}
              <section className="py-24 sm:py-32 px-6 sm:px-12 max-w-7xl mx-auto">
                <div className="text-center max-w-2xl mx-auto mb-16">
                  <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#B49A70] font-medium mb-3">
                    Real Celebrations
                  </span>
                  <h2 className="font-serif text-3xl sm:text-5xl font-normal text-[#242321] mb-4">
                    Selected Wedding Stories
                  </h2>
                  <p className="text-[#7E7972] text-sm sm:text-base font-light">
                    Deeply personal narratives captured through analog medium format and cinematic visual storytelling.
                  </p>
                </div>

                {/* Story 1 */}
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-20 pb-20 border-b border-[#242321]/10">
                  <div className="lg:col-span-6">
                    <img
                      src="/hero.jpg"
                      alt="Elena & Matteo"
                      className="w-full h-[440px] object-cover shadow-lg cursor-pointer"
                      onClick={() => setLightboxImg({ src: '/hero.jpg', title: 'Elena & Matteo — Villa Balbiano' })}
                    />
                  </div>
                  <div className="lg:col-span-6">
                    <div className="text-xs uppercase tracking-[0.16em] text-[#7E7972] mb-3">
                      <span>Lake Como, Italy</span>
                      <span className="mx-2 text-[#D8C6AE]">·</span>
                      <span>September Celebration</span>
                    </div>
                    <h3 className="font-serif text-3xl sm:text-4xl text-[#242321] font-light mb-4">
                      Elena &amp; Matteo — Villa Balbiano
                    </h3>
                    <p className="text-[#34322F] text-base leading-relaxed font-light mb-6">
                      An intimate dusk celebration overlooking the alpine calm of Lake Como. From quiet veil adjustments in neoclassical suites to a champagne toast beneath century-old cypress trees, every frame embraced analog romance.
                    </p>
                    <div className="text-xs uppercase tracking-[0.14em] text-[#B49A70] mb-6">
                      Medium: Contax 645 · Kodak Portra 400 · Arri 35
                    </div>
                    <button
                      onClick={() => setActivePage('stories')}
                      className="inline-flex items-center gap-2 border border-[#242321] px-5 py-2.5 text-xs tracking-[0.18em] uppercase hover:bg-[#242321] hover:text-[#F7F4EF] transition-all"
                    >
                      View Complete Story Gallery &rarr;
                    </button>
                  </div>
                </div>

                {/* Story 2 */}
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                  <div className="lg:col-span-6 lg:order-2">
                    <img
                      src="/destination.jpg"
                      alt="Camille & Alexandre"
                      className="w-full h-[440px] object-cover shadow-lg cursor-pointer"
                      onClick={() => setLightboxImg({ src: '/destination.jpg', title: 'Camille & Alexandre — Provence' })}
                    />
                  </div>
                  <div className="lg:col-span-6 lg:order-1">
                    <div className="text-xs uppercase tracking-[0.16em] text-[#7E7972] mb-3">
                      <span>Provence, France</span>
                      <span className="mx-2 text-[#D8C6AE]">·</span>
                      <span>Summer Celebration</span>
                    </div>
                    <h3 className="font-serif text-3xl sm:text-4xl text-[#242321] font-light mb-4">
                      Camille &amp; Alexandre — Château de Tourreau
                    </h3>
                    <p className="text-[#34322F] text-base leading-relaxed font-light mb-6">
                      Sun-drenched limestone courtyards, olive branch bouquets, and candlelit courtyard toasts lasting deep into the warm Provencal evening. A masterclass in relaxed French elegance.
                    </p>
                    <div className="text-xs uppercase tracking-[0.14em] text-[#B49A70] mb-6">
                      Medium: Leica M11 · 35mm Summilux · Tri-X 400
                    </div>
                    <button
                      onClick={() => setActivePage('stories')}
                      className="inline-flex items-center gap-2 border border-[#242321] px-5 py-2.5 text-xs tracking-[0.18em] uppercase hover:bg-[#242321] hover:text-[#F7F4EF] transition-all"
                    >
                      View Complete Story Gallery &rarr;
                    </button>
                  </div>
                </div>
              </section>

              {/* SERVICES SECTION */}
              <section className="py-24 bg-[#242321] text-[#F7F4EF] px-6 sm:px-12">
                <div className="max-w-7xl mx-auto">
                  <div className="text-center max-w-2xl mx-auto mb-16">
                    <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#D8C6AE] font-medium mb-3">
                      Bespoke Services
                    </span>
                    <h2 className="font-serif text-3xl sm:text-5xl font-normal text-[#F7F4EF] mb-4">
                      Artisanal Craftsmanship for Sacred Celebrations
                    </h2>
                    <p className="text-white/70 text-sm sm:text-base font-light">
                      Every commission is tailored to the rhythm, scale, and distinct aesthetic of your celebration.
                    </p>
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {[
                      { num: "01", title: "Destination Weddings", desc: "Multi-day European and global wedding coverage. We handle complete travel logistics, pre-event rehearsals, and full wedding day storytelling with an unobtrusive editorial eye." },
                      { num: "02", title: "Cinematic Wedding Films", desc: "Shot on 35mm cinema motion cameras and vintage prime lenses. Directed with poetic rhythm, natural audio soundscapes, and bespoke color grading reminiscent of classic cinema." },
                      { num: "03", title: "Fine Art Photography", desc: "A harmonious blend of medium-format analog film and modern high-resolution digital cameras, delivering rich skin tones, ethereal highlights, and authentic candid portraiture." },
                      { num: "04", title: "Haute Couture Bridal", desc: "Dedicated pre-ceremony editorial portraiture capturing the architectural drape of your couture gown, heirloom jewelry, and quiet anticipation before guests arrive." },
                      { num: "05", title: "Pre-Wedding & Editorial", desc: "Editorial fashion sessions set in picturesque European landmarks—from the canals of Venice and Parisian boulevards to secluded coastal coves in the Greek Isles." },
                      { num: "06", title: "Heirloom Albums & Prints", desc: "Hand-bound Italian leather and Japanese linen keepsake albums printed on archival museum cotton paper, designed to preserve your memories for centuries." }
                    ].map((s) => (
                      <div key={s.num} className="p-8 bg-white/[0.03] border border-white/10 hover:border-[#B49A70] transition-all">
                        <div className="font-serif text-2xl text-[#B49A70] mb-4">{s.num}</div>
                        <h3 className="font-serif text-xl font-light text-white mb-3">{s.title}</h3>
                        <p className="text-white/70 text-sm leading-relaxed font-light">{s.desc}</p>
                      </div>
                    ))}
                  </div>
                </div>
              </section>

              {/* TESTIMONIALS CAROUSEL */}
              <section className="py-24 sm:py-32 px-6 sm:px-12 max-w-4xl mx-auto text-center">
                <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#B49A70] font-medium mb-3">
                  Words of Praise
                </span>
                <h2 className="font-serif text-3xl sm:text-4xl font-normal text-[#242321] mb-12">
                  Kind Notes from Cherished Couples
                </h2>

                <div className="min-h-[180px] flex items-center justify-center">
                  <blockquote className="font-serif italic text-2xl sm:text-3xl text-[#242321] leading-relaxed">
                    {testimonials[activeTestimonial].quote}
                  </blockquote>
                </div>
                <div className="mt-8 font-sans text-xs uppercase tracking-[0.2em] text-[#B49A70] font-semibold">
                  {testimonials[activeTestimonial].couple}
                </div>
                <div className="text-xs text-[#7E7972] mt-1">
                  {testimonials[activeTestimonial].location}
                </div>

                <div className="flex items-center justify-center gap-4 mt-8">
                  <button
                    onClick={() => setActiveTestimonial((activeTestimonial - 1 + testimonials.length) % testimonials.length)}
                    className="w-10 h-10 border border-[#242321]/20 flex items-center justify-center hover:bg-[#242321] hover:text-white transition-colors"
                  >
                    &larr;
                  </button>
                  <button
                    onClick={() => setActiveTestimonial((activeTestimonial + 1) % testimonials.length)}
                    className="w-10 h-10 border border-[#242321]/20 flex items-center justify-center hover:bg-[#242321] hover:text-white transition-colors"
                  >
                    &rarr;
                  </button>
                </div>
              </section>

              {/* INQUIRY FORM */}
              <section id="inquire" className="py-24 bg-[#F3EFE8] px-6 sm:px-12">
                <div className="max-w-3xl mx-auto">
                  <div className="text-center mb-12">
                    <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#B49A70] font-medium mb-3">
                      Reserve Your Date
                    </span>
                    <h2 className="font-serif text-3xl sm:text-5xl font-normal text-[#242321] mb-4">
                      Inquire for Your Celebration
                    </h2>
                    <p className="text-[#7E7972] text-sm sm:text-base font-light">
                      Tell us about your wedding date, destination, and visual vision. Our studio director will review our calendar and reply within 24 to 48 hours.
                    </p>
                  </div>

                  <form onSubmit={handleFormSubmit} className="bg-white p-8 sm:p-12 shadow-sm border border-[#242321]/10">
                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Your Full Names *
                        </label>
                        <input
                          type="text"
                          required
                          value={formData.names}
                          onChange={(e) => setFormData({ ...formData, names: e.target.value })}
                          placeholder="Elena Rossi & Matteo Bianchi"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Email Address *
                        </label>
                        <input
                          type="email"
                          required
                          value={formData.email}
                          onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                          placeholder="elena@example.com"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Phone / WhatsApp
                        </label>
                        <input
                          type="tel"
                          value={formData.phone}
                          onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                          placeholder="+1 (555) 000-0000"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Wedding Date / Season *
                        </label>
                        <input
                          type="text"
                          required
                          value={formData.date}
                          onChange={(e) => setFormData({ ...formData, date: e.target.value })}
                          placeholder="September 18, 2026"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Wedding Destination / Venue *
                        </label>
                        <input
                          type="text"
                          required
                          value={formData.location}
                          onChange={(e) => setFormData({ ...formData, location: e.target.value })}
                          placeholder="Villa Balbiano, Lake Como, Italy"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div>
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Event Type / Coverage
                        </label>
                        <select
                          value={formData.eventType}
                          onChange={(e) => setFormData({ ...formData, eventType: e.target.value })}
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70] bg-white"
                        >
                          <option>Multi-Day Destination Wedding</option>
                          <option>Full Day Wedding & Cinematic Film</option>
                          <option>Wedding Photography Only</option>
                          <option>Intimate Elopement</option>
                          <option>Pre-Wedding / Editorial Session</option>
                        </select>
                      </div>

                      <div className="sm:col-span-2">
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Estimated Guest Count
                        </label>
                        <input
                          type="number"
                          value={formData.guestCount}
                          onChange={(e) => setFormData({ ...formData, guestCount: e.target.value })}
                          placeholder="e.g. 120"
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>

                      <div className="sm:col-span-2">
                        <label className="block text-[11px] uppercase tracking-wider text-[#242321] font-medium mb-2">
                          Tell Us About Your Vision *
                        </label>
                        <textarea
                          required
                          rows={4}
                          value={formData.message}
                          onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                          placeholder="Share details regarding your celebration, aesthetic preferences, planner, and any questions you have for our studio..."
                          className="w-full p-3 border border-[#242321]/20 text-sm outline-none focus:border-[#B49A70]"
                        />
                      </div>
                    </div>

                    <div className="mt-8 text-center">
                      <button
                        type="submit"
                        disabled={formSending}
                        className="w-full sm:w-auto px-8 py-3.5 bg-[#B49A70] hover:bg-[#242321] text-white text-xs tracking-[0.2em] uppercase font-semibold transition-all disabled:opacity-50"
                      >
                        {formSending ? 'Sending Inquiry via wp_mail()...' : 'Submit Studio Inquiry'}
                      </button>
                    </div>

                    {formSubmitted && (
                      <div className="mt-6 p-4 bg-[#E8F0EA] border border-[#C4D9C8] text-[#2D5837] text-sm text-center">
                        ✓ Thank you. Your wedding inquiry has been received. Our studio team will review your date and reply within 24 to 48 hours.
                      </div>
                    )}
                  </form>
                </div>
              </section>

              {/* FINAL CTA */}
              <section className="relative py-28 bg-[#242321] text-white text-center px-6 overflow-hidden">
                <img
                  src="/film.jpg"
                  alt="Amalfi Coast"
                  className="absolute inset-0 w-full h-full object-cover opacity-20"
                />
                <div className="relative z-10 max-w-2xl mx-auto">
                  <span className="inline-block text-xs tracking-[0.24em] uppercase text-[#D8C6AE] font-medium mb-3">
                    Begin Your Journey
                  </span>
                  <h2 className="font-serif text-4xl sm:text-5xl font-light mb-6">
                    Let’s Create Something Timeless.
                  </h2>
                  <p className="text-white/80 text-sm sm:text-base font-light mb-8 leading-relaxed">
                    We accept a strictly limited collection of wedding and cinema commissions each calendar year. Reach out early to reserve your date and receive our private studio commission catalog.
                  </p>
                  <button
                    onClick={() => setActivePage('contact')}
                    className="px-8 py-3.5 bg-[#B49A70] hover:bg-white text-black text-xs tracking-[0.2em] uppercase font-semibold transition-all"
                  >
                    Schedule a Consultation
                  </button>
                </div>
              </section>
            </div>
          )}

          {/* PAGE: ABOUT US */}
          {activePage === 'about' && (
            <div className="py-16 px-6 sm:px-12 max-w-5xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">The Atelier</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-8">About Everafter Studio</h1>
              <div className="prose max-w-none text-[#34322F] text-lg font-light leading-relaxed space-y-6">
                <p className="font-serif italic text-2xl text-[#242321]">
                  “We document transcendent celebrations of love with the refined eye of high-fashion editorial and the profound heart of fine art cinema.”
                </p>
                <p>
                  Founded in 2016 by international fine art photographer Julian Vance, Everafter Studio has grown into a boutique atelier of master cinematographers and analog film purists. We partner with discerning couples and global wedding planners to produce imagery of rare quiet grace and unmistakable luxury.
                </p>
                <div className="my-10 grid grid-cols-1 sm:grid-cols-2 gap-8">
                  <img src="/portfolio-1.jpg" alt="Atelier Couture" className="w-full h-80 object-cover shadow-md" />
                  <img src="/destination.jpg" alt="Provencal Stone" className="w-full h-80 object-cover shadow-md" />
                </div>
                <h3 className="font-serif text-3xl text-[#242321] pt-6">The Artists Behind the Lenses</h3>
                <p>
                  Our creative team is comprised of university-trained visual artists, former fashion editorial photographers, and festival-winning cinematographers. We operate with discretion, elegance, and deep technical mastery.
                </p>
              </div>
            </div>
          )}

          {/* PAGE: PORTFOLIO */}
          {activePage === 'portfolio' && (
            <div className="py-16 px-6 sm:px-12 max-w-7xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">Visual Archives</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-8">Portfolio Gallery</h1>
              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {portfolioCards.map((c) => (
                  <div
                    key={c.id}
                    onClick={() => setLightboxImg({ src: c.img, title: c.title })}
                    className="group relative h-96 overflow-hidden bg-black cursor-pointer shadow-md"
                  >
                    <img src={c.img} alt={c.title} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-6 text-white">
                      <span className="text-[10px] tracking-widest uppercase text-[#D8C6AE]">{c.location}</span>
                      <h4 className="font-serif text-xl">{c.title}</h4>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          )}

          {/* PAGE: STORIES */}
          {activePage === 'stories' && (
            <div className="py-16 px-6 sm:px-12 max-w-5xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">Journal & Monographs</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-12">Wedding Stories</h1>
              <div className="space-y-16">
                <article className="border-b border-[#242321]/10 pb-12">
                  <img src="/hero.jpg" alt="Lake Como" className="w-full h-[460px] object-cover mb-6 shadow-md" />
                  <div className="text-xs uppercase tracking-widest text-[#7E7972] mb-2">Villa Balbiano · Lake Como, Italy</div>
                  <h2 className="font-serif text-3xl sm:text-4xl text-[#242321] mb-4">Elena &amp; Matteo — Balustrade Dusk</h2>
                  <p className="text-[#34322F] text-base leading-relaxed font-light mb-4">
                    Bathed in the incandescent twilight of Lake Como, Elena and Matteo exchanged vows upon the grand antique stone terrace of Villa Balbiano. Surrounded by cascading olive greenery, neoclassical marble balustrades, and the serene expanse of the alpine water, every moment breathed timeless Italian romanticism.
                  </p>
                  <div className="text-xs text-[#B49A70] tracking-wider uppercase">Shot on Contax 645 · Kodak Portra 400 · Arri 35</div>
                </article>

                <article className="border-b border-[#242321]/10 pb-12">
                  <img src="/destination.jpg" alt="Provence" className="w-full h-[460px] object-cover mb-6 shadow-md" />
                  <div className="text-xs uppercase tracking-widest text-[#7E7972] mb-2">Château de Tourreau · Provence, France</div>
                  <h2 className="font-serif text-3xl sm:text-4xl text-[#242321] mb-4">Camille &amp; Alexandre — Provencal Romance</h2>
                  <p className="text-[#34322F] text-base leading-relaxed font-light mb-4">
                    Set amidst the golden limestone walls, lavender terraces, and centuries-old cypress paths of Provence, Camille and Alexandre gathered close family from across three continents for a three-day celebration of Provencal joie de vivre.
                  </p>
                  <div className="text-xs text-[#B49A70] tracking-wider uppercase">Shot on Leica M11 · 35mm Summilux · Tri-X 400</div>
                </article>
              </div>
            </div>
          )}

          {/* PAGE: SERVICES */}
          {activePage === 'services' && (
            <div className="py-16 px-6 sm:px-12 max-w-5xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">Commissions</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-8">Services &amp; Cinema</h1>
              <div className="space-y-8">
                <div className="p-8 bg-white border border-[#242321]/10 shadow-sm">
                  <h3 className="font-serif text-2xl text-[#242321] mb-2">01. Destination Wedding Collections</h3>
                  <p className="text-[#34322F] text-base font-light leading-relaxed">
                    Full weekend coverage including welcome cocktail soirées, rehearsal banquets, main celebration day, and farewell recovery brunches. Includes two principal visual directors and comprehensive international logistics.
                  </p>
                </div>
                <div className="p-8 bg-white border border-[#242321]/10 shadow-sm">
                  <h3 className="font-serif text-2xl text-[#242321] mb-2">02. Cinematic Wedding Films</h3>
                  <p className="text-[#34322F] text-base font-light leading-relaxed">
                    Directed like an independent romantic motion picture. Features customized analog soundtrack scores, professional dialogue mastering, aerial drone cinematography, and 4K digital cinema files.
                  </p>
                </div>
                <div className="p-8 bg-white border border-[#242321]/10 shadow-sm">
                  <h3 className="font-serif text-2xl text-[#242321] mb-2">03. Haute Couture Bridal & Editorial</h3>
                  <p className="text-[#34322F] text-base font-light leading-relaxed">
                    High-fashion bridal monograph sessions inside private historical villas or grand suites prior to ceremony commencement.
                  </p>
                </div>
              </div>
            </div>
          )}

          {/* PAGE: DESTINATION */}
          {activePage === 'destination' && (
            <div className="py-16 px-6 sm:px-12 max-w-5xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">Worldwide</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-8">Destination Weddings</h1>
              <p className="text-lg text-[#34322F] font-light leading-relaxed mb-10">
                Everafter Studio regularly works across Lake Como, the Amalfi Coast, Tuscany, Paris, Provence, the French Riviera, and the Greek Isles. We maintain dedicated European production bases to ensure seamless arrival and zero travel friction.
              </p>
              <div className="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
                <div className="border border-[#242321]/10 p-6 bg-white">
                  <h4 className="font-serif text-xl mb-2">Lake Como</h4>
                  <p className="text-xs text-[#7E7972]">Villa Balbiano, Villa del Balbianello, Villa d'Este.</p>
                </div>
                <div className="border border-[#242321]/10 p-6 bg-white">
                  <h4 className="font-serif text-xl mb-2">Provence & Côte d'Azur</h4>
                  <p className="text-xs text-[#7E7972]">Château Saint-Martin, Cap d'Antibes, Luberon estates.</p>
                </div>
                <div className="border border-[#242321]/10 p-6 bg-white">
                  <h4 className="font-serif text-xl mb-2">Amalfi Coast</h4>
                  <p className="text-xs text-[#7E7972]">Villa Cimbrone, Ravello cliffside, Positano coves.</p>
                </div>
              </div>
            </div>
          )}

          {/* PAGE: CONTACT */}
          {activePage === 'contact' && (
            <div className="py-16 px-6 sm:px-12 max-w-4xl mx-auto">
              <span className="text-xs uppercase tracking-[0.24em] text-[#B49A70] font-medium">Inquiries</span>
              <h1 className="font-serif text-4xl sm:text-6xl text-[#242321] mt-2 mb-8">Contact &amp; Reserve Date</h1>
              <div className="bg-white p-8 sm:p-12 border border-[#242321]/10 shadow-sm mb-8">
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-8 pb-8 border-b border-[#242321]/10">
                  <div>
                    <span className="text-[10px] uppercase tracking-widest text-[#B49A70] block mb-1">Direct Email</span>
                    <a href="mailto:inquire@everafterstudio.com" className="text-lg font-serif underline text-[#242321]">inquire@everafterstudio.com</a>
                  </div>
                  <div>
                    <span className="text-[10px] uppercase tracking-widest text-[#B49A70] block mb-1">Telephone &amp; WhatsApp</span>
                    <a href="tel:+18004829104" className="text-lg font-serif text-[#242321]">+1 (800) 482-9104</a>
                  </div>
                </div>
                <p className="text-sm text-[#7E7972] mb-6">
                  Please submit your inquiry through the form below to initiate date checks and receive our private atelier portfolio catalog.
                </p>
                <button
                  onClick={() => {
                    setActivePage('home');
                    setTimeout(() => {
                      document.getElementById('inquire')?.scrollIntoView({ behavior: 'smooth' });
                    }, 100);
                  }}
                  className="px-6 py-3 bg-[#B49A70] hover:bg-[#242321] text-white text-xs tracking-[0.2em] uppercase font-semibold transition-all"
                >
                  Proceed to Inquiry Form &rarr;
                </button>
              </div>
            </div>
          )}

          {/* LUXURY FOOTER */}
          <footer className="bg-[#1A1918] text-white/70 py-16 px-6 sm:px-12 border-t border-white/10 mt-auto">
            <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
              <div>
                <div className="font-serif text-2xl text-white tracking-[0.2em] uppercase mb-4">Everafter Studio</div>
                <p className="text-xs text-white/60 leading-relaxed max-w-xs">
                  Luxury editorial wedding photography and cinematic wedding films for timeless celebrations worldwide.
                </p>
                <div className="text-xs text-[#D8C6AE] mt-4 font-mono">
                  Offices in Milan · Paris · New York
                </div>
              </div>

              <div>
                <h4 className="text-xs tracking-[0.2em] uppercase text-[#D8C6AE] font-semibold mb-4">Navigation</h4>
                <ul className="space-y-2 text-xs">
                  <li><button onClick={() => setActivePage('stories')} className="hover:text-white transition-colors">Featured Stories</button></li>
                  <li><button onClick={() => setActivePage('portfolio')} className="hover:text-white transition-colors">Portfolio Gallery</button></li>
                  <li><button onClick={() => setActivePage('services')} className="hover:text-white transition-colors">Services &amp; Cinema</button></li>
                  <li><button onClick={() => setActivePage('about')} className="hover:text-white transition-colors">Our Philosophy</button></li>
                  <li><button onClick={() => setActivePage('contact')} className="hover:text-white transition-colors">Client Inquiries</button></li>
                </ul>
              </div>

              <div>
                <h4 className="text-xs tracking-[0.2em] uppercase text-[#D8C6AE] font-semibold mb-4">Expertise</h4>
                <ul className="space-y-2 text-xs">
                  <li>Destination Weddings</li>
                  <li>Cinematic Wedding Films</li>
                  <li>Haute Couture Bridal</li>
                  <li>Pre-Wedding Sessions</li>
                  <li>Archival Heirloom Albums</li>
                </ul>
              </div>

              <div>
                <h4 className="text-xs tracking-[0.2em] uppercase text-[#D8C6AE] font-semibold mb-4">Inquiries</h4>
                <div className="text-xs space-y-1 mb-4">
                  <p>inquire@everafterstudio.com</p>
                  <p>+1 (800) 482-9104</p>
                </div>
                <div className="text-xs text-[#B49A70] tracking-wider uppercase">
                  Available for 2026/2027 Commissions
                </div>
              </div>
            </div>

            <div className="max-w-7xl mx-auto pt-8 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between text-xs text-white/40 gap-4">
              <div>
                © {new Date().getFullYear()} Everafter Studio. All Rights Reserved. Luxury Wedding Photography &amp; Cinematic Films.
              </div>
              <div className="flex items-center gap-4">
                <span>PHP 8.1+</span>
                <span>·</span>
                <span>WordPress 6.7 Ready</span>
                <span>·</span>
                <span>GPL v2 Licensed</span>
              </div>
            </div>
          </footer>
        </div>

        {/* Floating Download Badge in bottom corner for convenience */}
        <a
          href="/everafter-studio.zip"
          download="everafter-studio.zip"
          className="fixed bottom-6 right-6 z-50 bg-[#242321] hover:bg-[#B49A70] text-white hover:text-black border border-[#B49A70]/40 px-4 py-2.5 text-xs font-semibold tracking-widest uppercase transition-all shadow-2xl flex items-center gap-2 group"
          title="Download everafter-studio.zip"
        >
          <Download className="w-4 h-4 text-[#B49A70] group-hover:text-black transition-colors" />
          <span>everafter-studio.zip</span>
        </a>

      {/* LIGHTBOX MODAL */}
      {lightboxImg && (
        <div
          onClick={() => setLightboxImg(null)}
          className="fixed inset-0 z-[100] bg-black/95 backdrop-blur-md flex items-center justify-center p-6"
        >
          <div className="relative max-w-5xl max-h-[90vh] flex flex-col items-center">
            <button
              onClick={() => setLightboxImg(null)}
              className="absolute -top-12 right-0 text-white hover:text-[#B49A70] text-3xl font-light"
              aria-label="Close Lightbox"
            >
              &times;
            </button>
            <img
              src={lightboxImg.src}
              alt={lightboxImg.title}
              className="max-w-full max-h-[80vh] object-contain shadow-2xl"
            />
            <div className="mt-4 font-serif text-xl text-white tracking-wide">
              {lightboxImg.title}
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
